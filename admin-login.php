<?php

//  \PageAdmin Classe da administração do sistema, onde gerenciamos todo o sistema e quem esta cadastrado nele, PageAdmin é herança da classe Page, pois herda todos os seus atributos e metodos.
use \Mypets\PageAdmin;

//  \User Classe da administração do sistema, onde redirecionamos o usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema para a tela de login, valida se os dados são autenticos e validos no sistema, logout, save, get, update....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
use \Mypets\Model\User;

// Rota do sistema administrativo, apresenta o template (pagina) para o usuario inserir login e senha.
$app->get('/admin/login', function(){

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Desativamos a chamada padrão do header e footer, pois nossa pagina de login já contém o header e footer padrão na propria pagina login.html.
	// Para mais detalhes verificar o template em views/admin/login.html.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template login.html contido em views/admin.
	// Para mais detalhes verificar o template em views/admin/login.html.
	$page->setTpl("login");

});

// Rota da administração para verificação do login e senha.
$app->post('/admin/login', function(){

	// Metodo estatico login criado na classe User.
	// Metodo verifica se o login e senha digitados realmente existem no sistema, caso não exista erros durante a verificação o usuario é redirecionado para a parte administrativa do sistema.
	User::login($_POST["login"], $_POST["password"]);

	// Redirecionamento o usuario para parte da administração.
	header("Location: /admin");

	// Interrompemos a execução, uma vez que o usuario já está logado.
	exit;

});

// Rota da administração para o logout do sistema.
$app->get('/admin/logout', function(){

	// Metodo estatico logout criado na classe User.
	// Metodo faz o logout do sistema.
	User::logout();

	// Redirecionamento o usuario para o template de login.
	header("Location: /admin/login");

	// Interrompemos a execução, uma vez que o usuario já fez o logout.
	exit;
	
});

// Rota da administração que apresenta a tela de recuperação de senha (esqueceu a senha).
$app->get('/admin/forgot', function(){

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Desativamos a chamada padrão do header e footer, pois nossa pagina de "esqueceu a senha" já contém o header e footer padrão na propria pagina forgot.html.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template forgot.html contido em views/admin.
	// Para mais detalhes verificar o template em views/admin/forgot.html.
	$page->setTpl("forgot");

});

// Rota da administração que envia o email informado pelo usuario.
$app->post('/admin/forgot', function(){

	// Metodo estatico getForgot() criado na classe User.
	// Verifica se o email informado pelo usuario existe no Banco de Dados.
	// Caso o email exista na Base de Dados, então é enviado um link de recuperação para aquele email.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user = User::getForgot($_POST["mail"]);

	// Redirecionamos o usuario para o template sent.html.
	header("Location: /admin/forgot/sent");

	// Interrompemos a execução, uma vez que o usuario acabou de realizar uma ação no sistema.
	exit;
	
});

// Rota da administração que apresenta a tela de email enviado (esqueceu a senha).
$app->get('/admin/forgot/sent', function(){

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Desativamos a chamada padrão do header e footer, pois nossa pagina "sent" já contém o header e footer padrão na propria pagina sent.html.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template forgot-sent.html contido em views/admin.
	// Para mais detalhes verificar o template em views/admin/forgot-sent.html.
	$page->setTpl("forgot-sent");
	
});

// Rota da administração que apresenta a tela de inserir uma nova senha.
$app->get('/admin/forgot/reset', function(){

	// Metodo estatico validForgotDecrypt() criado na classe User.
	// Verifica se o email informado pelo usuario foi recuperado no tempo estimado.
	// Desemcripta o valor enviado no link, no nosso caso o id do usuario, e preenche a tabela tb_userspasswordsrecoveries para que o link não seja mais utilizado.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user = User::validForgotDecrypt($_GET["code"]);

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Desativamos a chamada padrão do header e footer, pois nossa pagina "reset" já contém o header e footer padrão na propria pagina reset.html.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template forgot-reset.html contido em views/admin.
	// Passamos para o template forgot-reset.html, um array com os dados carregados do usuario, para serem apresentados no template (pagina) forgot-reset.html.
	// Para mais detalhes verificar o template em views/admin/forgot-reset.html.
	// "name"=>$user["person"] aqui a atribuição de chave=valor recebe os valores recuperados do Banco de Dados, setamos o valor no template.
	// "code"=>$_GET["code"] recebe os valores da url que foi enviada no email.
	$page->setTpl("forgot-reset", array(
		"name"=>$user["person"],
		"code"=>$_GET["code"]
	));

});

// Rota da administração que recupera e salva a nova senha digitada pelo usuario.
$app->post('/admin/forgot/reset', function(){

	// Metodo estatico validForgotDecrypt() criado na classe User.
	// Verifica se o email informado pelo usuario foi recuperado no tempo estimado.
	// Desemcripta o valor enviado no link, no nosso caso o id do usuario, e preenche a tabela tb_userspasswordsrecoveries para que o link não seja mais utilizado.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$forgot = User::validForgotDecrypt($_POST["code"]);

	// Metodo estatico setForgotUsed() criado na classe User.
	// Valida que a senha tenha sido recuperada e preenche a tabela tb_userspasswordsrecoveries para que o link não seja mais utilizado.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	User::setForgotUsed($forgot["idrecovery"]);

	// Iniciamos o objeto $user com a classe User.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user = new User();

	// Carregamos o objeto com o metodo get, que traz o id do usuario selecionado para ser carregado no sistema.
	// Fazemos um cast para int (inteiro), para termos certeza de que o que foi enviado realmente é um numero (id), e se aquele usuario realmente existe no sistema.
	$user->get((int)$forgot["iduser"]);

	// Pegamos a nova senha digitada pelo usuario e transformamos num hash.
	// O mesmo hash é enviado para o Banco de Dados.
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);

	// Chamamos o metodo setPassword() contido na classe User.php, metodo utilizado para a recuperação de senha dos usuarios no sistema.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user->setPassword($password);

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Desativamos a chamada padrão do header e footer, pois nossa pagina "sent" já contém o header e footer padrão na propria pagina sent.html.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template forgot-reset-success.html contido em views/admin.
	// Para mais detalhes verificar o template em views/admin/forgot-reset-success.html.
	$page->setTpl("forgot-reset-success");

	// Interrompemos a execução, uma vez que o usuario acabou de realizar uma ação no sistema.
	exit;
	
});
?>