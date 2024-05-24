<div class="container-fluid pt-5">
  <div class="text-center mb-4s">
      <h2 class="section-title px-5"><span class="px-2">Edit Profil Member</span></h2>
  </div>
  <div class="row px-xl-5">
    <div class="col-lg-12 mb-5">
      <form action="<?php echo site_url('EditProfilMember/save');?>" method="post" enctype="multipart/form-data">
        <div class="control-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username"
             data-validation-required-message="Please enter your Username" value="<?php echo $member->username; ?>" />
          <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="******"
             data-validation-required-message="Please enter your Password" />
          <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
          <label for="namaKonsumen">Nama Konsumen</label>
          <input type="text" class="form-control" name="namaKonsumen" id="namaKonsumen" placeholder="Nama Konsumen"
             data-validation-required-message="Please enter your Name" value="<?php echo $member->namaKonsumen; ?>" />
          <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
          <label for="alamat">Alamat</label>
          <textarea class="form-control" rows="6" name="alamat" id="alamat" placeholder="Alamat"
            data-validation-required-message="Please enter your Alamat"><?php echo $member->alamat; ?></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email"
             data-validation-required-message="Please enter your Email" value="<?php echo $member->email; ?>" />
          <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
          <label for="telepon">Telepon</label>
          <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon"
             data-validation-required-message="Please enter your Telepon" value="<?php echo $member->telepon; ?>" />
          <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
          <label></label>
          <input type="hidden" class="form-control" name="statusAktif" value="Y">
        </div>
        <div>
          <button class="btn btn-primary py-2 px-4 mb-4" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>