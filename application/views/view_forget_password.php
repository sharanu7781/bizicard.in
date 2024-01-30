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
                                <h4 class="text-muted font-size-18 mb-3 text-center">Reset Password</h4>
                                <div class="alert alert-info" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>
                                <form class="form-horizontal mt-4" method="POST" action="<?php echo base_url();?>signup/submit_forget_password_request">

                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <input type="email" required name="email_id" class="form-control" id="email_id" placeholder="Enter email" onkeyup="return validate_email_exists();">
                                        <span id="exist_error"></span>
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
    function validate_email_exists(){
        var useremail = $("#email_id").val();

        $.ajax({
            url:'<?php echo base_url();?>signup/check_forget_password_email_exists',
            type:'POST',
            data:{email_id:useremail},
            success:function(data) {
                var data = $.trim(data);
                if(data == "false") {                    
                    $("#exist_error").attr("style","color:red");
                    $("#exist_error").html("Email ID does not exist");
                    $("#submit").attr("disabled", "true");
                } else {
                    $("#exist_error").attr("style","color:green");
                    $("#exist_error").html("");
                    $("#submit").removeAttr("disabled");
                }
            }
        });
    }
</script>