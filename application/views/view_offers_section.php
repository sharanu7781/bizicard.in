<!-- Header -->
<?php $this->load->view("layouts/header"); ?> 
<!-- DataTables -->

<link href="<?php echo base_url();?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
    
<link href="<?php echo base_url();?>public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />    
<?php 
    if(isset($flag) && !empty($flag))
    {  $this->load->view("layouts/headerStyle"); }
    
?>
<style>.avatar-lg {height: 10rem !important;width: 10rem !important; }</style>
<!-- hederStyle -->
<?php $this->load->view("layouts/headerStyle"); ?>
<body data-sidebar="dark" class="body">

    <!-- Begin page -->
    <div id="">

      
         <!-- Topbar -->
         <?php //$this->load->view("layouts/topbar"); ?>


          <!-- Sidebar -->
         <?php //$this->load->view("layouts/sidebar.php"); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="">

            <div class="page-content" style="background-image:url(<?php echo base_url()."offer_background.jpg";?>);background-repeat:repeat;">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="page-title-box">
                                    <h3>Our Offers</h3>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                
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
                                            <div class="row">
                                                
                                                <?php
                                                    if(isset($offers_data) && !empty($offers_data)){
                                                        $counter = 1;
                                                        foreach($offers_data as $row) { ?> 
                                                            <div class="col-xl-4 col-lg-4 col-md-4">
                                                                <div class="card ">                                                                    
                                                                    <div class="text-center ">
                                                                        <div class="image_div">
                                                                            <img class="rounded mx-auto d-block img-fluid" src="<?php echo $row;?>" alt="Offer Infor Image" data-toggle="modal" data-target="#modal_<?php echo $counter;?>">
                                                                        </div>
                                                                        <div class="modal fade" id="modal_<?php echo $counter;?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                <div class="modal-content">
                                                                                    
                                                                                    <div class="modal-body">
                                                                                        <div class="img-container">
                                                                                            <div class="row">
                                                                                                <div class="col-md-8">
                                                                                                    <img class="img-fluid" src="<?php echo $row;?>" alt="Offer Infor Image" data-toggle="modal" data-target="#modal_<?php echo $counter;?>">
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
                                                            <!-- end col --> 
                                                        <?php 
                                                        $counter++;
                                                        } 
                                                    }
                                                ?> 
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
            
</body>

</html>