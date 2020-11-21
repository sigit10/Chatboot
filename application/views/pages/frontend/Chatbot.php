	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url('')?>">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<section id="do_action">
				<div class="container">
					<a href="<?php echo base_url('')?>" class="btn btn-default check_out" href="">Tambah Belanja
					</a>
				</div>
			</section><!--/#do_action-->	
			<div class="table-responsive cart_info">
                <?php
                  $message = $this->session->flashdata('notif');
                  $message2 = $this->session->flashdata('notif_berhasil');
                  if($message){

                  echo '<div class="alert btn-block alert-error fade in btn btn-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'.$message .'</strong></div>';
                   
                 } elseif ($message2) {
                  echo '<div class="alert btn-block alert-success fade in btn btn-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'.$message2 .'</strong></div>';
                 } ?>  
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Produk</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="Stok">Tersedia</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Sub Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i=0;
							foreach ($this->cart->contents() as $items) : 
							$i++;
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="<?php echo base_url('uploads/img/'.$items['options']['foto_produk'])?>" height="120px" width="120px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><?= $items['name'] ?> </h4>
								<p><?= $items['id'] ?> </p>
							</td>
							<td class="cart_price">
								<p><?= currency_format($items['price'],0,',','.') ?></p>
							</td>
							<td class="Stok">
								<p><?= $items['options']['stok_produk'] ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								<form method="post" action="<?php echo base_url('frontendc/update_qty/'.$items['rowid'])?>">
									<input type="hidden" name="stok_produk" value="<?= $items['options']['stok_produk'] ?>">
									<input class="cart_quantity_input" type="text" name="qty" value="<?= $items['qty'] ?>" autocomplete="off" size="2">
									<button type='submit' class="cart_quantity_down"> + </button>
								</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?= currency_format($items['subtotal'],0,',','.') ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url('frontendc/delete_qty/'.$items['rowid'])?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<?php if ($this->session->userdata('login_status') == TRUE) { ?>
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3></h3>
				<p></p>
			</div>
			<div class="row">

				<div class="col-sm-12">
					<div class="total_area">
						<form method="post" action="<?php echo base_url('frontendc/proses_pembelian')?>">
						<ul>
							<li class="single_field">
								<label>Pilih Kurir:</label>
								<select name="id_kurir" required>
									<option value="">Pilih Kurir</option>
									<option value="KR-0001">JNE</option>
									<option value="KR-0002">Pos</option>
								</select>								
							</li>
							<li>Total Harga <span><?= currency_format($this->cart->total(),0,',','.'); ?></span></li>
						</ul>
						<button type="submit" class="btn btn-default update" href="">Pesan Sekarang</button>
						<a href="<?php echo base_url('frontendc/bersihkan_keranjang')?>" class="btn btn-default check_out" href="">Batalkan dan bersihkan keranjang
						</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->	
	<?php } ?>
