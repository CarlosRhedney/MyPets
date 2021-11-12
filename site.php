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

use \Mypets\Model\User;

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

$app->get('/login', function(){

	$page = new Page();

	$page->setTpl("login", array(
		"error"=>User::getError(),
		"errorRegister"=>User::getErrorRegister(),
		"registerValues"=>(isset($_SESSION["registerValues"])) ? $_SESSION["registerValues"] : ["name"=>"", "mail"=>"", "nrphone"=>""]
	));

});

$app->post('/login', function(){

	try{

		User::login($_POST["login"], $_POST["password"]);

	}catch(Exception $e){

		User::setError($e->getMessage());

	}

	header("Location: /");

	exit;

});

$app->get('/logout', function(){

	User::logout();

	header("Location: /");

	exit;
	
});

$app->post('/register', function(){

	$_SESSION["registerValues"] = $_POST;

	if(!isset($_POST["name"]) || $_POST["name"] == "")
	{
		User::setErrorRegister("Insira o seu nome!");

		header("Location: /login");

		exit;

	}

	if(!isset($_POST["mail"]) || $_POST["mail"] == "")
	{
		User::setErrorRegister("Insira o seu e-mail!");

		header("Location: /login");

		exit;
		
	}

	if(!isset($_POST["nrphone"]) || $_POST["nrphone"] == "")
	{
		User::setErrorRegister("Insira o seu telefone!");

		header("Location: /login");

		exit;
		
	}

	if(!isset($_POST["password"]) || $_POST["password"] == "")
	{
		User::setErrorRegister("Insira a sua senha!");

		header("Location: /login");

		exit;
		
	}

	if(User::checkLoginExist($_POST["mail"]) === true)
	{
		User::setErrorRegister("E-mail já cadastrado!");

		header("Location: /login");

		exit;
	}

	$user = new User();

	$user->setData(array(
		"inadmin"=>0,
		"login"=>$_POST["mail"],
		"person"=>$_POST["name"],
		"mail"=>$_POST["mail"],
		"despassword"=>$_POST["password"],
		"nrphone"=>$_POST["nrphone"]
	));

	$user->save();

	User::login($_POST["mail"], $_POST["password"]);

	header("Location: /");

	exit;

});

?>