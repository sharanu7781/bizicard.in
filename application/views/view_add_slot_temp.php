<!-- Header -->
<?php $this->load->view("layouts/header"); ?> 
<!-- DataTables -->

<?php 
$this->load->view("layouts/headerStyle"); 
    
$this->load->view("layouts/headerStyle"); 
     
?>
<style>.hide{display:none}.show{display:block}</style>

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

                    <div class="row">
                      
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">                                    
                                    <div class="card">
                                        <div class="card-body">
                                          <p class="card-title-desc"><h4>Add your slot details</h4></p>
                                            <form class="custom-validation form-horizontal mt-4" name="longsubmit" enctype="multipart/form-data" action="<?php echo base_url('profile_management/save_slot_data'); ?>" method="POST" data-parsley-validate>     
                                                
                                                 
                                              <p class="card-title-desc"><h4>Share your Availability for weekdays.</h4>
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
                                            
                                            <div class="row dynamic_add_slot">
                                                <div class="form-group col-lg-12 col-md-12 ">
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label">Monday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Monday_Start_Time) && !empty($Monday_Start_Time)) ? $Monday_Start_Time:"" ;?>" class="form-control monday_start_hour"  />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Monday_End_Time) && !empty($Monday_End_Time)) ? $Monday_End_Time:"" ;?>"  id="monday_start_1" class="form-control monday_finish_hour"  />
                                                    <input type="hidden" name="DAY_ARRAY[]" value=""  id="monday_end_1"/>
                                                </div> 
                                                <div class="form-group  col-lg-4 col-md-6"> 
                                                        <!-- <div class="row col-md-6 add_del_btn_outer"> -->
                                                          <!-- <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label> -->
                                                          <button type="button" class="btn btn-primary waves-effect waves-light  add_new_slot_details_btn" value="Validate">+ </button>
                                                        <!-- </div> -->
                                                 </div> 
                                            </div>

                                            <div class="row dynamic_add_slot_tues">
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label">Tuesday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Tuesday_Start_Time) && !empty($Tuesday_Start_Time)) ? $Tuesday_Start_Time:"" ;?>" class="form-control start-hour"  id="tues_start" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Tuesday_End_Time) && !empty($Tuesday_End_Time)) ? $Tuesday_End_Time:"" ;?>" class="form-control finish-hour" id="tues_end" />
                                                      <input type="hidden" name="DAY_ARRAY[]" value="Tuesday" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6"> 
                                                 
                                                        <!-- <div class="row col-md-6 add_del_btn_outer"> -->
                                                          <!-- <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label> -->
                                                          <button type="button" class="btn btn-primary waves-effect waves-light  add_new_slot_details_btn_tues" onclick="return Validate_tuesstart(),Validate_MonTusTiming(); ">+ </button>
                                                        <!-- </div> -->
                                                </div> 
                                              </div>

                                              <div class="row dynamic_add_slot_wed">
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label">Wednesday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Wednesday_Start_Time) && !empty($Wednesday_Start_Time)) ? $Wednesday_Start_Time:"" ;?>" class="form-control" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Wednesday_End_Time) && !empty($Wednesday_End_Time)) ? $Wednesday_End_Time:"" ;?>" class="form-control" id="wedn_end"/>
                                                    <input type="hidden" name="DAY_ARRAY[]" value="Wednesday" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6"> 
                                                        <!-- <div class="row col-md-6 add_del_btn_outer"> -->
                                                          <!-- <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label> -->
                                                          <button type="button" class="btn btn-primary waves-effect waves-light  add_new_slot_details_btn_wed" onclick="return Validate_wedend();" >+ </button>
                                                        <!-- </div> -->
                                                </div> 
                                              </div>

                                              <div class="row dynamic_add_slot_thurs">
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label">Thursday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Thursday_Start_Time) && !empty($Thursday_Start_Time)) ? $Thursday_Start_Time:"" ;?>" class="form-control" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Thursday_End_Time) && !empty($Thursday_End_Time)) ? $Thursday_End_Time:"" ;?>" class="form-control" id="thurs_end" />
                                                    <input type="hidden" name="DAY_ARRAY[]" value="Thursday" /> 
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6"> 
                                                        <!-- <div class="row col-md-6 add_del_btn_outer"> -->
                                                          <!-- <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label> -->
                                                          <button type="button" class="btn btn-primary waves-effect waves-light  add_new_slot_details_btn_thurs" onclick="return Validate_thursend();">+ </button>
                                                        <!-- </div> -->
                                                </div> 
                                              </div>

                                              <div class="row dynamic_add_slot_fri">
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label">Friday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Friday_Start_Time) && !empty($Friday_Start_Time)) ? $Friday_Start_Time:"" ;?>" class="form-control" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Friday_End_Time) && !empty($Friday_End_Time)) ? $Friday_End_Time:"" ;?>" class="form-control" id="fri_end" />
                                                    <input type="hidden" name="DAY_ARRAY[]" value="Friday" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6"> 
                                                        <!-- <div class="row col-md-6 add_del_btn_outer"> -->
                                                          <!-- <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label> -->
                                                          <button type="button" class="btn btn-primary waves-effect waves-light  add_new_frm_field_btn_fri" onclick="return Validate_friend();">+ </button>
                                                        <!-- </div> -->
                                                 </div> 
                                              </div>

                                              <div class="row dynamic_add_slot_sat  ">
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label">Saturday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Saturday_Start_Time) && !empty($Saturday_Start_Time)) ? $Saturday_Start_Time:"" ;?>" class="form-control" />    
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Saturday_End_Time) && !empty($Saturday_End_Time)) ? $Saturday_End_Time:"" ;?>" class="form-control" id="sat_end" />
                                                    <input type="hidden" name="DAY_ARRAY[]" value="Saturday" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6"> 
                                                        <!-- <div class="row col-md-6 add_del_btn_outer"> -->
                                                          <!-- <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label> -->
                                                          <button type="button" class="btn btn-primary waves-effect waves-light  add_new_slot_details_btn_sat" onclick="return Validate_satend();">+ </button>
                                                        <!-- </div> -->
                                                 </div> 
                                              </div>

                                              <div class="row dynamic_add_slot_sun">
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label">Sunday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Sunday_Start_Time) && !empty($Sunday_Start_Time)) ? $Sunday_Start_Time:"" ;?>" class="form-control" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Sunday_End_Time) && !empty($Sunday_End_Time)) ? $Sunday_End_Time:"" ;?>" class="form-control" id="sun_end" />
                                                    <input type="hidden" name="DAY_ARRAY[]" value="Sunday" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6"> 
                                                        <!-- <div class="row col-md-6 add_del_btn_outer"> -->
                                                          <!-- <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label> -->
                                                          <button type="button" class="btn btn-primary waves-effect waves-light  add_new_slot_details_btn_sun" onclick="return Validate_sunend();">+ </button>
                                                        <!-- </div> -->
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
                                                  <button type="submit" class="btn btn-primary waves-effect waves-light mr-1 submit_button" id="">
                                                      Submit
                                                  </button>
                                                  <button type="reset" class="btn btn-secondary waves-effect">
                                                      Cancel
                                                  </button>
                                                </div>
                                              </div>
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
            <script>

              var counter = 2;
              $(".submit_button").click(function(){
                
                var checkcount=0;
                var checkempty1=0;
                var slot_price_flag = 0;
                $(".monday_start_hour").each(function(){
                  // alert($(this).attr('id'));
                  var getlastid=$(this).attr('id');
                  var prestartval=$(this).val();
                  //alert(prestartval);
                  
                  if(prestartval=='')
                  {
                    checkempty1=1;
                    alert("Please select start time");
                    $(this).focus();
                    
                    return false;
                  }  
                  else
                  {
                    
                    var lastFour = parseInt(getlastid.substr(getlastid.length - 4));
                    alert(lastFour);
                    var prvid="end"+(lastFour-1);
                    //alert(prvid); 
                    //alert($("#"+prvid).val());
                    var endval=$("#"+prvid).val()
                    if(prestartval<endval)
                    {
                      checkcount=1;
                      alert("please enter greater value than previous time");
                      $(this).val("");
                      return false;
                    }
                  }
                  
                });       

                var checkcount_ftime=0;
                var checkempty=0;
                $(".monday_finish_hour").each(function(){
                  // alert($(this).attr('id'));
                  var getlastid=$(this).attr('id');
                  var endval1=$(this).val();
                  var lastFour = parseInt(getlastid.substr(getlastid.length - 4));
                  var prvid1="monday_finish_hour"+(lastFour);
                  var prestartval=$("#"+prvid1).val();
                  //alert(endval1);
                  //alert(prestartval);
                  if(endval1=='')
                  {
                    checkempty=1;
                    alert("Please select end time");
                    $(this).focus();
                    return false;
                    
                  } 
                  else{
                    
                    if(prestartval>endval1)
                    {
                      checkcount_ftime=1;
                      alert("please enter greater value than start time");
                      $(this).val("");
                      return false;
                    }
                  }
                });
                
                if(checkcount==1)
                {
                  return false;
                }
                if(checkcount_ftime==1)
                {
                  return false;
                }
                if(checkempty==1)
                {
                  return false;
                }
                  if(checkempty1==1)
                {
                  return false;
                }
              });

              $("#switch10").click(function() {
                  if ($(this).is(":checked")) {
                      $("#vacationdiv").removeAttr("hidden");
                  } else {
                      $("#vacationdiv").attr("hidden", "hidden");
                  }
              });


              $(".add_new_frm_field_btn").click(function(){
                if(counter < 10) {
                  var add_dynamic_services_section = '<div class="row services_block_'+counter+'"><div class="col-lg-3 col-md-3"><div class="form-group"><label class="">Service Name<span class="">*</span></label><br/><input type="hidden" name="counter[]" value="'+counter+'"/><input type="text" class="form-control w_90" name="SERVICE_'+counter+'" id="SERVICE_'+counter+'" placeholder="Enter service" /></div><div class="form-group"><div class="row col-md-12 col-lg-12"><label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1">Is Active</label><div class="row form-group col-md-4"><input class="form-check-input" type="radio" required name="IS_ACTIVE_'+counter+'" id="inlineRadio1" value="Y"><label class="form-check-label" for="inlineRadio1">Yes</label></div><div class="row form-group col-md-4"><input class="form-check-input" type="radio" required name="IS_ACTIVE_'+counter+'" id="inlineRadio2" value="N"><label class="form-check-label" for="inlineRadio2">No</label></div></div></div></div><div class="col-lg-1 col-md-1"> </div><div class="col-lg-4 col-md-3"><div class="form-group"><div class="row"><div class="col-lg-10 col-md-10"><div class="row form-group"><label class="">Add Pricing for time slots<span class="">*</span></label><br/></div></div></div><div class="row"><div class="col-lg-4 col-md-6"><div class="col form-group"><input class="form-check-input" type="checkbox" name="TIMING_'+counter+'_1" id="inlineCheckbox1" value="15"><label class="form-check-label" for="inlineCheckbox1">15 min</label></div></div><div class="col-lg-6 col-md-6"><div class="col form-group"><input type="text" class="form-control w_90" name="PRICE_'+counter+'_1" id="" placeholder="Price for 15min" /></div></div></div><div class="row"><div class="col-lg-4 col-md-6"><div class="col form-group"><input class="form-check-input" type="checkbox" name="TIMING_'+counter+'_2" id="inlineCheckbox1" value="30"><label class="form-check-label" for="inlineCheckbox1">30 min</label></div></div><div class="col-lg-6 col-md-6"><div class="col form-group"><input type="text" class="form-control w_90" name="PRICE_'+counter+'_2" id="" placeholder="Price for 30min" /></div></div></div><div class="row"><div class="col-lg-4 col-md-6"><div class="col form-group"><input class="form-check-input" type="checkbox" name="TIMING_'+counter+'_3" id="inlineCheckbox1" value="60"><label class="form-check-label" for="inlineCheckbox1">60 min</label></div></div><div class="col-lg-6 col-md-6"><div class="col form-group"><input type="text" class="form-control w_90" name="PRICE_'+counter+'_3" id="" placeholder="Price for 60min" /></div></div></div></div></div><div class="col-lg-4 col-md-4"><div class="row col-md-6 add_del_btn_outer"><label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_services_block('+counter+');">Remove Services</button></div></div></div><hr class="services_block_'+counter+'">';
                  $(".dynamic_add_service").append(add_dynamic_services_section);
                }
                counter++;
              }); 

              function remove_services_block(id) {
                $(".services_block_"+id).remove();
              }
              </script>

            <script>

              var mondaycounter=2;
              var monday_end = document.getElementById("monday_end");
              var temp_monday_time_array = [];
                    //if (monday_start.value == "")
              //break slot for monday 
              $(".add_new_slot_details_btn").click(function(){
                if(mondaycounter == 2){
                    if($("#monday_start_1").val() =='' && $("#monday_end_1").val()==''){
                        alert("Please enter monday start and end time");
                        return false;
                    }
                } else {
                    alert(mondaycounter);
                    alert("#monday_start_"+mondaycounter).val()+"----------"+$("#monday_end_"+mondaycounter).val());
                    if($("#monday_start_"+mondaycounter).val() =='' && $("#monday_end_"+mondaycounter).val()==''){
                        alert("Please enter monday start and end time");
                        return false;
                    }
                }
                if(mondaycounter <  6 ) {
                    //Check entered value and compare with existing array values

                    var add_new_slot_details = '<div class="form-group slot_block_'+mondaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="<?php echo (isset($Monday_Start_Time) && !empty($Monday_Start_Time)) ? $Monday_Start_Time:"" ;?>" class="form-control start-hour" id="monday_start_'+mondaycounter+'"/> </div><div class="form-group slot_block_'+mondaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="<?php echo (isset($Monday_End_Time) && !empty($Monday_End_Time)) ? $Monday_End_Time:"" ;?>" id="monday_end_'+mondaycounter+'" class="form-control finish-hour"/><input type="hidden" name="DAY_ARRAY[]" value="Monday" /></div><input type="hidden" name="DAY_ARRAY[]" value="Monday" /></div><div class="form-group slot_block_'+mondaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block('+mondaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_'+mondaycounter+'"> ';
                  $(".dynamic_add_slot").append(add_new_slot_details);
                }
                mondaycounter++;
              });
              function remove_slot_block(id) {
                $(".slot_block_"+id).remove();
              }

            </script>

            <script>
                var tuesdaycounter=0;
                var tues_end = document.getElementById("tues_end");
              //break slot for Tuesday 
              $(".add_new_slot_details_btn_tues").click(function(){
              
                if(tuesdaycounter <  4 && tues_end.value != "") {
                  var add_new_slot_details_tues = '<div class="form-group slot_block_tues_'+tuesdaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="<?php echo (isset($Tuesday_Start_Time) && !empty($Tuesday_Start_Time)) ? $Tuesday_Start_Time:"" ;?>" class="form-control"/></div><div class="form-group slot_block_tues_'+tuesdaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="<?php echo (isset($Tuesday_End_Time) && !empty($Tuesday_End_Time)) ? $Tuesday_End_Time:"" ;?>" class="form-control"/><input type="hidden" name="DAY_ARRAY[]" value="Tuesday" /></div><div class="form-group slot_block_tues_'+tuesdaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_tues('+tuesdaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_tues_'+tuesdaycounter+'"> ';
                  $(".dynamic_add_slot_tues").append(add_new_slot_details_tues);
                }
                tuesdaycounter++;
              });
              
              function remove_slot_block_tues(id) {
                $(".slot_block_tues_"+id).remove();
              }
            </script>

            <script>
              var wednesdaycounter=0;
              var wedn_end = document.getElementById("wedn_end");
              //break slot for Wednesday 
              $(".add_new_slot_details_btn_wed").click(function(){
                if(wednesdaycounter <  4 && wedn_end.value != "" ) {
                  var add_new_slot_details_wed = ' <div class="form-group  slot_block_wed_'+wednesdaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="<?php echo (isset($Wednesday_Start_Time) && !empty($Wednesday_Start_Time)) ? $Wednesday_Start_Time:"" ;?>" class="form-control"/></div> <div class="form-group  slot_block_wed_'+wednesdaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="<?php echo (isset($Wednesday_End_Time) && !empty($Wednesday_End_Time)) ? $Wednesday_End_Time:"" ;?>" class="form-control"/><input type="hidden" name="DAY_ARRAY[]" value="Wednesday" /></div>  <div class="form-group slot_block_wed_'+wednesdaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_wed('+wednesdaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_wed_'+wednesdaycounter+'"> ';
                  $(".dynamic_add_slot_wed").append(add_new_slot_details_wed);
                }
                wednesdaycounter++;
              });
              
              function remove_slot_block_wed(id) {
                $(".slot_block_wed_"+id).remove();
              }

            </script>

            <script>
                   var thursdaycounter=0;
                   var thurs_end = document.getElementById("thurs_end");
               //break slot for Thursday 
               $(".add_new_slot_details_btn_thurs").click(function(){
                if(thursdaycounter <  4 && thurs_end.value != "" ) {
                  var add_new_slot_details_thurs = '<div class="form-group  slot_block_thurs_'+thursdaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="<?php echo (isset($Thursday_Start_Time) && !empty($Thursday_Start_Time)) ? $Thursday_Start_Time:"" ;?>" class="form-control" /></div><div class="form-group slot_block_thurs_'+thursdaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="<?php echo (isset($Thursday_End_Time) && !empty($Thursday_End_Time)) ? $Tuesday_Start_Time:"" ;?>" class="form-control"/><input type="hidden" name="DAY_ARRAY[]" value="Thursday" /> </div>  <div class="form-group slot_block_thurs_'+thursdaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_thurs('+thursdaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_thurs_'+thursdaycounter+'"> ';
                  $(".dynamic_add_slot_thurs").append(add_new_slot_details_thurs);
                }
                thursdaycounter++;
              });
              
              function remove_slot_block_thurs(id) {
                $(".slot_block_thurs_"+id).remove();
              }
            </script>
            <script>
               var fridaycounter=0;
               var fri_end = document.getElementById("fri_end");
              //break slot for Friday 
              $(".add_new_frm_field_btn_fri").click(function(){
                if(fridaycounter <  4 && fri_end.value != "") {
                  var add_new_slot_details_fri = ' <div class="form-group slot_block_fri_'+fridaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="<?php echo (isset($Friday_Start_Time) && !empty($Friday_Start_Time)) ? $Friday_Start_Time:"" ;?>" class="form-control"/></div><div class="form-group slot_block_fri_'+fridaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="<?php echo (isset($Friday_End_Time) && !empty($Friday_End_Time)) ? $Friday_End_Time:"" ;?>" class="form-control" /><input type="hidden" name="DAY_ARRAY[]" value="Friday" /></div> <div class="form-group slot_block_fri_'+fridaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_fri('+fridaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_fri_'+fridaycounter+'"> ';
                  $(".dynamic_add_slot_fri").append(add_new_slot_details_fri);
                }
                fridaycounter++;
              });
              
              function remove_slot_block_fri(id) {
                $(".slot_block_fri_"+id).remove();
              }
            </script>
            <script>
                var saturdaycounter=0;
                var sat_end = document.getElementById("sat_end");
              //break slot for Saturday 
              $(".add_new_slot_details_btn_sat").click(function(){
                if(saturdaycounter <  4 && sat_end.value != "") {
                  var add_new_slot_details_sat = ' <div class="form-group slot_block_sat_'+saturdaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="<?php echo (isset($Saturday_Start_Time) && !empty($Saturday_Start_Time)) ? $Saturday_Start_Time:"" ;?>" class="form-control"/></div><div class="form-group slot_block_sat_'+saturdaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="<?php echo (isset($Saturday_End_Time) && !empty($Saturday_End_Time)) ? $Saturday_End_Time:"" ;?>" class="form-control"/><input type="hidden" name="DAY_ARRAY[]" value="Saturday" /></div>  <div class="form-group slot_block_sat_'+saturdaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_sta('+saturdaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_sat_'+saturdaycounter+'"> ';
                  $(".dynamic_add_slot_sat").append(add_new_slot_details_sat);
                }
                saturdaycounter++;
              });
              
              function remove_slot_block_sta(id) {
                $(".slot_block_sat_"+id).remove();
              }

            </script>
            <script>
              var sundaycounter=0;
              var sun_end = document.getElementById("sun_end");
              //break slot for Sunday 
              $(".add_new_slot_details_btn_sun").click(function(){
                if(sundaycounter <  4 && sun_end.value != "") {
                  var add_new_slot_details_sun = '<div class="form-group slot_block_sun_'+sundaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="<?php echo (isset($Sunday_Start_Time) && !empty($Sunday_Start_Time)) ? $Sunday_Start_Time:"" ;?>" class="form-control"/></div><div class="form-group slot_block_sun_'+sundaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="<?php echo (isset($Sunday_End_Time) && !empty($Sunday_End_Time)) ? $Sunday_End_Time:"" ;?>" class="form-control"/><input type="hidden" name="DAY_ARRAY[]" value="Sunday" /></div><div class="form-group slot_block_sun_'+sundaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_sun('+sundaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_sun_'+sundaycounter+'"> ';
                  $(".dynamic_add_slot_sun").append(add_new_slot_details_sun);
                }
                sundaycounter++;
              });
              
              function remove_slot_block_sun(id) {
                $(".slot_block_sun_"+id).remove();
              }
            </script>             
            
            <script type="text/javascript">
                function Validate_monend(input_id) {
                    var monday_start = $("#monday_start_"+input_id).val();//document.getElementById("monday_start_"+input_id);
                    var monday_end = $("#monday_end_"+input_id).val();//document.getElementById("monday_start_"+input_id);
                    
                    if (monday_start=="" && monday_end=="") {
                        //If the "Please Select" option is selected display error.
                        alert("Please select monday start and end time!");
                        return false;
                    } else
                        return true;
                }

                function Validate_MonTusTiming() {
                    var monday_end = document.getElementById("monday_end");
                    var monday_start1 = document.getElementById("monday_start1")
                    if (monday_end.value < monday_start1.value) {
                        //If the "Please Select" option is selected display error.
                        alert("Please select monday start and end time!");
                        return false;
                    }
                    return true;
                }


                 function Validate_tuesstart() {
                    var tues_end = document.getElementById("tues_end");
                    if (tues_end.value == "") {
                        //If the "Please Select" option is selected display error.
                        alert("Please select tuesday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_wedend() {
                    var wedn_end = document.getElementById("wedn_end");
                    if (wedn_end.value == "") {
                        //If the "Please Select" option is selected display error.
                        alert("Please select wednesday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_thursend() {
                    var thurs_end = document.getElementById("thurs_end");
                    if (thurs_end.value == "") {
                        //If the "Please Select" option is selected display error.
                        alert("Please select thurday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_friend() {
                    var fri_end = document.getElementById("fri_end");
                    if (fri_end.value == "") {
                        //If the "Please Select" option is selected display error.
                        alert("Please select friday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_satend() {
                    var sat_end = document.getElementById("sat_end");
                    if (sat_end.value == "") {
                        //If the "Please Select" option is selected display error.
                        alert("Please select saturday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_sunend() {
                    var sun_end = document.getElementById("sun_end");
                    if (sun_end.value == "") {
                        //If the "Please Select" option is selected display error.
                        alert("Please select sunday start and end time!");
                        return false;
                    }
                    return true;
                 }

            </script>
</body>

</html>