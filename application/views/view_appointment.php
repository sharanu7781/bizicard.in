<!-- Header -->
<?php $this->load->view("layouts/header.php"); ?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<style>
    .profile_image {border-radius: 50%;}
    .checkout-wrapper{padding-top: 40px; padding-bottom:40px; background-color: #fafbfa;}
.checkout{    background-color: #fff;
    border:1px solid #eaefe9;
     
    font-size: 14px;}
.panel{margin-bottom: 0px;}
.checkout-step {
     
    border-top: 1px solid #f2f2f2;
    color: #666;
    font-size: 14px;
    padding: 30px;
    position: relative;
}

.checkout-step-number {
    border-radius: 50%;
    border: 1px solid #666;
    display: inline-block;
    font-size: 12px;
    height: 32px;
    margin-right: 26px;
    padding: 6px;
    text-align: center;
    width: 32px;
}
.checkout-step-title{ font-size: 18px;
    font-weight: 500;
    vertical-align: middle;display: inline-block; margin: 0px;
     }
 
.checout-address-step{}
.checout-address-step .form-group{margin-bottom: 18px;display: inline-block;
    width: 100%;}

.checkout-step-body{padding-left: 60px; padding-top: 30px;}

.checkout-step-active{display: block;}
.checkout-step-disabled{display: none;}

.checkout-login{}
.login-phone{display: inline-block;}
.login-phone:after {
    content: '+91 - ';
    font-size: 14px;
    left: 36px;
}
.login-phone:before {
    content: "";
    font-style: normal;
    color: #333;
    font-size: 18px;
    left: 12px;
        display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.login-phone:after, .login-phone:before {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}
.login-phone .form-control {
    padding-left: 68px;
    font-size: 14px;
    
}
.checkout-login .btn{height: 42px;     line-height: 1.8;}
 
.otp-verifaction{margin-top: 30px;}
.checkout-sidebar{background-color: #fff;
    border:1px solid #eaefe9; padding: 30px; margin-bottom: 30px;}
.checkout-sidebar-merchant-box{background-color: #fff;
    border:1px solid #eaefe9; margin-bottom: 30px;}
.checkout-total{border-bottom: 1px solid #eaefe9; padding-bottom: 10px;margin-bottom: 10px; }
.checkout-invoice{display: inline-block;
    width: 100%;}
.checout-invoice-title{    float: left; color: #30322f;}
.checout-invoice-price{    float: right; color: #30322f;}
.checkout-charges{display: inline-block;
    width: 100%;}
.checout-charges-title{float: left; }
.checout-charges-price{float: right;}
.charges-free{color: #43b02a; font-weight: 600;}
.checkout-payable{display: inline-block;
    width: 100%; color: #333;}
.checkout-payable-title{float: left; }
.checkout-payable-price{float: right;}

.checkout-cart-merchant-box{ padding: 20px;display: inline-block;width: 100%; border-bottom: 1px solid #eaefe9;
 padding-bottom: 20px; }
.checkout-cart-merchant-name{color: #30322f; float: left;}
.checkout-cart-merchant-item{ float: right; color: #30322f; }
.checkout-cart-products{}

.checkout-cart-products .checkout-charges{ padding: 10px 20px;
    color: #333;}
.checkout-cart-item{ border-bottom: 1px solid #eaefe9;
    box-sizing: border-box;
    display: table;
    font-size: 12px;
    padding: 22px 20px;
    width: 100%;}
 .checkout-item-list{}
.checkout-item-count{ float: left; }
.checkout-item-img{width: 60px; float: left;}
.checkout-item-name-box{ float: left; }
.checkout-item-title{ color: #30322f; font-size: 14px;  }
.checkout-item-unit{  }
.checkout-item-price{float: right;color: #30322f; font-size: 14px; font-weight: 600;}


.checkout-viewmore-btn{padding: 10px; text-align: center;}

.header-checkout-item{text-align: right; padding-top: 20px;}
.checkout-promise-item {
    background-repeat: no-repeat;
    background-size: 14px;
    display: inline-block;
    margin-left: 20px;
    padding-left: 24px;
    color: #30322f;
}
.checkout-promise-item i{padding-right: 10px;color: #43b02a;}

/* img {
    vertical-align: middle;
  width: 80px;
  height: 60; 
  border-radius: 50%;
} */
</style>   
<!-- hederStyle -->
<?php $this->load->view("layouts/headerStyle.php"); ?>
<?php $this->load->view("layouts/headerStyle.php"); ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Topbar -->
        <!-- Sidebar -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <?php foreach ($user_data as $row) {} ?> -->
                            <form action="<?php echo base_url('profile_management/save_slot_book_appointment_details'); ?>" method="POST" id="slot_booking_details">
                                <input type="hidden" id="mentor_id" name="MENTOR_ID" value="" />
                                <input type="hidden" name="HIDDEN_DURATION" id="hidden_duration" value="" />
                                <div class="container">
                                    <div class="row align-items-center">
                                    <div class="container">
                                        <div class="row">
                                            <div class="row ml-5">
                                                <div class="form-group row col-lg-4 col-xs-5 col-md-5">
                                                    <div class="row col-md-12">
                                                        <img class="rounded-circle" src="<?php echo (isset($row->PROFILE_IMAGE_PATH) && !empty($row->PROFILE_IMAGE_PATH)) ? base_url() . $row->PROFILE_IMAGE_PATH:base_url()."public/assets/images/users/avatar_user.png"; ?>" alt="Mentor Image" width="100px" height="100px" id="profile_image">
                                                    </div>
                                                    <div class="row col-md-12">                                                        
                                                    </div>
                                                </div>
                                            
                                                <div class="form-group row col-lg-8 col-xs-7 col-md-7">
                                                    <div class="row col-md-12">                                                       
                                                                                                        
                                                    </div>                                                    
                                                </div>
                                            </div>               
                                            <div class="col-md-12 mt-5">
                                            
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                            <div id="accordion" class="checkout">
                                                                <div class="panel checkout-step">
                                                                    <div> <span class="checkout-step-number">1</span>
                                                                        <h4 class="checkout-step-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Select Slot</a></h4>
                                                                    </div>
                                                                    <div id="collapseOne" class="collapse in">
                                                                        <!-- <div class="checkout-step-body"> -->
                                                                        
                                                                            <div class="row">
                                                                                <div class="col-lg-8">
                                                                                    <div class="checkout-login">
                                                                                       
                                                                                        <div id="test-lv-1" class="content">
                                                                                                <div class="row"></div>
                                                                                                <div class="row">
                                                                                                    <div class="form-group col-md-6 col-lg-6">
                                                                                                        <div class="col-md-12 col-lg-12">
                                                                                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                                <button type="button" class="btn btn-outline-primary duration_button" value="30">30 MINS</button><br />
                                                                                                                <button type="button" class="btn btn-outline-primary duration_button" value="60">60 MINS</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="form-group col-md-12 col-lg-12">
                                                                                                        <div class="col-md-12 col-lg-12">
                                                                                                            <div class="input-group">
                                                                                                                <div class="col-md-6 col-lg-6">
                                                                                                                    <input name="DATE_SELECTED" class="form-control datepicker" min="<?php echo date("Y-m-d");?>" placeholder="Select Date" type="date" value="" id="example-date-input">
                                                                                                                </div>

                                                                                                                <div class="col-md-6 col-lg-6">
                                                                                                                    <select name="SLOT_SELECTED" class="form-control dynamic_slots_details"></select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="form-group col-md-6 col-lg-6">
                                                                                                        <div class="col-md-12 col-lg-12">
                                                                                                            <div class="input-group">
                                                                                                                <div class="col-md-6 col-lg-6">
                                                                                                                    <a class="col-lg-12  btn btn-default" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="background-color:#ef8354"> Next </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            
                                                                                            </div>
                                                                                    <!-- </div> -->
                                                                                    <!-- /input-group -->
                                                                                </div>
                                                                                <!-- /.col-lg-6 -->
                                                                            </div>
                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                              
                                                                
                                                                <div class="panel checkout-step">
                                                                    <div role="tab" id="headingThree"> <span class="checkout-step-number">3</span>
                                                                        <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"  > Make Payment </a> </h4>
                                                                    </div>
                                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                                        <!-- <div class="checkout-step-body"> -->
                                                                            <div class="col-md-6col-lg-12">
                                                                                <div class="card">    
                                                                                    <div class="card-body">
                                                                                        
                                                                                        <label class="col-lg-12 col-md-6">The meeting is set up on <span class="date_of_booking"></span> at <span class="time_of_booking"></span></label><br/>
                                                                                        <label class="col-lg-12 col-md-6">The meentees will be mentored by <?php echo $row->USER_FULL_NAME; ?> for <span class="duration_of_booking"></span> minutes</label><br/>
                                                                                        <label class="col-lg-12 col-md-6">The mentees to the meeting will be <?php echo $this->session->userdata("EMAIL_ID");?>,<span class="mentees_list"></span></label>                                    
                                                                                    
                                                                                        <button class="btn btn-primary make_payment_submit" type="submit" style="background-color:#ef8354" onclick="return check_payment_details_required();">Make Payment</button>
                                                                                           
                                                                                        
                                                                                        <div id="make_payment_popup" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title mt-0" id="myModalLabel">Preview</h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                                    </div>
                                                                                                    <div class="modal-body ">                                                
                                                                                                        <div class="col-sm-12 select_mentor">
                                                                                                            <div class="col-md-12">
                                                                                                                <div class="card directory-card">
                                                                                                                    <div>
                                                                                                                        <div class="directory-content text-center p-4">         
                                                                                                                            <h5 class="font-size-16">Final Amount - <span class="final_amount"></span></h5>
                                                                                                                            <h5 class="font-size-16">Mentor Fee - <span class="final_amount"></span></h5>
                                                                                                                            <h5 class="font-size-16">Slot processing fee - <span class="final_amount"></span></h5>
                                                                                                                            <h5 class="font-size-16">GST - <span class="final_amount"></span></h5>
                                                                                                                            <h5 class="font-size-16">Total Amount - <span class="final_amount"></span></h5>         
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>        
                                                                                                    
                                                                                                    </div>                 
                                                                                                </div>
                                                                                                <!-- /.modal-content -->
                                                                                            </div>
                                                                                            <!-- /.modal-dialog -->
                                                                                        </div>                 
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <!--    </div> -->
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
                                </div>
                            </form>

                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <!-- Footer -->
                    <?php $this->load->view("layouts/footer.php"); ?>
                </div>
                <!-- end main content-->
            </div>
            <!-- END layout-wrapper -->
            <script src="<?php echo base_url(); ?>public/assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/jquery/jquery.min.js"></script>
            <!-- Sweet alert init js-->
            <script>
                //Getting Mentor by industory
                $(".industry_select").change(function() {
                    var INDUSTRY_BELONGS = $(this).val();
                    // alert(INDUSTRY_BELONGS)
                    $.ajax({
                        url: "<?php echo base_url(); ?>get_mentor_by_industry",
                        cache: false,
                        data: {
                            "INDUSTRY_BELONGS": INDUSTRY_BELONGS
                        },
                        type: "POST",
                        success: function(data) {
                            var data = $.trim(data);
                            //alert(data)
                            if (data == 'NoData' || data == 'empty') {
                                $(".mentor_data").html(null);
                            }
                            if (data == "NoData")
                                alert("No data available for Technology");
                            else
                                $(".mentor_data").html(data);
                        }
                    });
                });
            </script>

            <!-- Rightbar -->
            <?php $this->load->view("layouts/rightbar.php"); ?>

            <!-- FooterScript -->
            <?php $this->load->view("layouts/footerScript.php"); ?>

            <!-- Required datatable js -->
            <script src="<?php echo base_url(); ?>public/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
            <!-- Buttons examples -->
            <script src="<?php echo base_url(); ?>public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/jszip/jszip.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/pdfmake/build/pdfmake.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/pdfmake/build/vfs_fonts.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
            <!-- Responsive examples -->
            <script src="<?php echo base_url(); ?>public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

            <!-- Datatable init js -->
            <script src="<?php echo base_url(); ?>public/assets/js/pages/datatables.init.js"></script>

            <!-- App js -->
            <script src="<?php echo base_url(); ?>public/assets/js/app.js"></script>
            <?php //$this->load->view("layouts/side_root/footer.php"); ?>
            <script src="<?php echo base_url(); ?>public/assets/libs/jquery/jquery.min.js"></script>
            <script>
                //Getting Mentor by industory
                $(".industry_select").change(function() {
                    // alert("here");
                    var INDUSTRY_BELONGS = $(this).val();

                    $.ajax({
                        // alert("here");
                        url: "<?php echo base_url(); ?>get_mentor_by_industry",
                        cache: false,
                        data: {
                            "INDUSTRY_BELONGS": INDUSTRY_BELONGS
                        },
                        type: "POST",
                        success: function(data) {
                            var data = $.trim(data);
                            if (data == 'NoData' || data == 'empty') {
                                $(".select_mentor").html(null);
                            }
                            if (data == "NoData")
                                alert("No data available");

                            else if (data == "empty")
                                alert("Please select Level");

                            else
                                $(".select_mentor").html(data);
                        }
                    });
                });
            </script>
            <script src="<?php echo base_url();?>bs-stepper-files/bs-stepper.min.js"></script>
            <script>
                

                var stepper3Node = document.querySelector('#stepper3')
                var stepper3 = new Stepper(document.querySelector('#stepper3'))

                stepper3Node.addEventListener('show.bs-stepper', function (event) {
                    console.warn('show.bs-stepper', event)
                })
                stepper3Node.addEventListener('shown.bs-stepper', function (event) {
                    console.warn('shown.bs-stepper', event)
                })

                //   var stepper2 = new Stepper(document.querySelector('#stepper2'), {
                //     linear: false,
                //     animation: true
                //   })
                //   var stepper3 = new Stepper(document.querySelector('#stepper3'), {
                //     linear: true,
                //     animation: true
                //   })
                //   var stepper4 = new Stepper(document.querySelector('#stepper4'))
                </script>

            <script>
                var duration = "";
                $(".duration_button").click(function() {
                    var selected_button_text = $(this).val();
                    duration = selected_button_text;
                    $("#hidden_duration").val(duration);
                    $(".duration_of_booking").html(duration);

                    var date_selected = $(".datepicker").val();   
                    var mentor_id = 5 ;///$("#mentor_id").val();  
                    $(".date_of_booking").html(date_selected);
                    $.ajax({
                        url:"<?php echo base_url();?>get_slots_by_date_selected",
                        type:"POST",
                        data:{mentor_id:mentor_id,date_selected:date_selected,duration:duration},
                        success:function(data) {
                            var data = $.trim(data);
                            if(data == "NULL") {
                                $(".dynamic_slots_details").html(null);
                            } else {
                                var explode = data.split("###");
                                if(explode[0] == "ERROR"){
                                    alert(explode[1]);
                                    $(".dynamic_slots_details").html(null);
                                } else {
                                    $(".dynamic_slots_details").html(data);
                                }
                            }
                            
                        }
                    });
                });
                $(".datepicker").change(function(){
                    var date_selected = $(this).val();   
                    var mentor_id = $("#mentor_id").val();  
                    $(".date_of_booking").html(date_selected);
                    $.ajax({
                        url:"<?php echo base_url();?>get_slots_by_date_selected",
                        type:"POST",
                        data:{mentor_id:mentor_id,date_selected:date_selected,duration:duration},
                        success:function(data) {
                            var data = $.trim(data);
                            if(data == "NULL") {
                                alert("Please make sure you have selected duration and date");
                                $(".dynamic_slots_details").html(null);
                            } else {
                                var explode = data.split("###");
                                if(explode[0] == "ERROR"){
                                    alert(explode[1]);
                                    $(".dynamic_slots_details").html(null);
                                } else {
                                    $(".dynamic_slots_details").html(data);
                                    $(".make_payment_submit").removeAttr("disabled");
                                }
                            }
                            
                        }
                    });
                }); 

                $(".dynamic_slots_details").change(function() { 
                    var dynamic_slots_details = $(this).val();
                    
                    $(".time_of_booking").html(dynamic_slots_details);
                    $(".make_payment_submit").removeAttr("disabled");
                });

                var invitee_array = [];
                $(".add_invites").click(function(){
                    var invitee_name = $("#invitee_name").val();
                    
                    $.ajax({
                        url:"<?php echo base_url();?>check_email_id_exists",
                        type:"POST",
                        data:{invitee_name:invitee_name,selected_mentor_id:'<?php echo $mentor_id;?>',invitee_array:invitee_array},
                        success:function(data) {
                            var data = $.trim(data);
                            if(data == "NULL" || data=='') {
                                alert("Please add email ID to add as invitee");
                                $(".added_invites").append(null);
                            } else {
                                var explode = data.split("###");
                                if(explode[0] == "ERROR"){
                                    alert(explode[1]);
                                    $(".added_invites").append(null);
                                } else {                                   

                                    $(".added_invites").append(explode[0]);
                                    $(".mentees_list").append(explode[1]+",");
                                    $("#invitee_name").val(null);
                                    // $(".INVITEE_USER_ID").each(function(){
                                    //     alert("here");
                                        
                                        var idx = $.inArray(explode[2], invitee_array);
                                        if (idx == -1) {
                                            invitee_array.push(explode[2]);
                                        } else {
                                            invitee_array.splice(idx, 1);
                                        }
                                    //});

                                    console.log(invitee_array);
                                    
                                }
                            }
                            
                        }
                    });
                });

                function delete_invitee_user_id(ID) {
                    $(".COUNT_"+ID).remove();
                    var INVITEE_NAMES = "";
                    
                    //Get email Id form classname
                    $(".MENTEES_EMAIL_ID").each(function(){
                        INVITEE_NAMES += ($(this).val())+",";                        
                    });

                    invitee_array = invitee_array.filter(function(elem){
                    return elem != ID; 
                    });

                    console.log(invitee_array);

                    $(".mentees_list").html(INVITEE_NAMES);   
                }
                function check_payment_details_required() {
                    
                    if($("#hidden_duration").val() == ""){
                        alert("Please select duration");
                        $(".make_payment_submit").attr("disabled", "true");
                        return false;
                    }
                    if($(".dynamic_slots_details option:selected").val() == ""){
                        alert("Please select slot");
                        $(".make_payment_submit").attr("disabled", "true");
                        return false;
                    }
                    if($(".date_of_booking").text() == ""){
                        alert("Please select date");
                        $(".make_payment_submit").attr("disabled", "true");
                        return false;
                    } else{

                        return confirm('Are you sure to make a payment')
                    }
                    
                    $(".make_payment_submit").removeAttr("disabled");
                    $("#slot_booking_details").submit();
                }
            </script>
</body>

</html>