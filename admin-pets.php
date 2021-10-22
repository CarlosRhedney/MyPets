<?php

//  \PageAdmin Classe da administração do sistema, onde gerenciamos todo o sistema e quem esta cadastrado nele, PageAdmin é herança da classe Page, pois herda todos os seus atributos e metodos.
use \Mypets\PageAdmin;

//  \User Classe da administração do sistema, onde redirecionamos o usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema para a tela de login, valida se os dados são autenticos e validos no sistema, logout, save, get, update....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
use \Mypets\Model\User;

// \Pet Classe da administração do sitema, onde relaconamos as categorias do sistema.
// O usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema tem acesso, contem os metodos listAll, save, get, delete....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/Category.php.
use \Mypets\Model\Pet;


$app->get('/admin/pets', function(){

	User::verifyLogin();

	$pets = Pet::listAll();

	$page = new PageAdmin();

	$page->setTpl("pets", array(
		"pets"=>$pets
	));

});

$app->get('/admin/pets/create', function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("pets-create");
});

$app->post('/admin/pets/create', function(){

	User::verifyLogin();

	$pet = new Pet();

	$pet->setData($_POST);

	$pet->save();

	$pet->addPhoto($_FILES["file"]);

	header("Location: /admin/pets");

	exit;

});

$app->get('/admin/pets/:idpet', function($idpet){

	User::verifyLogin();

	$pet = new Pet();

	$pet->get((int)$idpet);

	$page = new PageAdmin();

	$page->setTpl("pets-update", array(
		"pet"=>$pet->getValues()
	));
});

$app->post('/admin/pets/:idpet', function($idpet){

	User::verifyLogin();

	$pet = new Pet();

	$pet->get((int)$idpet);

	$pet->setData($_POST);

	$pet->save();

	$pet->addPhoto($_FILES["file"]);

	header("Location: /admin/pets");

	exit;

});

$app->get('/admin/pets/:idpet/delete', function($idpet){

	User::verifyLogin();

	$pet = new Pet();

	$pet->get((int)$idpet);

	$pet->delete();

	header("Location: /admin/pets");

	exit;

});

?>