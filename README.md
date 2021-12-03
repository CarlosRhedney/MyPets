<div style="display: inline-block;">
<img src="https://img.shields.io/static/v1?label=Plataforma Web&message=MyPets&color=7159c1&style=for-the-badge&logo=ghost"/>
<img src="https://img.shields.io/static/v1?label=Apache&message=Apache&color=7159c1&style=plastic&logo=APACHE"/>
<img src="https://img.shields.io/static/v1?label=Slim Framework&message=Slim Framework&color=7159c1&style=flat&logo=SLIM"/>
<img src="https://img.shields.io/static/v1?label=RainTpl&message=RainTpl&color=7159c1&style=plastic&logo=RAINTPL"/>
<img src="https://img.shields.io/static/v1?label=PHPMailer&message=PHPMailer&color=7159c1&style=flat-square&logo=PHPMAILER"/>
<img src="https://img.shields.io/static/v1?label=Composer&message=Composer&color=7159c1&style=flat-square&logo=COMPOSER"/>
<img src="https://img.shields.io/static/v1?label=Sublime Text&message=Sublime Text&color=7159c1&style=flat-square&logo=SUBLIMETEXT"/>
</div>


Introdução<p id="sobre"></p>
============
<div align="center">

![logo_MyPets](https://user-images.githubusercontent.com/49602892/144502788-90837adb-6ca4-4a1b-a29d-1a836f612913.png)
<p>🚀 Plataforma web desenvolvida por universitários em colaboração com ONGs e pessoas que tenham um animal para adoção.</p>
</div>
<h4 align="center"> 
   🚧  MyPets 🚀 Em construção...  🚧
</h4>

------------------------------

Tabela de conteúdos
=================
<!--ts-->
   * [Sobre](#Sobre)
   * [Download](#download)
   * [Instalação](#instalacao)
   * [Documentação](#documentacao)
   * [Tecnologias](#tecnologias)
   * [Como usar](#como-usar)
      * [Pre Requisitos](#pre-requisitos)
      * [Navegadores Suportados](#navegadores)
      * [Features](#features)
   * [License](#license)
<!--te-->



------------------------------
**MyPets**

Download<p id="download"></p>
-------------
Faça o download do projeto em ZIP [aqui](https://github.com/CarlosRhedney/MyPets/archive/refs/heads/master.zip)

------------------------------


Instalação<p id="instalacao"></p>
------------
<p>Para o pleno funcionamento do sistema faz-se necessário a instalação do XAMPP.</p>
<p>O mesmo foi utilizado com o Apache como servidor web junto com o MySQL com o Mariadb.</p>

faça o download  de acordo com seu sistema operacional [aqui](https://www.apachefriends.org/pt_br/download.html).

![download](https://user-images.githubusercontent.com/49602892/144521977-a75d21c3-5518-4020-b9c9-96269d59340d.png)
<p>Após o download, é necessário a instalaçaõ do XAMPP</p>
<p>Clique 2 vezes no arquivo baixado e siga com a instalação normalmente, quando chegar na tela a seguir basta selecionar os itens pré selecinados na imagem, não sendo necessário instalar todos os componentes.</p>

![xampp-select-component](https://user-images.githubusercontent.com/49602892/144548080-dfae533e-518d-4158-bb0b-115b1c51fa6e.png)
<p>após ter selecionado todos os componentes necessários, serão apenas simples etapas de next, next, finish.</p>
<p>Após a instalação é necessário iniciar o servidor XAMPP</p>
<p>Para iniciar os serviços basta startar o Apache e o MySQL, como na imagem a seguir</p>

![xampp-2](https://user-images.githubusercontent.com/49602892/144549711-9c273884-d912-4472-aad1-b375e310cbc8.png)

<p>Feito os passos anteriores, agora abra o navegador de sua preferencia e digite localhost na url.</p>
<p>Uma tela como essa será apresentada.</p>

![hRW85](https://user-images.githubusercontent.com/49602892/144550191-a5126dbd-67da-48db-8be9-ca170feb81d7.png)

<p>Caso não apresente uma tela como esta, ou em caso de erros, retorne aos passos de instalação.</p>

<p>Também faz-se necessário a instalação do Git, Sistema de Controle de Versões Distruibuído.</p>
<p>Baixe de acordo com seu sistema operacional, instale e configure o mesmo de acordo com seu usuário do github.</p>

Link para o download do Git [aqui](https://git-scm.com/).

**Iniciando com a instalação do repositório MyPets**
Primeiramente faça o download do projeto [aqui](https://github.com/CarlosRhedney/MyPets/archive/refs/heads/master.zip).

![Captura de tela 2021-12-03 031900](https://user-images.githubusercontent.com/49602892/144555185-b95779ed-973c-4e58-a757-61d7afd3a74a.png)

<p>Após fazer o download do zip descompacte o projeto</p>
<p>O diretório MyPets-master será extraído, dentro dele temos os arquivos do projeto</p>

![1](https://user-images.githubusercontent.com/49602892/144555482-d7f55dbc-072c-4e1d-b04f-bd7e25e95263.png)

<p>Selecione todos os arquivos do diretório pressionando Ctrl + a, e copie pressionando Ctrl + c.</p>
<p>Abra o seu Disco C:, como na imagem a seguir.</p>

![2](https://user-images.githubusercontent.com/49602892/144558059-eea68083-5334-4c39-9131-6a4151fa91c7.png)
<p>xampp</p>

![3](https://user-images.githubusercontent.com/49602892/144558263-db905660-a35c-49bb-a962-387e3cbfa6a6.png)

<p>htdocs</p>

![4](https://user-images.githubusercontent.com/49602892/144558382-b4f2ca0e-02b2-4dc7-aa30-43ad2da868d3.png)

<p>Dentro do diretório htdocs remova todos os arquivos contidos no diretório e pressione Ctrl + v.</p>
<p>Agora com todos os arquivos do projeto contido no diretório htdocs, atualize o navegador, a página inicial já tem que estar funcionando.</p>

![5](https://user-images.githubusercontent.com/49602892/144559450-e2e2021f-1536-496d-81d3-1368fe235da1.png)

<p>Para a criar o banco de dados, abra uma nova aba do navegador e digite:</p>
<p>localhost/phpmyadmin</p>

![7](https://user-images.githubusercontent.com/49602892/144667033-c387e5ea-bf86-4eff-a39f-b6396fc242b0.png)

<p>O arquivo .sql encontra-se disponivel junto com os arquivos do sistema, baixe-o e instale.</p>
<p>Para a instalação clique em New como na imagem a seguir.</p>

![8](https://user-images.githubusercontent.com/49602892/144667918-131343de-5f7d-4374-9ddd-d0c4d0d2e7e4.png)

<p>Agora basta clicar em Importar e Escolher arquivo, como na imagem a seguir.</p>

![9](https://user-images.githubusercontent.com/49602892/144668291-78673d6e-b23c-4904-a9b4-69f46b38bc35.png)

<p>Escolha o .sql que faz referencia ao banco de dados mypets, feito todos os passos descritos acima, o banco de dados será criado.</p>


------------------------------

Documentação<p id="documentacao"></p>
-------------




Tecnologias<p id="tecnologias"></p>
------------

**Composer**

```
composer
```

**raintpl**

```
"rain/raintpl":"3.0.0"
```

**phpmailer**

```
"phpmailer/phpmailer":"5.2.22"
```

**slim**

```
"slim/slim":"2.0"
```

------------------------------

Como Usar<p id="como-usar"></p>
--------------




Pré-requisitos<p id="pre-requisitos"></p>
--------------
Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas: [Git](https://git-scm.com/), [XAMPP](https://www.apachefriends.org/pt_br/download.html). Além disto é bom ter um editor para trabalhar com o código como [Sublime Text](https://www.sublimetext.com/download)



Navegadores Suportados<p id="navegadores"></p>
---------------
- IE 9+
- Firefox
- Chrome
- Safari
- Opera


------------------------------
### Features
<p id="features"></p>

- [x] Cadastro de usuários
- [x] Cadastro de Animais
- [x] Cadastro de ONGs
- [x] Adoção
- [x] Relatórios


------------------------------
Licença<p id="license"></p>
-------
<p>MyPets é um projeto de código aberto licenciado por [MIT](http://opensource.org/licenses/MIT).</p>
<p>MyPets reserva-se o direito de alterar a licença de versões futuras.</p>
