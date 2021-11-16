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

$app->get('/admin/pets/relatory', function(){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Metodo estatico createRelatory criado na classe User.
	// Lista todos os usuarios contidos no Banco de Dados.
	// $relatory é um array vindo do Banco de Dados com todas as informações de todos os usuarios cadastrados no sistema.
	// Setamos $relatory no template relatory.html, para a listagem dos usuarios na parte administrativa do sistema.
	Pet::createRelatory();

	header("Location: /admin/pets");

	exit;

});

$app->get('/admin/pet/relatory', function(){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Metodo estatico createRelatory criado na classe User.
	// Lista todos os usuarios contidos no Banco de Dados.
	// $relatory é um array vindo do Banco de Dados com todas as informações de todos os usuarios cadastrados no sistema.
	// Setamos $relatory no template relatory.html, para a listagem dos usuarios na parte administrativa do sistema.
	$relatory = Pet::getRelatory();

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template users-relatory.html contido em views/admin.
	// Passamos para o template users-relatory.html, um array com todos os dados dos usuarios, para serem listados na parte administrativa do sistema.
	// Para mais detalhes verificar o template em views/admin/users-relatory.html.
	// "relatory"=>$relatory aqui o processo de chave=valor, setamos o valor no template.
	$page->setTpl("pets-relatory", array(
		"relatory"=>$relatory
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