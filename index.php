<?php
//Iniciando a sessão.
session_start();

// vendor/autoload.php contem os arquivos necessarios para que nosso sistema possa
// encontre os demais arquivos necessarios para o sistema.
require_once("vendor/autoload.php");

// Utilização das classes necessarias para a configuração do sistema.
// Todas contidas no diretorio vendor, onde utilizamos alguns outros frameworks e onde contem o nosso proprio vendor mypets, que por sua vez contem nossas classes de configuração do sistema, model que contem o DAO dos usuarios e as categorias, por o fim nossa conexão com o Banco de Dados.
// Por isso a importancia da configuração do vendor/autoload.php , é ele quem "encontra" essas classes.
// Slim framework para rotas.
use \Slim\Slim;

//  \Page Classe principal do sistema (HomePage), é o primeiro contato entre usuario e sistema.
use \Mypets\Page;

//  \PageAdmin Classe da administração do sistema, onde gerenciamos todo o sistema e quem esta cadastrado nele, PageAdmin é herança da classe Page, pois herda todos os seus atributos e metodos.
use \Mypets\PageAdmin;

//  \User Classe da administração do sistema, onde redirecionamos o usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema para a tela de login, valida se os dados são autenticos e validos no sistema, logout, save, get, update....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
use \Mypets\Model\User;

// \Category Classe da administração do sitema, onde relaconamos as categorias do sistema.
// O usuario previamente cadastrado como administrador, que gerencia "certa" parte do sistema tem acesso, contem os metodos listAll, save, get, delete....
// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/Category.php.
use \Mypets\Model\Category;

// Iniciamos uma nova aplicação do Slim framework.
$app = new Slim();

// Depuração do sistema
$app->config('debug', true);

// Nossa rota inicial '/', todos os usuarios assim que acessam o sistema são direcionados para a homepage do sistema.
$app->get('/', function(){

	// Iniciamos o objeto $page, que recebe a classe Page.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Page.php.
	$page = new Page();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template index.html.
	// Para mais detalhes verificar o template em views/index.html.
	$page->setTpl("index");

});

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

	// Pegamos a senha digitada pelo usuario e transformamos num hash.
	// O mesmo hash é enviado para o Banco de Dados.
	$_POST['despassword'] = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [

 		"cost"=>12

 	]);
	
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

$app->get('/admin/categories', function(){

	User::verifyLogin();

	$categories = Category::listAll();

	$page = new PageAdmin();

	$page->setTpl("categories", array(
		"categories"=>$categories
	));

});

$app->get('/admin/categories/create', function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("categories-create");

});

$app->post('/admin/categories/create', function(){

	User::verifyLogin();

	$categories = new Category();

	$categories->setData($_POST);

	$categories->save();

	header("Location: /admin/categories");

	exit;
	
});

$app->get('/admin/categories/:idcategory/delete', function($idcategory){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header("Location: /admin/categories");

	exit;

});

$app->get('/admin/categories/:idcategory', function($idcategory){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new PageAdmin();

	$page->setTpl("categories-update", array(
		"category"=>$category->getValues()
	));

});

$app->post('/admin/categories/:idcategory', function($idcategory){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");

	exit;

});

$app->get('/categories/:idcategory', function($idcategory){

	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Page();

	$page->setTpl("category", array(
		"category"=>$category->getValues(),
		"products"=>array()
	));

});

$app->run();
?>