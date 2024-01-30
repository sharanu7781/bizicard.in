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

.preview_1 {
    overflow: hidden;
    width: 160px; 
    height: 160px;
    margin: 10px;
    border: 1px solid red;
}

.preview_2 {
    overflow: hidden;
    width: 160px; 
    height: 160px;
    margin: 10px;
    border: 1px solid red;
}

.preview_3 {
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
    /*border-radius: 50%;*/
}

.cropper-view-box {
    box-shadow: 0 0 0 1px #39f;
    outline: 0;
}

</style>
<!-- hederStyle -->
<?php $this->load->view("layouts/headerStyle"); ?>
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
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4>Add Offer Details</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Add Offer Details</a></li>
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
                                            if(isset($offers_slider_data) && !empty($offers_slider_data)) {
                                                foreach($offers_slider_data as $slider_row) {}
                                            }
                                            
                                            if(isset($template_data) && !empty($template_data)) {
                                                foreach($template_data as $template_row) {}
                                            }
                                            ?>      
                                            <form class="custom-validation" enctype="multipart/form-data" action="<?php echo base_url('profile_management/save_offer_slider_details');?>" method="POST">    
                                                <input type="hidden" name="template_id" value="<?php echo (isset($template_id) && !empty($template_id)) ? base64_encode($template_id):base64_encode($this->session->userdata("choosen_template"));?>" />
                                                                                                          
                                                    <?php if(isset($template_row) && $template_row->is_slider_supported == 1) { ?>
                                                    <div class="row">  
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="h5">Upload images for slider containing offer details and add to your digital card. You can add maximum 3 images for slider<label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="image_area">
                                                                    <label>Slider Image 1</label>
                                                                    <label for="upload_image_1">
                                                                        <img src="<?php echo (isset($slider_row) && !empty($slider_row->slider_image_one)) ? $slider_row->slider_image_one : base_url()."user.png";?>" id="uploaded_image_1"  class="img-responsive img-circle" />
                                                                        <div class="overlay">
                                                                            <div class="text">Select Image File</div>
                                                                        </div>
                                                                        <input type="file" name="slider_images[]" class=" image  slider_images_1" id="upload_image_1" style="display:none" accept="images/*" /> 

                                                                        <input type="hidden" name="slider_one_hidden_path" id="slider_one_hidden_path" value="<?php echo (isset($slider_row) && !empty($slider_row->slider_image_one)) ? $slider_row->slider_image_one : "";?>" />
                                                                        
                                                                    </label>
                                                                </div>
                                                                <div class="modal fade" id="modal_1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                                                                            <img src="" id="sample_image_1" />
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="preview_1"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" id="crop_1" class="btn btn-primary">Crop</button>
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php if(isset($slider_row) && !empty($slider_row->slider_image_one)) { ?>
                                                                </br/>
                                                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#slider_one_image">
                                                                    <span>View Image</span></a>
                                                                    <!-- sample modal content -->
                                                                    <div id="slider_one_image" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title mt-0" id="myModalLabel">Preview</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <img id="slider_image_one" src="<?php echo  $slider_row->slider_image_one;?>" alt="Slider one Image"/>   
                                                                                    <input type="hidden" class="hidden_deleted_flag_slider_image_one" name="hidden_deleted_flag_slider_image_one" value="" />
                                                                                    <br/>
                                                                                    <button type="button" class="btn delete_slider_one"><i class="mdi mdi-trash-can-outline"></i> &nbsp;Delete Slider Image</button>          
                                                                                </div>                 
                                                                            </div>
                                                                            <!-- /.modal-content -->
                                                                        </div>
                                                                        <!-- /.modal-dialog -->
                                                                    </div>
                                                                    <!-- /.modal -->
                                                                <?php } else { echo "<br/>";} ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="image_area">
                                                                    <label>Slider Image 2</label>
                                                                    <label for="upload_image_2">
                                                                        <img src="<?php echo (isset($slider_row) && !empty($slider_row->slider_image_two)) ? $slider_row->slider_image_two : base_url()."user.png";?>" id="uploaded_image_2"  class="img-responsive img-circle" />
                                                                        <div class="overlay">
                                                                            <div class="text">Select Image File</div>
                                                                        </div>
                                                                        <input type="file" name="slider_images[]" class=" image  slider_images_2" id="upload_image_2" style="display:none" accept="images/*" /> 

                                                                        <input type="hidden" name="slider_two_hidden_path" id="slider_two_hidden_path" value="<?php echo (isset($slider_row) && !empty($slider_row->slider_image_two)) ? $slider_row->slider_image_two : "";?>" />
                                                                        
                                                                    </label>
                                                                </div>
                                                                <div class="modal fade" id="modal_2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                                                                            <img src="" id="sample_image_2" />
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="preview_2"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" id="crop_2" class="btn btn-primary">Crop</button>
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php if(isset($slider_row) && !empty($slider_row->slider_image_two)) { ?>
                                                                <br/>
                                                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#slider_two_image">
                                                                    <span>View Image</span></a>
                                                                    <!-- sample modal content -->
                                                                    <div id="slider_two_image" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title mt-0" id="myModalLabel">Preview</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <img id="slider_image_two" src="<?php echo  $slider_row->slider_image_two;?>" alt="Slider two Image"/>   
                                                                                    <input type="hidden" class="hidden_deleted_flag_slider_image_two" name="hidden_deleted_flag_slider_image_two" value="" />
                                                                                    <br/>
                                                                                    <button type="button" class="btn delete_slider_two"><i class="mdi mdi-trash-can-outline"></i> &nbsp;Delete Slider Image</button>          
                                                                                </div>                 
                                                                            </div>
                                                                            <!-- /.modal-content -->
                                                                        </div>
                                                                        <!-- /.modal-dialog -->
                                                                    </div>
                                                                    <!-- /.modal -->
                                                                <?php } else { echo "<br/>";} ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <div class="image_area">
                                                                    <label>Slider Image 3</label>
                                                                    <label for="upload_image_3">
                                                                        <img src="<?php echo (isset($slider_row) && !empty($slider_row->slider_image_three)) ? $slider_row->slider_image_three : base_url()."user.png";?>" id="uploaded_image_3"  class="img-responsive img-circle" />
                                                                        <div class="overlay">
                                                                            <div class="text">Select Image File</div>
                                                                        </div>
                                                                        <input type="file" name="slider_images[]" class=" image  slider_images_3" id="upload_image_3" style="display:none" accept="images/*" /> 

                                                                        <input type="hidden" name="slider_three_hidden_path" id="slider_three_hidden_path" value="<?php echo (isset($slider_row) && !empty($slider_row->slider_image_three)) ? $slider_row->slider_image_three : "";?>" />
                                                                        
                                                                    </label>
                                                                </div>
                                                                <div class="modal fade" id="modal_3" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                                                                            <img src="" id="sample_image_3" />
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="preview_3"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" id="crop_3" class="btn btn-primary">Crop</button>
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php if(isset($slider_row) && !empty($slider_row->slider_image_three)) { ?><br/>
                                                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#slider_three_image">
                                                                    <span>View Image</span></a>
                                                                    <!-- sample modal content -->
                                                                    <div id="slider_three_image" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title mt-0" id="myModalLabel">Preview</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <img id="slider_image_three" src="<?php echo  $slider_row->slider_image_three;?>" alt="Slider three Image"/>   
                                                                                    <input type="hidden" class="hidden_deleted_flag_slider_image_three" name="hidden_deleted_flag_slider_image_three" value="" />
                                                                                    <br/>
                                                                                    <button type="button" class="btn delete_slider_three"><i class="mdi mdi-trash-can-outline"></i> &nbsp;Delete Slider Image</button>          
                                                                                </div>                 
                                                                            </div>
                                                                            <!-- /.modal-content -->
                                                                        </div>
                                                                        <!-- /.modal-dialog -->
                                                                    </div>
                                                                    <!-- /.modal -->
                                                                <?php } else { echo "<br/>";} ?>
                                                            </div>
                                                        </div>
                                                    </div>                                                     
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                                    <br/>
                                                        </div>
                                                    </div>                                                                    
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    
                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button">
                                                                        Add Offers Details to Card
                                                                    </button>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-0">
                                                                <label>Your selected template does not support slider feature. Contact website Admin.</label>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                <?php } ?>                           
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

                //If user wants to delete slider one image
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_slider_one").click(function(){Swal.fire({title:"Do you want to delete slider image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    if(t.value) {
                        Swal.fire({title:"Deleted!",text:"Your image file has been deleted.",type:"success"});
                        $("#slider_image_one").remove();
                        $("#uploaded_image_1").attr("src", "<?php echo  base_url()."user.png";?>");
                        $(".hidden_deleted_flag_slider_image_one").val("slider_one_deleted");
                        $("#slider_one_hidden_path").val(null);
                    } else {
                        t.dismiss===Swal.DismissReason.cancel
                    }
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to delete slider two image
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_slider_two").click(function(){Swal.fire({title:"Do you want to delete slider image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){                    
                    if(t.value) {
                        Swal.fire({title:"Deleted!",text:"Your image file has been deleted.",type:"success"});
                        $("#slider_image_two").remove();
                        $("#uploaded_image_2").attr("src", "<?php echo  base_url()."user.png";?>");
                        $(".hidden_deleted_flag_slider_image_two").val("slider_two_deleted");
                        $("#slider_two_hidden_path").val(null);
                    } else {
                        t.dismiss===Swal.DismissReason.cancel
                    }
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();

                //If user wants to delete slider three image
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".delete_slider_three").click(function(){Swal.fire({title:"Do you want to delete slider image?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){
                    if(t.value) {
                        Swal.fire({title:"Deleted!",text:"Your image file has been deleted.",type:"success"});
                        $("#slider_image_three").remove();
                        $("#uploaded_image_3").attr("src", "<?php echo  base_url()."user.png";?>");
                        $(".hidden_deleted_flag_slider_image_three").val("slider_three_deleted");
                        $("#slider_three_hidden_path").val(null);
                    } else {
                        t.dismiss===Swal.DismissReason.cancel
                    }
                })})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
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
            

            <script src="https://unpkg.com/dropzone"></script>
            <script src="https://unpkg.com/cropperjs"></script>
            <script>

            //Get cropping tool ready for Slider 1 section
            $(document).ready(function(){
                //profile image cropping
                var $modal = $('#modal_1');
                var image = document.getElementById('sample_image_1');
                var cropper;
                var _URL = window.URL || window.webkitURL;               

                $('#upload_image_1').change(function(event){

                    var file, img;
                    if ((file = this.files[0])) {
                        img = new Image();
                        img.onload = function() {                           
                            if(this.width<500 && this.height<500){
                                alert("Please select image more than 500 pixel in width");
                                $(".submit_button").attr("disabled", "true");
                                return false;
                            } else {
                                var files = event.target.files;
                    
                                var done = function(url){
                                    image.src = url;
                                    //$modal.modal('show');
                                };

                                if(files && files.length > 0)
                                {
                                    reader = new FileReader();
                                    reader.onload = function(event)
                                    {
                                        done(reader.result);
                                    };
                                    reader.readAsDataURL(files[0]);
                                    var explode = $("#upload_image_1").val().split(/C:\\fakepath\\/i);
                                    reader.onloadend = function(){
                                    var base64data = reader.result;
                                    $.ajax({
                                        url:'<?php echo base_url();?>crop_slider_image_upload.php',
                                        type:'POST',
                                        data:{image:base64data,imagename:explode[1]},
                                        success:function(data)
                                        {
                                            var img_string = "<?php echo base_url();?>"+data;
                                            $modal.modal('hide');
                                            $('#uploaded_image_1').attr('src', img_string);
                                            $("#slider_one_hidden_path").val(img_string);
                                        }
                                    });
                                };
                                }
                                $(".submit_button").removeAttr("disabled");
                            }
                        };
                        img.src = _URL.createObjectURL(file);

                        
                    }                    
                });

                // $modal.on('shown.bs.modal', function() {
                //     cropper = new Cropper(image, {
                //         aspectRatio: 1,
                //         viewMode: 0,
                //         cropBoxMovable : true,
                //         cropBoxResizable : true,
                //         preview:'.preview_1'
                //     });
                // }).on('hidden.bs.modal', function(){
                //     cropper.destroy();
                //     cropper = null;
                // });

                // $('#crop_1').click(function(){
                //     var explode = $("#upload_image_1").val().split(/C:\\fakepath\\/i);
                //     canvas = cropper.getCroppedCanvas({
                //         width:100,
                //         height:100
                //     });
                    
                //     canvas.toBlob(function(blob){
                        
                //         url = URL.createObjectURL(blob);
                //         var reader = new FileReader();
                //         reader.readAsDataURL(blob);
                //         reader.onloadend = function(){
                //             var base64data = reader.result;
                //             $.ajax({
                //                 url:'<?php echo base_url();?>crop_slider_image_upload.php',
                //                 type:'POST',
                //                 data:{image:base64data,imagename:explode[1]},
                //                 success:function(data)
                //                 {
                //                     var img_string = "<?php echo base_url();?>"+data;
                //                     $modal.modal('hide');
                //                     $('#uploaded_image_1').attr('src', img_string);
                //                     $("#slider_one_hidden_path").val(img_string);
                //                 }
                //             });
                //         };
                //     });
                // });      
            });

            //Get cropping tool ready for slider 2 section
            $(document).ready(function(){
                //profile image cropping
                var $modal = $('#modal_2');
                var image = document.getElementById('sample_image_2');
                var cropper;
                var _URL = window.URL || window.webkitURL;               

                $('#upload_image_2').change(function(event){

                    var file, img;
                    if ((file = this.files[0])) {
                        img = new Image();
                        img.onload = function() {                           
                            if(this.width<500 && this.height<500){
                                alert("Please select image more than 500 pixel in width");
                                $(".submit_button").attr("disabled", "true");
                                return false;
                            } else {
                                var files = event.target.files;
                    
                                var done = function(url){
                                    image.src = url;
                                    //$modal.modal('show');
                                };

                                if(files && files.length > 0)
                                {
                                    reader = new FileReader();
                                    reader.onload = function(event)
                                    {
                                        done(reader.result);
                                    };
                                    reader.readAsDataURL(files[0]);
                                    var explode = $("#upload_image_2").val().split(/C:\\fakepath\\/i);
                                    reader.onloadend = function(){
                                        var base64data = reader.result;
                                        $.ajax({
                                            url:'<?php echo base_url();?>crop_slider_image_upload.php',
                                            type:'POST',
                                            data:{image:base64data,imagename:explode[1]},
                                            success:function(data)
                                            {
                                                var img_string = "<?php echo base_url();?>"+data;
                                                $modal.modal('hide');
                                                $('#uploaded_image_2').attr('src', img_string);
                                                $("#slider_two_hidden_path").val(img_string);
                                            }
                                        });
                                    };
                                }
                                $(".submit_button").removeAttr("disabled");
                            }
                        };
                        img.src = _URL.createObjectURL(file);
                    }                    
                });

                // $modal.on('shown.bs.modal', function() {
                //     cropper = new Cropper(image, {
                //         aspectRatio: 1,
                //         viewMode: 0,
                //         cropBoxMovable : true,
                //         cropBoxResizable : true,
                //         preview:'.preview_2'
                //     });
                // }).on('hidden.bs.modal', function(){
                //     cropper.destroy();
                //     cropper = null;
                // });

                // $('#crop_2').click(function(){
                //     var explode = $("#upload_image_2").val().split(/C:\\fakepath\\/i);
                //     canvas = cropper.getCroppedCanvas({
                //         width:100,
                //         height:100
                //     });
                    
                //     canvas.toBlob(function(blob){
                        
                //         url = URL.createObjectURL(blob);
                //         var reader = new FileReader();
                //         reader.readAsDataURL(blob);
                //         reader.onloadend = function(){
                //             var base64data = reader.result;
                //             $.ajax({
                //                 url:'<?php echo base_url();?>crop_slider_image_upload.php',
                //                 type:'POST',
                //                 data:{image:base64data,imagename:explode[1]},
                //                 success:function(data)
                //                 {
                //                     var img_string = "<?php echo base_url();?>"+data;
                //                     $modal.modal('hide');
                //                     $('#uploaded_image_2').attr('src', img_string);
                //                     $("#slider_two_hidden_path").val(img_string);
                //                 }
                //             });
                //         };
                //     });
                // });      
            });

            //Get cropping tool ready for slider 3 section
            $(document).ready(function(){
                //profile image cropping
                var $modal = $('#modal_3');
                var image = document.getElementById('sample_image_3');
                var cropper;
                var _URL = window.URL || window.webkitURL;               

                $('#upload_image_3').change(function(event){

                    var file, img;
                    if ((file = this.files[0])) {
                        img = new Image();
                        img.onload = function() {                           
                            if(this.width<500 && this.height<500){
                                alert("Please select image more than 500 pixel in width");
                                $(".submit_button").attr("disabled", "true");
                                return false;
                            } else {
                                var files = event.target.files;
                    
                                var done = function(url){
                                    image.src = url;
                                    //$modal.modal('show');
                                };

                                if(files && files.length > 0)
                                {
                                    reader = new FileReader();
                                    reader.onload = function(event)
                                    {
                                        done(reader.result);
                                    };
                                    reader.readAsDataURL(files[0]);

                                    var explode = $("#upload_image_3").val().split(/C:\\fakepath\\/i);
                                    reader.onloadend = function(){
                                        var base64data = reader.result;
                                        $.ajax({
                                            url:'<?php echo base_url();?>crop_slider_image_upload.php',
                                            type:'POST',
                                            data:{image:base64data,imagename:explode[1]},
                                            success:function(data)
                                            {
                                                var img_string = "<?php echo base_url();?>"+data;
                                                $modal.modal('hide');
                                                $('#uploaded_image_3').attr('src', img_string);
                                                $("#slider_three_hidden_path").val(img_string);
                                            }
                                        });
                                    };
                                }
                                $(".submit_button").removeAttr("disabled");
                            }
                        };
                        img.src = _URL.createObjectURL(file);
                    }                    
                });

                // $modal.on('shown.bs.modal', function() {
                //     cropper = new Cropper(image, {
                //         aspectRatio: 1,
                //         viewMode: 0,
                //         cropBoxMovable : true,
                //         cropBoxResizable : true,
                //         preview:'.preview_3'
                //     });
                // }).on('hidden.bs.modal', function(){
                //     cropper.destroy();
                //     cropper = null;
                // });

                // $('#crop_3').click(function(){
                //     var explode = $("#upload_image_3").val().split(/C:\\fakepath\\/i);
                //     canvas = cropper.getCroppedCanvas({
                //         width:100,
                //         height:100
                //     });
                    
                //     canvas.toBlob(function(blob){
                        
                //         url = URL.createObjectURL(blob);
                //         var reader = new FileReader();
                //         reader.readAsDataURL(blob);
                //         reader.onloadend = function(){
                //             var base64data = reader.result;
                //             $.ajax({
                //                 url:'<?php echo base_url();?>crop_slider_image_upload.php',
                //                 type:'POST',
                //                 data:{image:base64data,imagename:explode[1]},
                //                 success:function(data)
                //                 {
                //                     var img_string = "<?php echo base_url();?>"+data;
                //                     $modal.modal('hide');
                //                     $('#uploaded_image_3').attr('src', img_string);
                //                     $("#slider_three_hidden_path").val(img_string);
                //                 }
                //             });
                //         };
                //     });
                // });      
            });
            </script>
</body>

</html>