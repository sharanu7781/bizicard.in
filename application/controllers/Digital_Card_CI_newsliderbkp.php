<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Digital_Card_CI extends CI_Controller {	

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->created_time = date("Y-m-d H:i:s");
        
        $this->Razorpay_API_Library = new Razorpay_API_Library(); 
        $this->Functions_Library  = new Functions_Library();
        
    }

	public function index($username = "")
	{
        if(!empty($username)) {
            if($username == "empty_digital_card"){
              $empty_digital_card = $this->Digital_Card_Model->get_empty_digital_card($username);
              ob_start();
              include($empty_digital_card);        
              $html_data = ob_get_contents();// $dynamic_index_html; 
              ob_end_clean();
              echo $html_data;
              exit;       
            }
            $result = $this->Digital_Card_Model->get_digital_card_data($username);
            if($result != false) {
                
                echo $result;
            } else{
                $this->session->set_flashdata("message", "<span style='color:red'>No data available for this username. Kindly contact website Administrator</span>");

                redirect("login");
            }
                
        }
    }

    public function get_slider_information() {
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
      $username = $this->input->post("username");
      $slider_image_data = $this->Digital_Card_Model->get_slider_image_path($username);
      $dynamic_index_html = "";
      
      if($slider_image_data != false){
        $dynamic_index_html .= '<div class="slick-carousel">';
                                
            $active = "";
            if(empty($slider_image_one_name))
              $active = "active";
            else if(empty($slider_image_two_name))
              $active = "active";
            else if(empty($slider_image_three_name))
              $active = "active";
              
            $i = 0;
            foreach($slider_image_data as $row) {
              if(!empty($row->slider_image_path)){
                if($i == 0)
                  $active = "active";
                else
                  $active = "";
                
                if(!empty($row->slider_url))
                  $dynamic_index_html .= '<div class=" '.$active.'" style="flex-shrink: 0;width:200px;">
                                          <a href="'.$row->slider_url.'" target="_blank"><img class="" src="'.$row->slider_image_path.'" style="width:100%;/*height:200px;*/margin:auto"  alt="..."></a>
                                      </div>';
                else
                  $dynamic_index_html .= '<div class=" '.$active.'">
                                          <a href="javascript:void(0);"><img class="" style="max-width:100%;height:200px;margin:auto" src="'.$row->slider_image_path.'"  alt="..."></a>
                                      </div>';
                $i++;
              }
                
            } 

            //   $dynamic_index_html .= '               
            //     </div>
            // </div>';
        echo $dynamic_index_html;
      }
    }

    public function book_service_appointment($card_name, $user_email, $user_id) {
      //echo BASEPATH;die;
      $data['service_booking_data'] = $this->Digital_Card_Model->get_service_booking_data($user_id);
      $data['user_data'] = $this->Digital_Card_Model->get_userdata($user_email, $user_id); 
      
      if(!empty($data['user_data']) && $data['user_data']!=false) {        
        //if(isset( $data['service_booking_data']) && !empty( $data['service_booking_data']) &&  $data['service_booking_data']!=false) //{            
          $data['USER_ID'] = $user_id;
          $data['USER_EMAIL'] = $user_email;
          $data['CARD_USER_NAME'] = $card_name;
          $this->load->view("view_book_appointment", $data);
        //}
      } else {
        $data['error_message'] = "User details can not be found!!!";
        $this->load->view("view_service_booking_error", $data);
      }
    }

    public function get_timings_for_service() {
      $service_id = $this->input->post("service_id");
      $user_id = $this->input->post("user_id");

      if(isset($service_id) && !empty($service_id) && isset($user_id) && !empty($user_id)) {
        $get_timings_for_service = $this->Digital_Card_Model->get_timings_for_service($service_id, $user_id);
        if(isset($get_timings_for_service) && !empty($get_timings_for_service) && $get_timings_for_service!=false) {
          $html = "";
          foreach($get_timings_for_service as $timing_row) {
            $html .= '
                  <div class="form-check">
                    <input required class="form-check-input SERVICE_TIMING" type="radio" name="SERVICE_TIMING" id="'.$timing_row->TIMING.'" value="'.$timing_row->TIMING.'"  onclick="return SHOW_PRICE('.$timing_row->PRICE.','.$timing_row->ID.');"/><label class="form-check-label" for="'.$timing_row->TIMING.'">
                    '.$timing_row->TIMING.' minutes</label>
                  </div>';
          }
          $html .= "<div class='select_timing_span'></div><input type='hidden' name='SERVICE_PRICE' vaue='' id='SERVICE_PRICE' /><input type='hidden' name='SELECTED_SERVICE_ID' vaue='' id='SELECTED_SERVICE_ID' />";
          echo $html;
        }
      } else {
        echo "No service Name selected";
      }  
    }

    public function get_slots_for_date() {
      $date = $this->input->post("date");
      $user_id = $this->input->post("user_id");
      $time_duration = $this->input->post("time_duration");
      $option_string = "";
      if(isset($date) && !empty($date)) {
        $slots_data = $this->Digital_Card_Model->get_slots_for_date($date, $user_id, $time_duration);
        
        if(isset($slots_data) && !empty($slots_data) && $slots_data!=false) {
          $option_string = "<option value=''>Select Slot</option>";
          foreach($slots_data as $slot_row) {
            $explode = explode("-", $slot_row); 
            
            if((strtotime(date("Y-m-d H:i:s"))<strtotime(date("Y-m-d H:i:s", strtotime($date." ".$explode[0])))) && (strtotime(date("Y-m-d H:i:s", strtotime("+20 minutes"))) < strtotime(date("Y-m-d H:i:s", strtotime($date." ".$explode[0])))))
                $option_string .= '<option >'.$slot_row.'</option>';
            else if($slot_row == "Booked")
                $option_string .= '<option disabled>Booked</option>';
            else if($slot_row == "Vacation")
                $option_string .= '<option disabled>Vacation</option>';    
            else
                $option_string .= '<option disabled>'.$slot_row.'</option>';
          }
          echo $option_string;
        } else {
          echo "No slots available for ".date("d M Y", strtotime($date))."";
        }
      } else {
        echo "Please select date for slots display";
      }
    }

    public function initiate_payment_request() {
      //echo "<pre>"; print_r($_POST);die;
      $this->form_validation->set_rules('SITE_USER_NAME', 'Name', 'required',array("required"=>"<span style='color:red'>Please enter your name<span>"));      
      $this->form_validation->set_rules('SITE_MOBILE_NUMBER', 'Mobile Number', 'required',array("required"=>"<span style='color:red'>Please enter your mobile number<span>"));
      $this->form_validation->set_rules('SITE_EMAIL_ID', 'Email', 'required',array("required"=>"<span style='color:red'>Please enter your name<span>"));
      if ($this->form_validation->run() == FALSE) {
        $data['service_booking_data'] = $this->Digital_Card_Model->get_service_booking_data($this->input->post("USER_ID"));
        $data['user_data'] = $this->Digital_Card_Model->get_userdata($this->input->post("USER_EMAIL"), $this->input->post("USER_ID")); 
        
        if(!empty($data['user_data']) && $data['user_data']!=false) {        
          if(isset( $data['service_booking_data']) && !empty( $data['service_booking_data']) &&  $data['service_booking_data']!=false) {            
            $data['USER_ID'] = $this->input->post("USER_ID");
            $data['USER_EMAIL'] = $this->input->post("USER_EMAIL");
            $this->load->view("view_book_appointment", $data);
          }
        } else {
          $data['error_message'] = "User details can not be found!!!";
          $this->load->view("view_service_booking_error", $data);
        }
      } else {
        
        $data['USER_ID'] = $this->input->post("USER_ID");
        $data['USER_EMAIL'] = $this->input->post("USER_EMAIL");
        $data['CARD_USER_NAME'] = $this->input->post("CARD_USER_NAME");
        $data['bizicard_receipt_no'] = $this->Digital_Card_Model->generate_receipt_id();
        $data['user_data'] = $this->Digital_Card_Model->get_userdata($this->input->post("USER_EMAIL"), $this->input->post("USER_ID")); 
        $data['insert_id'] = $this->Digital_Card_Model->save_service_appointment_booking_details();
        $data['SELECTED_SERVICE_TEXT'] = $this->input->post("SELECTED_SERVICE_TEXT");
        $data["SERVICE_TIMING"] = $this->input->post("SERVICE_TIMING");
        $data["SERVICE_DATE"] = $this->input->post("SERVICE_DATE");
        $data["SERVICE_SLOT"] = $this->input->post("SERVICE_SLOT");

        
        if(!empty($data["insert_id"])) {
          $this->load->view("view_service_booking_payment_confirm", $data);
        } else {
          $this->session->set_flashdata("message", "Error Occured while processing, please try again!");
          redirect(base_url()."service_booking/book_service_appointment/".$data['CARD_USER_NAME']."/".$data['USER_EMAIL']."/".$data['USER_ID']);
        }
      }
    }

    public function post_razorpay_payment_data() {
      $this->Digital_Card_Model->post_razorpay_payment_data();      
      $this->session->set_flashdata("message", "success");
      
      redirect($this->input->post("go_back_url"));
    }

    public function get_service_booking_details() {
      $username = $this->input->post("username");
      $service_booking_details = $this->Digital_Card_Model->get_service_booking_details($username);
      $dynamic_index_html = "";

      //Display service booking button here
      if(isset($service_booking_details['service_booking_details']) && !empty($service_booking_details['service_booking_details']) && $service_booking_details['service_booking_details'] != false) {
        $this->session->set_flashdata("message", ""); 
        $dynamic_index_html .= '<br/><div class="col">
                                  <div class="row col-centered-flex align-items-center justify-content-center"
                                    <div class="col-lg-12 col-md-12">
                                    <a class="btn btn-primary btn-lg btn-block waves-effect waves-light" target="_blank" href="'.base_url()."service_booking/book_service_appointment/".$this->Functions_Library->openssl_encrypt_string($service_booking_details['name'])."/".$this->Functions_Library->openssl_encrypt_string($service_booking_details['email_id'])."/".$this->Functions_Library->openssl_encrypt_string($service_booking_details['id']).'">Book Appointment</a><br/>
                                    </div>
                                  </div>
                                </div><br/>';
      } else {
        $dynamic_index_html = "ERROR";
      }

      echo $dynamic_index_html;
      
    }

    public function get_loggedin_userdata() {
        if(isset($_SESSION) && !empty($_SESSION['name'])) {
          $card_name = $_SERVER['HTTP_REFERER'];
          $country_data = $this->Profile_Management_Model->get_country_data();  
          $html = '<div class=" text-center">
                <button type="button" class="btn btn-info waves-effect waves-light btn_share" data-toggle="modal" data-target="#myModal">Share My Card</button>
            </div>

            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Share my card</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-lg-12">   
                                      <label class="">Mobile No.<span class="required">*</span></label><br/>
                                      <div class="form-group row">
                                          <div class="col col-lg-5 col-md-5">
                                              <select class="form-control country_code" required name="telephone_country_code">';
                                              if(isset($country_data) && $country_data) { 
                                                  foreach($country_data as $country_row) {
                                                      if($country_row->is_default=="Y")
                                                        $selected = "selected='selected'";
                                                      else
                                                        $selected = "";
                                                      $html .= '<option '.$selected.' value="'.$country_row->contry_isd_code.'">('.$country_row->contry_isd_code.')'.$country_row->contry_name.'</option>';
                                                  } 
                                              } 
                                              $html .= '</select>';
                                              
                                          $html .= '</div>
                                          <div class="col col-lg-7 col-md-7"> 
                                              <input required type="text" autocomplete="off" maxlength="10" minlength="10" class="form-control mobile_number" value="" name="mobile_number" onkeyup="return validate_mobile_number(this.value);" id="usermobile" placeholder="Enter 10 digit Mobile No." >
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">   
                                      <label class="">Message (You can customise below message) <span class="required">*</span></label><br/>
                                      <div class="form-group row">
                                          <div class="col col-lg-12 col-md-12"> 
                                              <textarea required class="form-control message_content" cols="50" rows="4" name="message_content">Nice to know you. Please find my card at '.$card_name.'. You can call me or message on my WhatsApp number. Thank you.</textarea>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col-lg-12">
                                      <div class="form-group mb-0">
                                          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary waves-effect waves-light share_button_submit" onclick="return submit_data();">Send Message</button>
                                      </div>  
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>';
            echo $html;
        } else
            echo "false";
    }    

    public  function linkify($text) {
        return preg_replace('#\b(http|ftp)(s)?\://([^ \s\t\r\n]+?)([\s\t\r\n])+#smui', '<a href="$1$2://$3">$1$2://$3</a>$4', $text);
    }

    public function submit_share_button_data() {
      $result = $this->Profile_Management_Model->submit_share_button_data();
      echo $result;        
    }
}
