<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="/res/site/img/h4-slide.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Animais <span class="primary">para <strong>adoção</strong></span>
							</h2>
							<h4 class="caption subtitle">Adoção</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Adotar</a>
						</div>
					</li>
					<li><img src="/res/site/img/h4-slide2.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								 <span class="primary"> <strong></strong></span>
							</h2>
							<h4 class="caption subtitle"></h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Adotar</a>
						</div>
					</li>
					<li><img src="/res/site/img/h4-slide3.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								 <span class="primary"> <strong></strong></span>
							</h2>
							<h4 class="caption subtitle"></h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Adotar</a>
						</div>
					</li>
					<li><img src="/res/site/img/h4-slide4.png" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								 <span class="primary"> <strong></strong></span>
							</h2>
							<h4 class="caption subtitle"></h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Adotar</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-users"></i>
                        <p>ONGs</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-users"></i>
                        <p>ONGs</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-users"></i>
                        <p>ONGs</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-users"></i>
                        <p>ONGs</p>
                    </div>
                </div>
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
                                        <a href="#" class="add-to-cart-link"><i class="fa fa-eye"></i> Adotar</a>
                                        <a href="/pets/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="view-details-link"><i class="fa fa-paw"></i> ver detalhes</a>
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