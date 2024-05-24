<!-- Contact Start -->
<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Member Login</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-4 mb-5 p-2"></div>
            <div class="col-lg-4 mb-5 p-2" style="background-color:#edf1ff;">
                <div class="contact-form">
                <div id="success"></div>

                <form action="<?php echo site_url('main/login_aksi');?>" method="post" enctype="multipart/form-data">
                    <?php if(isset($error_message)) { ?> 
                        <?php echo $error_message; ?>
                    <?php } ?>

                    <?php echo form_error('username'); ?>
                    <?php echo form_error('password'); ?>  
                          
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username...">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password....">
                        </div>
                        <button type="submit" class="btn btn-primary py-2 px-4">Login</button>
                </form>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
            </div>
        </div>
    </div>
<!-- Contact End -->