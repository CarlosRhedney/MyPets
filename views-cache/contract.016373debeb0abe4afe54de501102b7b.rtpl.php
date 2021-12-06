<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="col-xs-4"></div>
<div class="col-xs-4">
<?php if( $loginSuccess != '' ){ ?>

<div class="alert alert-success" align="center">
    <?php echo htmlspecialchars( $loginSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?>

</div>
<?php } ?>

</div>
<div class="col-xs-4"></div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <h1>Termo de Responsabilidade do Tutor Adotante</h1>

                <button type="submit" id="btn-print" class="button alt" style="margin-bottom:10px">Imprimir</button>

                <iframe src="/terms/<?php echo htmlspecialchars( $pet["idpet"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="boleto" frameborder="0" style="width:100%; min-height:1000px; border:1px solid #CCC; padding:20px;"></iframe>

                <script>
                document.querySelector("#btn-print").addEventListener("click", function(event){

                    event.preventDefault();

                    window.frames["boleto"].focus();
                    window.frames["boleto"].print();

                });                
                </script>

            </div>
        </div>
    </div>
</div>