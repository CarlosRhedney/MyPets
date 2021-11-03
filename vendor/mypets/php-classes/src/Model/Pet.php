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

	public static function checkList($list)
	{
		foreach($list as &$row)
		{
			$p = new Pet();

			$p->setData($row);

			$row = $p->getValues();
		}

		return $list;

	}

	public function save()
	{
		$idperson = (int)$_SESSION[User::SESSION]["idperson"];

		$sql = new Sql();

		$results = $sql->select("CALL sp_pets_save(:idpet, :idperson, :pet, :rc, :vlheight, :vllength, :vlweight, :url, :descr)", array(
			":idpet"=>$this->getidpet(),
			":idperson"=>$idperson,
			":pet"=>$this->getpet(),
			":rc"=>$this->getrc(),
			":vlheight"=>$this->getvlheight(),
			":vllength"=>$this->getvllength(),
			":vlweight"=>$this->getvlweight(),
			":url"=>$this->geturl(),
			":descr"=>$this->getdescr()
		));

		$this->setData($results[0]);
	}

	public function get($idpet)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_pets a INNER JOIN tb_photos b USING(idpet) WHERE a.idpet = :idpet", array(
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

	public function getValues()
	{
		$this->checkPhoto();

		$values = parent::getValues();

		return $values;

	}

	public function checkPhoto()
	{
		if(file_exists("res/site/img/pets/" . $this->getpet() . $this->getidphoto() . $this->getidpet() . ".jpg"))
		{
			$url = "res/site/img/pets/" . $this->getpet() . $this->getidphoto() . $this->getidpet() . ".jpg";

		}else if(file_exists("res/site/img/pets/" . $this->getpet() . $this->getidpet() . ".jpg"))
		{
			$url = "res/site/img/pets/" . $this->getpet() . $this->getidpet() . ".jpg";

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
		$dist = "res/site/img/pets/" . $this->getpet() . $this->getidphoto() . $this->getidpet() . ".jpg";

		$sql = new Sql();
		
		$sql->select("INSERT INTO tb_photos(idpet, photo)VALUES(:idpet, :photo)", array(
			":idpet"=>$this->getidpet(),
			":photo"=>$dist
		));

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

	}

	public function getFromUrl($url)
	{
		$sql = new Sql();

		$rows = $sql->select("SELECT * FROM tb_pets WHERE url = :url LIMIT 1", array(
			":url"=>$url
		));

		$this->setData($rows[0]);
	}

	public function getCategory()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categories a INNER JOIN tb_categoriespets b ON a.idcategory = b.idcategory WHERE b.idpet = :idpet", array(
			":idpet"=>$this->getidpet()
		));
	}

	public function getPerson()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_pets b ON a.idperson = b.idperson WHERE b.idpet = :idpet", array(
			":idpet"=>$this->getidpet()
		));
	}

	public function getPersonOng()
	{
		$idperson = (int)$_SESSION[User::SESSION]["idperson"];
		
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_persons a INNER JOIN tb_ongs b ON a.idperson = b.idperson WHERE b.idperson = :idperson", array(
			":idperson"=>$idperson
		));
	}

}
?>