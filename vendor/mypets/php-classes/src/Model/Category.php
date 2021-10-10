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

}
?>