<?php
namespace Mypets\Model;

use \Mypets\DB\Sql;
use \Mypets\Model;
use \Mypets\Mailer;

class User extends Model
{
	const SESSION = "User";
	const ERROR = "UserError";
	const SUCCESS = "UserSuccess";
	const ERROR_REGISTER = "UserErrorRegister";
	const SECRET = "TccMypets_Secret";
	const SECRET_IV = "TccMypets_Secret_IV";

	public static function login($login, $password)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE login = :login", array(
			":login"=>$login
		));

		if(count($results) === 0)
		{
			/*
			header("Location: /login");
			exit;
			throw new \Exception("Usuário e ou senha inválido(s)!");
			*/
			throw new \Exception("Usuário e ou senha inválido(s)!");
		}

		$data = $results[0];

		if(password_verify($password, $data["despassword"]) === true)
		{
			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		}else
		{
			/*
			header("Location: /login");
			exit;
			throw new \Exception("Usuário e ou senha inválido(s)!");
			*/
			throw new \Exception("Usuário e ou senha inválido(s)!");
		}
	}

	public static function verifyLogin($inadmin = true)
	{
		if(!User::checkLogin($inadmin)){

			if($inadmin)
			{
				header("Location: /admin/login");
			}else
			{
				header("Location: /login");
			}
			
			exit;

		}
	}

	public static function checkLogin($inadmin = true)
	{
		if(
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
		)
		{
			return false;

		}else{
			if($inadmin === true && (bool)$_SESSION[User::SESSION]["inadmin"] === true)
			{
				return true;

			}else if($inadmin === false)
			{
				return true;

			}else
			{
				return false;
			}
		}
	}

	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;
	}

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.person");
		
	}

	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_users_save(:person, :login, :despassword, :mail, :nrphone, :inadmin)", array(
				":person"=>$this->getperson(),
				":login"=>$this->getlogin(),
				":despassword"=>User::getPasswordHash($this->getdespassword()),
				":mail"=>$this->getmail(),
				":nrphone"=>$this->getnrphone(),
				":inadmin"=>$this->getinadmin()
			));

		$this->setData($results[0]);
	}

	public function get($iduser)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(
			":iduser"=>$iduser
		));

		$this->setData($results[0]);
	}

	public function update()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :person, :login, :despassword, :mail, :nrphone, :inadmin)", array(
			":iduser"=>$this->getiduser(),
			":person"=>$this->getperson(),
			":login"=>$this->getlogin(),
			":despassword"=>User::getPasswordHash($this->getdespassword()),
			":mail"=>$this->getmail(),
			":nrphone"=>$this->getnrphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);

	}

	public function delete()
	{
		$sql = new Sql();

		$sql->query("CALL sp_users_delete(:iduser)", array(
			":iduser"=>$this->getiduser()
		));
	}

	public static function getFromSession()
	{
		$idperson = (int)$_SESSION[User::SESSION]["idperson"];

		$user = new User();

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_users b USING(idperson) WHERE a.idperson = :idperson", array(
			":idperson"=>$idperson
		));

		$user->setData($results[0]);

		return $user;
		
	}

	public static function getForgot($mail, $inadmin = true)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_users b USING(idperson) WHERE a.mail = :mail", array(
			":mail"=>$mail
		));

		if(count($results) === 0)
		{

			throw new \Exception("Não foi possível recuperar a senha!");

		}else
		{
			$data = $results[0];

			$resultsRecovery = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :ip)", array(
				":iduser"=>$data["iduser"],
				":ip"=>$_SERVER["REMOTE_ADDR"]
			));

			if(count($resultsRecovery) === 0)
			{

				throw new \Exception("Não foi possível recuperar a senha!");

			}else
			{
				$dataRecovery = $resultsRecovery[0];

				$cde = openssl_encrypt($dataRecovery['idrecovery'], 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

				$code = base64_encode($cde);

				if($inadmin === true)
				{
					$link = "http://www.mypets.com.br/admin/forgot/reset?code=$code";
					
				}else
				{
					$link = "http://www.mypets.com.br/forgot/reset?code=$code";
				}

				$mailer = new Mailer($data["mail"], $data["person"], "Redefinir senha MyPets", "mail", array(
					"name"=>$data["person"],
					"link"=>$link
				));

				$mailer->send();

				return $data;

			}
		}
	}

	public static function validForgotDecrypt($code)
	{
		$code = base64_decode($code);

		$idrecovery = openssl_decrypt($code, 'AES-128-CBC', pack("a16", User::SECRET), 0, pack("a16", User::SECRET_IV));

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_userspasswordsrecoveries a INNER JOIN tb_users b USING(iduser) INNER JOIN tb_persons c USING(idperson) WHERE a.idrecovery = :idrecovery AND a.dtrecovery IS NULL and DATE_ADD(a.dtregister, INTERVAL 1 HOUR) >= NOW()", array(
			":idrecovery"=>$idrecovery
		));

		if(count($results) === 0)
		{
			throw new \Exception("Não foi possível recuperar a senha");

		}else
		{
			return $results[0];
		}
	}

	public static function setForgotUsed($idrecovery)
	{
		$sql = new Sql();

		$sql->query("UPDATE tb_userspasswordsrecoveries SET dtrecovery = NOW() WHERE idrecovery = :idrecovery", array(
			":idrecovery"=>$idrecovery
		));
	}

	public function setPassword($password)
	{
		$sql = new Sql();

		$sql->query("UPDATE tb_users SET despassword = :password WHERE iduser = :iduser", array(
			":password"=>$password,
			":iduser"=>$this->getiduser()
		));
	}

	public static function setSuccess($msg)
	{
		return $_SESSION[User::SUCCESS] = $msg;
	}

	public static function getSuccess()
	{
		$msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : "";

		User::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{
		$_SESSION[User::SUCCESS] = NULL;
	}

	public static function setError($msg)
	{
		return $_SESSION[User::ERROR] = $msg;
	}

	public static function getError()
	{
		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : "";

		User::clearError();

		return $msg;

	}

	public static function clearError()
	{
		$_SESSION[User::ERROR] = NULL;
	}

	public static function setErrorRegister($msg)
	{
		return $_SESSION[User::ERROR_REGISTER] = $msg;
	}

	public static function getErrorRegister()
	{
		$msg = (isset($_SESSION[User::ERROR_REGISTER]) && $_SESSION[User::ERROR_REGISTER]) ? $_SESSION[User::ERROR_REGISTER] : "";

		User::clearErrorRegister();

		return $msg;

	}

	public static function clearErrorRegister()
	{
		$_SESSION[User::ERROR_REGISTER] = NULL;
	}

	public static function getPasswordHash($password)
	{
		return password_hash($password, PASSWORD_DEFAULT, [
			"cost"=>12
		]);
	}

	public static function checkLoginExist($login)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE login = :login", array(
			":login"=>$login
		));

		return (count($results) > 0);

	}

	public static function createRelatory()
	{
		$sql = new Sql();

		$persons = $sql->select("SELECT * FROM tb_persons ORDER BY idperson");

		$headers = array();

		foreach($persons[0] as $key => $value)
		{
			array_push($headers, $key);
		}

		$file = fopen("relatories/persons.csv", "w+");

		fwrite($file, implode(",", $headers)."\r\n");

		foreach($persons as $row)
		{
			$data = array();

			foreach($row as $key => $value)
			{
				array_push($data, $value);
			}

			fwrite($file, implode(",", $data)."\r\n");

		}

		fclose($file);		
		
	}

	public static function getRelatory()
	{
		$filename = "relatories/persons.csv";

		if(file_exists($filename))
		{
			$file = fopen($filename, "r");

			$headers = explode(",", fgets($file));

			$data = array();

			while($row = fgets($file))
			{
				$rowData = explode(",", $row);

				$newRow = array();

				for($i = 0; $i < count($headers); $i++)
				{
					$newRow[$headers[$i]] = $rowData[$i];
				}

				array_push($data, $newRow);

			}

			fclose($file);

			foreach($data as $dt)
			{
				return implode(" ", $dt);
			}

		}
		
	}

	public static function getAddress()
	{
		$idperson = (int)$_SESSION[User::SESSION]["idperson"];

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_addresses a INNER JOIN tb_data b USING(idperson) WHERE idperson = :idperson", array(
			"idperson"=>$idperson
		));
	}

}
?>