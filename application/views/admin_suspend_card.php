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
<!-- headerStyle -->

<?php
if (isset($edit_row_id) && $edit_row_id != '') {
    $this->load->view("layouts/headerStyle.php");
    // print_r($mentee_data);
    // die;
}
?>

<?php $this->load->view("layouts/headerStyle.php"); ?>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Topbar -->
        <?php $this->load->view("layouts/topbar.php"); ?>

        <!-- Sidebar -->
        <?php $this->load->view("layouts/sidebar.php"); ?>

        <title>Suspend User</title>
        <link href="<?php echo base_url(); ?>public/assets/css/change_password.css" rel="stylesheet" type="text/css" />
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
                            <h4 class="text-center">Suspend User</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Suspend_card_Controller/suspend_user'); ?>" method="post">

                                <div class="form-group">
                                    <label for="email">Email ID</label>
                                    <input type="email" required name="email" class="form-control"
                                        id="email" placeholder="Enter User Email Id">
                                  
                                </div>

                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="save-button">Suspend</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("layouts/footer.php"); ?>
</body>

</html>