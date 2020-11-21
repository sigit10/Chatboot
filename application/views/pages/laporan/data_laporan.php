            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cari Pembelian Berdasarkan Bulan
                        </div>
                        <div class="panel-body">
                            <form  method="post" enctype= "multipart/form-data" action="<?php echo site_url('laporanc/data_laporan')?>" class="form-horizontal" id="popup-validation">
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <select class="form-control" name="bulan">
                                            <option value="">Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Febuari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select> 
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control" name="tahun">
                                            <option value="">tahun</option>
                                            <option value="2017">2017</option>
                                        </select> 
                                    </div>
                                    <div class="col-lg-3">
                                        <select class="form-control" name="status">
                                            <option value="">Pilih Status</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Bayar">Bayar</option>
                                            <option value="Selesai">Selesai</option>
                                        </select> 
                                    </div>
                                    <div class="col-lg-1">
                                        <button type ="submit" class="btn btn-default btn-round">Cari</button>
                                    </div>
                                </div>
                            </form>                            
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $formTitle?>
                            <div class="btn-group pull-right">
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>ID</td>
                                            <td>Nama</td>
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
                                                foreach($data_pembelian  as $row){
                                                    ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $row->id_pembelian; ?></td>
                                                    <td><?php echo $row->nm_user; ?></td>
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
                    </div>
                </div>
            </div>
