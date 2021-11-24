<?php 

namespace Mypets\Model;

use \Mypets\DB\Sql;
use \Mypets\Model;

class Data extends Model {

	const DATAERROR = "DataError";
	const DATASUCCESS = "DataSuccess";

	public function save()
	{
		$idperson = (int)$_SESSION[User::SESSION]["idperson"];

		$sql = new Sql();

		$results = $sql->select("CALL sp_data_save(:iddata, :idperson, :rg, :cpf)", [
			':iddata'=>$this->getiddata(),
			':idperson'=>$idperson,
			':rg'=>$this->getrg(),
			':cpf'=>$this->getcpf()
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}

	public static function setDataError($msg)
	{

		$_SESSION[Data::DATAERROR] = $msg;

	}

	public static function getDataError()
	{

		$msg = (isset($_SESSION[Data::DATAERROR])) ? $_SESSION[Data::DATAERROR] : "";

		Data::clearDataError();

		return $msg;

	}

	public static function clearDataError()
	{

		$_SESSION[Data::DATAERROR] = NULL;

	}

	public static function setSuccess($msg)
	{
		return $_SESSION[Data::DATASUCCESS] = $msg;
	}

	public static function getSuccess()
	{
		$msg = (isset($_SESSION[Data::DATASUCCESS]) && $_SESSION[Data::DATASUCCESS]) ? $_SESSION[Data::DATASUCCESS] : "";

		Data::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{
		$_SESSION[Data::DATASUCCESS] = NULL;
	}

}

 ?>