<div style="display: inline-block;">
<img src="https://img.shields.io/static/v1?label=Plataforma Web&message=MyPets&color=7159c1&style=plastic&logo=ghost"/>
<img src="https://img.shields.io/static/v1?label=Apache&message=Apache&color=7159c1&style=plastic&logo=APACHE"/>
<img src="https://img.shields.io/static/v1?label=Slim Framework&message=Slim Framework&color=7159c1&style=plastic&logo=SLIMFRAMEWORK"/>
<img src="https://img.shields.io/static/v1?label=RainTpl&message=RainTpl&color=7159c1&style=plastic&logo=RAINTPL"/>
<img src="https://img.shields.io/static/v1?label=PHPMailer&message=PHPMailer&color=7159c1&style=plastic&logo=PHPMAILER"/>
<img src="https://img.shields.io/static/v1?label=Composer&message=Composer&color=7159c1&style=plastic&logo=COMPOSER"/>
<img src="https://img.shields.io/static/v1?label=Sublime Text&message=Sublime Text&color=7159c1&style=plastic&logo=SUBLIMETEXT"/>
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
      * [Pré-requisitos](#pre-requisitos)
      * [Navegadores Suportados](#navegadores)
      * [Funcionalidades](#features)
   * [Licença](#license)
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

![6](https://user-images.githubusercontent.com/49602892/144673935-d611528a-cf5d-4808-9ff5-0445d2639cc3.png)

<p>Feito os passos anteriores, agora abra o navegador de sua preferencia e digite localhost na url.</p>
<p>Uma tela como essa será apresentada.</p>

![hRW85](https://user-images.githubusercontent.com/49602892/144550191-a5126dbd-67da-48db-8be9-ca170feb81d7.png)

<p>Caso não apresente uma tela como esta, ou em caso de erros, retorne aos passos de instalação.</p>

<p>Também faz-se necessário a instalação do Git, Sistema de Controle de Versões Distruibuído.</p>
<p>Baixe de acordo com seu sistema operacional, instale e configure o mesmo de acordo com seu usuário do github.</p>

Link para o download do Git [aqui](https://git-scm.com/).

**Iniciando com a instalação do repositório MyPets**<br>
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

<p>O arquivo mypets.sql encontra-se disponivel junto com os arquivos do sistema, baixe-o e instale.</p>
<p>Para a instalação clique em New como na imagem a seguir.</p>

![8](https://user-images.githubusercontent.com/49602892/144667918-131343de-5f7d-4374-9ddd-d0c4d0d2e7e4.png)

<p>Agora basta clicar em Importar e Escolher arquivo, como na imagem a seguir.</p>

![9](https://user-images.githubusercontent.com/49602892/144668291-78673d6e-b23c-4904-a9b4-69f46b38bc35.png)

<p>Escolha o mypets.sql que faz referência ao banco de dados mypets, feito todos os passos descritos acima, o banco de dados será criado.</p>


------------------------------

Documentação<p id="documentacao"></p>
-------------
<p>1.1 Apresentação</p>
<p>1.2 Os objetivos do site</p>
<p>1.3 O público-alvo do website</p>
<p>1.4 Objetivos quantitativos</p>
<p>1.5 Escopo do projeto</p>
<p>1.6 Descrição dos elementos existentes</p>
<p>2.1 Identidade visual</p>
<p>2.2 Projeto</p>
<p>2.3 Esquemas</p>
<p>3.1 Mapa do site</p>
<p>3.2 Descrição funcional</p>
<p>3.3 Informações sobre o conteúdo</p>
<p>3.4 Restrições técnicas</p>
<p>4.1 Benefícios contemplados</p>
<p>4.2 Calendário</p>
<p>4.3 Metodologia de acompanhamento</p>
<p>casos de uso</p>
<p>requisitos funcionais</p>
<p>requisitos não funcionais</p>
<p>diagrama de contexto</p>



🛠 Tecnologias<p id="tecnologias"></p>
------------

**Composer**

```
composer faz-se necessário para o gerenciamento das dependências a seguir e para o gerenciamento das nossas próprias classes contidas em vendor/mypets/php-classes/src/.
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
<p>Abra o navegador de sua preferência, na url digite: localhost</p>
<p>Esta página será apresentada</p>

![5](https://user-images.githubusercontent.com/49602892/144559450-e2e2021f-1536-496d-81d3-1368fe235da1.png)

<p>Para acessar a parte administrativa da aplicação, basta inserir na url um /admin, e você será redirecionado para a página de login da administração, como ilustrado na imagem a seguir, o ideal é que o usuário comum nem saiba desta parte administrativa.</p>

![10](https://user-images.githubusercontent.com/49602892/144687678-3bbd127e-55c8-4028-a423-1c243838f3b1.png)

<p>No banco de dados já existe um usuário cadastrado, cujo login e senha são:</p>
<p>Login: IronMan</p>
<p>Senha: admin</p>
<p>Tela inicial da administração</p>

![11](https://user-images.githubusercontent.com/49602892/144687973-a0a403fd-5c77-490e-adc5-c6b2c5b5339e.png)

<p>Usuários</p>

![12](https://user-images.githubusercontent.com/49602892/144688699-ea96d29b-b5d7-4b8d-9ede-701695fe760f.png)

<p>Cadastrar Usuário</p>

![13](https://user-images.githubusercontent.com/49602892/144689266-b2426524-25e7-4d40-8185-3fb3779d6d34.png)

<p>Editar Usuário</p>

![14](https://user-images.githubusercontent.com/49602892/144689269-4b5e8625-e0c2-4b1f-9ddf-4a20ca18f1cb.png)

<p>Excluir</p>

![15](https://user-images.githubusercontent.com/49602892/144689295-2b6e2873-0701-4fd6-9ae9-9bd30c7a02d1.png)

<p>Categorias</p>

![16](https://user-images.githubusercontent.com/49602892/144689296-2b6255bc-19d7-408f-ae74-ccf034daf5c3.png)

<p>Clicando em animais, somos redirecionados a categoria em si onde aparecem os animais, clicando em adicionar o animal é inserido na categoria em questão.</p>
<p>Quando inserido, o animal também pode ser removido, bastando clicar em remover.</p>

![17](https://user-images.githubusercontent.com/49602892/144689297-a5c1d5f8-372c-4e88-be7d-4ed6f7475556.png)

<p>ONGs</p>
<p>Onde listamos todas as ongs cadastradas no sistema.</p>

![18](https://user-images.githubusercontent.com/49602892/144689298-b1e61906-9ad9-445d-acdb-c87306f3b013.png)

<p>Animais</p>
<p>Onde listamos todos os animais cadastrados no sistema.</p>

![19](https://user-images.githubusercontent.com/49602892/144689299-29520cf6-06a2-4263-b5cc-cbc9394bbc2c.png)

<p>Relatórios e Painel do Usuário.</p>
<p>Relatórios faz referência aos relatórios gerados no sistema.</p>
<p>Painel do usuário com botão Sair e Minha Conta.</p>

![20](https://user-images.githubusercontent.com/49602892/144689300-b2ee5eb1-8595-47b2-a9e0-4a42b17ef234.png)


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
### ⚙️ Funcionalidades
<p id="features"></p>

- [x] Cadastro de usuários
- [x] Cadastro de Animais
- [x] Cadastro de ONGs
- [x] Adoção de Animais
- [x] Relatórios


------------------------------
Licença<p id="license"></p>
-------
MyPets é um projeto de código aberto licenciado por [MIT](http://opensource.org/licenses/MIT).
<p>MyPets reserva-se o direito de alterar a licença de versões futuras.</p>
