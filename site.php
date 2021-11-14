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

		if(!isset($_POST["login"]) || $_POST["login"] == "")
		{
			User::setError("Insira o seu e-mail!");

			header("Location: /login");

			exit;

		}

		if(!isset($_POST["password"]) || $_POST["password"] == "")
		{
			User::setError("Insira a sua senha!");

			header("Location: /login");

			exit;

		}

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

// Rota do Site que apresenta a tela de recuperação de senha (esqueceu a senha).
$app->get('/forgot', function(){

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Desativamos a chamada padrão do header e footer, pois nossa pagina de "esqueceu a senha" já contém o header e footer padrão na propria pagina forgot.html.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new Page();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template forgot.html contido em views.
	// Para mais detalhes verificar o template em views/forgot.html.
	$page->setTpl("forgot");

});

// Rota do Site que envia o email informado pelo usuario.
$app->post('/forgot', function(){

	// Metodo estatico getForgot() criado na classe User.
	// Verifica se o email informado pelo usuario existe no Banco de Dados.
	// Caso o email exista na Base de Dados, então é enviado um link de recuperação para aquele email.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user = User::getForgot($_POST["mail"], false);

	// Redirecionamos o usuario para o template sent.html.
	header("Location: /forgot/sent");

	// Interrompemos a execução, uma vez que o usuario acabou de realizar uma ação no sistema.
	exit;
	
});

// Rota do Site que apresenta a tela de email enviado (esqueceu a senha).
$app->get('/forgot/sent', function(){

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Desativamos a chamada padrão do header e footer, pois nossa pagina "sent" já contém o header e footer padrão na propria pagina sent.html.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new Page();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template forgot-sent.html contido em views.
	// Para mais detalhes verificar o template em views/forgot-sent.html.
	$page->setTpl("forgot-sent");
	
});

// Rota do Site que apresenta a tela de inserir uma nova senha.
$app->get('/forgot/reset', function(){

	// Metodo estatico validForgotDecrypt() criado na classe User.
	// Verifica se o email informado pelo usuario foi recuperado no tempo estimado.
	// Desemcripta o valor enviado no link, no nosso caso o id do usuario, e preenche a tabela tb_userspasswordsrecoveries para que o link não seja mais utilizado.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/Model/User.php.
	$user = User::validForgotDecrypt($_GET["code"]);

	// Iniciamos o objeto $page com a classe PageAdmin.
	// Desativamos a chamada padrão do header e footer, pois nossa pagina "reset" já contém o header e footer padrão na propria pagina reset.html.
	// Para mais detalhes verificar a classe em vendor/mypets/php-classes/src/PageAdmin.php.
	$page = new Page();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template forgot-reset.html contido em views.
	// Passamos para o template forgot-reset.html, um array com os dados carregados do usuario, para serem apresentados no template (pagina) forgot-reset.html.
	// Para mais detalhes verificar o template em views/forgot-reset.html.
	// "name"=>$user["person"] aqui a atribuição de chave=valor recebe os valores recuperados do Banco de Dados, setamos o valor no template.
	// "code"=>$_GET["code"] recebe os valores da url que foi enviada no email.
	$page->setTpl("forgot-reset", array(
		"name"=>$user["person"],
		"code"=>$_GET["code"]
	));

});

// Rota do site que recupera e salva a nova senha digitada pelo usuario.
$app->post('/forgot/reset', function(){

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
	$page = new Page();

	// Chamamos o metodo setTpl() contido em Page.php, e chamamos o template forgot-reset-success.html contido em views.
	// Para mais detalhes verificar o template em views/forgot-reset-success.html.
	$page->setTpl("forgot-reset-success");

	// Interrompemos a execução, uma vez que o usuario acabou de realizar uma ação no sistema.
	exit;
	
});

?>