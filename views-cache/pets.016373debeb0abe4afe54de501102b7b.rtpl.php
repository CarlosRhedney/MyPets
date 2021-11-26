<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Animais</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <?php $counter1=-1;  if( isset($pets) && ( is_array($pets) || $pets instanceof Traversable ) && sizeof($pets) ) foreach( $pets as $key1 => $value1 ){ $counter1++; ?>
            <div class="col-xs-6 col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <!-- / é necessario para encontrar o caminho da imagem.
                            No banco de dados o caminho salvo é res/site/img/pets/ . $this->getpet() . $this->getidphoto() . $this->getidpet() . ".jpg" , então o retorno é o mesmo, como se trata de um diretorio / para encontrar.
                         -->
                        <img src="/<?php echo htmlspecialchars( $value1["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Imagem do animal">
                    </div>
                    <h2><a href="/pets/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>
                    <div class="product-carousel-price">
                        <ins><?php echo htmlspecialchars( $value1["rc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></ins>
                    </div>  
                    
                    <div class="product-option-shop">
                        <!-- Aqui o verdadeiro pulo do gato, mando o $value.idpet pois a rota necessita do id do animal para o contrato, o que em outros templates foi passado $value.url para o acesso a pagina -->
                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/contract/<?php echo htmlspecialchars( $value1["idpet"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Adotar</a>
                    </div>                       
                </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                    <nav>
                        <ul class="pagination">
                        <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
                        <li><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
                        <?php } ?>
                        </ul>
                    </nav>                        
                </div>
            </div>
        </div>
    </div>
</div>