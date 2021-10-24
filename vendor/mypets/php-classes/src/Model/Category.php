<?php
namespace Mypets\Model;

use \Mypets\DB\Sql;
use \Mypets\Model;

class Category extends Model
{
	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categories ORDER BY category");

	}

	public function save()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_categories_save(:idcategory, :category)", array(
			":idcategory"=>$this->getidcategory(),
			":category"=>$this->getcategory()
		));

		$this->setData($results[0]);

		Category::updateFile();
		
	}

	public function get($idcategory)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", array(
			":idcategory"=>$idcategory
		));

		$this->setData($results[0]);

	}

	public function delete()
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", array(
			":idcategory"=>$this->getidcategory()
		));

		Category::updateFile();
	}

	public static function updateFile()
	{
		$categories = Category::listAll();

		$html = array();

		foreach($categories as $row)
		{
			array_push($html, '<li><a href="/categories/'.$row["idcategory"].'">'.$row["category"].'</a></li>');
		}

		file_put_contents($_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "categories-menu.html", implode("", $html));
	}

	public function getPets($related = true)
	{
		$sql = new Sql();

		if($related === true)
		{
			return $sql->select("
				SELECT * FROM tb_pets WHERE idpet IN(
				    SELECT a.idpet FROM tb_pets a INNER JOIN tb_categoriespets b ON a.idpet = b.idpet WHERE b.idcategory = :idcategory
				)
			", array(
				":idcategory"=>$this->getidcategory()
			));

		}else
		{
			return $sql->select("
				SELECT * FROM tb_pets WHERE idpet NOT IN(
				    SELECT a.idpet FROM tb_pets a INNER JOIN tb_categoriespets b ON a.idpet = b.idpet WHERE b.idcategory = :idcategory
				)
			", array(
				":idcategory"=>$this->getidcategory()
			));
		}
	}

	public function addPet($pet)
	{
		$sql = new Sql();

		$sql->query("INSERT INTO tb_categoriespets(idcategory, idpet)VALUES(:idcategory, :idpet)", array(
			":idcategory"=>$this->getidcategory(),
			":idpet"=>$pet->getidpet()
		));
	}

	public function removePet($pet)
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_categoriespets WHERE idcategory = :idcategory AND idpet = :idpet", array(
			":idcategory"=>$this->getidcategory(),
			":idpet"=>$pet->getidpet()
		));
	}

}
?>