<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Minha Conta</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">                
            <div class="col-md-3">
                <?php require $this->checkTemplate("profile-menu");?>
            </div>
            <div class="col-md-9">
                <?php if( $dataError != '' ){ ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars( $dataError, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>

                <?php if( $dataSuccess != '' ){ ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars( $dataSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </div>
                <?php } ?>
                <div class="cart-collaterals">
                    <h2>Dados Pessoais</h2>
                </div>
                
                <form action="/profile-data" method="post">
                    <div class="form-group">
                    <label for="current_pass">RG:</label>
                    <input type="text" class="form-control" id="" name="rg" placeholder="Digite o seu RG">
                    </div>
                    <hr>
                    <div class="form-group">
                    <label for="new_pass">CPF:</label>
                    <input type="text" class="form-control" id="" name="cpf" placeholder="Digite o seu CPF">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>
        </div>
    </div>
</div>