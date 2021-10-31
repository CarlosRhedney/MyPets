<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Editar ONG
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar ONG</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/ongs/<?php echo htmlspecialchars( $ong["idong"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="ong">Nome da ONG</label>
              <input type="text" class="form-control" id="ong" name="ong" placeholder="Digite o nome da ONG" value="<?php echo htmlspecialchars( $ong["ong"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required >
            </div>
            <div class="form-group">
              <label for="cnpj">CNPJ</label>
              <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Digite o CNPJ" maxlength="18" value="<?php echo htmlspecialchars( $ong["cnpj"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required >
            </div>
            <div class="form-group">
              <label for="logradouro">Logradouro</label>
              <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Digite o endereço" value="<?php echo htmlspecialchars( $ong["logradouro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required >
            </div>
            <div class="form-group">
              <label for="city">Cidade</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Digite a cidade" value="<?php echo htmlspecialchars( $ong["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required >
            </div>
            <div class="form-group">
              <label for="url">Url</label>
              <input type="text" class="form-control" id="url" name="url" value="<?php echo htmlspecialchars( $ong["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required >
            </div>
            <div class="form-group">
              <label for="file">Foto</label>
              <input type="file" class="form-control" id="file" name="file" value="<?php echo htmlspecialchars( $ong["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required >
              <div class="box box-widget">
                <div class="box-body">
                  <!-- / é necessario para encontrar o caminho da imagem.
                      No banco de dados o caminho salvo é res/site/img/ongs/ . $this->getong() . $this->getidphoto() . $this->getidong() . ".jpg" , então o retorno é o mesmo, como se trata de um diretorio / para encontrar.
                  -->
                  <img class="img-responsive" id="image-preview" src="/<?php echo htmlspecialchars( $ong["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Imagem do animal">
                </div>
              </div>
            </div>
          </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
document.querySelector('#file').addEventListener('change', function(){
  
  var file = new FileReader();

  file.onload = function() {
    
    document.querySelector('#image-preview').src = file.result;

  }

  file.readAsDataURL(this.files[0]);

});
</script>