<!-- Header -->
<?php $this->load->view("layouts/header.php"); ?>

<!-- DataTables -->
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet"
    type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
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


        <title>Change Plan</title>
        <link href="<?php echo base_url();?>public/assets/css/change_password.css" rel="stylesheet" type="text/css" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
            id="bootstrap-css">



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center mt-4">
                                <a href="<?php echo base_url(); ?>" class="logo logo-admin">
                                    <img src="<?php echo base_url(); ?>public/assets/images/bizicard-logo.png"
                                        height="60" alt="logo">
                                </a>
                            </h3>
                            <h4 class="text-center">Change Plan Of User</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo base_url('change_plan/processChange'); ?>" method="post"
                                id="changePlanForm">
                                <div class="form-group row">
                                    <label for="email_id" class="col-md-4 col-form-label text-md-right">E-Mail
                                        Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_id" name="email_id" required>
                                        <div id="currentPlanResult"></div>
                                    </div>
                                </div>

                              
                                <div class="form-group row">
                                    <label for="Change_plan" class="col-md-4 col-form-label text-md-right">Change
                                        Plan</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="plan_selected" name="plan_selected">
                                            <option value="">Select Plan*</option>
                                            <option value="1">Bronze</option>
                                            <option value="2">Silver</option>
                                            <option value="3">Gold</option>
                                            <option value="4">Platinum</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="save-button">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <script>
        $(document).ready(function() {
            // Listen for changes in the email_id input
            $('#email_id').on('blur', function() {
                var email_id = $(this).val();

                // Perform an AJAX request to fetch the current plan based on the email_id
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url("change_plan/getCurrentPlan"); ?>',
                    data: {
                        email_id: email_id
                    },
                    success: function(response) {
                        $('#Current_plan').val(response);
                    }
                });
            });
        });
        </script> -->
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#email_id').on('input', function () {
                var email = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('changePlanController/getCurrentPlan'); ?>',
                    data: { email_id: email },
                    success: function (response) {
                        $('#currentPlanResult').text('Current Plan: ' + response);
                    }
                });
            });
        });
    </script>
  

        <!-- Footer -->

</body>

</html>