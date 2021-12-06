<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastrar nova ONG
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/ongs">Ongs</a></li>
    <li class="active"><a href="/admin/ongs/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova ONG</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/ongs/create" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="ong">Nome da ONG</label>
              <input type="text" class="form-control" id="ong" name="ong" placeholder="Digite o nome da ong" required >
            </div>
            <div class="form-group">
              <label for="cnpj">CNPJ</label>
              <input type="text" class="form-control" id="cnpj" name="cnpj" maxlength="18" placeholder="XX.XXX.XXX/0001-XX" required >
            </div>
            <div class="form-group">
              <label for="logradouro">Logradouro</label>
              <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Digite o endereço" required >
            </div>
            <div class="form-group">
              <label for="city">Cidade</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Digite o nome da cidade" required >
            </div>
            <div class="form-group">
              <label for="number">Número</label>
              <input type="number" class="form-control" id="number" name="number" placeholder="Digite o número" required >
            </div>
            <div class="form-group">
              <label for="url">Url</label>
              <input type="text" class="form-control" id="url" name="url" placeholder="Ex:(Nome-da-ong)" required >
            </div>
            <div class="form-group">
              <label for="file">Foto</label>
              <span class="input-group-btn">
                <button type="button" class="glyphicon glyphicon-camera btn btn-warning" style="font-size:15px"><input title=" " type="file" name="file" id="file" required style="position: absolute; left: 0; top: 0; opacity: 0;" /></button>
              </span>
              <div class="box box-widget">
                <div class="box-body">
                  <img class="img-responsive" id="image-preview" alt="Photo">
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
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