<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastrar Novo Animal
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/pets">Categorias</a></li>
    <li class="active"><a href="/admin/pets/create">Cadastrar</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Animal</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/pets/create" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="pet">Nome do animal</label>
              <input type="text" class="form-control" id="pet" name="pet" placeholder="Digite o nome do animal" required >
            </div>
            <div class="form-group">
              <label for="rc">Raça/Cor do animal</label>
              <input type="text" class="form-control" id="rc" name="rc" placeholder="Digite a raça e a cor do animal" required >
            </div>
            <div class="form-group">
              <label for="vlheight">Altura</label>
              <input type="number" class="form-control" id="vlheight" name="vlheight" step="0.01" placeholder="0.00" required >
            </div>
            <div class="form-group">
              <label for="vllength">Comprimento</label>
              <input type="number" class="form-control" id="vllength" name="vllength" step="0.01" placeholder="0.00" required >
            </div>
            <div class="form-group">
              <label for="vlweight">Peso</label>
              <input type="number" class="form-control" id="vlweight" name="vlweight" step="0.01" placeholder="0.00" required >
            </div>
            <div class="form-group">
              <label for="url">Url</label>
              <input type="text" class="form-control" id="url" name="url" placeholder="Ex:(Nome-do-animal)" required >
            </div>
            <div class="form-group">
              <label for="descr">Descrição do Animal</label>
              <input type="text" class="form-control" id="descr" name="descr" required placeholder="Diga como o animal chegou, em que condições chegou..." >
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