<?php

//  \PageAdmin Classe da administração do sistema, onde gerenciamos todo o sistema e quem esta cadastrado nele, PageAdmin é herança da classe Page, pois herda todos os seus atributos e metodos.
use \Mypets\PageAdmin;

//  \User Classe da administração do sistema, onde redirecionamos o usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema para a tela de login, valida se os dados são autenticos e validos no sistema, logout, save, get, update....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
use \Mypets\Model\User;

// Rota da administração que apresenta o template (pagina) para listagem dos usuarios do sistema.
$app->get('/admin/users', function(){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Metodo estatico listAll criado na classe User.
	// Lista todos os usuarios contidos no Banco de Dados.
	// $users é um array vindo do Banco de Dados com todas as informações de todos os usuarios cadastrados no sistema.
	// Setamos $users no template users.html, para a listagem dos usuarios na parte administrativa do sistema.
	$users = User::listAll();

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template users.html contido em views/admin.
	// Passamos para o template users.html, um array com todos os dados dos usuarios, para serem listados na parte administrativa do sistema.
	// Para mais detalhes verificar o template em views/admin/users.html.
	// "users"=>$users aqui o processo de chave=valor, setamos o valor no template.
	$page->setTpl("users", array(
		"users"=>$users
	));

});

$app->get('/admin/users/relatory', function(){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Metodo estatico createRelatory criado na classe User.
	// Lista todos os usuarios contidos no Banco de Dados.
	// $relatory é um array vindo do Banco de Dados com todas as informações de todos os usuarios cadastrados no sistema.
	// Setamos $relatory no template relatory.html, para a listagem dos usuarios na parte administrativa do sistema.
	User::createRelatory();

	header("Location: /admin/users");

	exit;

});

$app->get('/admin/user/relatory', function(){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Metodo estatico createRelatory criado na classe User.
	// Lista todos os usuarios contidos no Banco de Dados.
	// $relatory é um array vindo do Banco de Dados com todas as informações de todos os usuarios cadastrados no sistema.
	// Setamos $relatory no template relatory.html, para a listagem dos usuarios na parte administrativa do sistema.
	$relatory = User::getRelatory();

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template users-relatory.html contido em views/admin.
	// Passamos para o template users-relatory.html, um array com todos os dados dos usuarios, para serem listados na parte administrativa do sistema.
	// Para mais detalhes verificar o template em views/admin/users-relatory.html.
	// "relatory"=>$relatory aqui o processo de chave=valor, setamos o valor no template.
	$page->setTpl("users-relatory", array(
		"relatory"=>$relatory
	));

});

// Rota da administração que apresenta o template (pagina) para criação dos usuarios do sistema.
$app->get('/admin/users/create', function(){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template users-create.html contido em views/admin.
	// Para mais detalhes verificar o template em views/admin/users-create.html.
	$page->setTpl("users-create");

});

// Rota da administração que carrega o usuario selecionado para ser removido do sistema.
$app->get('/admin/users/:iduser/delete', function($iduser){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Iniciamos o objeto $user com a classe User.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user = new User();

	// Carregamos o objeto com o metodo get, que traz o id do usuario selecionado para ser deletado do sistema.
	// Fazemos um cast para int (inteiro), para termos certeza de que o que foi enviado realmente é um numero (id), e se aquele usuario realmente existe no sistema.
	$user->get((int)$iduser);

	// Chamamos o metodo delete() contido na classe User.php, metodo utilizado para remover usuarios do sistema.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user->delete();

	// Redirecionamos o usuario para o template users.html.
	header("Location: /admin/users");

	// Interrompemos a execução, uma vez que o usuario acabou de realizar uma ação no sistema.
	exit;

});

// Rota da administração que carrega o usuario selecionado para ser atualizado no sistema.
$app->get('/admin/users/:iduser', function($iduser){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Iniciamos o objeto $user com a classe User.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user = new User();

	// Carregamos o objeto com o metodo get, que traz o id do usuario selecionado para ser atualizado no sistema.
	// Fazemos um cast para int (inteiro), para termos certeza de que o que foi enviado realmente é um numero (id), e se aquele usuario realmente existe no sistema.
	$user->get((int)$iduser);

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template users-update.html contido em views/admin.
	// Passamos para o template users-update.html, um array com os dados carregados do usuario, para serem listados no template (pagina) users-update.html, para que possa ser alterado.
	// Para mais detalhes verificar o template em views/admin/users-update.html.
	// "user"=>$user->getValues aqui o processo de chave=valor recebe os valores do metodo getValues() contido na classe Model.php, setamos o valor no template.
	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));

});

// Rota da administração que faz a criação dos usuarios do sistema.
$app->post('/admin/users/create', function(){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Iniciamos o objeto $user com a classe User.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user = new User();

	// Verificamos se o campo input checkbox foi marcado
	// Caso venha marcado o usuario tambel é administrador do sistema.
	// Caso não venha marcado o usuario não é administrador do sistema.
	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;
	
	// Setamos tudo que o usuario preencheu na criação de um novo usuario.
	// Chamamos o metodo setData() contido na classe Model.php, metodo utilizado para a criação dinamica dos getters and setters no sistema.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model.php.
	$user->setData($_POST);

	// Chamamos o metodo save() contido na classe User.php, metodo utilizado para criação de usuarios no sistema.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user->save();

	// Redirecionamos o usuario para o template users.html.
	header("Location: /admin/users");

	// Interrompemos a execução, uma vez que o usuario acabou de realizar uma ação no sistema.
	exit;

});

// Rota da administração que atualiza e salva o usuario selecionado para ser atualizado no sistema.
$app->post('/admin/users/:iduser', function($iduser){

	// Metodo estatico veryfyLogin criado na classe User.
	// Metodo verifica se a seção foi iniciada, se ela existe, se id do usuario daquela seção é maior que 0 e se o mesmo faz parte da administração do sistema.
	User::verifyLogin();

	// Iniciamos o objeto $user com a classe User.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user = new User();

	// Carregamos o objeto com o metodo get, que traz o id do usuario selecionado para ser atualizado no sistema.
	// Fazemos um cast para int (inteiro), para termos certeza de que o que foi enviado realmente é um numero (id), e se aquele usuario realmente existe no sistema.
	$user->get((int)$iduser);

	// Verificamos se o campo input checkbox foi marcado
	// Caso venha marcado o usuario tambem é administrador do sistema.
	// Caso não venha marcado o usuario não é administrador do sistema.
	$_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

	// Setamos tudo que o usuario preencheu na atualização de um usuario.
	// Chamamos o metodo setData() contido na classe Model.php, metodo utilizado para a criação dinamica dos getters and setters no sistema.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model.php.
	$user->setData($_POST);

	// Chamamos o metodo update() contido na classe User.php, metodo utilizado para a atualização de um usuario no sistema.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user->update();

	// Redirecionamos o usuario para o template users.html.
	header("Location: /admin/users");

	// Interrompemos a execução, uma vez que o usuario acabou de realizar uma ação no sistema.
	exit;

});

?>