<!-- Header -->
<?php $this->load->view("layouts/header.php"); ?>

<!-- DataTables -->
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- hederStyle -->

<?php
if (isset($edit_row_id) && $edit_row_id != '') {
    $this->load->view("layouts/headerStyle.php");
    // print_r($mentee_data);
    // die;
}?>

<?php $this->load->view("layouts/headerStyle.php"); ?>


<body data-sidebar="dark">

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
                                <h4>Payment History</h4>
                                
                            </div>
                        </div>
                       
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                           <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-12">
                                    <?php 
                                        if(isset($payment_details) && !empty($payment_details)) { ?> 
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" 
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr no.</th>
                                                        <th>Date</th>
                                                        <th>Transaction Id</th>
                                                        <th>Custom Order Id</th>
                                                        <th>Payment For</th>
                                                        <th>Amount</th>
                                                        <th>Payment Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $srno = 1;
                                                    foreach ($payment_details as $payment_details_row) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $srno; ?></td>
                                                            <td><?php echo date("d M Y", strtotime($payment_details_row->txn_date)); ?></td>
                                                            <td><?php echo $payment_details_row->txn_id; ?></td>
                                                            <td><?php echo $payment_details_row->custom_order_id; ?></td>
                                                            <td><?php echo $payment_details_row->payment_for; ?></td>
                                                            <td><?php echo $payment_details_row->amount; ?></td>
                                                            <td><?php echo $payment_details_row->status; ?></td>
                                                        </tr>
                                                        <?php
                                                        $srno++;
                                                    } ?>
                                                </tbody>
                                            </table> 
                                            <?php 
                                        } else { 
                                            echo "No payment history available for now";
                                        } ?>                           
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                    <!-- Card -->
                   
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
        </div>
        <!-- Footer -->
        <?php $this->load->view("layouts/footer.php"); ?>

        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <script src="<?php echo base_url(); ?>public/assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="<?php echo base_url(); ?>public/assets/libs/jquery/jquery.min.js"></script>
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
    <script>
        function showCreated() {
            $(".invited").attr("hidden", "hidden");
            $(".created").removeAttr("hidden");
        }
        
        function showInvited() {
            $(".created").attr("hidden", "hidden");
            $(".invited").removeAttr("hidden");
        }
    </script>
   
</body>

</html>