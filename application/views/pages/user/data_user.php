            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $formTitle?>
                            <div class="btn-group pull-right">
                                <a href="<?php echo site_url('userc/manage_data_user');?>"  type="button" >
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
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Telpon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    if(isset($data_user)){
                                        foreach($data_user as $row){
                                            ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->id_user; ?></td>
                                            <td><?php echo $row->nm_user; ?></td>
                                            <td><?php echo $row->username; ?></td>
                                            <td><?php echo $row->email_user; ?></td>
                                            <td><?php echo $row->alamt_user; ?></td>
                                            <td><?php echo $row->notelp_user; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('userc/manage_data_user/'.$row->id_user);?>" class="btn btn-warning btn-round btn-xs"> <i class="icon-pencil"></i> Ubah</a>
                                                <a href="<?php echo base_url('userc/proses_hapus_user/'.$row->id_user);?>" class="btn btn-danger btn-round btn-xs"  onclick="return confirm('Anda yakin ingin menghapus ?')"> <i class="icon-trash"></i> Hapus</a>
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
