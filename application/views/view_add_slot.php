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
                                              <div class="card-body">
                                                  <div class="dynamic_add_service">
                                                    <?php 
                                                    if(isset($view_service_data) && $view_service_data!=false) { 
                                                      $i = 1;
                                                      foreach($view_service_data as $service_row) { 
                                                      ?>
                                                    <div class="row">
                                                      <div class="col-lg-3 col-md-3">      
                                                        <div class="form-group">
                                                          <label class="">Service Name<span class="required">*</span></label><br/>
                                                          <input type="hidden" name="counter[]" value="1"/>
                                                          <input type="text" class="form-control w_90" name="SERVICE_1" id="SERVICE_1" placeholder="Enter service" value="<?php echo $service_row->SERVICE;?>" />
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="row col-md-12 col-lg-12"> 
                                                            <label class="form-check-label col-lg-6 col-md-6"  for="inlineCheckbox1">Is Active</label>
                                                            <div class="row form-group col-md-4">
                                                              <input class="form-check-input" type="radio" <?php echo ($service_row->IS_ACTIVE == "Y") ? "checked":"";?> name="IS_ACTIVE_1" required id="inlineRadio1" value="Y">
                                                              <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            <div class="row form-group col-md-4">
                                                              <input required class="form-check-input" type="radio" name="IS_ACTIVE_1" id="inlineRadio2" value="N" <?php echo ($service_row->IS_ACTIVE == "N") ? "checked":"";?>>
                                                              <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div> 
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-lg-1 col-md-1"> </div>
                                                      <div class="col-lg-4 col-md-3"> 
                                                        <div class="form-group">
                                                          <div class="row">
                                                            <div class="col-lg-10 col-md-10">      
                                                              <div class="row form-group">
                                                                <label class="">Add Pricing for time slots<span class="required">*</span></label><br/>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-lg-4 col-md-6">      
                                                              <div class="col form-group">
                                                                <input class="form-check-input timing_checkbox_1" type="checkbox" name="TIMING_1_1" id="inlineCheckbox1" value="15">
                                                                <label class="form-check-label" for="inlineCheckbox1" <?php echo (isset($service_row->price_timing_array['TIMING_1']) && $service_row->price_timing_array['TIMING_1'] == "15") ? "checked":"";?>>15 min</label>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6"> 
                                                              <div class="col form-group">
                                                                  <input type="text" class="form-control w_90 pricing_1" name="PRICE_1_1" id="" placeholder="Price for 15min"value="<?php echo (isset($service_row->price_timing_array['PRICE_1']) && !empty($service_row->price_timing_array['PRICE_1'])) ? $service_row->price_timing_array['PRICE_1']:"";?>" />
                                                              </div>
                                                            </div>
                                                          </div>  
                                                          <div class="row">
                                                            <div class="col-lg-4 col-md-6">      
                                                              <div class="col form-group">
                                                                <input class="form-check-input" type="checkbox" name="TIMING_1_2" id="inlineCheckbox1" value="30">
                                                                <label class="form-check-label" for="inlineCheckbox1" <?php echo (isset($service_row->price_timing_array['TIMING_2']) && $service_row->price_timing_array['TIMING_2'] == "30") ? "checked":"";?>>30 min</label>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6"> 
                                                              <div class="col form-group">
                                                                  <input type="text" class="form-control w_90" name="PRICE_1_2" id="" placeholder="Price for 30min" value="<?php echo (isset($service_row->price_timing_array['PRICE_2']) && !empty($service_row->price_timing_array['PRICE_2'])) ? $service_row->price_timing_array['PRICE_2']:"";?>" />
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-lg-4 col-md-6">      
                                                              <div class="col form-group">
                                                                <input class="form-check-input" type="checkbox" name="TIMING_1_3" id="inlineCheckbox1" value="60" <?php echo (isset($service_row->price_timing_array['TIMING_3']) && $service_row->price_timing_array['TIMING_3'] == "60") ? "checked":"";?>>
                                                                <label class="form-check-label" for="inlineCheckbox1">60 min</label>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6"> 
                                                              <div class="col form-group">
                                                                  <input type="text" class="form-control w_90" name="PRICE_1_3" id="" placeholder="Price for 60min" value="<?php echo (isset($service_row->price_timing_array['PRICE_3']) && !empty($service_row->price_timing_array['PRICE_3'])) ? $service_row->price_timing_array['PRICE_3']:"";?>"/>
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                      </div>
                                                      <div class="col-lg-4 col-md-4"> 
                                                        <div class="row col-md-6 add_del_btn_outer">
                                                          <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label>
                                                          <button type="button" data-time-slot='addtime' class="btn btn-primary waves-effect waves-light btn-danger  add_new_frm_field_btn">Delete Service</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div> <hr>
                                                    <?php 
                                                      $i++;
                                                    } ?>
                                                    <div class="row">
                                                      <div class="col-lg-3 col-md-3">      
                                                        <div class="form-group">
                                                          <label class="">Service Name<span class="required">*</span></label><br/>
                                                          <input type="hidden" name="counter[]" value="1"/>
                                                          <input type="text" class="form-control w_90" name="SERVICE_1" id="SERVICE_1" placeholder="Enter service" />
                                                        </div>
                                                        <div class="form-group">
                                                          <div class="row col-md-12 col-lg-12"> 
                                                            <label class="form-check-label col-lg-6 col-md-6"  for="inlineCheckbox1">Is Active</label>
                                                            <div class="row form-group col-md-4">
                                                              <input class="form-check-input" type="radio" name="IS_ACTIVE_1" required id="inlineRadio1" value="Y">
                                                              <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                            </div>
                                                            <div class="row form-group col-md-4">
                                                              <input required class="form-check-input" type="radio" name="IS_ACTIVE_1" id="inlineRadio2" value="N">
                                                              <label class="form-check-label" for="inlineRadio2">No</label>
                                                            </div> 
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="col-lg-1 col-md-1"> </div>
                                                      <div class="col-lg-4 col-md-3"> 
                                                        <div class="form-group">
                                                          <div class="row">
                                                            <div class="col-lg-10 col-md-10">      
                                                              <div class="row form-group">
                                                                <label class="">Add Pricing for time slots<span class="required">*</span></label><br/>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-lg-4 col-md-6">      
                                                              <div class="col form-group">
                                                                <input class="form-check-input timing_checkbox_1" type="checkbox" name="TIMING_1_1" id="inlineCheckbox1" value="15">
                                                                <label class="form-check-label" for="inlineCheckbox1">15 min</label>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6"> 
                                                              <div class="col form-group">
                                                                  <input type="text" class="form-control w_90 pricing_1" name="PRICE_1_1" id="" placeholder="Price for 15min" />
                                                              </div>
                                                            </div>
                                                          </div>  
                                                          <div class="row">
                                                            <div class="col-lg-4 col-md-6">      
                                                              <div class="col form-group">
                                                                <input class="form-check-input" type="checkbox" name="TIMING_1_2" id="inlineCheckbox1" value="30">
                                                                <label class="form-check-label" for="inlineCheckbox1">30 min</label>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6"> 
                                                              <div class="col form-group">
                                                                  <input type="text" class="form-control w_90" name="PRICE_1_2" id="" placeholder="Price for 30min" />
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-lg-4 col-md-6">      
                                                              <div class="col form-group">
                                                                <input class="form-check-input" type="checkbox" name="TIMING_1_3" id="inlineCheckbox1" value="60">
                                                                <label class="form-check-label" for="inlineCheckbox1">60 min</label>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6"> 
                                                              <div class="col form-group">
                                                                  <input type="text" class="form-control w_90" name="PRICE_1_3" id="" placeholder="Price for 60min" />
                                                              </div>
                                                            </div>
                                                          </div>
                                                            
                                                        </div>
                                                      </div>
                                                      <div class="col-lg-4 col-md-4"> 
                                                        <div class="row col-md-6 add_del_btn_outer">
                                                          <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label>
                                                          <button type="button" data-time-slot='addtime' class="btn btn-primary waves-effect waves-light  add_new_frm_field_btn">Add Services</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div> <hr>
                                                    <?php } ?>
                                                  </div>
                                                </div>
                                                 
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
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label mon_err">Monday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" id="start_time" name="START_TIME[]" value="<?php echo (isset($Monday_Start_Time) && !empty($Monday_Start_Time)) ? $Monday_Start_Time:"" ;?>" class="form-control monday_start_hour start-hour"  />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Monday_End_Time) && !empty($Monday_End_Time)) ? $Monday_End_Time:"" ;?>"  id="monday_end0" class="form-control monday_finish_hour monday-finish-hour"  />
                                                    <input type="hidden" name="DAY_ARRAY[]" value="Monday"  id="monday_end"/>
                                                </div> 
                                                <div class="form-group  col-lg-4 col-md-6"> 
                                                        <!-- <div class="row col-md-6 add_del_btn_outer"> -->
                                                          <!-- <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label> -->
                                                          <button type="button" id="monday_add_btn" class="btn btn-primary waves-effect waves-light  add_new_slot_details_btn" value="Validate" onclick="return Validate_monend()">+ </button>
                                                        <!-- </div> -->
                                                 </div> 
                                            </div>

                                            <div class="row dynamic_add_slot_tues">
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label tues_err">Tuesday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Tuesday_Start_Time) && !empty($Tuesday_Start_Time)) ? $Tuesday_Start_Time:"" ;?>" class="form-control tues-start-hour"  id="tues_start" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Tuesday_End_Time) && !empty($Tuesday_End_Time)) ? $Tuesday_End_Time:"" ;?>" class="form-control tues-finish-hour" id="tues_end0" />
                                                      <input type="hidden" name="DAY_ARRAY[]" value="Tuesday" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6"> 
                                                 
                                                        <!-- <div class="row col-md-6 add_del_btn_outer"> -->
                                                          <!-- <label class="form-check-label col-lg-6 col-md-6" for="inlineCheckbox1"><br/></label> -->
                                                          <button type="button" class="btn btn-primary waves-effect waves-light  add_new_slot_details_btn_tues" onclick="return Validate_tuesstart() ">+ </button>
                                                        <!-- </div> -->
                                                </div> 
                                              </div>

                                              <div class="row dynamic_add_slot_wed">
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label wed_err">Wednesday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Wednesday_Start_Time) && !empty($Wednesday_Start_Time)) ? $Wednesday_Start_Time:"" ;?>" class="form-control wed-start-hour" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Wednesday_End_Time) && !empty($Wednesday_End_Time)) ? $Wednesday_End_Time:"" ;?>" class="form-control wed-finish-hour" id="wedn_end0"/>
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
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label thurs_err">Thursday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Thursday_Start_Time) && !empty($Thursday_Start_Time)) ? $Thursday_Start_Time:"" ;?>" class="form-control thurs-start-hour" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Thursday_End_Time) && !empty($Thursday_End_Time)) ? $Thursday_End_Time:"" ;?>" class="form-control thurs-finish-hour" id="thurs_end0" />
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
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label fri_err">Friday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Friday_Start_Time) && !empty($Friday_Start_Time)) ? $Friday_Start_Time:"" ;?>" class="form-control fri-start-hour" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Friday_End_Time) && !empty($Friday_End_Time)) ? $Friday_End_Time:"" ;?>" class="form-control fri-finish-hour" id="fri_end0" />
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
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label sat_err">Saturday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Saturday_Start_Time) && !empty($Saturday_Start_Time)) ? $Saturday_Start_Time:"" ;?>" class="form-control sat-start-hour" />    
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Saturday_End_Time) && !empty($Saturday_End_Time)) ? $Saturday_End_Time:"" ;?>" class="form-control sat-finish-hour" id="sat_end0" />
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
                                                    <label class="form-label col-lg-4 col-md-6 weekday_label sun_err">Sunday</label>
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="START_TIME[]" value="<?php echo (isset($Sunday_Start_Time) && !empty($Sunday_Start_Time)) ? $Sunday_Start_Time:"" ;?>" class="form-control sun-start-hour" />
                                                </div>
                                                <div class="form-group  col-lg-4 col-md-6">
                                                    <input type="time" name="END_TIME[]" value="<?php echo (isset($Sunday_End_Time) && !empty($Sunday_End_Time)) ? $Sunday_End_Time:"" ;?>" class="form-control sun-finish-hour" id="sun_end0" />
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
              /*$(".submit_button").click(function(){
                alert("hereeeee");
                var checkcount=0;
                var checkempty1=0;
                var slot_price_flag = 0;
                
                $(".monday_start_hour").each(function(){
                  alert('ee');
                  // alert($(this).attr('id'));
                  var getlastid=$(this).attr('id');
                  var prestartval=$(this).val();
                  var preendval=$('.monday_finish_hour').val();
                  var newstartval=$('#monday_start1').val();
                  // alert(newstartval);
                  
                  
                  if(prestartval=='')
                  {
                    checkempty1=1;
                    alert("Please select start time");
                    $(this).focus();
                    return false;
                  }else if(newstartval>prestartval && newstartval<preendval){
                    alert('please enter greater value than previous time');
                    return false;
                  } else if(preendval<prestartval){
                    alert('end time should be greater than start time');
                    return false;
                  } 
                  else
                  {
                    
                    var lastFour = parseInt(getlastid.substr(getlastid.length - 4));
                    // alert(lastFour);
                    var prvid="end"+(lastFour-1);
                    //alert(prvid); 
                    //alert($("#"+prvid).val());
                    var endval=$("#"+prvid).val()
                    if(prestartval>endval)
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
              });*/

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

              var mondaycounter=0;
              var monday_end = document.getElementById("monday_end0");
              var monprevalue = parseInt(mondaycounter);
              var mon_start = $('#monday_end0').val();

              $(".add_new_slot_details_btn").click(function(e){
                e.preventDefault();  
                var mon_start = $('#monday_end'+mondaycounter+'').val();

                var stime = [];
                $.each($('.start-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  stime.push( val );
                });
                
                var etime = [];
                $.each($('.monday-finish-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  etime.push( val );
                });
                
                for(var i=0; i < stime.length; i++) 
                {
                  for(var j=i+1; j < stime.length; j++) 
                  {
                    if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                    {
                      alert("Same time not allowed..");
                      return false;
                      
                    } else if( stime[j] < stime[i] && stime[j] != "" ){
                      alert('Time already taken, please select another!');
                      return false;
                    }
                  }
                }

                for(var s=0; s < stime.length; s++) 
                {
                  for(var r=s; r < etime.length; r++) 
                  {
                    if(stime[s] == etime[r] && etime[r] !=  "" )
                    {
                      alert("Same time not allowed");
                      return false;
                      
                    }else if( etime[r] < stime[s] ){
                      alert('End time should be greater than start time ');
                      return false;
                    }  
                  }
                }

                for(var d=0; d < etime.length; d++) 
                {
                  for(var t=d+1; t < stime.length; t++) 
                  {
                    if(stime[t] < etime[d] && stime[t] !=  "" )
                    {
                      alert("Select another time slot");
                      return false;
                    }
                  }
                }
              
                monprevalue++;
                
                var timeToadd = "01:00:00".split(":");  // Time to be added in min
                var ms = (60 * 60 * parseInt(timeToadd[0]) + 60 * (parseInt(timeToadd[1])) ) * 1000;
                
                var newTime =new Date('1970-01-01T' + mon_start ).getTime() + ms
                var finalTime = new Date(newTime).toLocaleString('en-GB').slice(12 ,20)

                // if(mondaycounter <  4 && monday_end.value != "") {
                if( monday_end.value != "") {
                  var add_new_slot_details = '<div class="form-group slot_block_'+mondaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="'+mon_start+'" class="form-control start-hour" id="monday_start1'+parseInt(mondaycounter)+'"/> </div><div class="form-group slot_block_'+mondaycounter+' col-lg-4 col-md-6"><input type="time" id="monday_end'+parseInt(monprevalue)+'" name="END_TIME[]" value="'+finalTime+'" class="form-control monday-finish-hour"/><input type="hidden" name="DAY_ARRAY[]" value="Monday" /></div><input type="hidden" name="DAY_ARRAY[]" value="Monday" /></div><div class="form-group slot_block_'+mondaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block('+mondaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_'+mondaycounter+'"> ';
                  $(".dynamic_add_slot").append(add_new_slot_details);
                }
                mondaycounter++;

                $('input[id*="monday_start"] , .monday-finish-hour').focusout(function(){
                    var stime = [];
                    $.each($('.start-hour'), function (i, item) 
                    {
                      var val = $(this).val(); 
                      stime.push( val );
                    });
                    
                    var etime = [];
                    $.each($('.monday-finish-hour'), function (i, item) 
                    {
                      var val = $(this).val(); 
                      etime.push( val );

                    });
                    
                    for(var i=0; i < stime.length; i++) 
                    {
                      for(var j=i+1; j < stime.length; j++) 
                      {
                        $(".error").remove();
                        if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                        {
                          $('.mon_err').after('<div class="error"> Same time not allowed</div>');  
                          return false;
                          
                        } else if( stime[j] < stime[i] && stime[j] != "" ){
                          $('.mon_err').after('<div class="error">Time already taken, please select another!</div>');  
                          return false;
                        }
                      }
                    }

                    for(var s=0; s < stime.length; s++) 
                    {
                      for(var r=s; r < etime.length; r++) 
                      {
                        if(stime[s] == etime[r] && etime[r] !=  "" )
                        {
                          $('.mon_err').after('<div class="error"> Same time not allowed</div>');
                          return false;
                          
                        }else if( etime[r] < stime[s] ){
                          $('.mon_err').after('<div class="error"> End time should be greater than start time</div>');
                          return false;
                        }  
                      }
                    }

                    for(var d=0; d < etime.length; d++) 
                    {
                      for(var t=d+1; t < stime.length; t++) 
                      {
                        if(stime[t] < etime[d] && stime[t] !=  "" )
                        {
                          $('.mon_err').after('<div class="error"> Select another time slot</div>');
                          return false;
                        }
                      }
                    }
                });
              });
              function remove_slot_block(id) {
                $(".slot_block_"+id).remove();
                monprevalue--;
                mondaycounter--;
              }

            </script> 

            <script>
              var tuesdaycounter=0;
              var tues_end = document.getElementById("tues_end0");
              var tuesprevalue = parseInt(tuesdaycounter);
              //break slot for Tuesday 
              $(".add_new_slot_details_btn_tues").click(function(){
                var tues_start = $('#tues_end'+tuesdaycounter).val();
                
                var stime = [];
                $.each($('.tues-start-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  stime.push( val );
                });
                
                var etime = [];
                $.each($('.tues-finish-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  etime.push( val );

                });
                  
                for(var i=0; i < stime.length; i++) 
                {
                  for(var j=i+1; j < stime.length; j++) 
                  {
                    if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                    {
                      alert("Same time not allowed..");
                      return false;
                      
                    } else if( stime[j] < stime[i] && stime[j] != "" ){
                      alert('Time already taken, please select another!');
                      return false;
                    }
                  }
                }

                for(var s=0; s < stime.length; s++) 
                {
                  for(var r=s; r < etime.length; r++) 
                  {
                    if(stime[s] == etime[r] && etime[r] !=  "" )
                    {
                      alert("Same time not allowed");
                      return false;
                      
                    }else if( etime[r] < stime[s] ){
                      alert('End time should be greater than start time ');
                      return false;
                    }  
                  }
                }

                for(var d=0; d < etime.length; d++) 
                {
                  for(var t=d+1; t < stime.length; t++) 
                  {
                    if(stime[t] < etime[d] && stime[t] !=  "" )
                    {
                      alert("Select another time slott");
                      return false;
                    }
                  }
                }

                tuesprevalue++;

                var timeToadd = "01:00:00".split(":");  // Time to be added in min
                var ms = (60 * 60 * parseInt(timeToadd[0]) + 60 * (parseInt(timeToadd[1])) ) * 1000;
                
                var newTime =new Date('1970-01-01T' + tues_start ).getTime() + ms
                var finalTime = new Date(newTime).toLocaleString('en-GB').slice(12 ,20)
                
                // if(tuesdaycounter <  4 && tues_end.value != "") {
                if(tues_end.value != "") {
                  var add_new_slot_details_tues = '<div class="form-group slot_block_tues_'+tuesdaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="'+tues_start+'" class="form-control tues-start-hour"/></div><div class="form-group slot_block_tues_'+tuesdaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" id="tues_end'+tuesprevalue+'" value="'+finalTime+'" class="form-control tues-finish-hour"/><input type="hidden" name="DAY_ARRAY[]" value="Tuesday" /></div><div class="form-group slot_block_tues_'+tuesdaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_tues('+tuesdaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_tues_'+tuesdaycounter+'"> ';
                  $(".dynamic_add_slot_tues").append(add_new_slot_details_tues);
                }
                tuesdaycounter++;

                $('.tues-start-hour , .tues-finish-hour').focusout(function(){
                    var stime = [];
                    $.each($('.tues-start-hour'), function (i, item) 
                    {
                      var val = $(this).val(); 
                      stime.push( val );
                    });
                    
                    var etime = [];
                    $.each($('.tues-finish-hour'), function (i, item) 
                    {
                      var val = $(this).val(); 
                      etime.push( val );
                    });
                    
                    for(var i=0; i < stime.length; i++) 
                    {
                      for(var j=i+1; j < stime.length; j++) 
                      {
                        $(".error").remove();
                        if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                        {
                          $('.tues_err').after('<div class="error"> Same time not allowed</div>');  
                          return false;
                          
                        } else if( stime[j] < stime[i] && stime[j] != "" ){
                          $('.tues_err').after('<div class="error">Time already taken, please select another!</div>');  
                          return false;
                        }
                      }
                    }

                    for(var s=0; s < stime.length; s++) 
                    {
                      for(var r=s; r < etime.length; r++) 
                      {
                        if(stime[s] == etime[r] && etime[r] !=  "" )
                        {
                          $('.tues_err').after('<div class="error"> Same time not allowed</div>');
                          return false;
                          
                        }else if( etime[r] < stime[s] ){
                          $('.tues_err').after('<div class="error"> End time should be greater than start time</div>');
                          return false;
                        }  
                      }
                    }

                    for(var d=0; d < etime.length; d++) 
                    {
                      for(var t=d+1; t < stime.length; t++) 
                      {
                        if(stime[t] < etime[d] && stime[t] !=  "" )
                        {
                          $('.tues_err').after('<div class="error"> Select another time slot</div>');
                          return false;
                        }
                      }
                    }
                });

              });
              
              function remove_slot_block_tues(id) {
                $(".slot_block_tues_"+id).remove();
                tuesprevalue--;
                tuesdaycounter--;
              }
            </script>

            <script>
              var wednesdaycounter=0;
              var wedn_end = document.getElementById("wedn_end0");
              var wednprevalue = parseInt(wednesdaycounter);
              //break slot for Wednesday 
              $(".add_new_slot_details_btn_wed").click(function(){
                var wedn_start = $('#wedn_end'+wednesdaycounter+'').val();

                var stime = [];
                $.each($('.wed-start-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  stime.push( val );
                });
                
                var etime = [];
                $.each($('.wed-finish-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  etime.push( val );
                });
                
                for(var i=0; i < stime.length; i++) 
                {
                  for(var j=i+1; j < stime.length; j++) 
                  {
                    if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                    {
                      alert("Same time not allowed..");
                      return false;
                      
                    } else if( stime[j] < stime[i] && stime[j] != "" ){
                      alert('Time already taken, please select another!');
                      return false;
                    }
                  }
                }

                for(var s=0; s < stime.length; s++) 
                {
                  for(var r=s; r < etime.length; r++) 
                  {
                    if(stime[s] == etime[r] && etime[r] !=  "" )
                    {
                      alert("Same time not allowed");
                      return false;
                      
                    }else if( etime[r] < stime[s] ){
                      alert('End time should be greater than start time ');
                      return false;
                    }  
                  }
                }

                for(var d=0; d < etime.length; d++) 
                {
                  for(var t=d+1; t < stime.length; t++) 
                  {
                    if(stime[t] < etime[d] && stime[t] !=  "" )
                    {
                      alert("Select another time slot");
                      return false;
                    }
                  }
                }                

                wednprevalue++;

                var timeToadd = "01:00:00".split(":");  // Time to be added in min
                var ms = (60 * 60 * parseInt(timeToadd[0]) + 60 * (parseInt(timeToadd[1])) ) * 1000;
                
                var newTime =new Date('1970-01-01T' + wedn_start ).getTime() + ms
                var finalTime = new Date(newTime).toLocaleString('en-GB').slice(12 ,20)
                
                // if(wednesdaycounter <  4 && wedn_end.value != "" ) {
                if(wedn_end.value != "" ) {
                  var add_new_slot_details_wed = ' <div class="form-group  slot_block_wed_'+wednesdaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="'+wedn_start+'" id="wed_start'+wednesdaycounter+'" class="form-control wed-start-hour"/></div> <div class="form-group  slot_block_wed_'+wednesdaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" id="wedn_end'+parseInt(wednprevalue)+'" value="'+finalTime+'" class="form-control wed-finish-hour"/><input type="hidden" name="DAY_ARRAY[]" value="Wednesday" /></div>  <div class="form-group slot_block_wed_'+wednesdaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_wed('+wednesdaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_wed_'+wednesdaycounter+'"> ';
                  $(".dynamic_add_slot_wed").append(add_new_slot_details_wed);
                }
                wednesdaycounter++;

                $('input[id*="wed_start"] , .wed-finish-hour').focusout(function(){
                    var stime = [];
                    $.each($('.wed-start-hour'), function (i, item) 
                    {
                      var val = $(this).val(); 
                      stime.push( val );
                    });
                    
                    var etime = [];
                    $.each($('.wed-finish-hour'), function (i, item) 
                    {
                      var val = $(this).val(); 
                      etime.push( val );
                    });
                    
                    for(var i=0; i < stime.length; i++) 
                    {
                      for(var j=i+1; j < stime.length; j++) 
                      {
                        $(".error").remove();
                        if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                        {
                          $('.wed_err').after('<div class="error"> Same time not allowed</div>');  
                          return false;
                          
                        } else if( stime[j] < stime[i] && stime[j] != "" ){
                          $('.wed_err').after('<div class="error">Time already taken, please select another!</div>');  
                          return false;
                        }
                      }
                    }

                    for(var s=0; s < stime.length; s++) 
                    {
                      for(var r=s; r < etime.length; r++) 
                      {
                        if(stime[s] == etime[r] && etime[r] !=  "" )
                        {
                          $('.wed_err').after('<div class="error"> Same time not allowed</div>');
                          return false;
                          
                        }else if( etime[r] < stime[s] ){
                          $('.wed_err').after('<div class="error"> End time should be greater than start time</div>');
                          return false;
                        }  
                      }
                    }

                    for(var d=0; d < etime.length; d++) 
                    {
                      for(var t=d+1; t < stime.length; t++) 
                      {
                        if(stime[t] < etime[d] && stime[t] !=  "" )
                        {
                          $('.wed_err').after('<div class="error"> Select another time slot</div>');
                          return false;
                        }
                      }
                    }
                });
              });
              // });
              
              function remove_slot_block_wed(id) {
                $(".slot_block_wed_"+id).remove();
                wednprevalue--;
                wednesdaycounter--;
              }

            </script>

            <script>
              var thursdaycounter=0;
              var thurs_end = document.getElementById("thurs_end0");
              var thursprevalue = parseInt(thursdaycounter);
               //break slot for Thursday 
              $(".add_new_slot_details_btn_thurs").click(function(){
                var thurs_start = $('#thurs_end'+thursdaycounter+'').val();

                var stime = [];
                $.each($('.thurs-start-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  stime.push( val );
                });
                
                var etime = [];
                $.each($('.thurs-finish-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  etime.push( val );
                });
                
                for(var i=0; i < stime.length; i++) 
                {
                  for(var j=i+1; j < stime.length; j++) 
                  {
                    if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                    {
                      alert("Same time not allowed..");
                      return false;
                      
                    } else if( stime[j] < stime[i] && stime[j] != "" ){
                      alert('Time already taken, please select another!');
                      return false;
                    }
                  }
                }

                for(var s=0; s < stime.length; s++) 
                {
                  for(var r=s; r < etime.length; r++) 
                  {
                    if(stime[s] == etime[r] && etime[r] !=  "" )
                    {
                      alert("Same time not allowed");
                      return false;
                      
                    }else if( etime[r] < stime[s] ){
                      alert('End time should be greater than start time ');
                      return false;
                    }  
                  }
                }

                for(var d=0; d < etime.length; d++) 
                {
                  for(var t=d+1; t < stime.length; t++) 
                  {
                    if(stime[t] < etime[d] && stime[t] !=  "" )
                    {
                      alert("Select another time slot");
                      return false;
                    }
                  }
                } 

                thursprevalue++;

                var timeToadd = "01:00:00".split(":");  // Time to be added in min
                var ms = (60 * 60 * parseInt(timeToadd[0]) + 60 * (parseInt(timeToadd[1])) ) * 1000;
                
                var newTime =new Date('1970-01-01T' + thurs_start ).getTime() + ms
                var finalTime = new Date(newTime).toLocaleString('en-GB').slice(12 ,20)

                // if(thursdaycounter <  4 && thurs_end.value != "" ) {
                if(thurs_end.value != "" ) {
                  var add_new_slot_details_thurs = '<div class="form-group  slot_block_thurs_'+thursdaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="'+thurs_start+'" id="thurs_start'+thursdaycounter+'"  class="form-control thurs-start-hour" /></div><div class="form-group slot_block_thurs_'+thursdaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="'+finalTime+'" id="thurs_end'+parseInt(thursprevalue)+'" class="form-control thurs-finish-hour"/><input type="hidden" name="DAY_ARRAY[]" value="Thursday" /> </div>  <div class="form-group slot_block_thurs_'+thursdaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_thurs('+thursdaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_thurs_'+thursdaycounter+'"> ';
                  $(".dynamic_add_slot_thurs").append(add_new_slot_details_thurs);
                }
                thursdaycounter++;

                $('input[id*="thurs_start"] , .thurs-finish-hour').focusout(function(){
                  var stime = [];
                  $.each($('.thurs-start-hour'), function (i, item) 
                  {
                    var val = $(this).val(); 
                    stime.push( val );
                  });
                  
                  var etime = [];
                  $.each($('.thurs-finish-hour'), function (i, item) 
                  {
                    var val = $(this).val(); 
                    etime.push( val );
                  });
                  
                  for(var i=0; i < stime.length; i++) 
                  {
                    for(var j=i+1; j < stime.length; j++) 
                    {
                      $(".error").remove();
                      if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                      {
                        $('.thurs_err').after('<div class="error"> Same time not allowed</div>');  
                        return false;
                        
                      } else if( stime[j] < stime[i] && stime[j] != "" ){
                        $('.thurs_err').after('<div class="error">Time already taken, please select another!</div>');  
                        return false;
                      }
                    }
                  }

                  for(var s=0; s < stime.length; s++) 
                  {
                    for(var r=s; r < etime.length; r++) 
                    {
                      if(stime[s] == etime[r] && etime[r] !=  "" )
                      {
                        $('.thurs_err').after('<div class="error"> Same time not allowed</div>');
                        return false;
                        
                      }else if( etime[r] < stime[s] ){
                        $('.thurs_err').after('<div class="error"> End time should be greater than start time</div>');
                        return false;
                      }  
                    }
                  }

                  for(var d=0; d < etime.length; d++) 
                  {
                    for(var t=d+1; t < stime.length; t++) 
                    {
                      if(stime[t] < etime[d] && stime[t] !=  "" )
                      {
                        $('.thurs_err').after('<div class="error"> Select another time slot</div>');
                        return false;
                      }
                    }
                  }
                });
              });
              
              function remove_slot_block_thurs(id) {
                $(".slot_block_thurs_"+id).remove();
                thursprevalue--;
                thursdaycounter--;
              }
            </script>

            <script>
              var fridaycounter=0;
              var fri_end = document.getElementById("fri_end0");
              var friprevalue = parseInt(fridaycounter);
              //break slot for Friday 
              $(".add_new_frm_field_btn_fri").click(function(){
                var fri_start = $('#fri_end'+fridaycounter+'').val();

                var stime = [];
                $.each($('.fri-start-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  stime.push( val );
                });
                
                var etime = [];
                $.each($('.fri-finish-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  etime.push( val );
                });
                
                for(var i=0; i < stime.length; i++) 
                {
                  for(var j=i+1; j < stime.length; j++) 
                  {
                    if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                    {
                      alert("Same time not allowed..");
                      return false;
                      
                    } else if( stime[j] < stime[i] && stime[j] != "" ){
                      alert('Time already taken, please select another!');
                      return false;
                    }
                  }
                }

                for(var s=0; s < stime.length; s++) 
                {
                  for(var r=s; r < etime.length; r++) 
                  {
                    if(stime[s] == etime[r] && etime[r] !=  "" )
                    {
                      alert("Same time not allowed");
                      return false;
                      
                    }else if( etime[r] < stime[s] ){
                      alert('End time should be greater than start time ');
                      return false;
                    }  
                  }
                }

                for(var d=0; d < etime.length; d++) 
                {
                  for(var t=d+1; t < stime.length; t++) 
                  {
                    if(stime[t] < etime[d] && stime[t] !=  "" )
                    {
                      alert("Select another time slot");
                      return false;
                    }
                  }
                } 

                friprevalue++;

                var timeToadd = "01:00:00".split(":");  // Time to be added in min
                var ms = (60 * 60 * parseInt(timeToadd[0]) + 60 * (parseInt(timeToadd[1])) ) * 1000;
                
                var newTime =new Date('1970-01-01T' + fri_start ).getTime() + ms
                var finalTime = new Date(newTime).toLocaleString('en-GB').slice(12 ,20)

                if(fridaycounter <  4 && fri_end.value != "") {
                  var add_new_slot_details_fri = ' <div class="form-group slot_block_fri_'+fridaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="'+fri_start+'" id="fri_start'+fridaycounter+'" class="form-control fri-start-hour"/></div><div class="form-group slot_block_fri_'+fridaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="'+finalTime+'" id="fri_end'+parseInt(friprevalue)+'" class="form-control fri-finish-hour" /><input type="hidden" name="DAY_ARRAY[]" value="Friday" /></div> <div class="form-group slot_block_fri_'+fridaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_fri('+fridaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_fri_'+fridaycounter+'"> ';
                  $(".dynamic_add_slot_fri").append(add_new_slot_details_fri);
                }
                fridaycounter++;

                $('input[id*="fri_start"] , .fri-finish-hour').focusout(function(){
                  var stime = [];
                  $.each($('.fri-start-hour'), function (i, item) 
                  {
                  var val = $(this).val(); 
                  stime.push( val );
                  });
                  
                  var etime = [];
                  $.each($('.fri-finish-hour'), function (i, item) 
                  {
                  var val = $(this).val(); 
                  etime.push( val );

                  });
                  
                  for(var i=0; i < stime.length; i++) 
                  {
                    for(var j=i+1; j < stime.length; j++) 
                    {
                      $(".error").remove();
                      if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                      {
                        $('.fri_err').after('<div class="error"> Same time not allowed</div>');  
                        return false;
                        
                      } else if( stime[j] < stime[i] && stime[j] != "" ){
                        $('.fri_err').after('<div class="error">Time already taken, please select another!</div>');  
                        return false;
                      }
                    }
                  }

                  for(var s=0; s < stime.length; s++) 
                  {
                    for(var r=s; r < etime.length; r++) 
                    {
                      if(stime[s] == etime[r] && etime[r] !=  "" )
                      {
                        $('.fri_err').after('<div class="error"> Same time not allowed</div>');
                        return false;
                        
                      }else if( etime[r] < stime[s] ){
                        $('.fri_err').after('<div class="error"> End time should be greater than start time</div>');
                        return false;
                      }  
                    }
                  }

                  for(var d=0; d < etime.length; d++) 
                  {
                    for(var t=d+1; t < stime.length; t++) 
                    {
                      if(stime[t] < etime[d] && stime[t] !=  "" )
                      {
                        $('.fri_err').after('<div class="error"> Select another time slot</div>');
                        return false;
                      }
                    }
                  }
                });
              });
              
              function remove_slot_block_fri(id) {
                $(".slot_block_fri_"+id).remove();
                fridaycounter--;
                friprevalue--;
              }
            </script>

            <script>
              var saturdaycounter=0;
              var sat_end = document.getElementById("sat_end0");
              var satprevalue = parseInt(saturdaycounter);
              //break slot for Saturday 
              $(".add_new_slot_details_btn_sat").click(function(){
                var sat_start = $('#sat_end'+saturdaycounter+'').val();

                var stime = [];
                $.each($('.sat-start-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  stime.push( val );
                });
                
                var etime = [];
                $.each($('.sat-finish-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  etime.push( val );
                });
                
                for(var i=0; i < stime.length; i++) 
                {
                  for(var j=i+1; j < stime.length; j++) 
                  {
                    if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                    {
                      alert("Same time not allowed..");
                      return false;
                      
                    } else if( stime[j] < stime[i] && stime[j] != "" ){
                      alert('Time already taken, please select another!');
                      return false;
                    }
                  }
                }

                for(var s=0; s < stime.length; s++) 
                {
                  for(var r=s; r < etime.length; r++) 
                  {
                    if(stime[s] == etime[r] && etime[r] !=  "" )
                    {
                      alert("Same time not allowed");
                      return false;
                      
                    }else if( etime[r] < stime[s] ){
                      alert('End time should be greater than start time ');
                      return false;
                    }  
                  }
                }

                for(var d=0; d < etime.length; d++) 
                {
                  for(var t=d+1; t < stime.length; t++) 
                  {
                    if(stime[t] < etime[d] && stime[t] !=  "" )
                    {
                      alert("Select another time slot");
                      return false;
                    }
                  }
                } 

                satprevalue++;

                var timeToadd = "01:00:00".split(":");  // Time to be added in min
                var ms = (60 * 60 * parseInt(timeToadd[0]) + 60 * (parseInt(timeToadd[1])) ) * 1000;
                
                var newTime =new Date('1970-01-01T' + sat_start ).getTime() + ms
                var finalTime = new Date(newTime).toLocaleString('en-GB').slice(12 ,20)
                // if(saturdaycounter <  4 && sat_end.value != "") {
                if(sat_end.value != "") {
                  var add_new_slot_details_sat = ' <div class="form-group slot_block_sat_'+saturdaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="'+sat_start+'" id="sat_start'+saturdaycounter+'" class="form-control sat-start-hour"/></div><div class="form-group slot_block_sat_'+saturdaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="'+finalTime+'" id="sat_end'+parseInt(satprevalue)+'" class="form-control sat-finish-hour"/><input type="hidden" name="DAY_ARRAY[]" value="Saturday" /></div>  <div class="form-group slot_block_sat_'+saturdaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_sta('+saturdaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_sat_'+saturdaycounter+'"> ';
                  $(".dynamic_add_slot_sat").append(add_new_slot_details_sat);
                }
                saturdaycounter++;

                $('input[id*="sat_start"] , .sat-finish-hour').focusout(function(){
                  var stime = [];
                  $.each($('.sat-start-hour'), function (i, item) 
                  {
                    var val = $(this).val(); 
                    stime.push( val );
                  });
                  
                  var etime = [];
                  $.each($('.sat-finish-hour'), function (i, item) 
                  {
                    var val = $(this).val(); 
                    etime.push( val );
                  });
                  
                  for(var i=0; i < stime.length; i++) 
                  {
                    for(var j=i+1; j < stime.length; j++) 
                    {
                      $(".error").remove();
                      if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                      {
                        $(this).after('<div class="error"> Same time not allowed</div>');  
                        return false;
                        
                      } else if( stime[j] < stime[i] && stime[j] != "" ){
                        $(this).after('<div class="error">Time already taken, please select another!</div>');  
                        return false;
                      }
                    }
                  }

                  for(var s=0; s < stime.length; s++) 
                  {
                    for(var r=s; r < etime.length; r++) 
                    {
                      if(stime[s] == etime[r] && etime[r] !=  "" )
                      {
                        $(this).after('<div class="error"> Same time not allowed</div>');
                        return false;
                        
                      }else if( etime[r] < stime[s] ){
                        $(this).after('<div class="error"> End time should be greater than start time</div>');
                        return false;
                      }  
                    }
                  }

                  for(var d=0; d < etime.length; d++) 
                  {
                    for(var t=d+1; t < stime.length; t++) 
                    {
                      if(stime[t] < etime[d] && stime[t] !=  "" )
                      {
                        $(this).after('<div class="error"> Select another time slot</div>');
                        return false;
                      }
                    }
                  }
                });
              });
              
              function remove_slot_block_sta(id) {
                $(".slot_block_sat_"+id).remove();
                saturdaycounter--;
                satprevalue--;
              }

            </script>

            <script>
              var sundaycounter=0;
              var sun_end = document.getElementById("sun_end0");
              var sunprevalue = parseInt(sundaycounter);
              //break slot for Sunday 
              $(".add_new_slot_details_btn_sun").click(function(){
                var sun_start = $('#sun_end'+sundaycounter+'').val();

                var stime = [];
                $.each($('.sun-start-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  stime.push( val );
                });
                
                var etime = [];
                $.each($('.sun-finish-hour'), function (i, item) 
                {
                  var val = $(this).val(); 
                  etime.push( val );
                });
                
                for(var i=0; i < stime.length; i++) 
                {
                  for(var j=i+1; j < stime.length; j++) 
                  {
                    if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                    {
                      alert("Same time not allowed..");
                      return false;
                      
                    } else if( stime[j] < stime[i] && stime[j] != "" ){
                      alert('Time already taken, please select another!');
                      return false;
                    }
                  }
                }

                for(var s=0; s < stime.length; s++) 
                {
                  for(var r=s; r < etime.length; r++) 
                  {
                    if(stime[s] == etime[r] && etime[r] !=  "" )
                    {
                      alert("Same time not allowed");
                      return false;
                      
                    }else if( etime[r] < stime[s] ){
                      alert('End time should be greater than start time ');
                      return false;
                    }  
                  }
                }

                for(var d=0; d < etime.length; d++) 
                {
                  for(var t=d+1; t < stime.length; t++) 
                  {
                    if(stime[t] < etime[d] && stime[t] !=  "" )
                    {
                      alert("Select another time slot");
                      return false;
                    }
                  }
                } 

                sunprevalue++;

                var timeToadd = "01:00:00".split(":");  // Time to be added in min
                var ms = (60 * 60 * parseInt(timeToadd[0]) + 60 * (parseInt(timeToadd[1])) ) * 1000;
                
                var newTime =new Date('1970-01-01T' + sun_start ).getTime() + ms
                var finalTime = new Date(newTime).toLocaleString('en-GB').slice(12 ,20)

                if(sundaycounter <  4 && sun_end.value != "") {
                  var add_new_slot_details_sun = '<div class="form-group slot_block_sun_'+sundaycounter+' col-lg-4 col-md-6"><input type="time" name="START_TIME[]" value="'+sun_start+'" id="sun_start'+sundaycounter+'" class="form-control sun-start-hour"/></div><div class="form-group slot_block_sun_'+sundaycounter+' col-lg-4 col-md-6"><input type="time" name="END_TIME[]" value="'+finalTime+'" id="sun_end'+parseInt(sunprevalue)+'" class="form-control sun-finish-hour"/><input type="hidden" name="DAY_ARRAY[]" value="Sunday" /></div><div class="form-group slot_block_sun_'+sundaycounter+' col-lg-4 col-md-6"><button type="button" class="btn btn-primary waves-effect waves-light btn-warning" onclick="return remove_slot_block_sun('+sundaycounter+');"><i class="fas fa-trash-alt"></i></button></div></div></div><hr class="slot_block_sun_'+sundaycounter+'"> ';
                  $(".dynamic_add_slot_sun").append(add_new_slot_details_sun);
                }
                sundaycounter++;

                $('input[id*="sun_start"] , .sun-finish-hour').focusout(function(){
                  var stime = [];
                  $.each($('.sun-start-hour'), function (i, item) 
                  {
                    var val = $(this).val(); 
                    stime.push( val );
                  });
                  
                  var etime = [];
                  $.each($('.sun-finish-hour'), function (i, item) 
                  {
                    var val = $(this).val(); 
                    etime.push( val );
                  });
                  
                  for(var i=0; i < stime.length; i++) 
                  {
                    for(var j=i+1; j < stime.length; j++) 
                    {
                      $(".error").remove();
                      if(stime[i] == stime[j] && stime[i] !=  "" && stime[j] != "" && etime[i] != "" && etime[j] != "" )
                      {
                        $('.sun_err').after('<div class="error"> Same time not allowed</div>');  
                        return false;
                        
                      } else if( stime[j] < stime[i] && stime[j] != "" ){
                        $('.sun_err').after('<div class="error">Time already taken, please select another!</div>');  
                        return false;
                      }
                    }
                  }

                  for(var s=0; s < stime.length; s++) 
                  {
                    for(var r=s; r < etime.length; r++) 
                    {
                      if(stime[s] == etime[r] && etime[r] !=  "" )
                      {
                        $('.sun_err').after('<div class="error"> Same time not allowed</div>');
                        return false;
                        
                      }else if( etime[r] < stime[s] ){
                        $('.sun_err').after('<div class="error"> End time should be greater than start time</div>');
                        return false;
                      }  
                    }
                  }

                  for(var d=0; d < etime.length; d++) 
                  {
                    for(var t=d+1; t < stime.length; t++) 
                    {
                      if(stime[t] < etime[d] && stime[t] !=  "" )
                      {
                        $('.sun_err').after('<div class="error"> Select another time slot</div>');
                        return false;
                      }
                    }
                  }
                });
              });
              
              function remove_slot_block_sun(id) {
                $(".slot_block_sun_"+id).remove();
                sundaycounter--;
                sunprevalue--;
              }
            </script> 

            <script>
              
              function getTimeSelects(containingElement) {
                var selects = {};
                selects.startHour = containingElement.find(".start-hour");
                selects.startMinute = containingElement.find(".start-minute");
                selects.finishHour = containingElement.find(".finish-hour");
                selects.finishMinute = containingElement.find(".finish-minute");

                return selects;
              }

              function getTimeSelectsValuesInMinutes(containingElement) {
                var selects = getTimeSelects(containingElement);

                return [
                  selects.startHour.val() * 60 + Number(selects.startMinute.val()),
                  selects.finishHour.val() * 60 + Number(selects.finishMinute.val())
                ];
              }

              function is_overlapping(x1, x2, y1, y2) {
                return x1 < y2 && y1 < x2;
              }

              function checkForIntersection(arr) {
                var overlappingElements = [];

                for (var i = 0; i < arr.length; i++) {
                  for (var j = 0; j < arr.length; j++) {
                    if (arr[i] !== arr[j] &&
                      is_overlapping(arr[i][1], arr[i][2], arr[j][1], arr[j][2])) {

                      overlappingElements.push(arr[i][0]);
                    }
                  }
                }
                return (overlappingElements);
              }

              $("#addBreak").on("click", function(e) {
                e.preventDefault();
                template.clone().insertBefore("#controls-row");
                $(".remove").show();
              });

              $("#removeBreak").on("click", function(e) {
                e.preventDefault();
                $("form").find(".breakRow").last().remove();
                if (!$("form").find(".breakRow").length) {
                  $(".remove").hide();
                }
              });

              $("#button_submit").on("click", function(e) {
                
                e.preventDefault();
                var breakTimes = [],
                  errorsPresent = false;
                  
                $(".start-hour").each(function() {
                 var minutes = getTimeSelectsValuesInMinutes($(this));
                  minutes.unshift(this);
                  breakTimes.push(minutes);
                  console.log(break Times);
                });
               
                $.each(checkForIntersection(breakTimes), function(index, row) { alert("testing");
                  $(row).find("select").addClass("error");
                  errorsPresent = true;
                });

                if (errorsPresent) {
                  alert("Overlapping fields detected!");
                }
              });

              var template = $(".row").clone();
              template.addClass("breakRow");
              template.find("legend").text("Break taken");
              $(".start-hour").val("09");
              $(".finish-hour").val("17");

            </script> 
            
            <script type="text/javascript">
                function Validate_monend() {
                    var monday_end = document.getElementById("monday_end0");
                    if (monday_end.value == "") {
                      mondaycounter--;
                      monprevalue--;
                        //If the "Please Select" option is selected display error.
                        alert("Please select monday start and end time!");
                        return false;
                    }
                    return true;
                }

                function Validate_MonTusTiming() {
                    var monday_end = document.getElementById("monday_end0");
                    var monday_start1 = document.getElementById("monday_start1")
                    if (monday_end.value < monday_start1.value) {
                        //If the "Please Select" option is selected display error.
                        alert("Please select monday start and end time!");
                        return false;
                    }
                    return true;
                }


                 function Validate_tuesstart() {
                    var tues_end = document.getElementById("tues_end0");
                    if (tues_end.value == "") {
                      tuesdaycounter--;
                      tuesprevalue--;
                        //If the "Please Select" option is selected display error.
                        alert("Please select tuesday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_wedend() {
                    var wedn_end = document.getElementById("wedn_end0");
                    if (wedn_end.value == "") {
                      wednprevalue--;
                      wednesdaycounter--;
                        //If the "Please Select" option is selected display error.
                        alert("Please select wednesday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_thursend() {
                    var thurs_end = document.getElementById("thurs_end0");
                    if (thurs_end.value == "") {
                      thursprevalue--;
                      thursdaycounter--;
                        //If the "Please Select" option is selected display error.
                        alert("Please select thurday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_friend() {
                    var fri_end = document.getElementById("fri_end0");
                    if (fri_end.value == "") {
                      friprevalue--;
                      fridaycounter--;
                        //If the "Please Select" option is selected display error.
                        alert("Please select friday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_satend() {
                    var sat_end = document.getElementById("sat_end0");
                    if (sat_end.value == "") {
                      satprevalue--;
                      saturdaycounter--;        
                        //If the "Please Select" option is selected display error.
                        alert("Please select saturday start and end time!");
                        return false;
                    }
                    return true;
                 }

                 function Validate_sunend() {
                    var sun_end = document.getElementById("sun_end0");
                    if (sun_end.value == "") {
                      sunprevalue--;
                      sundaycounter--;
                        //If the "Please Select" option is selected display error.
                        alert("Please select sunday start and end time!");
                        return false;
                    }
                    return true;
                 }

            </script>
</body>

</html>