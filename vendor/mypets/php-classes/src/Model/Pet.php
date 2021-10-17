<?php
namespace Mypets\Model;

use \Mypets\DB\Sql;
use \Mypets\Model;

class Pet extends Model
{
	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_pets ORDER BY pet");

	}

	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_pets_save(:idpet, :pet, :vlwidth, :vlheight, :vllength, :vlweight, :url)", array(
			":idpet"=>$this->getidpet(),
			":pet"=>$this->getpet(),
			":vlwidth"=>$this->getvlwidth(),
			":vlheight"=>$this->getvlheight(),
			":vllength"=>$this->getvllength(),
			":vlweight"=>$this->getvlweight(),
			":url"=>$this->geturl()
		));

		$this->setData($results[0]);
	}

	public function get($idpet)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_pets WHERE idpet = :idpet", array(
			":idpet"=>$idpet
		));

		$this->setData($results[0]);

	}

	public function delete()
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_pets WHERE idpet = :idpet", array(
			":idpet"=>$this->getidpet()
		));
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

		$dist = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "res" . DIRECTORY_SEPARATOR . "site" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "pets" . DIRECTORY_SEPARATOR . $this->getidpet() . ".jpg";

		$sql = new Sql();
		
		$sql->select("INSERT INTO tb_photos(idpet, photo)VALUES(:idpet, :photo)", array(
			":idpet"=>$this->getidpet(),
			":photo"=>$dist
		));

		imagejpeg($image, $dist);

		imagedestroy($image);

	}
}
?>