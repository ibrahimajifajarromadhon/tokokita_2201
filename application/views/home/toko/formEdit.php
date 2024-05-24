<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Edit Toko</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <form name="sentMessage" action="<?php echo site_url('toko/update');?>" method="post" enctype="multipart/form-data">
                    <?php echo form_open_multipart('toko/update/'. $toko->idToko); ?>    
                    <?php echo form_error('namaToko'); ?>    
                        <div class="control-group">
                            <label for="namaToko">Nama Toko</label>
                            <input type="text" class="form-control" name="namaToko" id="namaToko" placeholder="Nama Toko"
                            value="<?php echo $toko->namaToko; ?>"/>
                        </div>
                        <?php echo form_error('logo'); ?>
                        <div class="control-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" placeholder="Logo Toko"
                            value="<?php echo $toko->logo; ?>"/>
                            <img src="<?php echo base_url('assets/logo_toko/' . $toko->logo); ?>" width="150" height="110">
                        </div>
                        <?php echo form_error('deskripsi'); ?>
                        <div class="control-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" rows="6" name="deskripsi" id="deskripsi" placeholder="Deskripsi"
                            ><?php echo $toko->deskripsi; ?></textarea>
                        </div>
                        <input type="hidden" id="idToko" name="idToko" value="<?php echo $toko->idToko ?>">
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>