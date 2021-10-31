<?php

//  \Ong Classe da ongistração do sistema, onde gerenciamos todo o sistema e quem esta cadastrado nele, Ong é herança da classe Page, pois herda todos os seus atributos e metodos.
use \Mypets\Ong;

//  \User Classe da ongistração do sistema, onde redirecionamos o usuario previamente cadastrado como ongistrador, que gerencia "certa" parte do sistema para a tela de login, valida se os dados são autenticos e validos no sistema, logout, save, get, update....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
use \Mypets\Model\User;

// \Category Classe da administração do sitema, onde relaconamos as categorias do sistema.
// O usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema tem acesso, contem os metodos listAll, save, get, delete....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/Category.php.
use \Mypets\Model\Category;

// \Category Classe da administração do sitema, onde relaconamos as categorias do sistema.
// O usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema tem acesso, contem os metodos listAll, save, get, delete....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/Category.php.
use \Mypets\Model\Pet;

// Rota do sistema administrativo
$app->get('/ong', function(){

	// Metodo estatico veryfyLogin criado na classe User
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	//User::verifyLoginOng();

	// Iniciamos o objeto $page com a classe Ong.
	// Ong é herança de Page.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Page.php.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Ong.php.
	$page = new Ong();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template index.html contido em views/admin.
	// Para mais detalhes verificar o template em views/admin/index.html.
	$page->setTpl("index");
	
});

$app->get('/ong/pets', function(){

	//User::verifyLoginOng();

	$pets = Pet::listAll();

	$page = new Ong();

	$page->setTpl("pets", array(
		"pets"=>$pets
	));

});

$app->get('/ong/pets/create', function(){

	//User::verifyLoginOng();

	$page = new Ong();

	$page->setTpl("pets-create");
});

$app->post('/ong/pets/create', function(){

	//User::verifyLoginOng();

	$pet = new Pet();

	$pet->setData($_POST);

	$pet->save();

	$pet->addPhoto($_FILES["file"]);

	header("Location: /ong/pets");

	exit;

});

$app->get('/ong/pets/:idpet', function($idpet){

	//User::verifyLoginOng();

	$pet = new Pet();

	$pet->get((int)$idpet);

	$page = new Ong();

	$page->setTpl("pets-update", array(
		"pet"=>$pet->getValues()
	));
});

$app->post('/ong/pets/:idpet', function($idpet){

	//User::verifyLoginOng();

	$pet = new Pet();

	$pet->get((int)$idpet);

	$pet->setData($_POST);

	$pet->save();

	$pet->addPhoto($_FILES["file"]);

	header("Location: /ong/pets");

	exit;

});

$app->get('/ong/pets/:idpet/delete', function($idpet){

	//User::verifyLoginOng();

	$pet = new Pet();

	$pet->get((int)$idpet);

	$pet->delete();

	header("Location: /ong/pets");

	exit;

});

$app->get('/ong/categories', function(){

	//User::verifyLoginOng();

	$categories = Category::listAll();

	$page = new Ong();

	$page->setTpl("categories", array(
		"categories"=>$categories
	));

});

$app->get('/ong/categories/create', function(){

	//User::verifyLoginOng();

	$page = new Ong();

	$page->setTpl("categories-create");

});

$app->post('/ong/categories/create', function(){

	//User::verifyLoginOng();

	$categories = new Category();

	$categories->setData($_POST);

	$categories->save();

	header("Location: /ong/categories");

	exit;
	
});

$app->get('/ong/categories/:idcategory/delete', function($idcategory){

	//User::verifyLoginOng();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header("Location: /ong/categories");

	exit;

});

$app->get('/ong/categories/:idcategory', function($idcategory){

	//User::verifyLoginOng();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Ong();

	$page->setTpl("categories-update", array(
		"category"=>$category->getValues()
	));

});

$app->post('/ong/categories/:idcategory', function($idcategory){

	//User::verifyLoginOng();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->save();

	header("Location: /ong/categories");

	exit;

});

$app->get('/ong/categories/:idcategory/pets', function($idcategory){

	//User::verifyLoginOng();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Ong();

	$page->setTpl("categories-pets", array(
		"category"=>$category->getValues(),
		"petsRelated"=>$category->getPets(),
		"petsNotRelated"=>$category->getPets(false)
	));

});

$app->get('/ong/categories/:idcategory/pets/:idpet/add', function($idcategory, $idpet){

	//User::verifyLoginOng();

	$category = new Category();

	$category->get((int)$idcategory);

	$pet = new Pet();

	$pet->get((int)$idpet);

	$category->addPet($pet);

	header("Location: /ong/categories/".$idcategory."/pets");

	exit;

});

$app->get('/ong/categories/:idcategory/pets/:idpet/remove', function($idcategory, $idpet){

	//User::verifyLoginOng();

	$category = new Category();

	$category->get((int)$idcategory);

	$pet = new Pet();

	$pet->get((int)$idpet);

	$category->removePet($pet);

	header("Location: /ong/categories/".$idcategory."/pets");

	exit;

});

?>