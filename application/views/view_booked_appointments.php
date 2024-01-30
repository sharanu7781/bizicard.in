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
                                <h4>My Booked Appointments</h4>
                                
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
                                        if(isset($booked_appointment_data) && !empty($booked_appointment_data)) { ?> 
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" 
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr no.</th>
                                                        <th>Name</th>
                                                        <th>Mob No.</th>
                                                        <th>Email Id</th>
                                                        <th>Service Selected</th>
                                                        <th>Appointment Date</th>
                                                        <th>Appointment Time</th>
                                                        <th>Duration</th>
                                                        <th>Join Link</th>
                                                        <th>Share Link</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $srno = 1;
                                                    //echo "<pre>"; print_r($booked_appointment_data); echo "</pre>";
                                                    foreach ($booked_appointment_data as $appointment_row) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $srno; ?></td>
                                                            <td><?php echo $appointment_row->SITE_USER_NAME; ?></td>
                                                            <td><?php echo $appointment_row->SITE_USER_MOB_NO; ?></td>
                                                            <td><?php echo $appointment_row->SITE_USER_EMAIL_ID; ?></td>
                                                            <td><?php echo $appointment_row->SERVICE; ?></td>
                                                            <td><?php echo date("d M Y", strtotime($appointment_row->APPOINTMENT_DATE)); ?></td>
                                                            <td><?php echo date("g:i A", strtotime($appointment_row->APPOINTMENT_START_TIME)); ?></td>
                                                            <td><?php echo $appointment_row->DURATION; ?></td>
                                                            <td>
                                                                <?php if (!empty($appointment_row->ZOOM_START_URL)) { ?>
                                                                    <a href="<?php echo $appointment_row->ZOOM_START_URL; ?>" target="_blank" class="btn btn-primary btn-success">Join Zoom Link</a>
                                                                <?php } else { ?>
                                                                    <a href="#" target="_blank" class="btn btn-primary btn-success">No Link</a>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if (!empty($appointment_row->ZOOM_START_URL)) { ?>
                                                                    <?php echo $appointment_row->ZOOM_JOIN_URL; ?>
                                                                <?php } else { ?>
                                                                    <a href="#" target="_blank" class="btn btn-primary btn-success">No Link</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $srno++;
                                                    } ?>
                                                </tbody>
                                            </table> 
                                            <?php 
                                        } else { 
                                            echo "No appointments history available for now";
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
        
        /*function copyToClipboard(target) {
            // Select elements
            const target = document.getElementById(target);
            const button = target.nextElementSibling;
            
            // Init clipboard -- for more info, please read the offical documentation: https://clipboardjs.com/
            var clipboard = new ClipboardJS(button, {
                target: target,
                text: function() {
                    return target.value;
                }
            });
            
            // Success action handler
            clipboard.on('success', function(e) {
                const currentLabel = button.innerHTML;
            
                // Exit label update when already in progress
                if(button.innerHTML === 'Copied!'){
                    return;
                }
            
                // Update button label
                button.innerHTML = 'Copied!';
            
                // Revert button label after 3 seconds
                setTimeout(function(){
                    button.innerHTML = currentLabel;
                }, 3000)
            });
        }*/
        
        function copyToClipboard(target) {
            // Get the text field
            var copyText = document.getElementById(target);
            
            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices
            
            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
            
            // Alert the copied text
            alert("Copied the text: " + copyText.value);
        }
    </script>
   
</body>

</html>