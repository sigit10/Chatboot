	<section>
		<div class="container">
			<div class="row">				
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Produk Kami</h2>
						<form method="post" action="<?php echo base_url('frontendc/cari_produk')?>">
							<div class="col-sm-2">
								<select name="kategori_produk" class="form-control">
									<option value="">Semua Kategori</option>
									<option value="Keripik">Keripik</option>
									<option value="Tahu Kering">Tahu Kering</option>
									<option value="Bumbu Khas">Bumbu Khas</option>
								</select>
							</div>
							<div class="col-sm-2">
								<input name="nm_produk" type="text" class="form-control">
							</div>
							<button type="submit" class="btn btn-default">Cari</button>
						</form><hr>
	                    <?php
	                    if(isset($data_produk)){
	                        foreach($data_produk as $row){
                        ?>
                        <?php if ($this->session->userdata('login_status') == TRUE) { ?>

							<?php if ($row->id_user != $this->session->userdata('ID')) { ?>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url('uploads/img/'.$row->foto_produk)?>" alt="" />
													<h2><?php echo currency_format($row->harga_produk); ?></h2>
													<p><?php echo $row->nm_produk; ?></p>
													<a href="<?php echo base_url('frontendc/masukan_keranjang/'.$row->id_produk)?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukan Keranjang</a>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
														<h2><?php echo currency_format($row->harga_produk); ?></h2>
														<p><?php echo $row->nm_produk; ?></p>
														<p>Stok Tersedia : <?php echo $row->stok_produk; ?></p>
														<a href="<?php echo base_url('frontendc/masukan_keranjang/'.$row->id_produk)?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukan Keranjang</a>
														<a href="<?php echo base_url('frontendc/chat_bot/'.$row->id_produk)?>" class="btn btn-default add-to-cart"><i class="fa fa-comment"></i>Chat Toko</a>
													</div>
												</div>
										</div>
									</div>
								</div>
							<?php } ?>

                        <?php } else { ?>

						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url('uploads/img/'.$row->foto_produk)?>" alt="" />
											<h2><?php echo currency_format($row->harga_produk); ?></h2>
											<p><?php echo $row->nm_produk; ?></p>
											<a href="<?php echo base_url('frontendc/masukan_keranjang/'.$row->id_produk)?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukan Keranjang</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo currency_format($row->harga_produk); ?></h2>
												<p><?php echo $row->nm_produk; ?></p>
												<p>Stok Tersedia : <?php echo $row->stok_produk; ?></p>
												<a href="<?php echo base_url('frontendc/masukan_keranjang/'.$row->id_produk)?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukan Keranjang</a>
											</div>
										</div>
								</div>
							</div>
						</div>

                        <?php } ?>
                        <?php }
	                        }
	                    ?>
					</div><!--features_items-->						
				</div>
			</div>
		</div>
	</section>