                    <?php if (isset($id)) { ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-ok"></i></div>
                                    <h5><?php echo $formTitle?></h5>
                                </header>
                                <div id="collapse2" class="body collapse in">
                                    <form  method="post" action="<?php echo site_url('adminc/proses_data_admin')?>" class="form-horizontal" id="popup-validation">    
                                        <input type="hidden" name="id_user" value="<?php echo $id ?>">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">ID</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" value="<?php echo $id ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Nama</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="nm_user" id="nm_user" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Username </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="username" id="username" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Password</label>
                                            <div class=" col-lg-4">
                                                <input class="form-control" type="password" name="password" id="password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Confirm Password</label>
                                            <div class=" col-lg-4">
                                                <input class="validate[required,equals[password]] form-control" type="password" name="pass2"
                                                    id="pass2" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Email </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="email_user" id="email_user" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Alamat </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="alamt_user" id="alamt_user" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Telpon </label>
                                            <div class="col-lg-4">
                                                <input type="number" class="form-control" name="notelp_user" id="notelp_user" required>
                                            </div>
                                        </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <button type ="submit" class="btn btn-default btn-round">Simpan</button>
                                            <a href="<?php echo site_url('adminc/data_admin')?>" class="btn btn-default btn-round">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } else { ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-ok"></i></div>
                                    <h5><?php echo $formTitle?></h5>
                                </header>
                                <div id="collapse2" class="body collapse in">
                                    <form  method="post" action="<?php echo site_url('adminc/proses_data_admin')?>" class="form-horizontal" id="popup-validation">    
                                        <input type="hidden" name="id_level_user" value="lv001">
                                        <?php
                                        if (isset($data_admin)){
                                            foreach($data_admin as $row){
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row->id_user;?>">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">ID</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" value="<?php echo $row->id_user;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Nama</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="nm_user" id="nm_user" value="<?php echo $row->nm_user;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Username </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $row->username;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Password</label>
                                            <div class=" col-lg-4">
                                                <input class="form-control" type="text" name="password" id="password" / placeholder="Kosongkan Password Apabila tidak di Perbarui">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Email </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="email_user" id="email_user" value="<?php echo $row->email_user;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Alamat </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="alamt_user" id="alamt_user" value="<?php echo $row->alamt_user;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Telpon </label>
                                            <div class="col-lg-4">
                                                <input type="number" class="form-control" name="notelp_user" id="notelp_user" value="<?php echo $row->notelp_user;?>">
                                            </div>
                                        </div>
                                        <?php }
                                            }
                                        ?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <button type ="submit" class="btn btn-default btn-round">Simpan</button>
                                            <a href="<?php echo site_url('adminc/data_admin')?>" class="btn btn-default btn-round">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
