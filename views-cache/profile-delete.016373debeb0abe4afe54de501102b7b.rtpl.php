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
                <div class="cart-collaterals">
                    <h2>Excluir Conta</h2>
                </div>

                <div class="form-group">
                    <p>
                        <h1>Olá <?php echo htmlspecialchars( $user["person"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.</h1><br>
                        Deseja realmente excluir sua conta na MyPets?<br>
                        A exclusão acarretará na perda total dos seus dados!
                    </p>
                </div>
                
                <form action="/profile-delete/<?php echo htmlspecialchars( $user["idperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
                    <button type="submit" class="btn btn-danger">Excluir Conta</button>
                </form>

            </div>
        </div>
    </div>
</div>