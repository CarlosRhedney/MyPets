<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>MyPets</title>
  <style type="text/css">

  * {
    margin:0;
    padding:0;
    font-family: Helvetica, Arial, sans-serif;
  }

  img {
    max-width: 100%;
    outline: none;
    text-decoration: none;
    -ms-interpolation-mode: bicubic;
  }

  .image-fix {
    display:block;
  }

  .collapse {
    margin:0;
    padding:0;
  }

  body {
    -webkit-font-smoothing:antialiased;
    -webkit-text-size-adjust:none;
    width: 100%!important;
    height: 100%;
    text-align: center;
    color: #747474;
    background-color: #ffffff;
  }

  h1,h2,h3,h4,h5,h6 {
    font-family: Helvetica, Arial, sans-serif;
    line-height: 1.1;
  }

  h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
    font-size: 60%;
    line-height: 0;
    text-transform: none;
  }

  h1 {
    font-weight:200;
    font-size: 44px;
  }

  h2 {
    font-weight:200;
    font-size: 32px;
    margin-bottom: 14px;
  }

  h3 {
    font-weight:500;
    font-size: 27px;
  }

  h4 {
    font-weight:500;
    font-size: 23px;
  }

  h5 {
    font-weight:900;
    font-size: 17px;
  }

  h6 {
    font-weight:900;
    font-size: 14px;
    text-transform: uppercase;
  }

  .collapse {
    margin:0!important;
  }

  td, div {
    font-family: Helvetica, Arial, sans-serif;
    text-align: center;
  }

  p, ul {
    margin-bottom: 10px;
    font-weight: normal;
    font-size:14px;
    line-height:1.6;
  }

  p.lead {
    font-size:17px;
  }

  p.last {
    margin-bottom:0px;
  }

  ul li {
    margin-left:5px;
    list-style-position: inside;
  }

  a {
    color: #747474;
    text-decoration: none;
  }

  a img {
    border: none;
  }

  .head-wrap {
    width: 100%;
    margin: 0 auto;
    background-color: #f9f8f8;
    border-bottom: 1px solid #d8d8d8;
  }

  .head-wrap * {
    margin: 0;
    padding: 0;
  }

  .header-background {
    background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
  }

  .header {
    height: 42px;
  }

  .header .content {
    padding: 0;
  }

  .header .brand {
    font-size: 16px;
    line-height: 42px;
    font-weight: bold;
  }

  .header .brand a {
    color: #464646;
  }

  .body-wrap {
    width: 505px;
    margin: 0 auto;
    background-color: #ffffff;
  }

  .soapbox .soapbox-title {
    font-size: 21px;
    color: #464646;
    padding-top: 35px;
  }

  .content .status-container.single .status-padding {
    width: 80px;
  }

  .content .status {
    width: 90%;
  }

  .content .status-container.single .status {
    width: 300px;
  }

  .status {
    border-collapse: collapse;
    margin-left: 15px;
    color: #656565;
  }

  .status .status-cell {
    border: 1px solid #b3b3b3;
    height: 50px;
  }

  .status .status-cell.success,
  .status .status-cell.active {
    height: 65px;
  }

  .status .status-cell.success {
    background: #f2ffeb;
    color: #51da42;
  }

  .status .status-cell.success .status-title {
    font-size: 15px;
  }

  .status .status-cell.active {
    background: #fffde0;
    width: 135px;
  }

  .status .status-title {
    font-size: 16px;
    font-weight: bold;
    line-height: 23px;
  }

  .status .status-image {
    vertical-align: text-bottom;
  }

  .body .body-padded,
  .body .body-padding {
    padding-top: 34px;
  }

  .body .body-padding {
    width: 41px;
  }

  .body-padded,
  .body-title {
    text-align: left;
  }

  .body .body-title {
    font-weight: bold;
    font-size: 17px;
    color: #464646;
  }

  .body .body-text .body-text-cell {
    text-align: left;
    font-size: 14px;
    line-height: 1.6;
    padding: 9px 0 17px;
  }

  .body .body-text-cell a {
    color: #464646;
    text-decoration: underline;
  }

  .body .body-signature-block .body-signature-cell {
    padding: 25px 0 30px;
    text-align: left;
  }

  .body .body-signature {
    font-family: "Comic Sans MS", Textile, cursive;
    font-weight: bold;
  }

  .footer-wrap {
    width: 100%;
    margin: 0 auto;
    clear: both !important;
    background-color: #e5e5e5;
    border-top: 1px solid #b3b3b3;
    font-size: 12px;
    color: #656565;
    line-height: 30px;
  }

  .footer-wrap .container {
    padding: 14px 0;
  }

  .footer-wrap .container .content {
    padding: 0;
  }

  .footer-wrap .container .footer-lead {
    font-size: 14px;
  }

  .footer-wrap .container .footer-lead a {
    font-size: 14px;
    font-weight: bold;
    color: #535353;
  }

  .footer-wrap .container a {
    font-size: 12px;
    color: #656565;
  }

  .footer-wrap .container a.last {
    margin-right: 0;
  }

  .footer-wrap .footer-group {
    display: inline-block;
  }

  .container {
    display: block !important;
    max-width: 505px !important;
    clear: both !important;
  }

  .content {
    padding: 0;
    max-width: 505px;
    margin: 0 auto;
    display: block;
  }

  .content table {
    width: 100%;
  }


  .clear {
    display: block;
    clear: both;
  }

  table.full-width-gmail-android {
    width: 100% !important;
  }

  </style>

  <style type="text/css" media="only screen">

  @media only screen {

    table[class*="head-wrap"],
    table[class*="body-wrap"],
    table[class*="footer-wrap"] {
      width: 100% !important;
    }

    td[class*="container"] {
      margin: 0 auto !important;
    }

  }

  @media only screen and (max-width: 505px) {

    *[class*="w320"] {
      width: 320px !important;
    }

    table[class="soapbox"] td[class*="soapbox-title"],
    table[class="body"] td[class*="body-padded"] {
      padding-top: 24px;
    }
  }
  </style>
</head>

<body bgcolor="#ffffff">

  <div align="center">
    <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
          <!--[if gte mso 9]>
          <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
            <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
            <v:textbox inset="0,0,0,0">
          <![endif]-->
          <div height="8">
          </div>
          <!--[if gte mso 9]>
            </v:textbox>
          </v:rect>
          <![endif]-->
        </td>
      </tr>
      <tr class="header-background">
        <td class="header container" align="center">
          <div class="content">
            <span class="brand">
              <a href="#">
                MyPets
              </a>
            </span>
          </div>
        </td>
      </tr>
    </table>

    <table class="body-wrap w320">
      <tr>
        <td></td>
        <td class="container">
          <div class="content">
            <table cellspacing="0">
              <tr>
                <td>
                  <table class="soapbox">
                    <tr>
                      <td class="soapbox-title">Termos de Responsabilidade</td>
                    </tr>
                  </table>
                  <table class="body">
                    <tr>
                      <td class="body-padding"></td>
                      <td class="body-padded">
                        <div class="body-title">Olá <?php echo getUserName(); ?>,</div>
                        <table class="body-text">
                          <tr>
                            <td class="body-text-cell">
                            <strong>ANIMAL</strong><br>

                            Espécie: <?php echo htmlspecialchars( $pet["rc"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Raça: <?php echo htmlspecialchars( $pet["rc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, Cor da pelagem: <?php echo htmlspecialchars( $pet["rc"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Altura: <?php echo htmlspecialchars( $pet["vlheight"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Comprimento: <?php echo htmlspecialchars( $pet["vllength"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Peso: <?php echo htmlspecialchars( $pet["vlweight"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Nome como o adotante chamará o animal: <?php echo htmlspecialchars( $pet["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <br><br>
                            <strong>ADOTANTE</strong><br>

                            Nome:  <?php echo getUserName(); ?><br>

                            <?php $counter1=-1;  if( isset($userPerson) && ( is_array($userPerson) || $userPerson instanceof Traversable ) && sizeof($userPerson) ) foreach( $userPerson as $key1 => $value1 ){ $counter1++; ?>

                            RG:  <?php echo htmlspecialchars( $value1["rg"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            CPF: <?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Endereço residencial: <?php echo htmlspecialchars( $value1["address"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, nº:<?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Cidade: <?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - UF: <?php echo htmlspecialchars( $value1["state"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Bairro: <?php echo htmlspecialchars( $value1["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            País: <?php echo htmlspecialchars( $value1["country"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            <?php } ?>

                            Fone: <?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Whatsapp: <?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            E-mail: <?php echo htmlspecialchars( $user["mail"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Nome no facebook: <?php echo htmlspecialchars( $user["person"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <br><br>

                            <strong>DOADOR(A)</strong>:O animal estava sob responsabilidade de: <br>

                            <?php $counter1=-1;  if( isset($ongperson) && ( is_array($ongperson) || $ongperson instanceof Traversable ) && sizeof($ongperson) ) foreach( $ongperson as $key1 => $value1 ){ $counter1++; ?>

                            Nome:  <?php echo htmlspecialchars( $value1["ong"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<br>

                            CNPJ: <?php echo htmlspecialchars( $value1["cnpj"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Endereço: <?php echo htmlspecialchars( $value1["logradouro"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,

                            Cidade/UF: <?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<br>

                             Nome no facebook: <?php echo htmlspecialchars( $value1["ong"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            <?php } ?>

                            <?php $counter1=-1;  if( isset($person) && ( is_array($person) || $person instanceof Traversable ) && sizeof($person) ) foreach( $person as $key1 => $value1 ){ $counter1++; ?>

                            Tutor: <?php echo htmlspecialchars( $value1["person"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Fone: <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Whatsapp: <?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<br>

                            E-mail: <?php echo htmlspecialchars( $value1["mail"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>

                            Desde <?php echo htmlspecialchars( $value1["dtregister"], ENT_COMPAT, 'UTF-8', FALSE ); ?> até o presente momento, quando foi entregue à(ao) adotante acima indicado.

                            <?php } ?>

                            <br><br>
                            DECLARAÇÃO DO(A) ADOTANTE:<br>
                            Ao adotar o animal acima descrito declaro-me apto para assumir a guarda e a responsabilidade sobre o mesmo, eximindo o doador de toda e qualquer responsabilidade por quaisquer atos praticados pelo e com o animal a partir desta data, exceto quanto à castração se assim foi pactuado.

                            Declaro ainda, estar ciente de todos os cuidados que este animal exige no que se refere à sua guarda e manutenção, além de conhecer todos os riscos inerentes à espécie com o convívio com humanos, estando apto a guardá-lo e vigiá-lo, comprometendo-me a proporcionar-lhe boas condições de alojamento, alimentação, higiene, conforto térmico, assim como espaço físico que possibilite ao animal se exercitar; e, ainda, ambiente que lhe proporcione afeto e distância de qualquer risco, crueldade, incluindo isolamento e abandono. Responsabilizo-me por preservar a saúde e integridade do animal e a submetê-lo aos cuidados médico-veterinários sempre que necessário para este fim.

                            Comprometo-me a não transmitir a posse deste animal a outrem sem o conhecimento do doador, bem como a informá-lo de qualquer situação de risco ou doença que o animal venha a se encontrar. 

                            Comprometo-me, também, a permitir o acesso do doador, e a quem com ele se encontrar, ao local de residência do animal, para averiguação de suas condições. 

                            Tenho conhecimento de que, caso seja constatado, por parte do doador ou qualquer pessoa ou órgão, que o animal se encontra em situação inadequada para seu bem-estar, perderei a sua guarda, sem prejuízo das penalidades legais, administrativas, cíveis e criminais. 

                            Comprometo-me a cumprir toda a legislação vigente, municipal, estadual e federal, relativa à posse de animais.

                            Declaro-me, assim, ciente das normas acima, as quais aceito, assinando o presente Termo de Adoção Responsável, assumindo plenamente os deveres que dele constam, bem como outros relacionados à posse responsável e que não estejam incluídos neste Termo. 

                            Estando, assim, justos e contratados, adotante e doador assim o presente em duas vias de igual teor e forma, elegendo o Fôro da Comarca de Pelotas/RS para dirimir quaisquer controvérsias oriundas do mesmo.<br><br>
                                         Abandonar ou maltratar animais é crime!<br>
                                       Pena: 3 meses a 1 ano de detenção e multa (Lei 9605/98)
                            </td>
                          </tr>
                        </table>
                        <div>
                          <div>
                            <input type="checkbox" name="checkConfirm" checked="checked"> <label>Li e Aceito os termos.</label>
                          </div>
                        </div>
                        <table class="body-signature-block">
                          <tr>
                            <td class="body-signature-cell">
                              <p>Obrigado!</p>
                              <p class="body-signature"><img src="/res/site/img/logo.png" alt="MyPets"></p>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td class="body-padding"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td></td>
      </tr>
    </table>

    <table class="footer-wrap w320 full-width-gmail-android" bgcolor="#e5e5e5">
      <tr>
        <td></td>
        <td class="container">
          <div class="content footer-lead">
            <a href="#"><b>MyPets</b></a>
          </div>
        </td>
        <td></td>
      </tr>
    </table>
  </div>

</body>
</html>
