<!-- Header -->
<?php $this->load->view("layouts/header"); ?> 
<!-- DataTables -->

<link href="<?php echo base_url();?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
    
<link href="<?php echo base_url();?>public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />    
<?php 
    if(isset($template_id) && !empty($template_id))
    {  $this->load->view("layouts/headerStyle"); }
    
?>
<!-- for croppig of images-->
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>



<style>.logos{margin-top:5px;}</style>
<style>
.image_area {
    position: relative;
}

img {
    display: block;
    max-width: 100%;
}

.preview {
    overflow: hidden;
    width: 160px; 
    height: 160px;
    margin: 10px;
    border: 1px solid red;
}

.modal-lg{
    max-width: 1000px !important;
}

.overlay {
    position: absolute;
    bottom: 10px;
    left: 0;
    right: 0;
    background-color: rgba(255, 255, 255, 0.5);
    overflow: hidden;
    height: 0;
    transition: .5s ease;
    width: 100%;
}

.image_area:hover .overlay {
    height: 50%;
    cursor: pointer;
}

.text {
    color: #333;
    font-size: 15px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}
.image_area{width:150px}
.cropper-crop-box, .cropper-view-box {
    border-radius: 50%;
}

.cropper-view-box {
    box-shadow: 0 0 0 1px #39f;
    outline: 0;
}

</style>
<!-- hederStyle -->
<?php $this->load->view("layouts/headerStyle.php"); ?>

<body data-sidebar="dark" class="body">

    <!-- Begin page -->
    <div id="layout-wrapper">

      
         <!-- Topbar -->
         <?php $this->load->view("layouts/topbar.php"); ?>


          <!-- Sidebar -->
         <?php $this->load->view("layouts/sidebar.php"); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4>Profile Details</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Profile Details</a></li>
                                    </ol>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">                                    
                                    <div class="card">
                                        <div class="card-body">
                                            <?php 
                                            if(isset($userdata) && !empty($userdata)){
                                                foreach($userdata as $edit_row){}
                                            }
                                            if(isset($digital_card_html_data) && !empty($digital_card_html_data)) {
                                                foreach($digital_card_html_data['digital_card_data'] as $digital_card_row) {}
                                            }

                                            if(isset($template_data) && !empty($template_data)) {
                                                foreach($template_data as $template_row) {}
                                            }
                                            ?>      
                                            <form class="custom-validation" enctype="multipart/form-data" action="<?php echo base_url('profile_setup/save_profile_password_details');?>" method="POST">    
                                                <div class="row">                                                       
                                                    <div class="col-lg-6">      
                                                        <div class="form-group">
                                                            <label class="">New Password<span class="required">*</span></label><br/>
                                                            <input type="password" required placeholder="New Password" class="form-control" id="new_password" name="new_password" value="" onfocusout="return check_confirm_password();"/>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="row">                                                       
                                                    <div class="col-lg-6">      
                                                        <div class="form-group">
                                                            <label class="">Confirm Password<span class="required">*</span></label><br/>
                                                            <input type="password" required placeholder="Confirm Password" class="form-control" id="confirm_password" name="confirm_password" value="" onkeyup="return check_confirm_password();" />
                                                            <span id="confirm_password_error"></span>
                                                        </div>
                                                    </div>
                                                </div>                                                                                
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group mb-0">
                                                            <div>
                                                                <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button">
                                                                    Change Password
                                                                </button>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>                                           
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
             
             <!-- Rightbar -->
             <?php $this->load->view("layouts/rightbar.php"); ?>
            
            <!-- FooterScript -->
            <?php $this->load->view("layouts/footerScript.php"); ?>


            <script src="<?php echo base_url();?>public/assets/libs/parsleyjs/parsley.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/js/pages/form-validation.init.js"></script>

            <!-- Sweet Alerts js -->
            <script src="<?php echo base_url();?>public/assets/libs/sweetalert2/sweetalert2.min.js"></script>

            <!-- Sweet alert init js-->           
            <script>              
                //Show sweet alert when data saved successfully
                <?php 
                if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="success") { ?>
                !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Password reset successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } ?>

            </script>
            <!-- File Input Script-->
            <script src="<?php echo base_url();?>public/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>

            <!--tinymce js-->
            <script src="<?php echo base_url();?>public/assets/libs/tinymce/tinymce.min.js"></script>

            <!-- Form Editor init js -->
            <script src="<?php echo base_url();?>public/assets/js/pages/form-editor.init.js"></script>
            

            <!-- Datatable init js -->
            <script src="<?php echo base_url();?>public/assets/js/pages/datatables.init.js"></script>


            <!-- App js -->
            <script src="<?php echo base_url();?>public/assets/js/app.js"></script>

            <script>
                function check_confirm_password() {
                    var password = $("#new_password").val();
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
            </script>
</body>

</html>