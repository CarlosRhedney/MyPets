<?php 

namespace Mypets\Model;

use \Mypets\DB\Sql;
use \Mypets\Model;

class Address extends Model {

	const SESSION_ERROR = "AddressError";

	public static function getCEP($nrcep)
	{

		$nrcep = str_replace("-", "", $nrcep);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "http://viacep.com.br/ws/$nrcep/json/");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$data = json_decode(curl_exec($ch), true);

		curl_close($ch);

		return $data;

	}

	public function loadFromCep($nrcep)
	{

		$data = Address::getCEP($nrcep);

		if (isset($data['logradouro']) && $data['logradouro']) {

			$this->setaddress($data['logradouro']);
			$this->setcomplement($data['complemento']);
			$this->setdistrict($data['bairro']);
			$this->setcity($data['localidade']);
			$this->setstate($data['uf']);
			$this->setcountry('Brasil');
			$this->setzipcode($nrcep);

		}

	}

	public function save()
	{
		$idperson = (int)$_SESSION[User::SESSION]["idperson"];

		$sql = new Sql();

		$results = $sql->select("CALL sp_addresses_save(:idaddress, :idperson, :address, :number, :complement, :city, :state, :country, :zipcode, :district)", [
			':idaddress'=>$this->getidaddress(),
			':idperson'=>$idperson,
			':address'=>utf8_decode($this->getaddress()),
			':number'=>$this->getnumber(),
			':complement'=>utf8_decode($this->getcomplement()),
			':city'=>utf8_decode($this->getcity()),
			':state'=>utf8_decode($this->getstate()),
			':country'=>utf8_decode($this->getcountry()),
			':zipcode'=>$this->getzipcode(),
			':district'=>$this->getdistrict()
		]);

		if (count($results) > 0) {
			$this->setData($results[0]);
		}

	}

	public static function setMsgError($msg)
	{

		$_SESSION[Address::SESSION_ERROR] = $msg;

	}

	public static function getMsgError()
	{

		$msg = (isset($_SESSION[Address::SESSION_ERROR])) ? $_SESSION[Address::SESSION_ERROR] : "";

		Address::clearMsgError();

		return $msg;

	}

	public static function clearMsgError()
	{

		$_SESSION[Address::SESSION_ERROR] = NULL;

	}

}

 ?>