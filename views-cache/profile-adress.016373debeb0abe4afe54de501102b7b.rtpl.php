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
        	<div class="alert alert-danger">
				Error!
			</div>
            <div class="col-md-3">
                <?php require $this->checkTemplate("profile-menu");?>

            </div>
            <div class="col-md-9">
                <form action="/profile-adress" class="profile-adress" method="post" name="profile-adress">
					<div id="customer_details" class="col2-set">
						<div class="row">
							<div class="col-md-12">
								<div class="woocommerce-billing-fields">
									<h3>Meu Endereço</h3>
									<p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
										<label class="" for="billing_address_1">Cep <abbr title="required" class="required">*</abbr>
										</label>
                                        <input type="text" value="" placeholder="00000-000" id="billing_address_1" name="zipcode" class="input-text ">
                                        <input type="submit" value="Procurar CEP" id="place_order" class="button alt" formaction="/profile-adress" formmethod="get">
									</p>
									<p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
										<label class="" for="billing_address_1">Endereço <abbr title="required" class="required">*</abbr>
										</label>
										<input type="text" value="<?php echo htmlspecialchars( $address["address"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Logradouro, número e bairro" id="billing_address_1" name="address" class="input-text ">
									</p>
									<p id="billing_address_2_field" class="form-row form-row-wide address-field">
										<input type="text" value="<?php echo htmlspecialchars( $address["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Complemento (opcional)" id="billing_address_2" name="complement" class="input-text ">
                                    </p>
                                    <p id="billing_district_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
										<label class="" for="billing_district">Bairro <abbr title="required" class="required">*</abbr>
										</label>
										<input type="text" value="<?php echo htmlspecialchars( $address["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Cidade" id="billing_district" name="district" class="input-text ">
									</p>
									<p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
										<label class="" for="billing_city">Cidade <abbr title="required" class="required">*</abbr>
										</label>
										<input type="text" value="<?php echo htmlspecialchars( $address["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Cidade" id="billing_city" name="city" class="input-text ">
									</p>
									<p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
										<label class="" for="billing_state">Estado</label>
										<input type="text" id="billing_state" name="state" placeholder="Estado" value="<?php echo htmlspecialchars( $address["state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-text ">
									</p>
									<p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
										<label class="" for="billing_state">País</label>
										<input type="text" id="billing_state" name="country" placeholder="País" value="<?php echo htmlspecialchars( $address["country"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="input-text ">
									</p>
									<div class="clear"></div>
									<div id="order_review" style="position: relative;">
										<div id="payment">
											<div class="form-row place-order">
												<input type="submit" data-value="Place order" value="Salvar" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
											</div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>

            </div>
        </div>
    </div>
</div>