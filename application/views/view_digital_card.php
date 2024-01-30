<!-- Header -->
<?php $this->load->view("layouts/header.php"); ?> 
<!-- DataTables -->
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
    
<link href="<?php echo base_url();?>public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />    
<?php 
    if(isset($flag_text) && !empty($flag_text))
    {  $this->load->view("layouts/headerStyle"); }
?>
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
                                <h4>My Digital Card</h4>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">My Digital Card</a></li>
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
                                            <div class="row form-group">
                                                <div class="col-lg-4">
                                                   <a class="btn btn-outline-success waves-effect waves-light" href="<?php echo $this->session->userdata("digital_card_url");?>" target="_blank">Click here to view your card</a>
                                                </div>
                                                <div class="col-lg-6">
                                                    <a href="javascript:void(0)" class="btn btn-outline-primary waves-effect waves-light" onclick="copyToClipboard()" ><i class="mdi mdi-content-copy"></i>Copy URL</a>
                                                    <input type="hidden" value="<?php echo $this->session->userdata("digital_card_url");?>" id="copy_url_to_clipboard" />
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-lg-12">
                                                   <iframe src="<?php echo $this->session->userdata("digital_card_url");?>" width = "500px" height = "500px">
                                                    </iframe>
                                                </div>
                                            </div>
                                            
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

            <!-- App js -->
            <script src="<?php echo base_url();?>public/assets/js/app.js"></script>
            <script>
                function copyToClipboard() {
                    var element = $("#copy_url_to_clipboard").val();
                    var $temp = $("#copy_url_to_clipboard").val();
                    alert($temp);
                    $("body").append($temp);
                    $temp.val($(element).html()).select();
                    document.execCommand("copy");
                    $temp.remove();
                }
            </script>            
</body>

</html>