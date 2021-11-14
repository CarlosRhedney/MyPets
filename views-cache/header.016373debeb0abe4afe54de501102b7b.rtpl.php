<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/icon" href="/res/site/img/logo.png">
<title>MyPets</title>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="/res/site/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="/res/site/css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="/res/site/css/owl.carousel.css">
<link rel="stylesheet" href="/res/site/css/style.css">
<link rel="stylesheet" href="/res/site/css/responsive.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span><i class="fa fa-user"></i> Minha Conta</span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php if( checkLogin(false) ){ ?>
                                <li><a href="/profile"><i class="fa fa-user"></i> <?php echo getUserName(); ?></a></li>
                                <li><a href="/ong"><i class="fa fa-users"></i> Ong</a></li>
                                <li><a href="/logout"><i class="fa fa-close"></i> Sair</a></li>
                                <?php }else{ ?>
                                <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="/"><img src="/res/site/img/logo.png"></a></h1>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="">
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="#">Ongs</a></li>
                    <li><a href="#">Animais</a></li>
                </ul>
            </div>  
        </div>
    </div>
</div> <!-- End mainmenu area -->