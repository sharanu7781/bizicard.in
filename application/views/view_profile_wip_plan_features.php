<!-- Header -->
<?php $this->load->view("layouts/header"); ?> 
<!-- DataTables -->

<link href="<?php echo base_url();?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
    
<link href="<?php echo base_url();?>public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />    
<?php 
$this->load->view("layouts/headerStyle"); 
    if(isset($template_id) && !empty($template_id))
    {  
        $this->load->view("layouts/headerStyle"); 
    } 
?>

<!-- for croppig of images-->
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<style>.hide{display:none}.show{display:block}</style>


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

.preview_company {
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
.company_image_area{width:200px}
.cropper-crop-box, .cropper-view-box {
    border-radius: 50%;
}


.cropper-view-box {
    box-shadow: 0 0 0 1px #39f;
    outline: 0;
}

</style>
<style>
		

		.image-previewer {
			height: 150px;
			width: 150px;
			display: flex;
			/*border-radius: 10px;*/
			border: 1px solid lightgrey;
		}

		li {
			font-size: 11px;
		}

		.dependencies {
			font-family: 'Reenie Beanie', cursive;
			font-size: 28px;
			text-decoration: none;
		}

		textarea {
			resize: none;
			min-height: 50px;
		}

		pre,
		code {
			user-select: all;
		}
	</style>
<!-- hederStyle -->

<body data-sidebar="dark" class="body">

    <!-- Begin page -->
    <div id="layout-wrapper">

      
         <!-- Topbar -->
         <?php $this->load->view("layouts/topbar"); ?>


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
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="page-title-box">
                                <?php if($this->session->flashdata("razorpay_payment_id") != '') {
                                    echo "<h4 style='color:#2eaf25'>Thanks for the payment. Your transaction ID is - ".$this->session->userdata("razorpay_payment_id")."</h4>";
                                    $this->session->unset_userdata("razorpay_payment_id");
                                 } ?>
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

                                            if(isset($plan_details) && !empty($plan_details)) {
                                                foreach($plan_details as $plan_row) {}
                                            }
                                            ?>      
                                            <form class="custom-validation" enctype="multipart/form-data" action="<?php echo base_url('save_profile_bio_details');?>" method="POST">    
                                                <input type="hidden" name="template_id" value="<?php echo (isset($template_id) && !empty($template_id)) ? $template_id:$this->session->userdata("choosen_template");?>" />
                                                <div class="row">
                                                    <!-- <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class=""></label><br/>
                                                            <input type="checkbox" hidden name="default_digital_card" value="Y" <?php echo (isset($digital_card_html_data['digital_card_data']) && $digital_card_html_data['digital_card_data']->is_default_template=="Y") ? "checked":"";?>><span hidden>Set this default digital card</span>                                                          
                                                        </div>  
                                                    </div> -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="" style="color:#2b3a4a"><br/><h5><?php echo (isset($template_row) && !empty($template_row->template_name)) ? "Current Template - ".$template_row->template_name:"";?></h5></label><br/>
                                                            
                                                        </div>  
                                                    </div>
                                                </div>
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
                                                                    <?php if(isset($plan_details) && in_array("Profile Photo", $plan_details)) { ?>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="col-lg-12">Profile Image(file should be more than 500*300 pixels)</label>
                                                                            <div class="image_area">
                                                                                
                                                                                <label for="upload_image">
                                                                                    <img src="<?php echo (isset($edit_row) && !empty($edit_row->avatar_path)) ? $edit_row->avatar_path : base_url()."user.png";?>" style="border-radius:50%" id="uploaded_image"  class="img-responsive img-circle" />
                                                                                    <div class="overlay">
                                                                                        <div class="text">Select Image File</div>
                                                                                    </div>
                                                                                    <input type="file" name="avatar_filename" class="image" id="upload_image" style="display:none" />
                                                                                    <input type="hidden" name="avatar_filename_hidden_path" id="avatar_filename_hidden_path" value="<?php echo (isset($edit_row) && !empty($edit_row->avatar_path)) ? $edit_row->avatar_path : "";?>" />
                                                                                </label>
                                                                            </div>
                                                                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                                                                                        <img src="" id="sample_image" />
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="preview"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="return clearFileSelection();">Cancel</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> 
                                                                    </div> 
                                                                    <?php } ?>
                                                                    <?php if(isset($plan_details) && in_array("Company Logo", $plan_details)) { ?>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="col-lg-12">Company Logo</label>
                                                                            <div class="image_area">
                                                                                
                                                                                <label for="upload_image_company">
                                                                                    <img src="<?php echo (isset($edit_row) && !empty($edit_row->co_logo_path)) ? $edit_row->co_logo_path : base_url()."user.png";?>" id="uploaded_image_company"  class="img-responsive " style="height:150px"/>
                                                                                    <div class="overlay">
                                                                                        <div class="text">Select Image File</div>
                                                                                    </div>
                                                                                    <input type="file" name="company_avatar_file" class="image" id="upload_image_company" style="display:none" />
                                                                                    <input type="hidden" name="company_filename_hidden_path" id="company_filename_hidden_path" value="<?php echo (isset($edit_row) && !empty($edit_row->co_logo_path)) ? $edit_row->co_logo_path : "";?>" />
                                                                                </label>
                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">      
                                                                        <div class="form-group">
                                                                            <label class="">Username(For digital card link)<span class="required">*</span></label><br/>
                                                                            <input type="text" pattern="[A-Za-z.]+" required placeholder="https://bizicard.in/%Username%" class="form-control username" id="name" name="name" value="<?php echo (isset($edit_row) && !empty($edit_row->name!='')) ?  stripslashes($edit_row->name):set_value("name");?>" />
                                                                            <span class="error_message"></span>
                                                                        </div>
                                                                        <?php if(isset($plan_details) && in_array("Company Name", $plan_details)) { ?>
                                                                        <div class="form-group">
                                                                            <label class="">Company Name<span class="required">*</span></label><br/>
                                                                            <input type="text" required placeholder="Company Name" class="form-control"  id="company_name" name="company_name" value="<?php echo (isset($edit_row) && !empty($edit_row->company_name!='')) ?  stripslashes($edit_row->company_name):set_value("company_name");?>" />
                                                                        </div>
                                                                        <?php } ?>
                                                                        <?php if(isset($plan_details) && in_array("Person Name", $plan_details)) { ?>
                                                                        <div class="form-group">
                                                                            <label class="">Your Name<span class="required">*</span></label><br/>
                                                                            <input type="text" required placeholder="Your name" class="form-control"  id="display_name" name="display_name" value="<?php echo (isset($edit_row) && !empty($edit_row->display_name!='')) ?  stripslashes($edit_row->display_name):set_value("display_name");?>" />
                                                                        </div>
                                                                        <?php } ?>
                                                                        <?php if(isset($plan_details) && in_array("Designation", $plan_details)) { ?>
                                                                        <div class="form-group">
                                                                            <label class="">Designation</label><br/>
                                                                            <input type="text" placeholder="Your Designation" class="form-control"  id="designation" name="designation" value="<?php echo (isset($edit_row) && !empty($edit_row->designation!='')) ?  stripslashes($edit_row->designation):set_value("designation");?>" />
                                                                        </div>         
                                                                        <?php } ?>      
                                                                        <div class="form-group">
                                                                            <label class="">Email Id<span class="required">*</span></label><br/>
                                                                            <input type="text" readonly required  class="form-control" placeholder="Email Id" id="email_id" name="email_id" value="<?php echo (isset($edit_row) && !empty($edit_row->email_id!='')) ?  stripslashes($edit_row->email_id):set_value("email_id");?>" />
                                                                        </div>                                           
                                                                        <div class="form-group">
                                                                            <label class="">Telephone No.<span class="required">*</span></label><br/>
                                                                            <div class="form-group row">
                                                                                <div class="col col-lg-4 col-md-4">
                                                                                    <select class="form-control select2" required name="telephone_country_code">
                                                                                    <?php if(isset($country_data) && $country_data) { ?>
                                                                                    <option <?php echo (isset($edit_row) && !empty($edit_row->telephone_country_code=="")) ? "selected":"";?> value="">Select Country</option>
                                                                                    <?php foreach($country_data as $country_row) { ?>
                                                                                            <option <?php echo (isset($edit_row) && !empty($edit_row->telephone_country_code==$country_row->contry_isd_code)) ? "selected":"";?> value="<?php echo $country_row->contry_isd_code;?>"><?php echo "(+".$country_row->contry_isd_code.")". $country_row->contry_name;?></option>
                                                                                        <?php } 
                                                                                    } ?>
                                                                                    </select>
                                                                                    
                                                                                </div>
                                                                                <div class="col col-lg-8 col-md-8"> 
                                                                                    <input type="text" maxlength="15" required class="form-control" placeholder="Telephone Number" id="mobile_number" name="mobile_number" value="<?php echo (isset($edit_row) && !empty($edit_row->mobile_number!='')) ?  stripslashes($edit_row->mobile_number):set_value("mobile_number");?>" />
                                                                                </div>
                                                                            </div>
                                                                        </div>  
                                                                       
                                                                        <?php if(isset($plan_details) && in_array("Add Bio", $plan_details)) { ?>
                                                                        <div class="form-group">
                                                                            <label class="">Add bio details</label><br/>
                                                                            <textarea onkeypress="return/[a-z A-Z .]/i.test(event.key)" rows="4" cols="30" placeholder="Your bio details" class="form-control elm1"  id="bio" name="bio"><?php echo (isset($edit_row) && !empty($edit_row->bio!='')) ? str_replace("''","'", $edit_row->bio):str_replace("''","'", set_value("bio"));?></textarea>
                                                                        </div>    
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="col-lg-6"> 
                                                                        <div class="form-group">
                                                                            <label class="">Google Map location</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Google Map location" id="gmap_pin_url" name="gmap_pin_url" value="<?php echo (isset($edit_row) && !empty($edit_row->gmap_pin_url!='')) ?  stripslashes($edit_row->gmap_pin_url):set_value("gmap_pin_url");?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="">Website address</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Website address" id="website_url" name="website_url" value="<?php echo (isset($edit_row) && !empty($edit_row->website_url!='')) ?  stripslashes($edit_row->website_url):set_value("website_url");?>" />
                                                                        </div>        
                                                                        <?php if(isset($plan_details) && in_array("Social Media Link", $plan_details)) { ?>
                                                                        <div class="form-group">
                                                                            <label class="">YouTube link</label><br/>
                                                                            <input type="text" class="form-control" placeholder="YouTube link" id="youtube_page_link" name="youtube_page_link" value="<?php echo (isset($edit_row) && !empty($edit_row->youtube_link!='')) ?  stripslashes($edit_row->youtube_link):set_value("youtube_page_link");?>" />
                                                                        </div>     
                                                                        <div class="form-group">
                                                                            <label class="">Facebook link</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Facebook link" id="facebook_page_link" name="facebook_page_link" value="<?php echo (isset($edit_row) && !empty($edit_row->facebook_page_link!='')) ?  stripslashes($edit_row->facebook_page_link):set_value("facebook_page_link");?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="">Instagram link</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Instagram link" id="instagram_page_link" name="instagram_page_link" value="<?php echo (isset($edit_row) && !empty($edit_row->instagram_page_link!='')) ?  stripslashes($edit_row->instagram_page_link):set_value("instagram_page_link");?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="">Linkedin link</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Linkedin link" id="linkedin_page_link" name="linkedin_page_link" value="<?php echo (isset($edit_row) && !empty($edit_row->linkedin_page_link!='')) ?  stripslashes($edit_row->linkedin_page_link):set_value("linkedin_page_link");?>" />
                                                                        </div>    
                                                                        <div class="form-group">
                                                                            <label class="">Twitter link</label><br/>
                                                                            <input type="text" class="form-control" placeholder="Twitter link" id="twitter_page_link" name="twitter_page_link" value="<?php echo (isset($edit_row) && !empty($edit_row->twitter_page_link!='')) ?  stripslashes($edit_row->twitter_page_link):set_value("twitter_page_link");?>" />
                                                                        </div> 

                                                                        <?php } ?>
                                                                        <?php if(isset($plan_details) && in_array("Video", $plan_details)) { ?>
                                                                        <div class="form-group">
                                                                            <label class="">Add Video file</label><br/>
                                                                            <input type="file" name="video_file" class="filestyle video_file" data-buttonname="btn-secondary" accept="video/mp4,video/x-m4v" />   
                                                                            <?php if(isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->video_file_path)) { ?>               
                                                                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#video_file_path">
                                                                                <span>View Video</span></a>
                                                                                <!-- sample modal content -->
                                                                                <div id="video_file_path" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title mt-0" id="myModalLabel">Preview</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                                                    <iframe id="video_iframe" class="embed-responsive-item" src="<?php echo $digital_card_html_data['digital_card_data']->video_file_path;?>"></iframe>
                                                                                                </div><br/> 
                                                                                                <br/>
                                                                                                <input type="hidden" class="hidden_deleted_video_file" name="hidden_deleted_video_file" value="" />
                                                                                                <button type="button" class="btn delete_video_file"><i class="mdi mdi-trash-can-outline"></i> &nbsp;Delete Video File</button>     
                                                                                            </div>                   
                                                                                        </div>
                                                                                        <!-- /.modal-content -->
                                                                                    </div>
                                                                                    <!-- /.modal-dialog -->
                                                                                </div>
                                                                                <!-- /.modal -->
                                                                            <?php } else { echo "<br/>";} ?>
                                                                        </div>  
                                                                        <?php } ?>
                                                                        <div  class="form-group">        
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
                                                    <?php if(isset($plan_details) && in_array("Basic Template Colour Setup", $plan_details)) { ?>
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header p-3" id="headingTwo">
                                                            <h6 class="m-0 font-size-14">
                                                                <a href="#collapseTwo" class="text-dark collapsed" data-toggle="collapse"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseTwo">
                                                                    Template Basic Color Setup
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="row">                
                                                                    <div class="col-lg-3">      
                                                                        <div class="form-group">
                                                                            <label class="">Content Background Color<span class="required">*</span></label>
                                                                            <input required class="form-control example-color-input" type="color" name="content_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->content_background_color)) ? $digital_card_html_data['digital_card_data']->content_background_color:$template_row->content_background_color;?>" id="input_background_bg">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-3">    
                                                                        <div class="form-group">
                                                                            <label class="">Content Font color</label>
                                                                            <input required class="form-control example-color-input" type="color" name="content_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->content_font_color)) ? $digital_card_html_data['digital_card_data']->content_font_color:$template_row->content_font_color;?>" id="input_font_bg">
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row">                
                                                                    <div class="col-lg-3">      
                                                                        <div class="form-group">
                                                                            <label class="">Contact Background Color<span class="required">*</span></label>
                                                                            <input required class="form-control example-color-input" type="color" name="contact_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->contact_background_color)) ? $digital_card_html_data['digital_card_data']->contact_background_color:$template_row->contact_background_color;?>" id="input_background_bg">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-3">    
                                                                        <div class="form-group">
                                                                            <label class="">Contact Font color</label>
                                                                            <input required class="form-control example-color-input" type="color" name="contact_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->contact_font_color)) ? $digital_card_html_data['digital_card_data']->contact_font_color:$template_row->contact_font_color;?>" id="input_font_bg">
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if(isset($plan_details) && in_array("Premium Template Colour Setup", $plan_details)) { ?>
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header p-3" id="headingTwo">
                                                            <h6 class="m-0 font-size-14">
                                                                <a href="#collapseThree" class="text-dark collapsed" data-toggle="collapse"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseThree">
                                                                    Template Section Color Setup
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="row">                
                                                                    <label class="col-lg-12">Header Section  </label><br/>                                       
                                                                    <div class="col-lg-3">      
                                                                        <div class="form-group">
                                                                            <label class="">Background Color<span class="required">*</span></label>
                                                                            <input required class="form-control example-color-input" type="color" name="header_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->header_background_color)) ? $digital_card_html_data['digital_card_data']->header_background_color:$template_row->header_background_color;?>" id="input_background_hdr">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-3">    
                                                                        <div class="form-group">
                                                                            <label class="">Font color</label>
                                                                            <input required class="form-control example-color-input" type="color" name="header_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->header_font_color)) ? $digital_card_html_data['digital_card_data']->header_font_color:$template_row->header_font_color;?>" id="input_font_hdr">
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row">                
                                                                    <label class="col-lg-12">Content Section  </label><br/>                                       
                                                                    <div class="col-lg-3">      
                                                                        <div class="form-group">
                                                                            <label class="">Background Color<span class="required">*</span></label>
                                                                            <input required class="form-control example-color-input" type="color" name="content_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->content_background_color)) ? $digital_card_html_data['digital_card_data']->content_background_color:$template_row->content_background_color;?>" id="input_background_cnt">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-3">    
                                                                        <div class="form-group">
                                                                            <label class="">Font color</label>
                                                                            <input required class="form-control example-color-input" type="color" name="content_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->content_font_color)) ? $digital_card_html_data['digital_card_data']->content_font_color:$template_row->content_font_color;?>" id="input_font_cnt">
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <div class="row">                
                                                                    <label class="col-lg-12">Contact Details Section  </label><br/>                                       
                                                                    <div class="col-lg-3">      
                                                                        <div class="form-group">
                                                                            <label class="">Background Color<span class="required">*</span></label>
                                                                            <input required class="form-control example-color-input" type="color" name="contact_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->contact_background_color)) ? $digital_card_html_data['digital_card_data']->contact_background_color:$template_row->contact_background_color;?>" id="input_background_contact">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-3">    
                                                                        <div class="form-group">
                                                                            <label class="">Font color</label>
                                                                            <input required class="form-control example-color-input" type="color" name="contact_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->contact_font_color)) ? $digital_card_html_data['digital_card_data']->contact_font_color:$template_row->contact_font_color;?>" id="input_font_contact">
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <!--<div class="row">
                                                                    <div class="col-lg-12"> 
                                                                        <div class="form-group">
                                                                            <label class="preview_div">Preview</label><br/>
                                                                            <div class="preview_template"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if(isset($plan_details) && in_array("Accordian Colour Setup", $plan_details)) { ?>
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header p-3" id="headingTwo">
                                                            <h6 class="m-0 font-size-14">
                                                                <a href="#collapseFour" class="text-dark collapsed" data-toggle="collapse"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseFour">
                                                                    Accordian/Modal Color Setup
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="row">                
                                                                    <div class="col-lg-3">      
                                                                        <div class="form-group">
                                                                            <label class="">Background Color<span class="required">*</span></label>
                                                                            <input required class="form-control example-color-input" type="color" name="modal_menu_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->modal_menu_background_color)) ? $digital_card_html_data['digital_card_data']->modal_menu_background_color:$template_row->accordian_background_color;?>" id="input_background_bgg">
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-3">    
                                                                        <div class="form-group">
                                                                            <label class="">Font color</label>
                                                                            <input required class="form-control example-color-input" type="color" name="modal_menu_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->modal_menu_font_color)) ? $digital_card_html_data['digital_card_data']->modal_menu_font_color:$template_row->accordian_font_color;?>" id="input_font_bgg">
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if(isset($plan_details) && in_array("Pages(Modal/Accordian)", $plan_details)) { ?>
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header p-3" id="headingTwo">
                                                            <h6 class="m-0 font-size-14">
                                                                <a href="#collapseFive" class="text-dark collapsed" data-toggle="collapse"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseFive">
                                                                    Menus Setup
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="row">                                                       
                                                                    <div class="col-lg-12">    
                                                                        <div class="form-group">
                                                                            <label class="">Menus to be opened as</label><br/>
                                                                            <input type="radio" checked id="accordian_menu" name="menus_opened_as" value="Accordian" <?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->menus_opened_as) && $digital_card_html_data['digital_card_data']->menus_opened_as=='Accordian') ? "checked":"";?> />Accordian
                                                                            <input type="radio" id="modal_menu" name="menus_opened_as" value="Modal" <?php echo (isset($digital_card_row) && !empty($digital_card_html_data['digital_card_data']->menus_opened_as) && $digital_card_html_data['digital_card_data']->menus_opened_as=='Modal') ? "checked":"";?> />Modal
                                                                        </div>  
                                                                        <div class="form-group">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <td>Accordian Label</td>
                                                                                        <td>Content</td>
                                                                                        <td>Add</td>
                                                                                    </tr>    
                                                                                <thead>
                                                                                <tbody class="tbody_form_editor">
                                                                                <?php 
                                                                                if(isset($digital_card_html_data['menus_data']) && !empty($digital_card_html_data['menus_data'])) {
                                                                                    $cnt = 1;
                                                                                    foreach($digital_card_html_data['menus_data'] as $menus_row_data) { ?>
                                                                                        <tr class="tr_<?php echo $cnt;?>">
                                                                                            <td align="left" valign="top">
                                                                                                <input type="text" class="form-control" name="accordian_label_<?php echo $cnt;?>" placeholder="Accordian Label" value="<?php echo (isset($menus_row_data) && !empty($menus_row_data->accordian_label)) ?  stripslashes($menus_row_data->accordian_label):"";?>" />
                                                                                                <input type="hidden" name="input_counter[]" value="<?php echo $cnt;?>" />
                                                                                            </td>
                                                                                            <td align="left" valign="top">
                                                                                                <textarea placeholder="Accordian Content goes here" class="form-control elm1" name="accordian_content_<?php echo $cnt;?>" rows="10" cols="100"><?php echo (isset($menus_row_data) && !empty($menus_row_data->accordian_contents)) ?  stripslashes($menus_row_data->accordian_contents):"";?></textarea><br/>
                                                                                                <input type="file" name="menus_content_images_<?php echo $cnt;?>" class="filestyle menu_image_<?php echo $cnt;?>" data-buttonname="btn-secondary" accept="images/*" /> <br/>
                                                                                                <?php if(isset($menus_row_data) && !empty($menus_row_data->accordian_menu_image_path)) { ?>
                                                                                                    
                                                                                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#accordian_menu_path_<?php echo $cnt;?>">
                                                                                                    <span>View Image</span></a>
                                                                                                    <!-- sample modal content -->
                                                                                                    <div id="accordian_menu_path_<?php echo $cnt;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                                        <div class="modal-dialog">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    <h5 class="modal-title mt-0" id="myModalLabel">Preview</h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                                                </div>
                                                                                                                <div class="modal-body">
                                                                                                                    <img id="menu_image_path_<?php echo $cnt;?>" src="<?php echo stripslashes($menus_row_data->accordian_menu_image_path);?>" alt="Menu Image <?php echo $cnt;?>"/>  
                                                                                                                    <input type="hidden" class="hidden_deleted_menu_image_<?php echo $cnt;?>" name="hidden_deleted_menu_image_<?php echo $cnt;?>" value="<?php echo stripslashes($menus_row_data->accordian_menu_image_path);?>" />
                                                                                                                    <button type="button" class="btn delete_menu_image_<?php echo $cnt;?>"><i class="mdi mdi-trash-can-outline"></i> &nbsp;Delete Menu Image</button>          
                                                                                                                </div>                 
                                                                                                            </div>
                                                                                                            <!-- /.modal-content -->
                                                                                                        </div>
                                                                                                        <!-- /.modal-dialog -->
                                                                                                    </div>
                                                                                                <?php } ?>
                                                                                                
                                                                                            </td>
                                                                                            <td align="left" valign="top">
                                                                                                <input type="button" onclick="return add_tr_to_table(<?php echo $cnt+1; ?>);" class="btn btn-success waves-effect waves-light" value="+">
                                                                                                
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php
                                                                                        $cnt++;
                                                                                    }
                                                                                    for($cnt; $cnt<6; $cnt++) { ?>
                                                                                        <tr class="tr_<?php echo $cnt;?> hide">
                                                                                            <td align="left" valign="top">
                                                                                                <input type="text" class="form-control" name="accordian_label_<?php echo $cnt;?>" placeholder="Accordian Label" />
                                                                                                <input type="hidden" name="input_counter[]" value="<?php echo $cnt;?>" />
                                                                                            </td>
                                                                                            <td align="left" valign="top">
                                                                                                <textarea placeholder="Accordian Content goes here" class="form-control elm1" name="accordian_content_<?php echo $cnt;?>" rows="10" cols="100"></textarea><br/>
                                                                                                <input type="file" name="menus_content_images_<?php echo $cnt;?>" class="filestyle slider_images_<?php echo $cnt;?>" data-buttonname="btn-secondary" accept="images/*" /> 
                                                                                            </td>
                                                                                            <td align="left" valign="top">
                                                                                                <input type="button" onclick="return add_tr_to_table(<?php echo ($cnt+1);?>);" class="btn btn-success waves-effect waves-light" value="+">
                                                                                                
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php }
                                                                                } else {
                                                                                ?>
                                                                                    <tr class="tr_1">
                                                                                        <td align="left" valign="top">
                                                                                            <input type="text" class="form-control" name="accordian_label_1" placeholder="Accordian Label" />
                                                                                            <input type="hidden" name="input_counter[]" value="1" />
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <textarea placeholder="Accordian Content goes here" class="form-control elm1" name="accordian_content_1" rows="10" cols="100"></textarea><br/>
                                                                                            <input type="file" name="menus_content_images_1" class="filestyle slider_images_1" data-buttonname="btn-secondary" accept="images/*" /> 
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <input type="button" onclick="return add_tr_to_table(2);" class="btn btn-success waves-effect waves-light" value="+">
                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="tr_2 hide">
                                                                                        <td align="left" valign="top">
                                                                                            <input type="text" class="form-control" name="accordian_label_2" placeholder="Accordian Label" />
                                                                                            <input type="hidden" name="input_counter[]" value="2" />
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <textarea placeholder="Accordian Content goes here" class="form-control elm1" name="accordian_content_2" rows="10" cols="100"></textarea>
                                                                                            <br/>
                                                                                            <input type="file" name="menus_content_images_2" class="filestyle slider_images_2" data-buttonname="btn-secondary" accept="images/*" /> 
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <input type="button" onclick="return add_tr_to_table(3);" class="btn btn-success waves-effect waves-light" value="+">
                                                                                            <input type="button" onclick="return remove_tr_from_table(2);" class="btn btn-danger" value="-">      
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="tr_3 hide">
                                                                                        <td align="left" valign="top">
                                                                                            <input type="text" class="form-control" name="accordian_label_3" placeholder="Accordian Label" />
                                                                                            <input type="hidden" name="input_counter[]" value="3" />
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <textarea placeholder="Accordian Content goes here" class="form-control elm1" name="accordian_content_3" rows="10" cols="100"></textarea><br/>
                                                                                            <input type="file" name="menus_content_images_3" class="filestyle slider_images_3" data-buttonname="btn-secondary" accept="images/*" /> 
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <input type="button" onclick="return add_tr_to_table(4);" class="btn btn-success waves-effect waves-light" value="+">
                                                                                            <input type="button" onclick="return remove_tr_from_table(3);" class="btn btn-danger" value="-">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="tr_4 hide">
                                                                                        <td align="left" valign="top">
                                                                                            <input type="text" class="form-control" name="accordian_label_4" placeholder="Accordian Label" />
                                                                                            <input type="hidden" name="input_counter[]" value="4" />
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <textarea placeholder="Accordian Content goes here" class="form-control elm1" name="accordian_content_4" rows="10" cols="100"></textarea><br/>
                                                                                            <input type="file" name="menus_content_images_4" class="filestyle slider_images_4" data-buttonname="btn-secondary" accept="images/*" /> 
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <input type="button" onclick="return add_tr_to_table(5);" class="btn btn-success waves-effect waves-light" value="+">
                                                                                            <input type="button" onclick="return remove_tr_from_table(4);" class="btn btn-danger" value="-">
                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr class="tr_5 hide">
                                                                                        <td align="left" valign="top">
                                                                                            <input type="text" class="form-control" name="accordian_label_5" placeholder="Accordian Label" />
                                                                                            <input type="hidden" name="input_counter[]" value="5" />
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <textarea placeholder="Accordian Content goes here" class="form-control elm1" name="accordian_content_5" rows="10" cols="100"></textarea><br/>
                                                                                            <input type="file" name="menus_content_images_5" class="filestyle slider_images_5" data-buttonname="btn-secondary" accept="images/*" /> 
                                                                                        </td>
                                                                                        <td align="left" valign="top">
                                                                                            <input type="button" onclick="return add_tr_to_table(6);" class="btn btn-success waves-effect waves-light" value="+">
                                                                                            <input type="button" onclick="return remove_tr_from_table(5);" class="btn btn-danger" value="-">
                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                                </tbody>
                                                                            </table>
                                                                            
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                    <?php } ?>     
                                                    <?php if(isset($plan_details) && in_array("Chat", $plan_details)) { ?>
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header p-3" id="headingThree">
                                                            <h6 class="m-0 font-size-14">
                                                                <a href="#collapseThree" class="text-dark collapsed" data-toggle="collapse"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseThree">
                                                                    Chat Settings
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="row">    
                                                                    <div class="col-lg-6"> 
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <label class="">Whatsapp No.<span class="required">*</span></label><br/>
                                                                                <div class="form-group row">
                                                                                    <div class="col col-lg-4 col-md-4">
                                                                                        <select class="form-control select2" required name="whatsapp_country_code">
                                                                                        <?php if(isset($country_data) && $country_data) { ?>
                                                                                            <option <?php echo (isset($edit_row) && !empty($edit_row->whatsapp_country_code=="")) ? "selected":"";?> value="">Select Country</option>
                                                                                            <?php foreach($country_data as $country_row) { ?>
                                                                                                <option <?php echo (isset($edit_row) && !empty($edit_row->whatsapp_country_code==$country_row->contry_isd_code)) ? "selected":"";?> value="<?php echo $country_row->contry_isd_code;?>"><?php echo "(+".$country_row->contry_isd_code.")". $country_row->contry_name;?></option>
                                                                                            <?php } 
                                                                                        } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col col-lg-8 col-md-8"> 
                                                                                        <input type="text" maxlength="15" required class="form-control" placeholder="Whatsapp Number" id="whatsapp_number" name="whatsapp_number" value="<?php echo (isset($edit_row) && !empty($edit_row->whatsapp_number!='')) ?  stripslashes($edit_row->whatsapp_number):set_value("whatsapp_number");?>" />
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-12"> 
                                                                                <div class="form-group">
                                                                                    <label class="">Telegram Link</label><br/>
                                                                                    <input type="text" placeholder="Telegram Link" class="form-control"  id="telegram_link" name="telegram_link" value="<?php echo (isset($edit_row) && !empty($edit_row->telegram_link!='')) ? $edit_row->telegram_link:set_value("telegram_link");?>" />
                                                                                </div> 
                                                                            </div>
                                                                        </div>  
                                                                    </div> 
                                                                    <div class="col-lg-6">
                                                                        <div class="row">                
                                                                            <div class="col-lg-6">      
                                                                                <div class="form-group">
                                                                                    <label class="">Background Color<span class="required">*</span></label>
                                                                                    <input required class="form-control example-color-input" type="color" name="content_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->content_background_color)) ? $digital_card_html_data['digital_card_data']->content_background_color:$template_row->content_background_color;?>" id="input_background_bg">
                                                                                </div>  
                                                                            </div>
                                                                            <div class="col-lg-6">    
                                                                                <div class="form-group">
                                                                                    <label class="">Font color</label>
                                                                                    <input required class="form-control example-color-input" type="color" name="content_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->content_font_color)) ? $digital_card_html_data['digital_card_data']->content_font_color:$template_row->content_font_color;?>" id="input_font_bg">
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">                
                                                                            <div class="col-lg-6">      
                                                                                <div class="form-group">
                                                                                    <label class="">Contact Background Color<span class="required">*</span></label>
                                                                                    <input required class="form-control example-color-input" type="color" name="contact_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->contact_background_color)) ? $digital_card_html_data['digital_card_data']->contact_background_color:$template_row->contact_background_color;?>" id="input_background_bg">
                                                                                </div>  
                                                                            </div>
                                                                            <div class="col-lg-6">    
                                                                                <div class="form-group">
                                                                                    <label class="">Contact Font color</label>
                                                                                    <input required class="form-control example-color-input" type="color" name="contact_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->contact_font_color)) ? $digital_card_html_data['digital_card_data']->contact_font_color:$template_row->contact_font_color;?>" id="input_font_bg">
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if(isset($plan_details) && in_array("Social Media Link", $plan_details)) { ?>
                                                    <div class="card mb-1 shadow-none">
                                                        <div class="card-header p-3" id="headingThree">
                                                            <h6 class="m-0 font-size-14">
                                                                <a href="#collapseThree" class="text-dark collapsed" data-toggle="collapse"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseThree">
                                                                    Social Media Settings
                                                                </a>
                                                            </h6>
                                                        </div>
                                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="row">    
                                                                    <div class="col-lg-6"> 
                                                                        <div class="row">
                                                                            <div class="col-lg-8">
                                                                                <label class="">Whatsapp No.<span class="required">*</span></label><br/>
                                                                                <div class="form-group row">
                                                                                    <div class="col col-lg-4 col-md-4">
                                                                                        <select class="form-control select2" required name="whatsapp_country_code">
                                                                                        <?php if(isset($country_data) && $country_data) { ?>
                                                                                            <option <?php echo (isset($edit_row) && !empty($edit_row->whatsapp_country_code=="")) ? "selected":"";?> value="">Select Country</option>
                                                                                            <?php foreach($country_data as $country_row) { ?>
                                                                                                <option <?php echo (isset($edit_row) && !empty($edit_row->whatsapp_country_code==$country_row->contry_isd_code)) ? "selected":"";?> value="<?php echo $country_row->contry_isd_code;?>"><?php echo "(+".$country_row->contry_isd_code.")". $country_row->contry_name;?></option>
                                                                                            <?php } 
                                                                                        } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col col-lg-8 col-md-8"> 
                                                                                        <input type="text" maxlength="15" required class="form-control" placeholder="Whatsapp Number" id="whatsapp_number" name="whatsapp_number" value="<?php echo (isset($edit_row) && !empty($edit_row->whatsapp_number!='')) ?  stripslashes($edit_row->whatsapp_number):set_value("whatsapp_number");?>" />
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-8"> 
                                                                                <div class="form-group">
                                                                                    <label class="">Telegram Link</label><br/>
                                                                                    <input type="text" placeholder="Telegram Link" class="form-control"  id="telegram_link" name="telegram_link" value="<?php echo (isset($edit_row) && !empty($edit_row->telegram_link!='')) ? $edit_row->telegram_link:set_value("telegram_link");?>" />
                                                                                </div> 
                                                                            </div>
                                                                        </div>  
                                                                    </div> 
                                                                    <div class="col-lg-6">
                                                                        <div class="row">                
                                                                            <div class="col-lg-6">      
                                                                                <div class="form-group">
                                                                                    <label class="">Background Color<span class="required">*</span></label>
                                                                                    <input required class="form-control example-color-input" type="color" name="content_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->content_background_color)) ? $digital_card_html_data['digital_card_data']->content_background_color:$template_row->content_background_color;?>" id="input_background_bg">
                                                                                </div>  
                                                                            </div>
                                                                            <div class="col-lg-6">    
                                                                                <div class="form-group">
                                                                                    <label class="">Font color</label>
                                                                                    <input required class="form-control example-color-input" type="color" name="content_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->content_font_color)) ? $digital_card_html_data['digital_card_data']->content_font_color:$template_row->content_font_color;?>" id="input_font_bg">
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">                
                                                                            <div class="col-lg-6">      
                                                                                <div class="form-group">
                                                                                    <label class="">Contact Background Color<span class="required">*</span></label>
                                                                                    <input required class="form-control example-color-input" type="color" name="contact_background_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->contact_background_color)) ? $digital_card_html_data['digital_card_data']->contact_background_color:$template_row->contact_background_color;?>" id="input_background_bg">
                                                                                </div>  
                                                                            </div>
                                                                            <div class="col-lg-6">    
                                                                                <div class="form-group">
                                                                                    <label class="">Contact Font color</label>
                                                                                    <input required class="form-control example-color-input" type="color" name="contact_font_color" value="<?php echo (isset($digital_card_html_data['digital_card_data']) && !empty($digital_card_html_data['digital_card_data']->contact_font_color)) ? $digital_card_html_data['digital_card_data']->contact_font_color:$template_row->contact_font_color;?>" id="input_font_bg">
                                                                                </div>  
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button">
                                                                        Apply Changes To Template
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

            <script src="<?php echo base_url();?>public/assets/libs/select2/js/select2.min.js"></script>
            <script>$(".select2").select2();</script>

            <script src="<?php echo base_url();?>public/assets/libs/parsleyjs/parsley.min.js"></script>
            <script src="<?php echo base_url();?>public/assets/js/pages/form-validation.init.js"></script>

            <!-- Sweet Alerts js -->
            <script src="<?php echo base_url();?>public/assets/libs/sweetalert2/sweetalert2.min.js"></script>

            <!-- Sweet alert init js-->           
            <script>

            <?php if($this->session->flashdata("message") == "To continue Offer section first complete your profile") { ?>
                alert("Please complete profile setting then you can add offers");
            <?php } ?>
                var delete_role_module_mapping_master_id = null;
                $(".table_delete_button").click(function(){
                    delete_role_module_mapping_master_id = $(this).val();
                });

                var undo_delete_master_id = null;
                $(".table_undelete_button").click(function(){
                    undo_delete_master_id = $(this).val();
                });               
                //Show sweet alert when data saved successfully
                <?php 
                if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="Welcome to Bizicards") { ?>
                    //!function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Welcome to Bizicards!!!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } 
                
                if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="success") { ?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Data saved successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } 
                elseif(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="deleted") { ?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Data deleted successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php }
                elseif(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="undeleted") { ?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Data activated again successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php }
                elseif(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="error") { ?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Error in process!",type:"error",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } 
                else if(!empty($this->session->flashdata("message")) && $this->session->flashdata("message")=="EXIST") { ?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Module and MVC Path combination already exists!",type:"error",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } ?>
                // !function(t){"use strict";function e(){}e.prototype.init=function(){t(".table_delete_button").click(function(){Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                
                //     $.ajax({
                //         url:"<?php echo base_url();?>delete_role_module_mapping_master_data",
                //         cache: false,
                //          data:{"role_module_mapping_master_id":delete_role_module_mapping_master_id},
                //         type: "POST",
                //         success: function(data) {
                //             location.reload();
                //         }
                //     });
                // })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If undo delete of any master data then this will execute
                // !function(t){"use strict";function e(){}e.prototype.init=function(){t(".table_undelete_button").click(function(){Swal.fire({title:"Do you want to undo deleted data?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, undo it!"}).then(function(t){
                    
                //     $.ajax({
                //         url:"<?php echo base_url();?>undo_deleted_role_module_mapping_master_data",
                //         cache: false,
                //         data:{"role_module_mapping_master_id": undo_delete_master_id},
                //         type: "POST",
                //         success: function(data) {
                //             location.reload();
                //         }
                //     });
                // })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to delete slider one image
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_slider_one").click(function(){Swal.fire({title:"Do you want to delete slider image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    $("#slider_image_one").remove();
                    $(".hidden_deleted_flag_slider_image_one").val("slider_one_deleted");
                    Swal.fire({text:"Image Deleted Successfully",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to delete slider two image
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_slider_two").click(function(){Swal.fire({title:"Do you want to delete slider image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    $("#slider_image_two").remove();
                    $(".hidden_deleted_flag_slider_image_two").val("slider_two_deleted");
                    Swal.fire({text:"Image Deleted Successfully",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to delete slider three image
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_slider_three").click(function(){Swal.fire({title:"Do you want to delete slider image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    $("#slider_image_three").remove();
                    $(".hidden_deleted_flag_slider_image_three").val("slider_three_deleted");
                    Swal.fire({text:"Image Deleted Successfully",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to delete video file
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_video_file").click(function(){Swal.fire({title:"Do you want to delete video file?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    if(t.value) {
                        Swal.fire({title:"Deleted!",text:"Your video file has been deleted.",type:"success"});
                        $("#video_iframe").remove();
                        $(".hidden_deleted_video_file").val("video_deleted");
                    } else {
                        t.dismiss===Swal.DismissReason.cancel
                    }
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
            
                //If user wants to remove menu 1 image file for menu
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_menu_image_1").click(function(){Swal.fire({title:"Do you want to delete menu image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    if(t.value) {
                        Swal.fire({title:"Deleted!",text:"Your file has been deleted.",type:"success"});
                        $("#menu_image_path_1").remove();
                        $(".hidden_deleted_menu_image_1").val(null);
                    } else {
                        t.dismiss===Swal.DismissReason.cancel
                    }
                }
                )})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to remove menu 2 image file for menu
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_menu_image_2").click(function(){Swal.fire({title:"Do you want to delete menu image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    if(t.value) {
                        Swal.fire({title:"Deleted!",text:"Your file has been deleted.",type:"success"});
                        $("#menu_image_path_2").remove();
                        $(".hidden_deleted_menu_image_2").val(null);
                    } else {
                        t.dismiss===Swal.DismissReason.cancel
                    }
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to remove menu 3 image file for menu
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_menu_image_3").click(function(){Swal.fire({title:"Do you want to delete menu image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    if(t.value) {
                        Swal.fire({title:"Deleted!",text:"Your file has been deleted.",type:"success"});
                        $("#menu_image_path_3").remove();
                        $(".hidden_deleted_menu_image_3").val(null);
                    } else {
                        t.dismiss===Swal.DismissReason.cancel
                    }
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to remove menu 4 image file for menu
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_menu_image_4").click(function(){Swal.fire({title:"Do you want to delete menu image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    if(t.value) {
                        Swal.fire({title:"Deleted!",text:"Your file has been deleted.",type:"success"});
                        $("#menu_image_path_4").remove();
                        $(".hidden_deleted_menu_image_4").val(null);
                    } else {
                        t.dismiss===Swal.DismissReason.cancel
                    }
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to remove menu 5 image file for menu
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_menu_image_5").click(function(){Swal.fire({title:"Do you want to delete menu image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    if(t.value) {
                        Swal.fire({title:"Deleted!",text:"Your file has been deleted.",type:"success"});
                        $("#menu_image_path_5").remove();
                        $(".hidden_deleted_menu_image_5").val(null);
                    } else {
                        t.dismiss===Swal.DismissReason.cancel
                    }
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

            <!--tinymce js-->  
            <script src="<?php echo base_url();?>public/assets/libs/tinymce/tinymce.min.js"></script>

            <!-- Form Editor init js -->
            <script src="<?php echo base_url();?>public/assets/js/pages/form-editor.init.js"></script>
            

            <!-- Datatable init js -->
            <script src="<?php echo base_url();?>public/assets/js/pages/datatables.init.js"></script>
             



            <!-- App js -->
            <script src="<?php echo base_url();?>public/assets/js/app.js"></script>
            <script>
                $(".video_file").change(function(){
                    if(Math.round(this.files[0].size/1024/1024) > 25) {
                        alert("Please select video file less than 25mb");
                        //$(".submit_button").attr("disabled", "true");
                        return false;
                    } else {
                        $(".submit_button").removeAttr("disabled");
                    }
                });
                $(".username").keyup(function(){
                    var s = $(this).val();
                    if(s.indexOf(' ') > 0) {
                        alert("Please remove spaces from username");
                        //$(".submit_button").attr("disabled", "true");
                        return false;
                    } else{
                        $(".submit_button").removeAttr("disabled");
                    }
                    <?php if(empty($edit_row->name)) { ?>
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
                    <?php } ?>
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
            $(".slider_images_1").change(function(){
                var hidden_deleted_flag_slider_image_one = $(".hidden_deleted_flag_slider_image_one").val();
                if(hidden_deleted_flag_slider_image_one == "slider_one_deleted")
                    $(".hidden_deleted_flag_slider_image_one").val(null);
            });
            $(".slider_images_2").change(function(){
                var hidden_deleted_flag_slider_image_two = $(".hidden_deleted_flag_slider_image_two").val();
                if(hidden_deleted_flag_slider_image_two == "slider_two_deleted")
                    $(".hidden_deleted_flag_slider_image_two").val(null);
            });
            $(".slider_images_3").change(function(){
                var hidden_deleted_flag_slider_image_three = $(".hidden_deleted_flag_slider_image_three").val();
                if(hidden_deleted_flag_slider_image_three == "slider_three_deleted")
                    $(".hidden_deleted_flag_slider_image_three").val(null);
            });

            //Set deleted flags for menus images
            $(".menu_image_one").change(function(){
                var hidden_deleted_menu_image_1 = $(".hidden_deleted_menu_image_1").val();
                if(hidden_deleted_menu_image_1 == "menu_image_one_deleted")
                    $(".hidden_deleted_menu_image_1").val(null);
            });
            $(".menu_image_two").change(function(){
                var hidden_deleted_menu_image_2 = $(".hidden_deleted_menu_image_2").val();
                if(hidden_deleted_menu_image_2 == "menu_image_two_deleted")
                    $(".hidden_deleted_menu_image_2").val(null);
            });
            $(".menu_image_three").change(function(){
                var hidden_deleted_menu_image_3 = $(".hidden_deleted_menu_image_3").val();
                if(hidden_deleted_menu_image_3 == "menu_image_three_deleted")
                    $(".hidden_deleted_menu_image_3").val(null);
            });
            $(".menu_image_four").change(function(){
                var hidden_deleted_menu_image_4 = $(".hidden_deleted_menu_image_4").val();
                if(hidden_deleted_menu_image_4 == "menu_image_four_deleted")
                    $(".hidden_deleted_menu_image_4").val(null);
            });
            $(".menu_image_five").change(function(){
                var hidden_deleted_menu_image_5 = $(".hidden_deleted_menu_image_5").val();
                if(hidden_deleted_menu_image_5 == "menu_image_five_deleted")
                    $(".hidden_deleted_menu_image_5").val(null);
            });
            

            $(document).ready(function(){
                //profile image cropping
                var $modal = $('#modal');
                var image = document.getElementById('sample_image');
                var cropper;
                var _URL = window.URL || window.webkitURL;               

                $('#upload_image').change(function(event){

                    var file, img;
                    if ((file = this.files[0])) {
                        img = new Image();
                        img.onload = function() {                           
                            if(this.width<500 && this.height<350){
                                alert("Please select image more than 500 pixel in width and height");
                                //$(".submit_button").attr("disabled", "true");
                                return false;
                            } else {
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
                                //$(".submit_button").removeAttr("disabled");
                            }
                        };
                        img.src = _URL.createObjectURL(file);
                    }                    
                });

                $modal.on('shown.bs.modal', function() {
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 0,
                        cropBoxMovable : true,
                        cropBoxResizable : false,
                        dragMode: 'move',
            
                        autoCropArea: 0.65,
                        restore: false,
                        guides: false,
                        center: false,
                        highlight: false,
                        toggleDragModeOnDblclick: false,
                        preview:'.preview'
                    });
                }).on('hidden.bs.modal', function(){
                    cropper.destroy();
                    cropper = null;
                });

                $('#crop').click(function(){
                    var explode = $("#upload_image").val().split(/C:\\fakepath\\/i);
                    console.log(explode[1]);
                    canvas = cropper.getCroppedCanvas({
                        
                    });
                    
                    canvas.toBlob(function(blob){
                        
                        url = URL.createObjectURL(blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function(){
                            var base64data = reader.result;
                            $.ajax({
                                url:'<?php echo base_url();?>crop_upload.php',
                                type:'POST',
                                data:{image:base64data,imagename:explode[1]},
                                success:function(data)
                                {
                                    var data = $.trim(data);
                                    var img_string = "<?php echo base_url();?>"+data;
                                    $modal.modal('hide');
                                    $('#uploaded_image').attr('src', img_string);
                                    $("#avatar_filename_hidden_path").val(img_string);
                                    $("#upload_image").val('');
                                }
                            });
                        };
                    });
                });      
            });
            $(document).ready(function(){
                //company image cropping
                var $modal_company = $('#modal_company');
                var image_company = document.getElementById('sample_image_company');
                var cropper_company;
                var _URL = window.URL || window.webkitURL;
                
                $('#upload_image_company').change(function(event){
                   
                    var company_file, company_image;
                    if ((company_file = this.files[0])) {
                        company_image = new Image();
                        company_image.onload = function() {     
                                       
                            if(this.width>300 && this.height>100){
                                alert("Please select image having maximum width*height as 300*100 only");
                                //$(".submit_button").attr("disabled", "true");
                                company_file = null;
                                $('#uploaded_image_company').attr('src', "<?php echo (isset($edit_row) && !empty($edit_row->co_logo_path)) ? $edit_row->co_logo_path : base_url()."user.png";?>");
                                return false;
                            } else {                              
                                //$(".submit_button").removeAttr("disabled");
                            }
                        };
                        company_image.src = _URL.createObjectURL(company_file);
                        $('#uploaded_image_company').attr('src', company_image.src);
                    } 
                    
                });

                /*$modal_company.on('shown.bs.modal', function() {
                    cropper_company = new Cropper(image_company, {
                        aspectRatio: 1,
                        viewMode: 0,
                        cropBoxMovable : true,
                        cropBoxResizable : false,
                        dragMode: 'move',
            
                        autoCropArea: 1,
                        restore: false,
                        guides: false,
                        center: false,
                        highlight: false,
                        toggleDragModeOnDblclick: false,
                        preview:'.preview_company'
                    });
                }).on('hidden.bs.modal', function(){
                    cropper_company.destroy();
                    cropper_company = null;
                });

                $('#crop_company_logo').click(function(){
                    var explode = $("#upload_image_company").val().split(/C:\\fakepath\\/i);
                   
                    company_logo_canvas = cropper_company.getCroppedCanvas({
                        
                    });
                   
                    company_logo_canvas.toBlob(function(company_blob){
                        
                        url = URL.createObjectURL(company_blob);
                        var reader = new FileReader();
                        reader.readAsDataURL(company_blob);
                        reader.onloadend = function(){
                            var base64data = reader.result;
                            $.ajax({
                                url:'<?php echo base_url();?>crop_upload.php',
                                type:'POST',
                                data:{image:base64data,imagename:explode[1]},
                                success:function(data)
                                {
                                    var img_string = "<?php echo base_url();?>"+data;
                                    $modal_company.modal('hide');
                                    $('#uploaded_image_company').attr('src', img_string);
                                    $("#company_filename_hidden_path").val(img_string);
                                }
                            });
                        };
                    });
                });  */
            });

            //Clear file selection in input file
            function clearFileSelection() {
                $('#upload_image').val('');
            }

            //var counter = 2;
            function add_tr_to_table(counter) {
                
                if(counter > 5){
                    alert("You can add maximum 5 accordian div's");
                    return false;
                }
                $(".tr_"+counter).removeClass("hide");
                //$(".tr_"+counter).addClass("show_div");

                /*
                var tbody_string = '<tr class="tr_'+counter+'"><td align="left" valign="top"><input type="text" placeholder="Accordian Label" class="form-control" name="accordian_label_'+counter+'" /><input type="hidden" name="input_counter[]" value="'+counter+'" /></td><td align="left" valign="top"><textarea  class="form-control menus_desc_'+counter+'" name="accordian_content_'+counter+'" placeholder="Accordian Content goes here" rows="10" cols="100"></textarea></td><td align="left" valign="top"><input type="button" onclick="return add_tr_to_table();" class="btn btn-success waves-effect waves-light" value="+"><input type="button" onclick="return remove_tr_from_table('+counter+');" class="btn btn-danger" value="-"></td></tr>';

                $(".tbody_form_editor").append(tbody_string);
                $(".menus_desc_"+counter).length&&tinymce.init({selector:"textarea.elm1",height:300,plugins:["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker","searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking","save table contextmenu directionality emoticons template paste textcolor"],toolbar:"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",style_formats:[{title:"Bold text",inline:"b"},{title:"Red text",inline:"span",styles:{color:"#ff0000"}},{title:"Red header",block:"h1",styles:{color:"#ff0000"}},{title:"Example 1",inline:"span",classes:"example1"},{title:"Example 2",inline:"span",classes:"example2"},{title:"Table styles"},{title:"Table row 1",selector:"tr",classes:"tablerow1"}]});
                counter++;
                */
            }

            function remove_tr_from_table(number) {
                //$(".tr_"+number).remove();
                $(".tr_"+number).addClass("hide");
            }

            $(".submit_button").click(function(){
                var bio_details_word_count = $(".tox-statusbar__wordcount").html();
                var explode = bio_details_word_count.split(" words");
                if(explode[0]>100) {
                    alert("Add Bio details should not be more than 100 words");
                    $("#bio").focus();
                    return false;
                } else {
                    
                }
            });

            </script>
            
            <script src="<?php echo base_url();?>public/assets/js/cropzee.js" defer></script>
            
            
            <script>
                $(document).ready(function () {
                    $("#input").cropzee();
                    $.each($("input[name='enable']"), function () {
                        if ($(this).is(":checked")) {
                            $(this).closest("div.uk-position-relative").find("textarea").removeAttr("disabled");
                        } else {
                            $(this).closest("div.uk-position-relative").find("textarea").attr("disabled", "disabled");
                        }
                    });
                    $("input, select, textarea").on("keyup change", $.debounce(300, function () {
                        destroyPlugin($("#input"));                        
                        $.each($("input[name='enable']"), function () {
                            if ($(this).is(":checked")) {
                                $(this).closest("div.uk-position-relative").find("textarea").removeAttr("disabled");
                            } else {
                                $(this).closest("div.uk-position-relative").find("textarea").attr("disabled", "disabled");
                            }
                        });
                        var aspectRatio = "";
                        $.each($("input[name='aspectRatio']"), function () {
                            aspectRatio += $(this).val();
                        });
                        var maxSize = [];
                        $.each($("input[name='maxSize'], select[name='maxSize']"), function () {
                            maxSize.push($(this).val());
                        });
                        var minSize = [];
                        $.each($("input[name='minSize'], select[name='minSize']"), function () {
                            minSize.push($(this).val());
                        });
                        var startSize = [];
                        $.each($("input[name='startSize'], select[name='startSize']"), function () {
                            startSize.push($(this).val());
                        });
                        var allowedInputs = [];
                        $.each($("input[name='allowedInputs']:checked"), function () {
                            allowedInputs.push($(this).val());
                        });
                        var imageExtension = "";
                        $.each($("input[name='imageExtension']:checked"), function () {
                            imageExtension += $(this).val();
                        });
                        var returnImageMode = "";
                        $.each($("input[name='returnImageMode']:checked"), function () {
                            returnImageMode += $(this).val();
                        });
                        var modalAnimation = "";
                        $.each($("select[name='modalAnimation']"), function () {
                            modalAnimation += $(this).val();
                        });
                        var onCropStart = null;
                        $.each($("textarea[name='onCropStart']"), function () {
                            if (!$(this).is(":disabled")) {
                                onCropStart = $(this).val();
                            }
                        });
                        var onCropMove = null;
                        $.each($("textarea[name='onCropMove']"), function () {
                            if (!$(this).is(":disabled")) {
                                onCropMove = $(this).val();
                            }
                        });
                        var onCropEnd = null;
                        $.each($("textarea[name='onCropEnd']"), function () {
                            if (!$(this).is(":disabled")) {
                                onCropEnd = $(this).val();
                            }
                        });
                        var onInitialize = null;
                        $.each($("textarea[name='onInitialize']"), function () {
                            if (!$(this).is(":disabled")) {
                                onInitialize = $(this).val();
                            }
                        });
                        window.options = {
                            aspectRatio: aspectRatio,
                            maxSize: maxSize,
                            minSize: minSize,
                            startSize: startSize,
                            onCropStart: onCropStart,
                            onCropMove: onCropMove,
                            onCropEnd: onCropEnd,
                            onInitialize: onInitialize,
                            modalAnimation: modalAnimation,
                            allowedInputs: allowedInputs,
                            imageExtension: imageExtension,
                            returnImageMode: returnImageMode,
                        }
                        // alert(JSON.stringify(options));
                        $("#input").cropzee(options);
                    }));
                });
                var destroyPlugin = function ($elem, eventNamespace) {
                    var isInstantiated = !!$.data($elem.get(0));
                    if (isInstantiated) {
                        $.removeData($elem.get(0));
                        $elem.off(eventNamespace);
                        $elem.unbind('.' + eventNamespace);
                    }
                };
            </script>
</body>

</html>