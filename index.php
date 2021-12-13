<?php
//Iniciando a sessão.
session_start();

// vendor/autoload.php contem os arquivos necessarios para que nosso sistema possa
// encontrar os demais arquivos necessários para o sistema.
require_once("vendor/autoload.php");

// Utilização das classes necessarias para a configuração do sistema.
// Todas contidas no diretorio vendor, onde utilizamos alguns outros frameworks e onde contem o nosso proprio vendor mypets, que por sua vez contem nossas classes de configuração do sistema, model que contem o DAO dos usuarios e as categorias, por o fim nossa conexão com o Banco de Dados.
// Por isso a importancia da configuração do vendor/autoload.php , é ele quem "encontra" essas classes.
// Slim framework para rotas.
use \Slim\Slim;

// Iniciamos uma nova aplicação do Slim framework.
$app = new Slim();

// Depuração do sistema
$app->config('debug', true);

require_once("functions.php");
require_once("site.php");
require_once("admin.php");
require_once("admin-users.php");
require_once("admin-login.php");
require_once("admin-categories.php");
require_once("admin-ongs.php");
require_once("admin-pets.php");
require_once("ong.php");

$app->run();

?>