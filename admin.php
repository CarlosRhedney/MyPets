<?php

//  \PageAdmin Classe da administração do sistema, onde gerenciamos todo o sistema e quem esta cadastrado nele, PageAdmin é herança da classe Page, pois herda todos os seus atributos e metodos.
use \Mypets\PageAdmin;

//  \User Classe da administração do sistema, onde redirecionamos o usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema para a tela de login, valida se os dados são autenticos e validos no sistema, logout, save, get, update....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
use \Mypets\Model\User;

// Rota do sistema administrativo
$app->get('/admin', function(){

	// Metodo estatico veryfyLogin criado na classe User
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Iniciamos o objeto $page com a classe PageAdmin.
	// PageAdmin é herança de Page.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Page.php.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template index.html contido em views/admin.
	// Para mais detalhes verificar o template em views/admin/index.html.
	$page->setTpl("index");
	
});

?>