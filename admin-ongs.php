<?php

//  \PageAdmin Classe da administração do sistema, onde gerenciamos todo o sistema e quem esta cadastrado nele, PageAdmin é herança da classe Page, pois herda todos os seus atributos e metodos.
use \Mypets\PageAdmin;

//  \User Classe da administração do sistema, onde redirecionamos o usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema para a tela de login, valida se os dados são autenticos e validos no sistema, logout, save, get, update....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
use \Mypets\Model\User;

// \Pet Classe da administração do sitema, onde relaconamos as categorias do sistema.
// O usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema tem acesso, contem os metodos listAll, save, get, delete....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/Category.php.
use \Mypets\Model\Ong;


$app->get('/admin/ongs', function(){

	User::verifyLogin();

	$ongs = Ong::listAll();

	$page = new PageAdmin();

	$page->setTpl("ongs", array(
		"ongs"=>$ongs
	));

});

$app->get('/admin/ongs/create', function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("ongs-create");
});

$app->post('/admin/ongs/create', function(){

	User::verifyLogin();

	$pet = new Ong();

	$pet->setData($_POST);

	$pet->save();

	$pet->addPhoto($_FILES["file"]);

	header("Location: /admin/ongs");

	exit;

});

?>