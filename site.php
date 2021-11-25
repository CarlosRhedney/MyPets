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

use \Mypets\Model\Address;

use \Mypets\Model\Data;

use \Mypets\PageAdmin;

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

$app->get('/pets', function(){

	$page = (isset($_GET["page"])) ? (int)$_GET["page"] : 1;

	$pagination = Pet::getPetsPage($page);

	$pages = array();

	for ($i=1; $i <= $pagination["pages"] ; $i++) { 
		array_push($pages, array(
			"link"=>"/pets?" . http_build_query([
				"page"=>$i
			]),
			"page"=>$i
		));
	}

	$page = new Page();

	$page->setTpl("pets", array(
		"pets"=>$pagination["data"],
		"pages"=>$pages
	));

});

$app->get('/ongs', function(){

	$page = (isset($_GET["page"])) ? (int)$_GET["page"] : 1;

	$pagination = Ong::getOngsPage($page);

	$pageOng = array();

	for ($i=1; $i <= $pagination["pages"] ; $i++) { 
		array_push($pageOng, array(
			"link"=>"/ongs?" . http_build_query([
				"page"=>$i
			]),
			"page"=>$i
		));
	}

	$page = new Page();

	$page->setTpl("ongs", array(
		"ongs"=>$pagination["data"],
		"pages"=>$pageOng
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
		"loginSuccess"=>User::getSuccess(),
		"errorRegister"=>User::getErrorRegister(),
		"registerValues"=>(isset($_SESSION["registerValues"])) ? $_SESSION["registerValues"] : ["name"=>"", "mail"=>"", "nrphone"=>""]
	));

});

$app->post('/login', function(){

	try{

		User::login($_POST["login"], $_POST["password"]);

		User::setSuccess("Usuário logado com sucesso!");
		

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

	header("Location: /login");

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

$app->get('/profile', function(){

	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl("profile", array(
		"user"=>$user->getValues(),
		"profileMsg"=>User::getSuccess(),
		"profileError"=>User::getError(),
		"addressSuccess"=>Address::getSuccess()
	));
});

$app->post('/profile', function(){

	User::verifyLogin(false);

	if(!isset($_POST["person"]) || $_POST["person"] === "")
	{
		User::setError("Preencha o seu nome");

		header("Location: /profile");

		exit;

	}

	if(!isset($_POST["mail"]) || $_POST["mail"] === "")
	{
		User::setError("Preencha o seu email");

		header("Location: /profile");

		exit;
		
	}

	if(!isset($_POST["nrphone"]) || $_POST["nrphone"] === "")
	{
		User::setError("Preencha o seu telefone");

		header("Location: /profile");

		exit;
		
	}

	$user = User::getFromSession();

	if($_POST["mail"] !== $user->getmail())
	{
		if(User::checkLoginExist($_POST["mail"]) === true)
		{
			User::setError("E-mail já cadastrado!");

			header("Location: /profile");

			exit;
		}
	}

	$_POST["inadmin"] = $user->getinadmin();

	$_POST["password"] = $user->getdespassword();

	$_POST["login"] = $_POST["mail"];

	$user->setData($_POST);

	$user->update();

	User::setSuccess("Dados alterados com sucesso!");

	header("Location: /profile");

	exit;

});

$app->get('/profile/change-password', function(){

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("profile-change-password", array(
		"changePassError"=>User::getError(),
		"changePassSuccess"=>User::getSuccess()
	));

});

$app->post('/profile/change-password', function(){

	User::verifyLogin(false);

	if(!isset($_POST["current_pass"]) || $_POST["current_pass"] === "")
	{
		User::setError("Digite a senha atual!");

		header("Location: /profile/change-password");

		exit;
	}

	if(!isset($_POST["new_pass"]) || $_POST["new_pass"] === "")
	{
		User::setError("Digite a nova senha!");

		header("Location: /profile/change-password");

		exit;
	}

	if(!isset($_POST["new_pass_confirm"]) || $_POST["new_pass_confirm"] === "")
	{
		User::setError("Confirme a nova senha!");

		header("Location: /profile/change-password");

		exit;
	}

	if($_POST["current_pass"] === $_POST["new_pass"])
	{
		User::setError("A nova senha deve ser diferente da senha atual!");

		header("Location: /profile/change-password");

		exit;
	}

	$user = User::getFromSession();

	if(!password_verify($_POST["current_pass"], $user->getdespassword()))
	{
		User::setError("Senha inválida!");

		header("Location: /profile/change-password");

		exit;
	}

	$user->setdespassword($_POST["new_pass"]);

	$user->update();

	User::setSuccess("Senha alterada com sucesso!");

	header("Location: /profile/change-password");

	exit;

});

$app->get('/contract/:idpet', function($idpet){

	User::verifyLogin(false);

	$pet = new Pet();

	$pet->get((int)$idpet);

	$page = new Page();

	$page->setTpl("contract", array(
		"pet"=>$pet->getValues()
	));

});

$app->get('/terms/:idpet', function($idpet){

	User::verifyLogin(false);

	$pet = new Pet();

	$userPerson = User::getAddress();

	$user = User::getFromSession();

	$pet->get((int)$idpet);

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("terms", array(
		"pet"=>$pet->getValues(),
		"person"=>$pet->getPerson(),
		"ongperson"=>$pet->getPersonOng(),
		"user"=>$user->getValues(),
		"userPerson"=>$userPerson
	));

});

$app->get('/profile-address', function(){

	User::verifyLogin(false);

	$adress = new Address();

	if(isset($_GET["zipcode"]))
	{
		$adress->loadFromCep($_GET["zipcode"]);
	}

	$page = new Page();

	$page->setTpl("profile-address", array(
		"address"=>($adress->getValues()) ? $adress->getValues() : ["address"=>"", "complement"=>"", "district"=>"", "city"=>"", "state"=>"", "country"=>"", "zipcode"=>""],
		"error"=>Address::getMsgError()
	));

});

$app->post("/profile-address", function(){

	User::verifyLogin(false);

	$address = new Address();

	$address->setData($_POST);

	if (!isset($_POST['zipcode']) || $_POST['zipcode'] === '') {

		Address::setMsgError("Informe o CEP.");

		header('Location: /profile-address');

		exit;
	}

	if (!isset($_POST['address']) || $_POST['address'] === '') {

		Address::setMsgError("Informe o endereço.");

		header('Location: /profile-address');

		exit;
	}

	if (!isset($_POST['number']) || $_POST['number'] === '') {

		Address::setMsgError("Informe o número.");

		header('Location: /profile-address');

		exit;
	}

	if (!isset($_POST['district']) || $_POST['district'] === '') {

		Address::setMsgError("Informe o bairro.");

		header('Location: /profile-address');

		exit;
	}

	if (!isset($_POST['city']) || $_POST['city'] === '') {

		Address::setMsgError("Informe a cidade.");

		header('Location: /profile-address');

		exit;
	}

	if (!isset($_POST['state']) || $_POST['state'] === '') {

		Address::setMsgError("Informe o estado.");

		header('Location: /profile-address');

		exit;
	}

	if (!isset($_POST['country']) || $_POST['country'] === '') {

		Address::setMsgError("Informe o país.");

		header('Location: /profile-address');

		exit;
	}

	$address->save();

	Address::setSuccess("Endereço cadastrado com sucesso!");

	header("Location: /profile");

	exit;

});

$app->get('/profile-data', function(){

	User::verifyLogin(false);

	$page = new Page();

	$page->setTpl("profile-data", array(
		"dataError"=>Data::getDataError(),
		"dataSuccess"=>Data::getSuccess()
	));

});

$app->post('/profile-data', function(){

	User::verifyLogin(false);

	$data = new Data();

	$data->setData($_POST);

	if (!isset($_POST['rg']) || $_POST['rg'] === '') {

		Data::setDataError("Informe o seu RG.");

		header('Location: /profile-data');

		exit;
	}

	if (!isset($_POST['cpf']) || $_POST['cpf'] === '') {

		Data::setDataError("Informe o seu CPF.");

		header('Location: /profile-data');

		exit;
	}

	$data->save();

	Data::setSuccess("Dados salvos com sucesso!");

	header("Location: /profile-data");

	exit;

});

$app->get('/profile-delete', function(){

	User::verifyLogin(false);

	$user = User::getFromSession();

	$page = new Page();

	$page->setTpl("profile-delete", array(
		"user"=>$user->getValues()
	));

});

$app->post('/profile-delete/:idperson', function($idperson){

	User::verifyLogin(false);

	$user = new User();

	$user->get((int)$idperson);

	$user->delete();

	header("Location: /user/feedback");

	exit;

});

$app->get('/user/feedback', function(){

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("feedback");

});

$app->post('/user/feedback', function(){

	

});

?>