<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="col-xs-4"></div>
<div class="col-xs-4">
<?php if( $loginSuccess != '' ){ ?>
<div class="alert alert-success" align="center">
    <?php echo htmlspecialchars( $loginSuccess, ENT_COMPAT, 'UTF-8', FALSE ); ?>
</div>
<?php } ?>
</div>
<div class="col-xs-4"></div>
<div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
                    <?php $counter1=-1;  if( isset($pets) && ( is_array($pets) || $pets instanceof Traversable ) && sizeof($pets) ) foreach( $pets as $key1 => $value1 ){ $counter1++; ?>
					<li>
						<img style="width:600px; height: 395px" src="<?php echo htmlspecialchars( $value1["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Slide">
						<div class="caption-group">
							<h4 class="caption subtitle"><?php echo htmlspecialchars( $value1["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h4>
							<a class="caption button-radius" href="/pets/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span class="icon"></span>Adotar</a>
						</div>
					</li>
                    <?php } ?>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php $counter1=-1;  if( isset($ongs) && ( is_array($ongs) || $ongs instanceof Traversable ) && sizeof($ongs) ) foreach( $ongs as $key1 => $value1 ){ $counter1++; ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-users"></i>
                        <p><a href="/ongs/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color:#D3D3D3"><?php echo htmlspecialchars( $value1["ong"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Animais</h2>
                        <div class="product-carousel">
                            <?php $counter1=-1;  if( isset($pets) && ( is_array($pets) || $pets instanceof Traversable ) && sizeof($pets) ) foreach( $pets as $key1 => $value1 ){ $counter1++; ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo htmlspecialchars( $value1["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Imagem do animal">
                                    <div class="product-hover">
                                        <a href="/contract/<?php echo htmlspecialchars( $value1["idpet"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="add-to-cart-link"><i class="fa fa-paw"></i> Adotar</a>
                                        <a href="/pets/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="view-details-link"><i class="fa fa-eye"></i>ver detalhes</a>
                                    </div>
                                </div>
                                
                                <h2><a href="/pets/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <p><?php echo htmlspecialchars( $value1["rc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="/res/site/img/brand1.png" alt="">
                            <img src="/res/site/img/brand2.png" alt="">
                            <img src="/res/site/img/brand3.png" alt="">
                            <img src="/res/site/img/brand4.png" alt="">
                            <img src="/res/site/img/brand5.png" alt="">
                            <img src="/res/site/img/brand6.png" alt="">  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->