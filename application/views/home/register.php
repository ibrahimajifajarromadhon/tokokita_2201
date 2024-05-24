<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Registrasi Member</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Registrasi Member</p>
            </div>
        </div>
</div>
<!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-1">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Registrasi Member</span></h2>
        </div>
        <div class="row px-xl-5 align-items-center justify-content-center">
            <div class="col-lg-7 mb-5" style="background-color:#edf1ff; position:center;">
                <div class="contact-form">
                    <div id="success"></div>
                    <?php 
                        if($this->session->flashdata('error') !=''){

					        echo '<div class="alert alert-danger" role="alert">';
					        echo $this->session->flashdata('error');
					        echo '</div>';
				        }
				    ?>
                    <form action="<?php echo base_url('index.php/main/register_aksi');?>" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                                required="required" data-validation-required-message="Please enter your Username" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                                required="required" data-validation-required-message="Please enter your Password" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="namaKonsumen">Nama Konsumen</label>
                            <input type="text" class="form-control" name="namaKonsumen" id="namaKonsumen" placeholder="Nama Konsumen"
                                required="required" data-validation-required-message="Please enter your Name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" rows="6" name="alamat" id="alamat" placeholder="Alamat"
                                required="required"
                                data-validation-required-message="Please enter your Alamat"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                required="required" data-validation-required-message="Please enter your Email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Telepon"
                                required="required" data-validation-required-message="Please enter your Telepon" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <label></label>
                            <input type="hidden" class="form-control" name="statusAktif" value="Y">
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4 mb-4" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->