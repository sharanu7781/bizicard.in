<!-- Header -->
<?php $this->load->view("layouts/header.php");?>
<!-- DataTables -->

<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<?php
if (isset($edit_role_module_mapping_master_data) && $edit_role_module_mapping_master_data[0]->id != '') {$this->load->view("layouts/headerStyle");}
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

</style>
<!-- hederStyle -->
<?php $this->load->view("layouts/headerStyle.php");?>

<body data-sidebar="dark" class="body">

    <!-- Begin page -->
    <div id="layout-wrapper">


         <!-- Topbar -->
         <?php $this->load->view("layouts/topbar.php");?>


          <!-- Sidebar -->
         <?php $this->load->view("layouts/sidebar.php");?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title-box">
                                <h4>Select The Template</h4>                                        
                            </div>
                        </div>
                        <?php if (!empty($this->session->flashdata("message")) && $this->session->flashdata("message") == "Welcome to Bizicards") { ?>
                        <div class="col-lg-6">                            
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Welcome to Bizicards!!!</strong>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <?php 
                        $cnt = 1;
                        foreach ($template_setup_data as $template_row) { ?>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title"><?php echo $template_row->template_name; ?></h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="javascript:void(0)">
                                                <img src="<?php echo $template_row->thumbnail_path;?>" alt="Thumbnail Image" height="100px" width="60px">
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <br/>
                                            <a href="<?php echo base_url();?>profile/<?php echo base64_encode($template_row->id);?>" class="btn btn-primary waves-effect waves-light" >Choose Template</a><br/><br/>
                                            <button type="button" class="btn btn-outline-info waves-effect waves-light" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal_<?php echo $cnt;?>">View Template</button>

                                            <!-- sample modal content -->
                                            <div id="myModal_<?php echo $cnt;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo $cnt;?>Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0" id="myModal_<?php echo $cnt;?>Label">Template Preview</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <img src="<?php echo $template_row->thumbnail_path;?>" alt="Thumbnail Image Modal" width="100%">
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $cnt++;
                        }?>
                    </div>
                    <!-- end row -->

                    <!-- Footer -->
                 <?php $this->load->view("layouts/footer.php");?>
                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->

             <!-- Rightbar -->
             <?php $this->load->view("layouts/rightbar.php");?>

            <!-- FooterScript -->
            <?php $this->load->view("layouts/footerScript.php");?>


            <script src="<?php echo base_url(); ?>public/assets/libs/parsleyjs/parsley.min.js"></script>
            <script src="<?php echo base_url(); ?>public/assets/js/pages/form-validation.init.js"></script>

            <!-- Sweet Alerts js -->
            <script src="<?php echo base_url(); ?>public/assets/libs/sweetalert2/sweetalert2.min.js"></script>

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
                <?php
                /*if (!empty($this->session->flashdata("message")) && $this->session->flashdata("message") == "Welcome to Bizicards") {?>
                    !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({title:"Welcome to Bizicards!!!",confirmButtonColor:"#7a6fbe"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } else */if (!empty($this->session->flashdata("message")) && $this->session->flashdata("message") == "Select Template") { ?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Please select a template first",type:"error",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } else if (!empty($this->session->flashdata("message")) && $this->session->flashdata("message") == "success") {?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Data saved successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } elseif (!empty($this->session->flashdata("message")) && $this->session->flashdata("message") == "deleted") {?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Data deleted successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } elseif (!empty($this->session->flashdata("message")) && $this->session->flashdata("message") == "undeleted") {?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Data activated again successfully!",type:"success",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } elseif (!empty($this->session->flashdata("message")) && $this->session->flashdata("message") == "error") {?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Error in process!",type:"error",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php } else if (!empty($this->session->flashdata("message")) && $this->session->flashdata("message") == "EXIST") {?>
                    // !function(t){"use strict";function e(){}e.prototype.init=function(){Swal.fire({text:"Module and MVC Path combination already exists!",type:"error",showCancelButton:!0,confirmButtonColor:"#7a6fbe",cancelButtonColor:"#f46a6a"})},t.SweetAlert=new e,t.SweetAlert.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.SweetAlert.init()}();
                <?php }?>
                !function(t){"use strict";function e(){}e.prototype.init=function(){t(".table_delete_button").click(function(){Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",type:"warning",showCancelButton:!0,confirmButtonColor:"#34c38f",cancelButtonColor:"#f46a6a",confirmButtonText:"Yes, delete it!"}).then(function(t){

                    $.ajax({
                        url:"<?php echo base_url(); ?>delete_role_module_mapping_master_data",
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
                        url:"<?php echo base_url(); ?>undo_deleted_role_module_mapping_master_data",
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

            <!-- File Input Script-->
            <script src="<?php echo base_url(); ?>public/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>

            <!--tinymce js-->
            <script src="<?php echo base_url(); ?>public/assets/libs/tinymce/tinymce.min.js"></script>

            <!-- Form Editor init js -->
            <script src="<?php echo base_url(); ?>public/assets/js/pages/form-editor.init.js"></script>


            <!-- Datatable init js -->
            <script src="<?php echo base_url(); ?>public/assets/js/pages/datatables.init.js"></script>
             <!--tinymce js-->
             <script src="public/assets/libs/tinymce/tinymce.min.js"></script>

              <!-- init js -->
            <script src="public/assets/js/pages/form-editor.init.js"></script>

             <!--tinymce js-->
             <script src="public/assets/libs/tinymce/tinymce.min.js"></script>

            <!-- init js -->
            <script src="public/assets/js/pages/form-editor.init.js"></script>


            <!-- App js -->
            <script src="<?php echo base_url(); ?>public/assets/js/app.js"></script>
            <script>
                $(".video_file").change(function(){
                    if(Math.round(this.files[0].size/1024/1024) > 20) {
                        alert("Please select video file less than 20mb");
                        $(".submit_button").attr("disabled", "true");
                        return false;
                    } else {
                        $(".submit_button").removeAttr("disabled");
                    }
                });
                $(".username").keyup(function(){
                    <?php if (empty($edit_row->name)) {?>
                        $.ajax({
                            url:"<?php echo base_url(); ?>check_username",
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
                    <?php }?>
                });
                $(".preview_button").click(function(){
                    var background_color = $("#input_background").val();
                    var font_color = $("#input_font").val();

                    $.ajax({
                        url:"<?php echo base_url(); ?>get_template_preview",
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
                //profile image cropping
                var $modal = $('#modal');
                var image = document.getElementById('sample_image');
                var cropper;
                var _URL = window.URL || window.webkitURL;

                /*$(".slider_images").change(function(){
                    var flag = 0;
                    var file;
                    $(this).each(function(){

                        if (file = this.files[0]) {
                            img = new Image();
                            img.onload = function() {
                                if(this.width>417 && this.height>284){
                                    alert("Please select image less than 417*284 pixels");
                                    $(this).val('');
                                    return false;
                                } else {
                                }
                            };
                            img.src = _URL.createObjectURL(file);
                        }
                    });
                });*/

                $('#upload_image').change(function(event){

                    var file, img;
                    if ((file = this.files[0])) {
                        img = new Image();
                        img.onload = function() {
                            if(this.width<750 && this.height<750){
                                alert("Please select image more than 750 pixel in width and height");
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
                            }
                        };
                        img.src = _URL.createObjectURL(file);
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
                    var explode = $("#upload_image").val().split(/C:\\fakepath\\/i);
                    console.log(explode[1]);
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
                                data:{image:base64data,imagename:explode[1]},
                                success:function(data)
                                {
                                    $modal.modal('hide');
                                    $('#uploaded_image').attr('src', data);
                                    $("#avatar_filename_hidden_path").val(data);
                                }
                            });
                        };
                    });
                });

                //company image cropping
                var $modal_company = $('#modal_company');
                var image_company = document.getElementById('sample_image_company');
                var cropper_company;

                $('#upload_image_company').change(function(event){
                    var files = event.target.files;

                    var done = function(url){
                        image_company.src = url;
                        $modal_company.modal('show');
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

                $modal_company.on('shown.bs.modal', function() {
                    cropper_company = new Cropper(image_company, {
                        aspectRatio: 1,
                        viewMode: 3,
                        preview:'.preview_company'
                    });
                }).on('hidden.bs.modal', function(){
                    cropper_company.destroy();
                    cropper_company = null;
                });

                $('#crop_company_logo').click(function(){
                    var explode = $("#upload_image_company").val().split(/C:\\fakepath\\/i);
                    console.log(explode[1]);
                    canvas = cropper_company.getCroppedCanvas({
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
                                data:{image:base64data,imagename:explode[1]},
                                success:function(data)
                                {
                                    $modal_company.modal('hide');
                                    $('#uploaded_image_company').attr('src', data);
                                    $("#company_filename_hidden_path").val(data);
                                }
                            });
                        };
                    });
                });
            });

            var counter = 2;
            function add_tr_to_table() {
                if(counter > 5){
                    alert("You can add maximum 5 accordian div's");
                    return false;
                }
                var tbody_string = '<tr class="tr_'+counter+'"><td align="left" valign="top"><input type="text" placeholder="Accordian Label" class="form-control" name="accordian_label_'+counter+'" /><input type="hidden" name="input_counter[]" value="'+counter+'" /></td><td align="left" valign="top"><textarea  class="form-control" name="accordian_content_'+counter+'" placeholder="Accordian Content goes here" rows="10" cols="100"></textarea></td><td align="left" valign="top"><input type="button" onclick="return add_tr_to_table();" class="btn btn-success waves-effect waves-light" value="+"><input type="button" onclick="return remove_tr_from_table('+counter+');" class="btn btn-danger" value="-"></td></tr>';

                $(".tbody_form_editor").append(tbody_string);
                counter++;
            }

            function remove_tr_from_table(number) {
                $(".tr_"+number).remove();
            }
            </script>
</body>

</html>