<?php

//  \Page Classe principal do sistema (HomePage), é o primeiro contato entre usuario e sistema.
use \Mypets\Page;

// \Category Classe da administração do sitema, onde relaconamos as categorias do sistema.
// O usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema tem acesso, contem os metodos listAll, save, get, delete....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/Category.php.
use \Mypets\Model\Category;

// \Pet Classe da administração do sitema, onde relaconamos as categorias do sistema.
// O usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema tem acesso, contem os metodos listAll, save, get, delete....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/Category.php.
use \Mypets\Model\Pet;

use \Mypets\Model\Ong;

// Nossa rota inicial '/', todos os usuarios assim que acessam o sistema são direcionados para a homepage do sistema.
$app->get('/', function(){

	$pets = Pet::listAll();

	$ongs = Ong::listAll();

	// Iniciamos o objeto $page, que recebe a classe Page.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Page.php.
	$page = new Page();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template index.html.
	// Para mais detalhes verificar o template em views/index.html.
	$page->setTpl("index", array(
		"pets"=>Pet::checkList($pets),
		"ongs"=>$ongs
	));

});

$app->get('/categories/:idcategory', function($idcategory){

	$page = (isset($_GET["page"])) ? (int)$_GET["page"] : 1;

	$category = new Category();

	$category->get((int)$idcategory);

	$pagination = $category->getPetsPage($page);

	$pages = array();

	for ($i=1; $i <= $pagination["pages"] ; $i++) { 
		array_push($pages, array(
			"link"=>"/categories/" . $category->getidcategory() . "?page=" . $i,
			"page"=>$i
		));
	}

	$page = new Page();

	$page->setTpl("category", array(
		"category"=>$category->getValues(),
		"pets"=>$pagination["data"],
		"pages"=>$pages
	));

});

$app->get('/pets/:url', function($url){

	$pet = new Pet();

	$pet->getFromUrl($url);

	$page = new Page();

	$page->setTpl("pet-detail", array(

		"pet"=>$pet->getValues(),
		"categories"=>$pet->getCategory(),
		"person"=>$pet->getPerson(),
		"ongperson"=>$pet->getPersonOng()
	));

});

$app->get('/ongs/:url', function($url){

	$ong = new Ong();

	$ong->getFromUrl($url);

	$page = new Page();

	$page->setTpl("ong-detail", array(

		"ong"=>$ong->getValues(),
		"person"=>$ong->getPerson(),
		"ongperson"=>$ong->getPersonOng()
	));

});

?>