            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $formTitle?>
                            <div class="btn-group pull-right">
                                <a href="<?php echo site_url('produkc/manage_data_produk');?>"  type="button" >
                                    <i class="icon-plus-sign"></i> Tambah Data
                                </a>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    if(isset($data_produk)){
                                        foreach($data_produk as $row){
                                            ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->id_produk; ?></td>
                                            <td>
                                            <img src="<?php echo base_url('uploads/img/'.$row->foto_produk)?>" height="25px" width="50px">
                                            </td>
                                            <td><?php echo $row->nm_produk; ?></td>
                                            <td><?php echo $row->stok_produk; ?></td>
                                            <td><?php echo currency_format($row->harga_produk); ?></td>
                                            <td>
                                                <a href="<?php echo site_url('produkc/manage_data_produk/'.$row->id_produk);?>" class="btn btn-default btn-round"> Edit</button>
                                                <a href="<?php echo site_url('produkc/proses_hapus_produk/'.$row->id_produk);?>" class="btn btn-default btn-round"> Hapus</button>
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
