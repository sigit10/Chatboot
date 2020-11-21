	<section id="do_action">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url('')?>">Home</a></li>
				  <li class="active">Pembelian</li>
				</ol>
			</div>
            <?php
            if(isset($data_pembelian)){
                foreach($data_pembelian	 as $row){
            ?>
			<?php if ($row->status_pembelian == 'Proses') { ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<form method="post" action="<?php echo base_url('frontendc/proses_pembayaran')?>" enctype= "multipart/form-data"  class="form-horizontal">
						<ul>
							<li class="single_field">
								<label>Upload Bukti:</label>
								<input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian; ?>">
								<input type="file" name="foto_transfer">
							</li>
						</ul>
						<ul>
							<li class="single_field">
								<label>Silahkan Transfer ke Rekening Berikut : </label><br><hr>
								<label>1. BRI : 00292029202202 </label><br>
								<label>2. BCA : 00294324324342 </label><br>
								<label>3. Mandiri : 32131232323123 </label><br>
							</li>
						</ul>
						<button type="submit" class="btn btn-default update" href="">Upload Bukti</button>
						</form>
					</div>
				</div>
			</div>
			<?php } elseif ($row->status_pembelian == 'Bayar') { ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<div align="center">
		                    <img src="<?php echo base_url('uploads/bukti/'.$row->foto_transfer)?>" height="100%" width="50%">
						</div><hr>
	                    <?php if ($this->session->userdata('LEVEL') == 'Admin') { ?>
							<form method="post" action="<?php echo base_url('frontendc/kirim_resi')?>" enctype= "multipart/form-data"  class="form-horizontal">
							<ul>
								<input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian; ?>">
								<div class="col-sm-3">
									<input type="text" name="no_resi" class="form-control" placeholder="Masukan no Resi">	
								</div>
							</ul>
							<button type="submit" class="btn btn-default">Simpan Resi</button>
							</form>
	                    <?php } ?>
					</div>
				</div>
			</div>
			<?php } elseif ($row->status_pembelian == 'Kirim') { ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<div align="center">
		                    <img src="<?php echo base_url('uploads/bukti/'.$row->foto_transfer)?>" height="100%" width="50%">
						</div>
	                    <?php if ($this->session->userdata('LEVEL') == 'Admin') { ?>
						<form method="post" action="<?php echo base_url('frontendc/terima_pembayaran/'.$id_pembelian)?>" enctype= "multipart/form-data"  class="form-horizontal">
						<div class="col-sm-3">
							<input type="text" name="no_resi" class="form-control" placeholder="Masukan no Resi">	
						</div>
						<div align="center">

							<input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian; ?>">
							<div class="col-sm-3">
								<input type="text" name="no_resi" class="form-control" placeholder="No resi : <?php echo $row->no_resi; ?>" disabled>	
							</div>
							<button class="btn btn-default update" href="">Selesai</button>
							<a class="btn btn-default " href="<?php echo base_url('laporanc/data_laporan')?>">kembali</a>
						</div>
						</form>
	                    <?php } ?>
					</div>
				</div>
			</div>
			<?php } elseif ($row->status_pembelian == 'Selesai') { ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<div align="center">
		                    <img src="<?php echo base_url('uploads/bukti/'.$row->foto_transfer)?>" height="100%" width="50%">
						</div><br><hr>
	                    <?php if ($this->session->userdata('LEVEL') == 'Admin') { ?>
						<form method="post" action="<?php echo base_url('frontendc/terima_pembayaran/'.$id_pembelian)?>" enctype= "multipart/form-data"  class="form-horizontal">
						<div align="center">
							<input type="hidden" name="id_pembelian" value="<?php echo $id_pembelian; ?>">
							<?php if ($row->status_pembelian == 'Bayar') { ?>
							<button type="submit" class="btn btn-default update" href="">Terima</button>
							<?php } else { ?>
							<div class="col-sm-3">
								<input type="text" name="no_resi" class="form-control" placeholder="No resi : <?php echo $row->no_resi; ?>" disabled>	
							</div>
							<a class="btn btn-default " href="<?php echo base_url('laporanc/data_laporan')?>">kembali</a>
							<?php }
							?>
						</div>
						</form>
	                    <?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>
            <?php }
	            }
	        ?>
		</div>
	</section><!--/#do_action-->	

	<section id="cart_items">
		<div class="container">
			<div class="heading">
				<h3></h3>
				<p></p>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td>No</td>
							<td>ID</td>
							<td>Kurir</td>
							<td>Tanggal</td>
							<td>Status</td>
							<td>Total</td>
						</tr>
					</thead>
					<tbody>
                        <?php
                        $no=1;
                        if(isset($data_pembelian)){
                            foreach($data_pembelian	 as $row){
                                ?>
                            <tr class="odd gradeX">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->id_pembelian; ?></td>
                                <td><?php echo $row->nm_kurir; ?></td>
                                <td><?php echo $row->tgl_pembelian; ?></td>
                                <td><?php echo $row->status_pembelian; ?></td>
                                <td><?php echo currency_format($row->total_pembelian); ?></td>
                            </tr>
                            <?php }
                            }
                        ?>
					</tbody>
				</table>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td>No</td>
							<td>Produk</td>
							<td>Jumlah</td>
						</tr>
					</thead>
					<tbody>
                        <?php
                        $no=1;
                        if(isset($detail_pembelian)){
                            foreach($detail_pembelian	 as $row){
                                ?>
                            <tr class="odd gradeX">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->nm_produk; ?></td>
                                <td><?php echo $row->jumlah_pembelian; ?></td>
                            </tr>
                            <?php }
                            }
                        ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->