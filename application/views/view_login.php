<?php $this->load->view("layouts/root/header.php"); ?>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="<?php echo base_url();?>" class="logo logo-admin"><img src="<?php echo base_url();?>public/assets/images/bizicard-logo.png" height="60" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center">Sign in to continue with Bizicards</p>
                                <?php if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="success"){ ?>
                                    <!--<p class="text-muted text-center"><?php echo $this->session->flashdata("message");?></p>-->
                                    <div class="alert alert-success" role="alert">
                                        Reset Password link shared on mail. Please reset the password and login. Reset Password link is valid for 1 hour only.
                                    </div>
                                <?php } ?>
                                <?php if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="error_card"){ ?>
                                    <!--<p class="text-muted text-center"><?php echo $this->session->flashdata("message");?></p>-->
                                    <div class="alert alert-danger" role="alert">
                                        No data available for this username. Kindly contact website Administrator
                                    </div>
                                <?php } ?>
                                <?php if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="error_password"){ ?>
                                    <!--<p class="text-muted text-center"><?php echo $this->session->flashdata("message");?></p>-->
                                    <div class="alert alert-danger" role="alert">
                                        Something went wrong, please try again later!!!
                                    </div>
                                <?php } ?>
                                <?php if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="error_login"){ ?>
                                    <!--<p class="text-muted text-center"><?php echo $this->session->flashdata("message");?></p>-->
                                    <div class="alert alert-danger" role="alert">
                                        Invalid login details!!!
                                    </div>
                                <?php } ?>
                                <?php if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="set_passwords"){ ?>
                                    <!--<p class="text-muted text-center"><?php echo $this->session->flashdata("message");?></p>-->
                                    <div class="alert alert-success" role="alert">
                                        Password updated successfully. Please login
                                    </div>
                                <?php } ?>
                                <?php if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="success_registration"){ ?>
                                    <div class="alert alert-success" role="alert">
                                        Sign up successful. Login to continue.
                                    </div>
                                <?php } 
                                $this->session->set_flashdata("message", "");
                                ?>

                                <form class="custom-validation form-horizontal mt-4" action="<?php echo base_url();?>validate_login" method="POST">
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input type="text" name="username" class="form-control" id="username" required placeholder="Enter Email" value="<?php echo set_value('username'); ?>">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" required placeholder="Enter password">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <!--<input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Remember me
                                                </label>-->
                                            </div>
                                            
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="<?php echo base_url();?>signup/forget_password" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="row">
                                            <div class="col-4 mt-4">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                            <div class="col-8 mt-4">
                                                <a href="<?php echo base_url();?>signup/register" class="btn btn-primary w-md waves-effect waves-light" type="submit">Sign Up for free</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-4" style="border: 1px solid #cdcdcd;">
                                        <div class="col-lg-6">
                                            <label for="userpassword"><br/>Sign in with</label>
                                        </div>
                                    <div>
                                    <div class="form-group row mt-4">
                                        <div class="col-lg-12">
                                            <div class="button-items">
                                                <a href="<?php echo $this->google_client->createAuthUrl();?>" class="btn btn-light waves-effect"><img src="<?php echo base_url();?>public/assets/images/google_icon.png" />Google</a>

                                                <!--<a href="" class="btn btn-light waves-effect"><img src="<?php echo base_url();?>public/assets/images/linkedin_icon.png" />Linkedin</a>

                                                <a href="" class="btn btn-light waves-effect"><img src="<?php echo base_url();?>public/assets/images/facebook_icon.png" />Facebook</a>-->

                                            </div>
                                        </div>
                                    </div>    
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--<div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="pages-register.php" class="text-primary"> Signup Now </a></p>
                        <p>© <?php echo date('Y', strtotime('-2 years')) ?> - <?php echo date("Y"); ?> Lexa. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- END layout-wrapper -->
             
    <!-- Rightbar -->
    <?php $this->load->view("layouts/rightbar.php"); ?>

    <!-- FooterScript -->
    <?php $this->load->view("layouts/footerScript.php"); ?>


    <script src="<?php echo base_url();?>public/assets/libs/parsleyjs/parsley.min.js"></script>

    <script src="<?php echo base_url();?>public/assets/js/pages/form-validation.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url();?>public/assets/js/app.js"></script>
