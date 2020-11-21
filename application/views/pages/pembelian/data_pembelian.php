            <div class="row">
                <div class="col-lg-12">
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
