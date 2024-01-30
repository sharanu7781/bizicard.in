<?php $this->load->view('layouts/service_header'); ?>

    <div class="account-pages pt-sm-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-10 col-xl-10">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="javascript:void(0)" class="logo logo-admin"><img src="<?php echo $user_data->co_logo_path;?>" height="60" alt="<?php echo $user_data->display_name;?>"></a>
                            </h3>
                            <div class="row">
                                <div class=" col-lg-4"></div>
                                <div class=" col-lg-4"></div>
                                <div class=" col-lg-4"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <?php if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="success"){ ?>
                                            <div class="alert alert-success" role="alert">
                                            Payment is successful, please check your inbox for more detailed information.
                                            </div>
                                        <?php }
                                            $this->session->set_flashdata("message", ""); 
                                        ?>

                                        <form class="form-horizontal mt-4" autocomplete="off" action="<?php echo base_url();?>service_booking/initiate_payment_request" method="POST">  
                                                <div class="card-body">
                                                    <input type="hidden" name="USER_ID" value="<?php echo $USER_ID;?>" class="form-control user_id"/>
                                                    <input type="hidden" name="USER_EMAIL" value="<?php echo $USER_EMAIL;?>" class="form-control "/>
                                                    <input type="hidden" name="CARD_USER_NAME" value="<?php echo $CARD_USER_NAME;?>" class="form-control "/>
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-2"> </div>
                                                        <div class="col-lg-8 col-md-8">  
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">   
                                                                    <label class="label">Add you details here so we can contact you and share details of booking through Email</label>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">   
                                                                    <div class="form-group">
                                                                        <label class="label">Name<span class="required">*</span></label>
                                                                        <input type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required class="form-control" placeholder="Enter your name" name="SITE_USER_NAME"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="label">Mobile Number<span class="required">*</span></label>
                                                                        <input type="text" maxlength="10" required class="form-control" placeholder="Enter your mobile number" name="SITE_MOBILE_NUMBER" onkeypress="$(this).val($(this).val().replace(/[^\d]/ig, ''))"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="label">Email Address<span class="required">*</span></label>
                                                                        <input type="email" required class="form-control email" placeholder="Enter your email address" name="SITE_EMAIL_ID" onfocusout="return validate_email();"/>
                                                                        <span id="exist_error"></span>
                                                                    </div>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-lg-2 col-md-2"> </div>
                                                    </div> <hr/>
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-2"> </div>
                                                        <div class="col-lg-8 col-md-8">   
                                                        <div class="row">
                                                                <div class="col-lg-12 col-md-12">   
                                                                    <label class="label">Select service as per your choice and make payment on next page. You will receive details over email.</label>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12">   
                                                                    <div class="form-group">
                                                                        <label class="label">Select Service<span class="required">*</span></label>
                                                                        <select class="form-control select_service" name="SELECT_SERVICE" required>
                                                                            <?php if(isset($service_booking_data) && $service_booking_data!=false && !empty($service_booking_data)) { ?>
                                                                                <option value="">Select Service</option>
                                                                                <?php 
                                                                                    foreach($service_booking_data as $service_row) { ?>
                                                                                        <option value="<?php echo $service_row->SERVICE;?>"><?php echo $service_row->SERVICE;?></option>
                                                                                    <?php } ?>
                                                                            <?php } else { ?>
                                                                                <option value="">No services available for the user</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <input type="hidden" name="SELECTED_SERVICE_TEXT" id="SELECTED_SERVICE_TEXT" value="" />
                                                                    </div>
                                                                    <div class="form-group select_timing">
                                                                        
                                                                    </div>
                                                                    <div class="form-group select_date" hidden>
                                                                        <label class="label">Select Date<span class="required">*</span></label>
                                                                        <input type="date" required min="<?php echo date("Y-m-d");?>" class="form-control SERVICE_DATE" name="SERVICE_DATE" />
                                                                    </div>
                                                                    <div class="form-group select_slot" hidden>
                                                                        <label class="label">Select Time Slot<span class="required">*<br/>(You can not book slot before 30 minutes from current time)</span></label>
                                                                        <select class="form-control SERVICE_SLOT" name="SERVICE_SLOT" required></select>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-lg-2 col-md-2"> </div>
                                                    </div>
                                                

                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-2"> </div>
                                                        <div class="col-lg-8 col-md-8">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button" id="">
                                                                Submit 
                                                            </button>
                                                            <button type="button" class="btn btn-secondary waves-effect cancel_button">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2"> </div>
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
            </div>
        </div>
    </div>

<?php $this->load->view('layouts/root/footer.php'); ?>
<script>
    //ON click of Cancel button close the current tab to go back to bizicard user's card
    $(".cancel_button").click(function(){
        window.close();
    });

    //On change of service, load timing set by user
    $(".select_service").change(function(){
        var service_id = $(".select_service").val();
        var service_text = $(".select_service option:selected").text();
        
        $("#SELECTED_SERVICE_TEXT").val(service_text);
        var user_id = $(".user_id").val();

        $.ajax({
            url:"<?php echo base_url()?>service_booking/get_timings_for_service",
            type:"POST",
            dataType: "text",
            data:{service_id:service_id, user_id:user_id},
            success:function(data){
                $(".select_timing").html(data);
            },
        });
        /*  */
    });

    //On date selection load slots according to duration selected by user
    $(".SERVICE_DATE").change(function(){
        var date = $(this).val();
        var user_id = $(".user_id").val();
        var time_duration = $('input[name="SERVICE_TIMING"]:checked').val();//$(".SERVICE_TIMING :checked").val();
        $.ajax({
            url:"<?php echo base_url()?>service_booking/get_slots_for_date",
            type:"POST",
            dataType: "text",
            data:{date:date, user_id:user_id, time_duration:time_duration},
            success:function(data){
                $(".select_slot").removeAttr("hidden");
                $(".SERVICE_SLOT").html(data);
            },
        });
    });

    //On selection of duration, show price for that service and time
    function SHOW_PRICE(price, selected_service_id) {
        $(".select_date").removeAttr("hidden");
        $(".select_timing_span").html("<span class='rupee_symbol'>Price for the selected service - &#x20B9;"+price+"</span>");
        $("#SERVICE_PRICE").val(price);
        $("#SELECTED_SERVICE_ID").val(selected_service_id);

        //Get the time slots too if date is already selected
        var date = $(".SERVICE_DATE").val();
        if(date != '') {
            var user_id = $(".user_id").val();
            var time_duration = $('input[name="SERVICE_TIMING"]:checked').val();//$(".SERVICE_TIMING :checked").val();
            $.ajax({
                url:"<?php echo base_url()?>service_booking/get_slots_for_date",
                type:"POST",
                dataType: "text",
                data:{date:date, user_id:user_id, time_duration:time_duration},
                success:function(data){
                    $(".select_slot").removeAttr("hidden");
                    $(".SERVICE_SLOT").html(data);
                },
            });
        }
    }

    //Validate email format
    function validate_email() {
        var useremail = $(".email").val();

        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
        var emailaddressVal = useremail;
        
        if(emailaddressVal == '') {
            $("#exist_error").attr("style","color:red");
            $("#exist_error").html('Please enter your email address.');
            $(".submit_button").attr("disabled", "true");
            return false;
        } else if(!emailReg.test(emailaddressVal)) {
            $("#exist_error").attr("style","color:red");
            $("#exist_error").html('Enter a valid email address');
            $(".submit_button").attr("disabled", "true");
            hasError = true;
            return false;
        } else {
            $("#exist_error").removeAttr("style","color:red");
            $("#exist_error").html(null);
            $(".submit_button").removeAttr("disabled");
            hasError = false;
            return true;
        }
    }
</script>