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
                                        <tr class="cart_menu">
                                            <td>No</td>
                                            <td>Produk</td>
                                            <td>Jumlah</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        if(isset($data_pembelian)){
                                            foreach($data_pembelian as $row){
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
                    </div>
                </div>
            </div>
