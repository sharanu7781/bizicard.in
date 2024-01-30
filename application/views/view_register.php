<?php $this->load->view('layouts/root/header'); ?>
<link href="<?php echo base_url();?>public/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
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
                            <h4 class="text-muted font-size-18 mb-1 text-center">Register for free.</h4>
                            <p class="text-muted text-center"><?php echo (!empty(validation_errors())) ? validation_errors() : $this->session->flashdata("message");?></p>
                            <form class="form-horizontal mt-4" autocomplete="off" action="<?php echo base_url();?>signup/register_user" method="POST">
                                <span id="exist_error"></span>
                                <div class="form-group">
                                    <label for="useremail">Email<span class="required">*</span></label>
                                    <input required type="email" autocomplete="off" class="form-control" value="<?php echo set_value("email_id");?>" name="email_id" id="useremail" placeholder="Enter email" onfocusout="return check_email_exists();">                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Name<span class="required">*</span></label>
                                    <input required type="text" autocomplete="off" class="form-control" value="<?php echo set_value("display_name");?>" name="display_name" id="username" placeholder="Enter Your Name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)">
                                </div>

                                <div class="form-group">
                                    <label class="">Mobile No.<span class="required">*</span></label><br/>
                                    <div class="form-group row">
                                        <div class="col col-lg-5 col-md-5">
                                            <select class="form-control select2" required name="telephone_country_code">
                                            <?php if(isset($country_data) && $country_data) { ?>
                                                <?php foreach($country_data as $country_row) {
                                                    
                                                    if($country_row->is_default=="Y")
                                                        $selected = "selected='selected'";
                                                    else if(!empty(set_value("telephone_country_code")) && set_value("telephone_country_code")==$country_row->contry_isd_code)
                                                        $selected= "selected='selected'";
                                                    else
                                                        $selected = "";
                                                    ?>
                                                    <option <?php echo $selected;?> value="<?php echo $country_row->contry_isd_code;?>"><?php echo "(+".$country_row->contry_isd_code.")". $country_row->contry_name;?></option>
                                                <?php } 
                                            } ?>
                                            </select>
                                            
                                        </div>
                                        <div class="col col-lg-7 col-md-7"> 
                                            <input required type="text" autocomplete="off" maxlength="10" minlength="4" class="form-control" value="<?php echo set_value("mobile_number");?>" name="mobile_number" id="usermobile" placeholder="Enter 10 digit Mobile No." onkeypress="$(this).val($(this).val().replace(/[^\d]/ig, ''))" onkeyup="return check_mobile_number_exists();">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  for="password">Password<span class="required">*</span></label>
                                    <input required type="password" autocomplete="off" class="form-control" value="<?php echo set_value("password");?>" name="password" id="password" placeholder="Enter Password" onfocusout="return check_confirm_password();">
                                </div>

                                <div class="form-group">
                                    <label  for="confirm_password">Confirm Password<span class="required">*</span></label>
                                    <input required type="password" autocomplete="off" class="form-control" value="" onkeyup="return check_confirm_password();" id="confirm_password" placeholder="Enter Confirm Password">
                                    <span id="confirm_password_error"></span>
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" id="submit" type="submit" name="submit_button">Register</button>
                                    </div>
                                </div>
                                <div class="mt-5 text-center">
                                    <p>Already have an account ? <a href="<?php echo base_url(); ?>login" class="text-primary"> Login </a> </p>

                                </div>
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-4">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>© <?php echo date('Y', strtotime('-2 years')) ?> - <?php echo date("Y"); ?> &nbsp Bizicard</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/root/footer'); ?>
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

        if($("#exist_error").html() == "Email ID exists"){
            $("#submit").attr("disabled", "true");
        }
    }
    /*function check_email_exists() {
        var useremail = $("#useremail").val();
        var usermobile = $("#usermobile").val();

        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
        var emailaddressVal = useremail;
        
        if(emailaddressVal == '') {
            $("#exist_error").attr("style","color:red");
            $("#exist_error").html('Please enter your email address.');
            $("#submit").attr("disabled", "true");
            return false;
        } else if(!emailReg.test(emailaddressVal)) {
            $("#exist_error").attr("style","color:red");
            $("#exist_error").html('Enter a valid email address');
            $("#submit").attr("disabled", "true");
            hasError = true;
            return false;
        } 

        $.ajax({
            url:'<?php echo base_url();?>signup/check_signup_email_exists',
            type:'POST',
            data:{useremail:useremail,usermobile:usermobile},
            success:function(data) {
                if($.trim(data) == "EXISTS") {
                    $("#exist_error").attr("style","color:red");
                    $("#exist_error").html("Email ID or Mobile Number already exists");
                    $("#submit").attr("disabled", "true");
                } else {
                    $("#exist_error").attr("style","color:green");
                    $("#exist_error").html("Email ID OR Mobile Number available");
                    $("#submit").removeAttr("disabled");
                }
            }
        });
    }

    function check_mobile_number_exists() {
        var useremail = $("#useremail").val();
        var usermobile = $("#usermobile").val();

        $.ajax({
            url:'<?php echo base_url();?>signup/check_signup_email_exists',
            type:'POST',
            data:{useremail:useremail,usermobile:usermobile},
            success:function(data) {
                if($.trim(data) == "EXISTS") {
                    $("#exist_error").attr("style","color:red");
                    $("#exist_error").html("Email ID or Mobile Number already exists");
                    $("#submit").attr("disabled", "true");
                } else {
                    $("#exist_error").attr("style","color:green");
                    $("#exist_error").html("Email ID OR Mobile Number available");
                    $("#submit").removeAttr("disabled");
                }
            }
        });
    }*/
    
    function check_email_exists() {
        var useremail = $("#useremail").val();
        var usermobile = $("#usermobile").val();

        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
        var emailaddressVal = useremail;
        
        if(emailaddressVal == '') {
            $("#exist_error").attr("style","color:red");
            $("#exist_error").html('Please enter your email address.');
            $("#submit").attr("disabled", "true");
            return false;
        } else if(!emailReg.test(emailaddressVal)) {
            $("#exist_error").attr("style","color:red");
            $("#exist_error").html('Enter a valid email address');
            $("#submit").attr("disabled", "true");
            hasError = true;
            return false;
        } else {
            $("#exist_error").attr("style","color:red");
            $("#exist_error").html("");
            if(usermobile!='' && usermobile.length == 10) {
                $("#exist_error").attr("style","color:red");
                $("#exist_error").html("");
                $.ajax({
                    url:'<?php echo base_url();?>signup/check_signup_email_exists',
                    type:'POST',
                    data:{useremail:useremail,usermobile:usermobile},
                    success:function(data) {
                        if($.trim(data) == "EXISTS") {
                            $("#exist_error").attr("style","color:red");
                            $("#exist_error").html("Email ID or Mobile Number already exists");
                            $("#submit").attr("disabled", "true");
                        } else {
                            $("#exist_error").attr("style","color:green");
                            $("#exist_error").html("Email ID OR Mobile Number available");
                            $("#submit").removeAttr("disabled");
                        }
                    }
                });
            } else if(usermobile!='') {
                $("#exist_error").attr("style","color:red");
                $("#exist_error").html('Please enter 10 digit mobile number.');
                $("#submit").attr("disabled", "true");
            }
        }
    }

    function check_mobile_number_exists() {
        var useremail = $("#useremail").val();
        var usermobile = $("#usermobile").val();
        if(usermobile!='' && usermobile.length == 10) {
            $("#exist_error").attr("style","color:red");
            $("#exist_error").html("");
            $.ajax({
                url:'<?php echo base_url();?>signup/check_signup_email_exists',
                type:'POST',
                data:{useremail:useremail,usermobile:usermobile},
                success:function(data) {
                    if($.trim(data) == "EXISTS") {
                        $("#exist_error").attr("style","color:red");
                        $("#exist_error").html("Email ID or Mobile Number already exists");
                        $("#submit").attr("disabled", "true");
                    } else {
                        $("#exist_error").attr("style","color:green");
                        $("#exist_error").html("Email ID OR Mobile Number available");
                        $("#submit").removeAttr("disabled");
                    }
                }
            });
        } else if(usermobile!=''){
            $("#exist_error").attr("style","color:red");
            $("#exist_error").html('Please enter 10 digit mobile number.');
            $("#submit").attr("disabled", "true");
        }
    }
</script>
<script src="<?php echo base_url();?>public/assets/libs/select2/js/select2.min.js"></script>
<script>
$(".select2").select2();
</script>