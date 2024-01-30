 <!-- Header -->
<?php $this->load->view("layouts/header.php"); ?>

<!-- DataTables -->
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url(); ?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- hederStyle -->
<!-- font awesome  -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
<link rel="stylesheet" href="static/css/AdminLTE.min.css" />

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

<!-- custom styling -->
<link rel="stylesheet" type="text/css" href="style.css" />

<!-- <script src="static/js/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<?php
if (isset($edit_row_id) && $edit_row_id != '') {
    $this->load->view("layouts/headerStyle.php");
    // print_r($mentee_data);
    // die;
}?>
<?php   $this->load->view("layouts/headerStyle.php"); ?>
<style>
.btn_round {
  width: 35px;
  height: 35px;
  display: inline-block;
  border-radius: 50%;
  text-align: center;
  line-height: 35px;
  margin-left: 10px;
  border: 1px solid #ccc;
  cursor: pointer;
}
.btn_round:hover {
  color: #fff;
  background: #6b4acc;
  border: 1px solid #6b4acc;
}

.btn_content_outer {
  display: inline-block;
  width: 85%;
}
.close_c_btn {
  width: 30px;
  height: 30px;
  position: absolute;
  right: 10px;
  top: 0px;
  line-height: 30px;
  border-radius: 50%;
  background: #ededed;
  border: 1px solid #ccc;
  color: #ff5c5c;
  text-align: center;
  cursor: pointer;
}

.add_icon {
  padding: 10px;
  border: 1px dashed #aaa;
  display: inline-block;
  border-radius: 50%;
  margin-right: 10px;
}
.add_group_btn {
  display: flex;
}
.add_group_btn i {
  font-size: 32px;
  display: inline-block;
  margin-right: 10px;
}

.add_group_btn span {
  margin-top: 8px;
}
.add_group_btn,
.clone_sub_task {
  cursor: pointer;
}

.sub_task_append_area .custom_square {
  cursor: move;
}

.del_btn_d {
  display: inline-block;
  position: absolute;
  right: 20px;
  border: 2px solid #ccc;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  font-size: 18px;
}
</style>



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
                        
                        
                        <!-- BalanceChart -->
                        <!-- <?php include 'layouts/balanceChart.php'; ?> -->
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="custom-validation form-horizontal mt-4" name="longsubmit" enctype="multipart/form-data" action="<?php echo base_url('profile_management/save_slot_data'); ?>" method="POST" data-parsley-validate> 
                                  <div class="container py-1">
                                    <div class="row">
                                      <div class="col-md-12 form_sec_outer_task border">
                                        <div class="row">
                                          <div class="col-md-12 bg-light p-2 mb-3">
                                            <div class="row">
                                              <div class="col-md-6">
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <h4 class="frm_section_n">Add your service details</h4>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-12 p-0">
                                          <div class="col-md-12 form_field_outer p-3 form_field_outer_row">
                                              <div class="row col-md-12">
                                                <label class="form-check-label" for="inlineCheckbox1"> Service</label>
                                                <div class="form-group col-md-3">
                                                  <input type="hidden" name="counter[]" value="1"/>
                                                  <input type="text" class="form-control w_90" name="SERVICE_1" id="SERVICE_1" placeholder="Enter service" />
                                                </div>

                                                <label class="form-check-label" for="inlineCheckbox1">Price</label>
                                                <div class="form-group col-md-3">                                              
                                                    <input type="text" class="form-control w_90" name="PRICE_1" id="PRICE_1" placeholder="Enter Price" />
                                                </div>
                                              </div> 
                                                
                                              <div class="row col-md-12">
                                                <label class="form-check-label" for="inlineCheckbox1">Timing</label>&nbsp;&nbsp; &nbsp; &nbsp;
                                                <div class="form-group col-md-1">
                                                  <!-- <input type="hidden" name="counter[]" value="15"/> -->
                                                  <input class="form-check-input" type="checkbox" name="TIMING_1[]" id="inlineCheckbox1" value="15">
                                                  <label class="form-check-label" for="inlineCheckbox1">15 min</label>
                                                </div>

                                                <div class="form-group col-md-1">
                                                  <!-- <input type="hidden" name="counter[]" value="30"/> -->
                                                  <input class="form-check-input" type="checkbox" name="TIMING_1[]" id="inlineCheckbox1" value="30">
                                                  <label class="form-check-label" for="inlineCheckbox1">30 min</label>
                                                </div>

                                                <div class="form-group col-md-1 ">
                                                  <!-- <input type="hidden" name="counter[]" value="60"/> -->
                                                  <input class="form-check-input" type="checkbox"  name="TIMING_1[]" id="inlineCheckbox1" value="60">
                                                  <label class="form-check-label" for="inlineCheckbox1">60 min</label>
                                                </div>
                                              </div>
                                              
                                              <div class="">   
                                                <div class=" row col-md-6">   
                                                  <label class="form-check-label" for="inlineCheckbox1">Is Active</label>&nbsp; &nbsp; &nbsp;
                                                  &nbsp;
                                                  <div class="form-group col-md-0">
                                                    <input class="form-check-input" type="radio" name="IS_ACTIVE_1" id="inlineRadio1" value="Y">
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                  </div>&nbsp;  &nbsp; &nbsp; &nbsp;

                                                  <div class="form-group col-md-0">
                                                    <input class="form-check-input" type="radio" name="IS_ACTIVE_1" id="inlineRadio2" value="N">
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                  </div> 
                                                </div>  
                                              </div> 

                                              <div class="row col-md-6 add_del_btn_outer">
                                                <button type="button" class="btn btn-primary waves-effect waves-light  add_new_frm_field_btn">Add Services
                                                  </button>
                                                
                                              </div>
                                          <hr />
                                      </div>
                                    </div>  
                                  </div>
                                </div>
                                    
                                      <!-- <div class="row ml-0 bg-light mt-3 border py-3">
                                        <div class="col-md-12">
                                          <button type="button" class="btn btn-outline-lite py-0 add_new_frm_field_btn"><i class="fas fa-plus add_icon"></i> Add New field row
                                          </button>
                                        </div>
                                      </div> -->
                                    </div>
                                    <br />
                              <h4 class="card-title">Add Slot</h4>
                              <p class="card-title-desc">Share your Availability.
                              </p>
                                <input type="hidden" name="edit_row_id" value="<?php echo (isset($edit_row_id) && !empty($edit_row_id)) ? $edit_row_id:'';?>" />
                                
                                    <?php if(isset($slot_data) && !empty($slot_data)) { 
                                            $Monday_Start_Time = null;
                                            $Monday_End_Time = null;
                                            $Tuesday_Start_Time = null;
                                            $Tuesday_End_Time = null;
                                            $Monday_Start_Time = null;
                                            $Wednesday_Start_Time = null;
                                            $Wednesday_End_Time = null;
                                            $Thursday_Start_Time = null;
                                            $Thursday_End_Time = null;
                                            $Friday_Start_Time = null;
                                            $Saturday_Start_Time = null;
                                            $Saturday_End_Time = null;
                                            $Sunday_Start_Time = null;
                                            $Sunday_End_Time = null;

                                            foreach($slot_data as $day_row){
                                                if($day_row->DAY_NAME == "Monday") {
                                                    $Monday_Start_Time = $day_row->START_TIME;
                                                    $Monday_End_Time = $day_row->END_TIME;
                                                }
                                                if($day_row->DAY_NAME == "Tuesday") {
                                                    $Tuesday_Start_Time = $day_row->START_TIME;
                                                    $Tuesday_End_Time = $day_row->END_TIME;
                                                }
                                                if($day_row->DAY_NAME == "Wednesday") {
                                                    $Wednesday_Start_Time = $day_row->START_TIME;
                                                    $Wednesday_End_Time = $day_row->END_TIME;
                                                }
                                                if($day_row->DAY_NAME == "Thursday") {
                                                    $Thursday_Start_Time = $day_row->START_TIME;
                                                    $Thursday_End_Time = $day_row->END_TIME;
                                                }
                                                if($day_row->DAY_NAME == "Friday") {
                                                    $Friday_Start_Time = $day_row->START_TIME;
                                                    $Friday_End_Time = $day_row->END_TIME;
                                                }
                                                if($day_row->DAY_NAME == "Saturday") {
                                                    $Saturday_Start_Time = $day_row->START_TIME;
                                                    $Saturday_End_Time = $day_row->END_TIME;
                                                }
                                                if($day_row->DAY_NAME == "Sunday") {
                                                    $Sunday_Start_Time = $day_row->START_TIME;
                                                    $Sunday_End_Time = $day_row->END_TIME;
                                                }
                                            }         
                                        } ?>
                                
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="form-label col-lg-4 col-md-6 weekday_label">Monday</label>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="START_TIME[]" value="<?php echo (isset($Monday_Start_Time) && !empty($Monday_Start_Time)) ? $Monday_Start_Time:"" ;?>" class="form-control "/>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="END_TIME[]" value="<?php echo (isset($Monday_End_Time) && !empty($Monday_End_Time)) ? $Monday_End_Time:"" ;?>" class="form-control "/>
                                        <input type="hidden" name="DAY_ARRAY[]" value="Monday" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="form-label col-lg-4 col-md-6 weekday_label">Tuesday</label>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="START_TIME[]" value="<?php echo (isset($Tuesday_Start_Time) && !empty($Tuesday_Start_Time)) ? $Tuesday_Start_Time:"" ;?>" class="form-control"/>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="END_TIME[]" value="<?php echo (isset($Tuesday_End_Time) && !empty($Tuesday_End_Time)) ? $Tuesday_End_Time:"" ;?>" class="form-control"/>
                                          <input type="hidden" name="DAY_ARRAY[]" value="Tuesday" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="form-label col-lg-4 col-md-6 weekday_label">Wednesday</label>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="START_TIME[]" value="<?php echo (isset($Wednesday_Start_Time) && !empty($Wednesday_Start_Time)) ? $Wednesday_Start_Time:"" ;?>" class="form-control"/>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="END_TIME[]" value="<?php echo (isset($Wednesday_End_Time) && !empty($Wednesday_End_Time)) ? $Wednesday_End_Time:"" ;?>" class="form-control"/>
                                        <input type="hidden" name="DAY_ARRAY[]" value="Wednesday" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="form-label col-lg-4 col-md-6 weekday_label">Thursday</label>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="START_TIME[]" value="<?php echo (isset($Thursday_Start_Time) && !empty($Thursday_Start_Time)) ? $Thursday_Start_Time:"" ;?>" class="form-control" />
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="END_TIME[]" value="<?php echo (isset($Thursday_End_Time) && !empty($Thursday_End_Time)) ? $Tuesday_Start_Time:"" ;?>" class="form-control"/>
                                        <input type="hidden" name="DAY_ARRAY[]" value="Thursday" /> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="form-label col-lg-4 col-md-6 weekday_label">Friday</label>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="START_TIME[]" value="<?php echo (isset($Friday_Start_Time) && !empty($Friday_Start_Time)) ? $Friday_Start_Time:"" ;?>" class="form-control"/>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="END_TIME[]" value="<?php echo (isset($Friday_End_Time) && !empty($Friday_End_Time)) ? $Friday_End_Time:"" ;?>" class="form-control" />
                                        <input type="hidden" name="DAY_ARRAY[]" value="Friday" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="form-label col-lg-4 col-md-6 weekday_label">Saturday</label>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="START_TIME[]" value="<?php echo (isset($Saturday_Start_Time) && !empty($Saturday_Start_Time)) ? $Saturday_Start_Time:"" ;?>" class="form-control"/>    
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="END_TIME[]" value="<?php echo (isset($Saturday_End_Time) && !empty($Saturday_End_Time)) ? $Saturday_End_Time:"" ;?>" class="form-control"/>
                                        <input type="hidden" name="DAY_ARRAY[]" value="Saturday" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label class="form-label col-lg-4 col-md-6 weekday_label">Sunday</label>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="START_TIME[]" value="<?php echo (isset($Sunday_Start_Time) && !empty($Sunday_Start_Time)) ? $Sunday_Start_Time:"" ;?>" class="form-control"/>
                                    </div>
                                    <div class="form-group  col-lg-4 col-md-6">
                                        <input type="time" name="END_TIME[]" value="<?php echo (isset($Sunday_End_Time) && !empty($Sunday_End_Time)) ? $Sunday_End_Time:"" ;?>" class="form-control"/>
                                        <input type="hidden" name="DAY_ARRAY[]" value="Sunday" />
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                      <div class="col  form-group">
                                          <label class=""> Vacation Mode</label><br />
                                          <input type="checkbox" class="switch10" id="switch10" switch="dark" />
                                          <label for="switch10" class="switch10" data-on-label="Yes" data-off-label="No"></label>
                                      </div>
                                  </div>

                                  <div class="form-row">
                                      <div class="row" id="vacationdiv" hidden>
                                          <div class="col vacation form-group date">
                                              <input type="date" class="date" min="<?php date("Y/m/d"); ?>" name="VACATION_START_DATE"> &nbsp; TO &nbsp; <input type="date" name="VACATION_END_DATE">
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-lg-12">
                                              <table>
                                                  <thead></thead>
                                              </table>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button" >
                                          Submit
                                      </button>
                                      <button type="reset" class="btn btn-secondary waves-effect">
                                          Cancel
                                      </button>
                                    </div>
                                  </form>  
                                </div>
                               </div>
                             </form>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                   

                   
                   
                </div>
            </div>
    <!-- end row -->

    <!-- Footer -->
    <?php $this->load->view("layouts/footer.php"); ?>
        </div>
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
    <script type="text/javascript">
        // $(function() {
        $("#switch10").click(function() {

            if ($(this).is(":checked")) {
                $("#vacationdiv").removeAttr("hidden");
            } else {
                $("#vacationdiv").attr("hidden", "hidden");
            }
        });
        // });
    </script>
    
<script>
///======Clone method
$(document).ready(function () {
  $("body").on("click", ".add_node_btn_frm_field", function (e) {
    var index = $(e.target).closest(".form_field_outer").find(".form_field_outer_row").length + 1;
    var cloned_el = $(e.target).closest(".form_field_outer_row").clone(true);

    $(e.target).closest(".form_field_outer").last().append(cloned_el).find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false);

    $(e.target).closest(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true);

    //change id
    $(e.target)
      .closest(".form_field_outer")
      .find(".form_field_outer_row")
      .last()
      .find("input[type='text']")
      .attr("id", "mobileb_no_" + index);

    $(e.target)
      .closest(".form_field_outer")
      .find(".form_field_outer_row")
      .last()
      .find("select")
      .attr("id", "no_type_" + index);

    console.log(cloned_el);
    //count++;
  });
});
</script>
<script type="text/javascript">
var counter=2;  
  
    $("body").on("click",".add_new_frm_field_btn", function (){ 
      if(counter<10)    {
        var html_n= '<div class=" form_field_outer_row"><div class="row col-md-12 "><label class="form-check-label" for="inlineCheckbox1"> Service :</label><div class="form-group col-md-3"><input type="hidden" name="counter[]" value="'+counter+'"/><input type="text" class="form-control w_90" name="SERVICE_'+counter+'" id="" placeholder="Enter Services" /></div><label class="form-check-label" for="inlineCheckbox1">Price</label><div class="form-group col-md-3"><input type="text" class="form-control w_90" name="PRICE_'+counter+'" id="" placeholder="Enter Price" /></div></div><div class="row col-md-12 "><label class="form-check-label" for="inlineCheckbox1">Timing</label>&nbsp;&nbsp; &nbsp; &nbsp; <div class="form-group col-md-1"> <input class="form-check-input" type="checkbox" name="TIMING_'+counter+'[]" id="inlineCheckbox1" value="15"> <label class="form-check-label" for="inlineCheckbox1">15 min</label>  </div> <div class="form-group col-md-1"> <input class="form-check-input" type="checkbox" name="TIMING_'+counter+'[]" id="inlineCheckbox1" value="30">  <label class="form-check-label" for="inlineCheckbox1">30 min</label> </div>  <div class="form-group col-md-1"><input class="form-check-input" type="checkbox" name="TIMING_'+counter+'[]" id="inlineCheckbox1" value="60">   <label class="form-check-label" for="inlineCheckbox1">60 min</label></div></div><div class=" "><div class=" row col-md-6">  <label class="form-check-label" for="inlineCheckbox1">Is Active</label>&nbsp; &nbsp; &nbsp; &nbsp; <div class="form-group col-md-0"><input class="form-check-input" type="radio" name="IS_ACTIVE_'+counter+'" id="inlineRadio1" value="Y">  <label class="form-check-label" for="inlineRadio1">Yes</label>  </div>&nbsp;  &nbsp; &nbsp; &nbsp;   <div class="form-group col-md-0"><input class="form-check-input" type="radio" name="IS_ACTIVE_'+counter+'" id="inlineRadio2" value="N">   <label class="form-check-label" for="inlineRadio2">No</label>   </div>    </div>   </div>  <div class="form-group col-md-2 add_del_btn_outer"> <button class="btn btn-primary waves-effect waves-light mr-1 remove_node_btn_frm_field" >Remove Services </button>    </div> <hr /></div> </div></div>';
      
        var index = $(".form_field_outer").find(".form_field_outer_row").length + 1; 
        $(".form_field_outer").append(html_n)
        // $(".form_field_outer").find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false); 
        // $(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true); 
        counter++;
      } else {
        alert("You can add maximum 10 services");
        return false;
      }
    }); 
  

</script>

<script>
    $(document).ready(function () {
  //===== delete the form fieed row
  $("body").on("click", ".remove_node_btn_frm_field", function () {
    $(this).closest(".form_field_outer_row").remove();
    console.log("success");
  });
});
</script>
</body>

</html> 