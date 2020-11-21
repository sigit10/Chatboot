                    <?php if (isset($id)) { ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-ok"></i></div>
                                    <h5><?php echo $formTitle?></h5>
                                </header>
                                <div id="collapse2" class="body collapse in">
                                    <form  method="post" action="<?php echo site_url('produkc/proses_data_produk')?>" enctype= "multipart/form-data"  class="form-horizontal" id="popup-validation">    
                                        <input type="hidden" name="id_produk" value="<?php echo $id ?>">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"></label>
                                            <div class="col-lg-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url('assets/admin/img/demoUpload.jpg')?>" alt="" /></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Ubah</span><input type="file" name="foto_produk" /></span>
                                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">ID</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="id_produk" value="<?php echo $id ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Produk</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="nm_produk" id="nm_produk">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Stok </label>
                                            <div class="col-lg-4">
                                                <input type="number" class="form-control" name="stok_produk">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Harga </label>
                                            <div class="col-lg-4">
                                                <input type="number" class="form-control" name="harga_produk">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Deskripsi </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="deskripsi_produk">
                                            </div>
                                        </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <button type ="submit" class="btn btn-default btn-round">Simpan</button>
                                            <a href="<?php echo site_url('produkc/data_produk')?>" class="btn btn-default btn-round">Kembali</a>
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
                                    <form  method="post" action="<?php echo site_url('produkc/proses_data_produk')?>" class="form-horizontal" id="popup-validation">    
                                        <input type="hidden" name="id_level_produk" value="lv001">
                                        <?php
                                        if (isset($data_produk)){
                                            foreach($data_produk as $row){
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $row->id_produk;?>">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"></label>
                                            <div class="col-lg-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url('uploads/img/'.$row->foto_produk)?>" alt="" /></div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">ID</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" value="<?php echo $row->id_produk;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Produk</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="nm_produk" id="nm_produk" value="<?php echo $row->nm_produk;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Stok </label>
                                            <div class="col-lg-4">
                                                <input type="number" class="form-control" name="stok_produk" value="<?php echo $row->stok_produk;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Harga </label>
                                            <div class="col-lg-4">
                                                <input type="number" class="form-control" name="harga_produk" value="<?php echo $row->harga_produk;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Deskripsi </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="deskripsi_produk" value="<?php echo $row->deskripsi_produk;?>">
                                            </div>
                                        </div>
                                        <?php }
                                            }
                                        ?>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <button type ="submit" class="btn btn-default btn-round">Simpan</button>
                                            <a href="<?php echo site_url('produkc/data_produk')?>" class="btn btn-default btn-round">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
