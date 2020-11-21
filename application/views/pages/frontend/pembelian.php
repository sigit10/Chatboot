	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url('')?>">Home</a></li>
				  <li class="active">Pembelian</li>
				</ol>
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
							<td>Aksi</td>
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
                                    <td>
                                        <a href="<?php echo base_url('frontendc/detail_pembelian/'.$row->id_pembelian);?>" class="btn btn-warning btn-round btn-xs"> <i class="icon-pencil"></i> Detail</a>
                                    </td>
                                </tr>
                                <?php }
                                }
                            ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->