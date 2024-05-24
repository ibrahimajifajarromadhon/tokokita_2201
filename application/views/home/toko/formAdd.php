<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Form Tambah Toko</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <form action="<?php echo base_url('index.php/toko/save'); ?>" method="post" enctype="multipart/form-data">   
                    <?php echo form_error('namaToko'); ?>    
                        <div class="control-group">
                            <label for="namaToko">Nama Toko</label>
                            <input type="text" class="form-control" name="namaToko" id="namaToko" placeholder="Nama Toko"
                               />
                        </div>
                        <?php echo form_error('logo'); ?>
                        <div class="control-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo Toko"
                                />
                        </div>
                        <?php echo form_error('deskripsi'); ?>
                        <div class="control-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" rows="6" name="deskripsi" id="deskripsi" placeholder="Deskripsi"
                                ></textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>