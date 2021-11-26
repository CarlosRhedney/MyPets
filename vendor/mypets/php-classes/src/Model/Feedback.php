<?php 

namespace Mypets\Model;

use \Mypets\DB\Sql;
use \Mypets\Model;

class Feedback extends Model {

	const DELETESUCCESS = "DeleteSuccess";

	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("INSERT INTO tb_feedback(cod)VALUES(:cod)", [
			':cod'=>$this->getcod()
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}

	public static function setSuccess($msg)
	{
		return $_SESSION[Feedback::DELETESUCCESS] = $msg;
	}

	public static function getSuccess()
	{
		$msg = (isset($_SESSION[Feedback::DELETESUCCESS]) && $_SESSION[Feedback::DELETESUCCESS]) ? $_SESSION[Feedback::DELETESUCCESS] : "";

		Feedback::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{
		$_SESSION[Feedback::DELETESUCCESS] = NULL;
	}

}

 ?>