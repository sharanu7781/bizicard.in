<?php $this->load->view('layouts/root/header.php'); ?>

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
                                <h4 class="text-muted font-size-18 mb-3 text-center">Set New Password</h4>
                                <?php 
                                    if(isset($user_data) && empty($user_data->id)) {
                                        $message = "";
                                        if($user_data == "TOKEN_EXPIRE") 
                                            $message = "Token is expired, please reset password again";
                                        else if($user_data == "INVALID_TOKEN")
                                            $message = "Invalid token received, please check reset password link";

                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php 
                                            echo $message;                                         
                                            exit();?>
                                        </div>
                                <?php } ?>
                                <form class="form-horizontal mt-4" method="POST" action="<?php echo base_url();?>password/save_reset_password">
                                    <input type="hidden" name="user_id" value="<?php echo (isset($user_data) && !empty($user_data->id)) ? base64_encode($user_data->id):"";?>" />
                                    <input type="hidden" name="encrypted_token_email" value="<?php echo $encrypted_token_email;?>" />
                                    
                                    <div class="form-group">
                                        <label for="useremail">New Password</label>
                                        <input type="password" required name="password" class="form-control" id="password" placeholder="New Password" onfocusout="return check_confirm_password();">
                                    </div>
                                    <div class="form-group">
                                        <label for="useremail">Confirm Password</label>
                                        <input type="password" required name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" onkeyup="return check_confirm_password();">
                                        <span id="confirm_password_error"></span>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" id="submit" type="submit">Reset Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('layouts/root/footer.php'); ?>
<script>
    function check_confirm_password() {
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

        if(password!='' && confirm_password!=''){
            if(password != confirm_password) {
                $("#confirm_password_error").attr("style","color:red");
                $("#confirm_password_error").html("Confirm Password mismatch");
                $("#submit").attr("disabled", "true");
            } else {
                $("#confirm_password_error").attr("style","color:green");
                $("#confirm_password_error").html("Password Matched");
                $("#submit").removeAttr("disabled");
            }
        }

        if($("#exist_error").html() == "Email ID exist"){
            $("#submit").attr("disabled", "true");
        }
    }
</script>