<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2><?php echo htmlspecialchars( $pet["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
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
                        <a href=""><?php echo htmlspecialchars( $pet["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="/<?php echo htmlspecialchars( $pet["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo htmlspecialchars( $pet["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                                <div class="product-inner-price">
                                    <ins><?php echo htmlspecialchars( $pet["rc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></ins>
                                </div>    
                                
                                <form action="/contract/<?php echo htmlspecialchars( $pet["idpet"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="cart">
                                    <button class="add_to_cart_button" type="submit">Adotar</button>
                                </form>   
                                
                                <div class="product-inner-category">
                                    <p>Categorias<?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?> <a href="/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a><?php } ?>.
                                </div> 
                                
                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descrição</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Animal</a></li>
                                        <li role="presentation"><a href="#profile2" aria-controls="profile" role="tab" data-toggle="tab">Tutor</a></li>
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

                                            <h2>Descrição do Animal</h2>  
                                            <p><?php echo htmlspecialchars( $pet["descr"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            <h2>Informações do Animal</h2>
                                            <div class="box-body no-padding">
                                              <table class="table table-striped table-bordered table-condensed">
                                                <thead>
                                                  <tr>
                                                    <th>Nome do Animal</th>
                                                    <th>Raça/Cor</th>
                                                    <th>Altura</th>
                                                    <th>Comprimento</th>
                                                    <th>Peso</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td><?php echo htmlspecialchars( $pet["pet"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $pet["rc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $pet["vlheight"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $pet["vllength"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                    <td><?php echo htmlspecialchars( $pet["vlweight"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile2">
                                            <h2>Informações do Tutor</h2>
                                            <div class="box-body no-padding">
                                              <table class="table table-striped table-bordered table-condensed">
                                                <thead>
                                                  <tr>
                                                    <th>Nome do Tutor</th>
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
                                            <?php $counter1=-1;  if( isset($person) && ( is_array($person) || $person instanceof Traversable ) && sizeof($person) ) foreach( $person as $key1 => $value1 ){ $counter1++; ?>

                                            <a href="http://api.whatsapp.com/send?phone=55<?php echo htmlspecialchars( $value1["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank"><img src="/res/site/img/zap.svg"></a>
                                            <?php } ?>

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