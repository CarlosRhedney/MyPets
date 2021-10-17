<?php

//  \Page Classe principal do sistema (HomePage), é o primeiro contato entre usuario e sistema.
use \Mypets\Page;

// Nossa rota inicial '/', todos os usuarios assim que acessam o sistema são direcionados para a homepage do sistema.
$app->get('/', function(){

	// Iniciamos o objeto $page, que recebe a classe Page.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Page.php.
	$page = new Page();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template index.html.
	// Para mais detalhes verificar o template em views/index.html.
	$page->setTpl("index");

});

?>