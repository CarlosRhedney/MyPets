<?php
namespace Mypets\Model;

use \Mypets\DB\Sql;
use \Mypets\Model;

class Ong extends Model
{
	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_ongs ORDER BY ong");

	}

	public static function checkList($list)
	{
		foreach($list as &$row)
		{
			$o = new Ong();

			$o->setData($row);

			$row = $o->getValues();
		}

		return $list;

	}

	public function save()
	{
		$idperson = (int)$_SESSION[User::SESSION]["idperson"];

		$sql = new Sql();

		$results = $sql->select("CALL sp_ongs_save(:idong, :idperson, :ong, :logradouro, :cnpj, :city, :number, :url)", array(
			":idong"=>$this->getidong(),
			":idperson"=>$idperson,
			":ong"=>$this->getong(),
			":logradouro"=>$this->getlogradouro(),
			":cnpj"=>$this->getcnpj(),
			":city"=>$this->getcity(),
			":number"=>$this->getnumber(),
			":url"=>$this->geturl()
		));

		$this->setData($results[0]);
	}

	public function get($idong)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_ongs WHERE idong = :idong", array(
			":idong"=>$idong
		));

		$this->setData($results[0]);

	}

	public function delete()
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_ongs WHERE idong = :idong", array(
			":idong"=>$this->getidong()
		));
	}

	public function getValues()
	{
		$this->checkPhoto();

		$values = parent::getValues();

		return $values;

	}

	public function checkPhoto()
	{
		if(file_exists("res/site/img/ongs/" . $this->getong() . $this->getidong() . ".jpg"))
		{
			$url = "res/site/img/ongs/" . $this->getong() . $this->getidong() . ".jpg";

		}else
		{
			$url = "res/site/img/ongs/brand1.png";

		}

		return $this->setphoto($url);

	}

	public function addPhoto($file)
	{
		$ext = explode(".", $file["name"]);
		$extension = end($ext);

		switch($extension)
		{
			case "jpg":
			case "jpeg":
				$image = imagecreatefromjpeg($file["tmp_name"]);
			break;

			case "gif":
				$image = imagecreatefromgif($file["tmp_name"]);
			break;

			case "png":
				$image = imagecreatefrompng($file["tmp_name"]);
			break;
		}

		/* 
		Esta seria a forma correta  de se salvar o caminho da imagem no BD.
		Porem ao retornar o caminho completo, estou tendo problemas na apresentação das imagens
		Pois o DIRECTORY_SEPARATOR esta colocando contrabarra (\) no lugar de barra (/).
		$dist = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "site" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "pets" . DIRECTORY_SEPARATOR . $file["name"] . $this->getidpet() . ".jpg";
		*/
		$dist = "res/site/img/ongs/" . $this->getong() . $this->getidong() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

	}

	public function getFromUrl($url)
	{
		$sql = new Sql();

		$rows = $sql->select("SELECT * FROM tb_ongs WHERE url = :url LIMIT 1", array(
			":url"=>$url
		));

		$this->setData($rows[0]);
	}

	public function getPerson()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_ongs b ON a.idperson = b.idperson WHERE b.idong = :idong", array(
			":idong"=>$this->getidong()
		));
	}

	public function getPersonOng()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_ongs b ON a.idperson = b.idperson WHERE b.idperson = :idperson", array(
			":idperson"=>$this->getidperson()
		));
	}

}
?>