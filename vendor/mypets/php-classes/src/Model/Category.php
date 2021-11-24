<?php
namespace Mypets\Model;

use \Mypets\DB\Sql;
use \Mypets\Model;

class Category extends Model
{
	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categories ORDER BY idcategory");

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

	public function getPetsPage($page = 1, $itensPerPage = 3)
	{
		$start = ($page - 1) * $itensPerPage;

		$sql = new Sql();

		$results = $sql->select("SELECT SQL_CALC_FOUND_ROWS * FROM tb_pets a INNER JOIN tb_categoriespets b ON a.idpet = b.idpet INNER JOIN tb_categories c ON c.idcategory = b.idcategory WHERE c.idcategory = :idcategory LIMIT $start, $itensPerPage", array(
			":idcategory"=>$this->getidcategory()
		));

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal");

		return array(
			"data"=>Pet::checkList($results),
			"total"=>(int)$resultTotal[0]["nrtotal"],
			"pages"=>ceil($resultTotal[0]["nrtotal"] / $itensPerPage)
		);

	}

	public function addPet(Pet $pet)
	{
		$sql = new Sql();

		$sql->query("INSERT INTO tb_categoriespets(idcategory, idpet)VALUES(:idcategory, :idpet)", array(
			":idcategory"=>$this->getidcategory(),
			":idpet"=>$pet->getidpet()
		));
	}

	public function removePet(Pet $pet)
	{
		$sql = new Sql();

		$sql->query("DELETE FROM tb_categoriespets WHERE idcategory = :idcategory AND idpet = :idpet", array(
			":idcategory"=>$this->getidcategory(),
			":idpet"=>$pet->getidpet()
		));
	}

}
?>