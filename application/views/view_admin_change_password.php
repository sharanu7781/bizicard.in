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





        <title>Recover Password</title>
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
                                <a href="<?php echo base_url();?>" class="logo logo-admin">
                                    <img src="<?php echo base_url();?>public/assets/images/bizicard-logo.png"
                                        height="60" alt="logo">
                                </a>
                            </h3>
                            <h4 class="text-center">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form class="custom-validation" enctype="multipart/form-data"
                                action="<?php echo base_url('password_reset/reset_password');?>" method="POST">
                                <div class="form-group">
                                    <label for="email_id">Email</label>
                                    <input type="email" required name="email_id" class="form-control" id="email_id"
                                        placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" required name="password" class="form-control" id="password"
                                        placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" required name="confirm_password" class="form-control"
                                        id="confirm_password" placeholder="Confirm Password">
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" id="submit"
                                            type="submit">
                                            Reset Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php $this->load->view("layouts/footer.php"); ?>

        <script>
        function check_confirm_password() {
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();

            if (password != '' && confirm_password != '') {
                if (password != confirm_password) {
                    $("#confirm_password_error").attr("style", "color:red");
                    $("#confirm_password_error").html("Confirm Password mismatch");
                    $("#submit").attr("disabled", "true");
                } else {
                    $("#confirm_password_error").attr("style", "color:green");
                    $("#confirm_password_error").html("Password Matched");
                    $("#submit").removeAttr("disabled");
                }
            }

            if ($("#exist_error").html() == "Email ID exist") {
                $("#submit").attr("disabled", "true");
            }
        }
        </script>

</body>

</html>