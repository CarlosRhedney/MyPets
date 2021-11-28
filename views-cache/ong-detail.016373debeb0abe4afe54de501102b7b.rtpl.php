<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?php echo htmlspecialchars( $ong["ong"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="/">Home</a>
                        <a href=""><?php echo htmlspecialchars( $ong["ong"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="/<?php echo htmlspecialchars( $ong["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo htmlspecialchars( $ong["ong"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                                
                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrição</a></li>
                                        <li role="presentation"><a href="#profile2" aria-controls="profile" role="tab" data-toggle="tab">Administrador</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Descrição da Ong</h2>
                                            <?php $counter1=-1;  if( isset($ongperson) && ( is_array($ongperson) || $ongperson instanceof Traversable ) && sizeof($ongperson) ) foreach( $ongperson as $key1 => $value1 ){ $counter1++; ?>
                                            <div class="box-body no-padding">
                                              <table class="table table-striped table-bordered table-condensed">
                                                <thead>
                                                  <tr>
                                                    <th>Nome da Ong</th>
                                                    <th>Logradouro</th>
                                                    <th>Cidade</th>
                                                    <th>Número</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td><?php echo htmlspecialchars( $value1["ong"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $value1["logradouro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile2">
                                            <h2>Informações do Administrador</h2>
                                            <div class="box-body no-padding">
                                              <table class="table table-striped table-bordered table-condensed">
                                                <thead>
                                                  <tr>
                                                    <th>Administrador</th>
                                                    <th>Email</th>
                                                    <th>Tel</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $counter1=-1;  if( isset($person) && ( is_array($person) || $person instanceof Traversable ) && sizeof($person) ) foreach( $person as $key1 => $value1 ){ $counter1++; ?>
                                                  <tr>
                                                    <td><?php echo htmlspecialchars( $value1["person"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $value1["mail"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                  </tr>
                                                  <?php } ?>
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</div>

<div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <div class="product-carousel">
                            <?php $counter1=-1;  if( isset($petsong) && ( is_array($petsong) || $petsong instanceof Traversable ) && sizeof($petsong) ) foreach( $petsong as $key1 => $value1 ){ $counter1++; ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="/res/site/img/pets/<?php echo htmlspecialchars( $value1["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $value1["idpet"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.jpg" alt="Imagem do animal">
                                    <div class="product-hover">
                                        <a href="/contract/<?php echo htmlspecialchars( $value1["idpet"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="add-to-cart-link"><i class="fa fa-paw"></i> Adotar</a>
                                        <a href="/pets/<?php echo htmlspecialchars( $value1["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="view-details-link"><i class="fa fa-eye"></i>ver detalhes</a>
                                    </div>
                                </div>
                                
                                <h2><a href="/pets/<?php echo htmlspecialchars( $value1["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></h2>
                                
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
    </div>