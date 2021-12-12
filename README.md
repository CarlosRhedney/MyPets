<div style="display: inline-block;">
<img src="https://img.shields.io/static/v1?label=Plataforma Web&message=MyPets&color=7159c1&style=plastic&logo=ghost"/>
<img src="https://img.shields.io/static/v1?label=Apache&message=Apache&color=7159c1&style=plastic&logo=APACHE"/>
<img src="https://img.shields.io/static/v1?label=Slim Framework&message=Slim Framework&color=7159c1&style=plastic&logo=SLIMFRAMEWORK"/>
<img src="https://img.shields.io/static/v1?label=RainTpl&message=RainTpl&color=7159c1&style=plastic&logo=RAINTPL"/>
<img src="https://img.shields.io/static/v1?label=PHPMailer&message=PHPMailer&color=7159c1&style=plastic&logo=PHPMAILER"/>
<img src="https://img.shields.io/static/v1?label=Composer&message=Composer&color=7159c1&style=plastic&logo=COMPOSER"/>
<img src="https://img.shields.io/static/v1?label=Sublime Text&message=Sublime Text&color=7159c1&style=plastic&logo=SUBLIMETEXT"/>
<img src="https://img.shields.io/static/v1?label=PHP&message=PHP&color=7159c1&style=plastic&logo=PHP"/>
<img src="https://img.shields.io/static/v1?label=JavaScript&message=JavaScript&color=7159c1&style=plastic&logo=JAVASCRIPT"/>
<img src="https://img.shields.io/static/v1?label=CSS3&message=CSS3&color=7159c1&style=plastic&logo=CSS3"/>
<img src="https://img.shields.io/static/v1?label=HTML5&message=HTML5&color=7159c1&style=plastic&logo=HTML5"/>
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
<p>Após o download, é necessário a instalaçaõ do XAMPP.</p>
<p>Clique 2 vezes no arquivo baixado e siga com a instalação normalmente, quando chegar na tela a seguir basta selecionar os itens pré selecinados na imagem, não sendo necessário instalar todos os componentes.</p>

![xampp-select-component](https://user-images.githubusercontent.com/49602892/144548080-dfae533e-518d-4158-bb0b-115b1c51fa6e.png)
<p>após ter selecionado todos os componentes necessários, serão apenas simples etapas de next, next, finish.</p>
<p>Após a instalação é necessário iniciar o servidor XAMPP.</p>
<p>Para iniciar os serviços basta startar o Apache e o MySQL, como na imagem a seguir:</p>

![6](https://user-images.githubusercontent.com/49602892/144673935-d611528a-cf5d-4808-9ff5-0445d2639cc3.png)

<p>Feito os passos anteriores, agora abra o navegador de sua preferência e digite localhost na url.</p>
<p>Uma tela como essa será apresentada.</p>

![hRW85](https://user-images.githubusercontent.com/49602892/144550191-a5126dbd-67da-48db-8be9-ca170feb81d7.png)

<p>Caso não apresente uma tela como esta, ou em caso de erros, retorne aos passos de instalação.</p>

<p>Também faz-se necessário a instalação do Git, Sistema de Controle de Versões Distruibuído.</p>
<p>Baixe de acordo com seu sistema operacional, instale e configure o mesmo de acordo com seu usuário do github.</p>

Link para o download do Git [aqui](https://git-scm.com/).

**Iniciando com a instalação do repositório MyPets**<br>
Primeiramente faça o download do projeto [aqui](https://github.com/CarlosRhedney/MyPets/archive/refs/heads/master.zip).

![Captura de tela 2021-12-03 031900](https://user-images.githubusercontent.com/49602892/144555185-b95779ed-973c-4e58-a757-61d7afd3a74a.png)

<p>Após fazer o download do zip descompacte o projeto.</p>
<p>O diretório MyPets-master será extraído, dentro dele temos os arquivos do projeto.</p>

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
**Estrutura do Projeto**

![21](https://user-images.githubusercontent.com/49602892/145334552-79d29eb1-7968-4859-aaee-dbcd59174f7a.png)

**Relatories**
<p>Diretório do sistema onde é armazenado os relatórios, na parte administrativa temos a opção de gerar relatórios dos usuários, ongs e animais.</p>

![24](https://user-images.githubusercontent.com/49602892/145341550-075cadf7-b635-426c-82df-ef2e6ba4c71b.png)

**Res**
<p>Diretório res contém todos os arquivos css, js, img, fonts, bootstrap do site, ong e administração.</p>

![Captura de tela 2021-12-09 014957](https://user-images.githubusercontent.com/49602892/145336728-86a54aeb-559c-4518-b7a2-e87dadb0ac33.png)

**vendor**
<p>Diretório gerado pelo composer no inicio do projeto, utilizamos o composer para o gerenciamento das dependências utilizadas na plataforma.</p>
<p>Além das dependências, temos o nosso próprio vendor mypets que contém as classes do projeto, que por sua vez, são gerenciadas pelo autoload.php do composer.</p>

![23](https://user-images.githubusercontent.com/49602892/145337439-af9a7c8e-fc1e-4e83-ad2c-3fd075d5c639.png)

**mypets**
<p>Em mypets/php-classes/src estão algumas de nossas classes principais para a estrutura do projeto, diretório DB com o arquivo Sql.php com a conexão com o banco de dados e alguns paramêtros para carregar e trazer as informações, diretório Model com DAO necessário para cada parte do sistema.</p>

![25](https://user-images.githubusercontent.com/49602892/145342848-6e0d8ac2-fb6c-487d-98bd-63f5795df165.png)

<p>Começando por Page.php Classe principal que faz referência a HomePage da plataforma, como pode ser visto, nossa interface foi desenvolvida com os métodos mágicos php __construct e __destruct além dos métodos setTpl e setData.</p>
<p>
   Método __construct recebe dois paramêtros, $opts faz referência as informações passadas na rota do sistema.
   $tpl_dir armazena o caminho dos templates HTML, para que sejam devidamente carregados quando informados.
   $options a principio um array vazio recebe a mesclagem de dois arrays, prevalecendo as informações do segundo array passado como paramêtro $opts, caso este não tenha informações prevalece o primeiro array passado como paramêtro $default.
</p>
<p>
   $config recebe um array com as informações relevantes da localização dos templates HTML e arquivos de cache e debug gerados pelo RainTpl, o mesmo $config é informado no método estático configure() da Classe Tpl().
   Iniciamos um novo objeto $tpl, chamamos o método setData() com as informações carregadas, e renderizamos o template header na tela do usuário com o método draw() do RainTpl.
</p>
<p>
   Método setTpl carrega o template informado como paramêtro $name, pois o nome do arquivo definitivo será informado na rota do sistema.
   $data recebe um array que são as informações que serão passadas para o template HTML, o $returnHTML por padrão vem false.
   chamamos o método setData() com as informações carregadas, e retornamos o template renderizado com o método draw() do RainTpl.
</p>
<p>Método setData carrega os dados que são passados para o template HTML, em nossa página principal por exemplo, carregamos as informações dos pets, loginSuccess e ongs para serem apresentadas na interface do usuário.</p>
<p>Método __destruct carrega o nosso footer no template HTML, o mesmo é chamado automaticamente após o metodo setTpl.</p>

![26](https://user-images.githubusercontent.com/49602892/145344530-25c16c8e-67b4-4461-aeb8-4d6ce1e0df9a.png)
![27](https://user-images.githubusercontent.com/49602892/145344590-199085b6-5053-4f3e-a847-c3fdfd7c3821.png)

<p>A lógica é simples, quando iniciamos o objeto na rota $page = new Page(), por padrão é chamado o método __construct que por sua vez traz o nosso header, com o objeto carregado, chamamos o método setTpl $page->setTpl(index) e passamos como paramêtro o template HTML que irá ser carregado, nesse caso index.html, automaticamente chamamos o template html que será o corpo da página em sí, ao chegarmos na linha 46 como ilustra a imagem a seguir, o PHP não encontra mais nenhum comando e por sua vez executa o nosso método __destruct que traz o nosso footer da página na plataforma.</p>

![28](https://user-images.githubusercontent.com/49602892/145486335-52dcbd93-6fc2-4958-a1c9-b39842b9900f.png)

<p>Para um melhor reaproveitamento de código, separamos os arquivos header e footer, que são códigos que se repetem para outras páginas do sistema, então para não criar um header e footer para cada página, separamos em arquivos e os chamamos para as demais páginas do sistema.</p>
<p>Você desenvolvedor deve se atentar na localização de todos os <strong>templates HTML do site</strong>, os mesmos se encontram no diretório <strong>views</strong> como passado no método __construct em Page.php, caso seja necessário alterar, modificar ou acrescentar favor mexer no diretório <strong>views</strong></p>
<p>Diretórios admin, mail e ong fazem referência ao template HTML dos mesmos e serão explicados mais a frente.</p>

![29](https://user-images.githubusercontent.com/49602892/145488160-d44b4c0e-4a9f-4857-9e5f-5020674b4bd3.png)


**PageAdmin**
<p>PageAdmin() Classe principal que faz referênica a parte administrativa sistema.</p>
<p>PageAdmin() é herança de Page(), PageAdmin herda todos os atributos e métodos públicos e protegidos da classe pai Page.</p>

![30](https://user-images.githubusercontent.com/49602892/145525579-c68ffdd7-8a6e-4b9c-aa55-597de8b3ff26.png)

<p>Todos os templates HTML referêntes a parte administrativa do sistema se encontram no diretório admin.</p>

![31](https://user-images.githubusercontent.com/49602892/145663573-03cc9449-85ff-4cb2-9215-fb2b36164232.png)

**Ong**
<p>Ong() Classe do sistema que faz referência a parte administrativa do usuário, seja ele representante de uma ong ou não, é nesta parte do sistema que o usuário faz as inserções dos animais que irão para adoção, tem as categorias disponíveis, onde o usuário consegue adicionar o animal a uma categoria.</p>
<p>Frizando que a criação, alteração e exclusão destas categorias ficam a cargo do administrador da plataforma, os usuários sejam eles representantes de uma ong ou não, podem somente inserir o animal em determinada categoria.</p>
<p>Administrativo</p>

![35](https://user-images.githubusercontent.com/49602892/145665478-59ecc7ad-0240-4453-bd8f-40e816dd0f2c.png)

<p>Usuário representando uma ong ou não.</p>

![36](https://user-images.githubusercontent.com/49602892/145665572-5faccbb1-0ab1-4af1-8fd2-88b92ee89706.png)

<p>Ong() é herança de Page(), Ong herda todos os atributos e métodos públicos e protegidos da classe pai Page.</p>

![32](https://user-images.githubusercontent.com/49602892/145665371-9dfabe10-d8b2-4d08-9baa-52a691295a4c.png)

![33](https://user-images.githubusercontent.com/49602892/145664113-b1a3ffc3-c063-4250-8d20-320fb42f67ce.png)

<p>Todos os templates HTML referêntes a parte administrativa do usuário do sistema se encontram no diretório ong.</p>

![34](https://user-images.githubusercontent.com/49602892/145664584-e328764e-1716-4f4d-a3d8-cebac2eef839.png)

**Model**
<p>Model() Classe Principal e sem dúvida a mais inteligênte do sistema, ela idêntifica qual o método enviado, se é <strong>get</strong> ou <strong>set</strong>, ambos tem comportamentos diferêntes, então no método mágico __call() verificamos com a váriavel $name o que foi enviado, $args são os argumentos que possam ter vindo caso seja um <strong>set</strong>, o nosso <strong>get</strong> só retorna os valores que foram solicitados no front da aplicação, todos os DAOs contidos em mypets/php-classes/src/Model são herança de Model.</p>
<p>setData() método contido em Model(), que cria dinâmicamente os nossos getters and setters, para que facilitasse na criação de cada DAO, sem a necessidade de ter getters and setters para cada um.</p>
<p>Por fim e não menos importante o nosso getValues(), que nada mais faz do que retornar os valores, que não podem ser acessados diretamente por se tratar de um atributo privado da classe.</p>

![37](https://user-images.githubusercontent.com/49602892/145721066-4d18a54e-b7fd-4622-ba64-96e1c65121ef.png)

**Mailer**
<p>Mailer() Classe do sistema que faz referência ao envio de emails na plataforma, caso o usuário esqueça a senha ele tem a opção de redefinir uma nova senha, para isso o email do mesmo precisa estar devidamente cadastrado na plataforma, informando este email é disparado um link para redefinir a senha.</p>

![38](https://user-images.githubusercontent.com/49602892/145723115-1eade456-c299-4ad7-ae06-ea89bc7695dc.png)

<p>O template HTML referênte ao email enviado se encontra no diretório mail.</p>

![39](https://user-images.githubusercontent.com/49602892/145723249-88a7e772-fa7a-45e1-9828-3a2163e19b60.png)

![40](https://user-images.githubusercontent.com/49602892/145723589-e5f8306b-d621-4a01-a49b-ca8e6db02933.png)

![41](https://user-images.githubusercontent.com/49602892/145723616-12b2c0ae-2254-4ef3-b088-a564fc5b28fd.png)

![43](https://user-images.githubusercontent.com/49602892/145723711-a23de0ed-c340-4890-a763-6d9dc699ef67.png)

![42](https://user-images.githubusercontent.com/49602892/145723730-a3b8f1ea-f334-4114-b044-3470cec7a263.png)

<p>Para exemplificar o email enviado, dei um var_dump() no DAO User.php em </p>

![44](https://user-images.githubusercontent.com/49602892/145724040-6e5087ec-f2e9-4594-bbff-03bb58fe3164.png)

![47](https://user-images.githubusercontent.com/49602892/145724208-bea11be3-3009-4cb7-a76a-5ea8e3149257.png)

![48](https://user-images.githubusercontent.com/49602892/145724210-6d2bf3ac-283e-4e39-b06a-aca2c853efff.png)

![49](https://user-images.githubusercontent.com/49602892/145724279-54bd6a9c-2ea1-409d-b234-74dbe7822965.png)





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
- [x] Termo de Responsabilidade
- [x] Categorias
- [x] Login e Logout
- [x] Exclusão de Conta
- [x] Consumo de webservice com viacep
- [x] Envio de email com PHPMailer
- [x] Esqueci a senha


------------------------------
Licença<p id="license"></p>
-------
MyPets é um projeto de código aberto licenciado por [MIT](http://opensource.org/licenses/MIT).
<p>MyPets reserva-se o direito de alterar a licença de versões futuras.</p>
