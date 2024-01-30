<!-- Header -->
<?php $this->load->view("layouts/header.php"); ?> 
<!-- DataTables -->
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
    
<link href="<?php echo base_url();?>public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />    
<?php 
    if(isset($edit_role_module_mapping_master_data) && $edit_role_module_mapping_master_data[0]->id!='')
    {  $this->load->view("layouts/headerStyle"); }
?>
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<style>.logos{margin-top:5px;}</style>
<!-- hederStyle -->
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
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}
.image_area{width: 150px;}

</style>
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
                                <h4>Profile Deatails</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Profile Deatails</a></li>
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
                                        
                                            ?>      
                                            <form class="custom-validation" enctype="multipart/form-data" action="<?php echo base_url('save_profile_bio_details');?>" method="POST">    
                                                <div id="accordion">
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header p-3" id="headingOne">
                                                            <h6 class="m-0 font-size-14">
                                                                <a href="#collapseOne" class="text-dark" data-toggle="collapse"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseOne">
                                                                    Profile Details
                                                                </a>
                                                            </h6>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <div class="image_area">
                                                                                <label>Profile Image</label>
                                                                                <img src="user.png" id="uploaded_profile_image" class="img-responsive img-circle" />
                                                                                <div class="overlay">
                                                                                    <div class="text">Select Image</div>
                                                                                </div>
                                                                                <input type="file" name="image" class="image" id="upload_profile_image" style="display:none" />
                                                                                
                                                                                <div class="modal fade" id="modal_profile_image" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title">Crop Image Before Upload</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">×</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="img-container">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-8">
                                                                                                            <img src="" id="sample_image_for_profile" />
                                                                                                        </div>
                                                                                                        <div class="col-md-4">
                                                                                                            <div class="preview"></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--<label>Profile Image</label> 
                                                                            <input  type="file" name="avatar_filename" class="filestyle" data-buttonname="btn-secondary" accept="images/*" /> 
                                                                            <?php echo form_error('name_of_place'); ?>
                                                                            <input type="hidden" name="edit_id" value="<?php echo (isset($edit_row) && !empty($edit_row->id)) ? base64_encode($edit_row->id):"";?>" />-->
                                                                            <?php /*if(!empty($edit_row->profile_image)) { ?>
                                                                            <a href="#" data-toggle="modal" data-target="#myModal_profile_image">Preview Profile Image</a>
                                                                                <!-- sample modal content -->
                                                                                <div id="myModal_profile_image" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title mt-0" id="myModalLabel">Preview</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( stripslashes($edit_row->profile_image )).'"/>';?>
                                                                                            </div>                 
                                                                                        </div>
                                                                                        <!-- /.modal-content -->
                                                                                    </div>
                                                                                    <!-- /.modal-dialog -->
                                                                                </div>
                                                                                <!-- /.modal -->
                                                                            <?php }*/ ?>
                                                                        </div> 
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <div class="image_area">
                                                                                <label>Company Logo Image</label>
                                                                                <img src="user.png" id="uploaded_company_logo_image" class="img-responsive img-circle" />
                                                                                <div class="overlay">
                                                                                    <div class="text">Select Image</div>
                                                                                </div>
                                                                                <input type="file" name="upload_company_logo_image" class="image" id="upload_company_logo_image" style="display:none" />
                                                                                
                                                                                <div class="modal fade" id="modal_company_logo_image" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title">Crop Image Before Upload</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">×</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="img-container">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-8">
                                                                                                            <img src="" id="company_logo_image" />
                                                                                                        </div>
                                                                                                        <div class="col-md-4">
                                                                                                            <div class="preview"></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" id="crop_company_logo" class="btn btn-primary">Crop</button>
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--<label>Company Logo</label>
                                                                            <input  type="file" name="co_logo_path" class="filestyle" data-buttonname="btn-secondary" accept="images/*" /> 
                                                                            <?php echo form_error('name_of_place'); ?>
                                                                            <input type="hidden" name="edit_id" value="<?php echo (isset($edit_row) && !empty($edit_row->id)) ? base64_encode($edit_row->id):"";?>" />-->
                                                                            <?php /*if(!empty($edit_row->company_logo)) { ?>
                                                                            <a href="#" data-toggle="modal" data-target="#myModal_company_logo">Preview Company Logo</a>
                                                                                <!-- sample modal content -->
                                                                                <div id="myModal_company_logo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title mt-0" id="myModalLabel">Preview</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( stripslashes($edit_row->company_logo )).'"/>';?>
                                                                                            </div>                 
                                                                                        </div>
                                                                                        <!-- /.modal-content -->
                                                                                    </div>
                                                                                    <!-- /.modal-dialog -->
                                                                                </div>
                                                                                <!-- /.modal -->
                                                                            <?php }*/ ?>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                                <div class="row">                                                       
                                                                    <div class="col-lg-6">      
                                                                        <div class="form-group">
                                                                            <label class="">Username(For digital card link)<span class="required">*</span></label><br/>
                                                                            <input type="text" pattern="[A-Za-z\s]+" required placeholder="https://bizicard.in/%Username%" class="form-control username" id="name" name="name" value="<?php echo (isset($edit_row) && !empty($edit_row->name!='')) ? $edit_row->name:set_value("name");?>" />
                                                                            <span class="error_message"></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="">Company Name<span class="required">*</span></label><br/>
                                                                            <input type="text" required placeholder="Your bio details" class="form-control"  id="company_name" name="company_name" value="<?php echo (isset($edit_row) && !empty($edit_row->company_name!='')) ? $edit_row->company_name:set_value("company_name");?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="">Your Name<span class="required">*</span></label><br/>
                                                                            <input type="text" required placeholder="Your name" class="form-control"  id="display_name" name="display_name" value="<?php echo (isset($edit_row) && !empty($edit_row->display_name!='')) ? $edit_row->display_name:set_value("display_name");?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="">Designation</label><br/>
                                                                            <input type="text" placeholder="Your bio details" class="form-control"  id="designation" name="designation" value="<?php echo (isset($edit_row) && !empty($edit_row->designation!='')) ? $edit_row->designation:set_value("designation");?>" />
                                                                        </div>                                                         
                                                                        <div class="form-group">
                                                                            <label class="">Telephone No.<span class="required">*</span></label><br/>
                                                                            <input type="text" required class="form-control" placeholder="Telephone Number" id="mobile_number" name="mobile_number" value="<?php echo (isset($edit_row) && !empty($edit_row->mobile_number!='')) ? $edit_row->mobile_number:set_value("mobile_number");?>" />
                                                                        </div>  
                                                                        <div class="form-group">
                                                                            <label class="">Whatsapp No.<span class="required">*</span></label><br/>
                                                                            <input type="text" required class="form-control" placeholder="Whatsapp Number" id="whatsapp_number" name="whatsapp_number" value="<?php echo (isset($edit_row) && !empty($edit_row->whatsapp_number!='')) ? $edit_row->whatsapp_number:set_value("whatsapp_number");?>" />
                                                                        </div>  
                                                                        <div class="form-group">
                                                                            <label class="">Add bio details</label><br/>
                                                                            <textarea rows="4" cols="30" placeholder="Your bio details" class="form-control"  id="bio" name="bio"><?php echo (isset($edit_row) && !empty($edit_row->bio!='')) ? $edit_row->bio:set_value("bio");?></textarea>
                                                                        </div>    
                                                                        
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="">Google Map location</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Google Map location" id="gmap_pin_url" name="gmap_pin_url" value="<?php echo (isset($edit_row) && !empty($edit_row->gmap_pin_url!='')) ? $edit_row->gmap_pin_url:set_value("gmap_pin_url");?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="">Website address</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Website address" id="website_url" name="website_url" value="<?php echo (isset($edit_row) && !empty($edit_row->website_url!='')) ? $edit_row->website_url:set_value("website_url");?>" />
                                                                        </div>        
                                                                        <div class="form-group">
                                                                            <label class="">Email Id<span class="required">*</span></label><br/>
                                                                            <input type="text" readonly required  class="form-control" placeholder="Website address" id="email_id" name="email_id" value="<?php echo (isset($edit_row) && !empty($edit_row->email_id!='')) ? $edit_row->email_id:set_value("email_id");?>" />
                                                                        </div>     

                                                                        <div class="form-group">
                                                                            <label class="">Facebook link</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Website address" id="facebook_page_link" name="facebook_page_link" value="<?php echo (isset($edit_row) && !empty($edit_row->facebook_page_link!='')) ? $edit_row->facebook_page_link:set_value("facebook_page_link");?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="">Instagram link</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Website address" id="instagram_page_link" name="instagram_page_link" value="<?php echo (isset($edit_row) && !empty($edit_row->instagram_page_link!='')) ? $edit_row->instagram_page_link:set_value("instagram_page_link");?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="">Linkedin link</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Website address" id="linkedin_page_link" name="linkedin_page_link" value="<?php echo (isset($edit_row) && !empty($edit_row->linkedin_page_link!='')) ? $edit_row->linkedin_page_link:set_value("linkedin_page_link");?>" />
                                                                        </div>    
                                                                        <div class="form-group">
                                                                            
                                                                        </div>  
                                                                        <div class="form-group">
                                                                        
                                                                        </div>                                                          
                                                                        <div class="form-group">
                                                                            
                                                                        </div>
                                                                        <div class="form-group">
                                                                            
                                                                        </div>        
                                                                        <div class="form-group">
                                                                            
                                                                        </div>     

                                                                        <div class="form-group">
                                                                            
                                                                        </div>
                                                                        <div class="form-group">
                                                                            
                                                                        </div>
                                                                        <div class="form-group">
                                                                            
                                                                        </div>                                                            
                                                                    
                                                                        <div class="form-group mb-0">
                                                                        
                                                                        </div>  
                                                                    </div>
                                                                </div>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header p-3" id="headingTwo">
                                                            <h6 class="m-0 font-size-14">
                                                                <a href="#collapseTwo" class="text-dark collapsed" data-toggle="collapse"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseTwo">
                                                                    Template Setup
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="row">                                                       
                                                                    <div class="col-lg-4">      
                                                                        <div class="form-group">
                                                                            <label class="">Background Color<span class="required">*</span></label><br/>
                                                                            <input class="form-control example-color-input" type="color" value="#7a6fbe" id="input_background">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-4">    
                                                                        <div class="form-group">
                                                                            <label class="">Font color</label><br/>
                                                                            <input class="form-control example-color-input" type="color" value="#7a6fbe" id="input_font">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-4">    
                                                                        <div class="form-group mb-0">
                                                                            <label class="">Font color</label><br/>
                                                                            <button type="button" class="btn btn-primary waves-effect waves-light mr-1 submit_button preview_button">Preview</button>
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12"> 
                                                                        <div class="form-group">
                                                                            <label class="preview">Preview</label><br/>
                                                                            <div class="preview_template"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header p-3" id="headingTwo">
                                                            <h6 class="m-0 font-size-14">
                                                                <a href="#collapseThree" class="text-dark collapsed" data-toggle="collapse"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseTwo">
                                                                    About Us and services
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="row">                                                       
                                                                    <div class="col-lg-4">      
                                                                        <div class="form-group">
                                                                            <label class="">Background Color<span class="required">*</span></label><br/>
                                                                            <input class="form-control example-color-input" type="color" value="#7a6fbe" id="input_background">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-4">    
                                                                        <div class="form-group">
                                                                            <label class="">Font color</label><br/>
                                                                            <input class="form-control example-color-input" type="color" value="#7a6fbe" id="input_font">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-4">    
                                                                        <div class="form-group mb-0">
                                                                            <label class="">Font color</label><br/>
                                                                            <button type="button" class="btn btn-primary waves-effect waves-light mr-1 submit_button preview_button">Preview</button>
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12"> 
                                                                        <div class="form-group">
                                                                            <label class="preview">Preview</label><br/>
                                                                            <div class="preview_template"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                                <div class="form-group mb-0">
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button">
                                                                        Create Digital Card
                                                                    </button>
                                                                    <?php if(!isset($edit_row) && empty($edit_row->id)){ ?>
                                                                        <button type="reset" class="btn btn-secondary waves-effect submit_button">
                                                                        Reset
                                                                    </button>
                                                                    <?php } ?>
                                                                </div>
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
                var delete_role_module_mapping_master_id = null;
                $(".table_delete_button").click(function(){
                    delete_role_module_mapping_master_id = $(this).val();
                });

                var undo_delete_master_id = null;
                $(".table_undelete_button").click(function(){
                    undo_delete_master_id = $(this).val();
                });               
                //Show sweet alert when data saved successfully
                <?php if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="success") { ?>
                    !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Data saved successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } 
                elseif(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="deleted") { ?>
                    !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Data deleted successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php }
                elseif(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="undeleted") { ?>
                    !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Data activated again successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php }
                elseif(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="error") { ?>
                    !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Error in process!",type:"error",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } 
                else if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="EXIST") { ?>
                    !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Module and MVC Path combination already exists!",type:"error",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } ?>
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".table_delete_button").click(function(){Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                
                    $.ajax({
                        url:"<?php echo base_url();?>delete_role_module_mapping_master_data",
                        cache: false,
                         data:{"role_module_mapping_master_id":delete_role_module_mapping_master_id},
                        type: "POST",
                        success: function(data) {
                            location.reload();
                        }
                    });
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If undo delete of any master data then this will execute
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".table_undelete_button").click(function(){Swal.fire({title:"Do you want to undo deleted data?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, undo it!"}).then(function(t){
                    
                    $.ajax({
                        url:"<?php echo base_url();?>undo_deleted_role_module_mapping_master_data",
                        cache: false,
                        data:{"role_module_mapping_master_id": undo_delete_master_id},
                        type: "POST",
                        success: function(data) {
                            location.reload();
                        }
                    });
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
            </script>

             <!-- Required datatable js -->
            <script src="<?php echo base_url();?>public/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
             <!-- Buttons examples -->
            <script src="<?php echo base_url();?>public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/libs/jszip/jszip.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/libs/pdfmake/build/pdfmake.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/libs/pdfmake/build/vfs_fonts.js"></script>
            <script src="<?php echo base_url();?>public/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
            <!-- Responsive examples -->
            <script src="<?php echo base_url();?>public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

            <!-- File Input Script-->
            <script src="<?php echo base_url();?>public/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>

            <!-- Datatable init js -->
            <script src="<?php echo base_url();?>public/assets/js/pages/datatables.init.js"></script>
            <!-- App js -->
            <script src="<?php echo base_url();?>public/assets/js/app.js"></script>
            <script>
                $(".username").keyup(function(){
                    $.ajax({
                        url:"<?php echo base_url();?>check_username",
                        type:"POST",
                        data:{username:$(this).val()},
                        success:function(data) {
                            var data = $.trim(data);
                            if(data == "false") {
                                $(".error_message").html("<font style='color:green'>Username Available</font>");
                                $(".submit_button").removeAttr("disabled");
                            } else {
                                $(".error_message").html("<font style='color:red'>Username already taken!!!</font>");
                                $(".submit_button").attr("disabled", "true");
                            }
                            
                        }
                    });
                });
                $(".preview_button").click(function(){
                    var background_color = $("#input_background").val();
                    var font_color = $("#input_font").val();

                    $.ajax({
                        url:"<?php echo base_url();?>get_template_preview",
                        type:"POST",
                        data:{background_color:background_color, font_color:font_color},
                        success:function(data) {
                            var data = $.trim(data);
                            if(data != "false") {
                                $(".preview_template").html(data);
                            } else {
                                $(".preview_template").html();
                            }
                            
                        }
                    });
                });

            </script>
            <script src="https://unpkg.com/dropzone"></script>
		    <script src="https://unpkg.com/cropperjs"></script>
                        
            <script>

            $(document).ready(function(){
                //Profile Image Cropping
                var $modal = $('#modal_profile_image');
                var image = document.getElementById('sample_image_for_profile');
                var cropper;

                $('#upload_profile_image').change(function(event){
                    var files = event.target.files;
                    var done = function(url){
                        image.src = url;
                        $modal.modal('show');
                    };
                    if(files && files.length > 0)
                    {
                        reader = new FileReader();
                        reader.onload = function(event)
                        {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });

                $modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 3,
                        preview:'.preview'
                    });
                }).on('hidden.bs.modal', function(){
                    cropper.destroy();
                    cropper = null;
                });

                $('#crop').click(function(){
                    canvas = cropper.getCroppedCanvas({
                        width:400,
                        height:400
                    });

                    canvas.toBlob(function(blob){
                        url = URL.createObjectURL(blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function(){
                            var base64data = reader.result;
                            $.ajax({
                                url:'crop_upload.php',
                                method:'POST',
                                data:{image:base64data},
                                success:function(data)
                                {
                                    $modal.modal('hide');
                                    $('#uploaded_profile_image').attr('src', data);
                                }
                            });
                        };
                    });
                });

                //Company Logo Image Cropping
                /*var $modal = $('#modal_company_logo_image');
                var image = document.getElementById('company_logo_image');
                var cropper;

                $('#upload_company_logo_image').change(function(event){
                    var files = event.target.files;
                    var done = function(url){
                        image.src = url;
                        $modal.modal('show');
                    };
                    if(files && files.length > 0)
                    {
                        reader = new FileReader();
                        reader.onload = function(event)
                        {
                            done(reader.result);
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });

                $modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 3,
                        preview:'.preview'
                    });
                }).on('hidden.bs.modal', function(){
                    cropper.destroy();
                    cropper = null;
                });

                $('#crop_company_logo').click(function(){
                    canvas = cropper.getCroppedCanvas({
                        width:400,
                        height:400
                    });

                    canvas.toBlob(function(blob){
                        url = URL.createObjectURL(blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function(){
                            var base64data = reader.result;
                            $.ajax({
                                url:'crop_upload.php',
                                method:'POST',
                                data:{image:base64data},
                                success:function(data)
                                {
                                    $modal.modal('hide');
                                    $('#uploaded_company_logo_image').attr('src', data);
                                }
                            });
                        };
                    });
                });*/
            });
            </script>

</body>

</html>