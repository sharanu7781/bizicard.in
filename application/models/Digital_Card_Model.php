<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Digital_Card_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->Functions_Library = new Functions_Library();
    }

    public function get_digital_card_data($username) {
        $query = $this->db->query("SELECT TBL_DGTL.index_html_data,TBL_DGTL.template_id,TBL_USER.id FROM bz_user_profile AS TBL_USER JOIN bz_digital_card_html_data AS TBL_DGTL ON TBL_USER.id=TBL_DGTL.user_id AND TBL_USER.current_template_id=TBL_DGTL.template_id AND TBL_DGTL.is_active='Y' AND TBL_DGTL.is_deleted='N' AND TBL_USER.name='".$username."' AND TBL_DGTL.is_default_template='Y'");

        
       // echo $this->db->last_query();
        if($query->num_rows() > 0) {

            $data = $query->row();

            //Insert a count for card view
            $view_count_query = $this->db->query("SELECT id FROM bz_card_view_details WHERE user_id='".$data->id."'");
            if($view_count_query->num_rows() > 0) 
                $this->db->query("UPDATE bz_card_view_details SET view_count=(view_count+1),updated_time='".date("Y-m-d H:i:s")."' WHERE user_id='".$data->id."'");
            else
                $this->db->query("INSERT INTO bz_card_view_details(user_id,view_count,created_time) VALUES(".$data->id.", 1, '".date("Y-m-d H:i:s")."')");

            
            return $data->index_html_data;
        } else {
            
            //Check if any folder exists on document root
            if(file_exists(DOCUMENT_ROOT."/physical_path_templates/".$username))
            {
                //$this->load->view(base_url()."physical_path_templates/".$username."/index.html");
                //require_once(base_url()."physical_path_templates/".$username."/index.html");
                ob_start();
                include(DOCUMENT_ROOT."/physical_path_templates/".$username."/index.php");        
                $html_data = ob_get_contents();// $dynamic_index_html; 
                ob_end_clean();
                echo $html_data;
                exit;
            }
            else
                return false;
        }
    }

    // public function get_slider_image_path($username) {
    //     $get_slider_image_one_query = $this->db->query("SELECT TBL_DGTL.slider_image_one,TBL_DGTL.slider_image_two,TBL_DGTL.slider_image_three,TBL_USER.id FROM bz_digital_card_html_data as TBL_DGTL JOIN bz_user_profile as TBL_USER ON TBL_DGTL.user_id=TBL_USER.id WHERE TBL_DGTL.is_default_template='Y' AND TBL_USER.name='".$username."' AND TBL_DGTL.is_active='Y' AND TBL_DGTL.is_deleted='N' ANd TBL_USER.is_active=1 ANd TBL_USER.is_enabled=1");
    //     if($get_slider_image_one_query->num_rows() > 0) {
    //         $row = $get_slider_image_one_query->row();            
    //         $user_id  = $row->id;
    //         //Set offer display on digital card valid till 1year after payment done date
    //         $query_to_check_offer_payment_details = $this->db->query("SELECT txn_date FROM bz_payment_details WHERE user_id=".$user_id." AND payment_for='".PAYMENT_FOR_OFFER."' ORDER BY id DESC LIMIT 1");

    //         if($query_to_check_offer_payment_details->num_rows() > 0) {
    //             $offer_payment_date = $query_to_check_offer_payment_details->row();
    //             $date1=date_create($offer_payment_date->txn_date);
    //             $date2=date_create(date("Y-m-d"));
    //             $diff=date_diff($date1,$date2);
    //             $days = $diff->format("%y");
    //             if($days >= 1)
    //                 return false;
    //             else
    //                 return $get_slider_image_one_query->row();
    //         } else {
    //             return false;
    //         }
    //     } else
    //         return false;
    // }

    public function get_slider_image_path($username) {
        $get_slider_image_one_query = $this->db->query("SELECT TBL_USER.id, TBL_SLIDER.slider_url, TBL_SLIDER.slider_image_path FROM bz_slider_details as TBL_SLIDER JOIN bz_user_profile as TBL_USER ON TBL_SLIDER.user_id=TBL_USER.id WHERE TBL_USER.name='".$username."' AND TBL_SLIDER.is_active='Y' AND TBL_SLIDER.is_deleted='N' ANd TBL_USER.is_active=1 ");
        
        if($get_slider_image_one_query->num_rows() > 0) {
            $row = $get_slider_image_one_query->result();            
            $user_id  = $row[0]->id;
            //Set offer display on digital card valid till 1year after payment done date
            // $query_to_check_offer_payment_details = $this->db->query("SELECT txn_date FROM bz_payment_details WHERE user_id=".$user_id." AND payment_for='".PAYMENT_FOR_OFFER."' ORDER BY id DESC LIMIT 1");

            // if($query_to_check_offer_payment_details->num_rows() > 0) {
            //     $offer_payment_date = $query_to_check_offer_payment_details->row();
            //     $date1=date_create($offer_payment_date->txn_date);
            //     $date2=date_create(date("Y-m-d"));
            //     $diff=date_diff($date1,$date2);
            //     $days = $diff->format("%y");
            //     if($days >= 1)
            //         return false;
            //     else
                    return $get_slider_image_one_query->result();
            // } else {
            //     return false;
            // }
        } else
            return false;
    }

    public function get_empty_digital_card() {
        $template_data = $this->db->query("SELECT TBL_TEMPLT.temp_index_file_path FROM bz_template_master as TBL_TEMPLT left JOIN bz_user_profile as TBL_USR ON TBL_TEMPLT.id=TBL_USR.current_template_id WHERE TBL_TEMPLT.is_active='Y' AND TBL_TEMPLT.is_deleted='N' AND TBL_TEMPLT.id=".$this->session->userdata("template_choosen"))->row();
        
        return $template_data->temp_index_file_path;
    }

    public function get_service_booking_data($user_id) {
         //Check if service booking data is available for user
        $service_data = $this->db->query("SELECT SERVICE, USER_ID, SERVICE, PRICE, TIMING FROM bz_service_details WHERE USER_ID=".$this->Functions_Library->openssl_decrypt_string($user_id)." AND IS_ACTIVE='Y' AND IS_DELETED='N' GROUP BY SERVICE");
        
        if($service_data->num_rows() >0 ) {
            return $service_data->result();
        } else{
            return false;
        }
    }

    public function get_total_consultation($ID) {
        $query = $this->db->query("SELECT DURATION as total_consultation_done FROM bz_appointment_details WHERE USER_ID =".($ID)."  AND APPOINTMENT_STATUS='".APPOINTMENT_STATUS_BOOKED."' AND PAYMENT_STATUS='".PAYMENT_SUCCESS."' ");
        
        if($query->num_rows() > 0) {
            $total_consultation_done = 0;
            foreach($query->result() as $row)
                $total_consultation_done += $row->total_consultation_done;

            return $total_consultation_done;
        } else {
            return false;
        }
    }

    public function get_userdata($user_email, $user_id) {
        if(!empty($user_email) && !empty($user_id)) {
            $this->db->select("id, name, display_name, avatar_filename, avatar_path, co_logo_filename, co_logo_path, password");
            $this->db->from("bz_user_profile");
            $this->db->where("is_active", 1);
            $this->db->where("is_enabled", 1);
            $this->db->where("email_id", $this->Functions_Library->openssl_decrypt_string($user_email));
            $this->db->where("id", $this->Functions_Library->openssl_decrypt_string($user_id));
            $query = $this->db->get();
            
            if($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        } else
            return false;        
    }

    public function get_timings_for_service($service_id, $user_id) {
        if(!empty($service_id) && !empty($user_id)) {
            $this->db->select("ID, PRICE, TIMING");
            $this->db->from("bz_service_details");
            $this->db->where("IS_ACTIVE", "Y");
            $this->db->where("IS_DELETED", "N");
            $this->db->where("USER_ID", $this->Functions_Library->openssl_decrypt_string($user_id));
            $this->db->where("SERVICE", $service_id);
            $query = $this->db->get();
            
            if($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        } else
            return false; 
    }

    public function get_slots_for_date($date, $user_id, $time_duration) {
        $user_id = $this->Functions_Library->openssl_decrypt_string($user_id);
        $day_name = date("l", strtotime($date));
        $slot_query = $this->db->query("SELECT START_TIME,END_TIME FROM bz_slot_details where IS_ACTIVE='Y' AND IS_VACATION=0 AND IS_DELETED='N' AND USER_ID=".$user_id." AND DAY_NAME='".$day_name."' ORDER BY START_TIME ASC");
        
        if($slot_query->num_rows() > 0) {
           
            $slot_result = $slot_query->result();
            $start_time = null;
            $end_time = null;
            $counter = 0;

            //Get start time of first row and end time as last row's start time, if multiple rows found against a mentor
            $slot_array = array();
            foreach($slot_result as $row) {
                //if($counter == 0)
                    $start_time = date("H:i", strtotime($row->START_TIME));
                //if($counter == (count($slot_result) - 1))
                    $end_time = date("H:i", strtotime($row->END_TIME));

                $counter++;
           
            
                $begin = new DateTime($start_time);
                $end   = new DateTime($end_time);
                $interval = DateInterval::createFromDateString($time_duration.' min');
                $times    = new DatePeriod($begin, $interval, $end);
                
                
                foreach ($times as $time) {
                    //Check for the day, if any appointment is booked or not
                    $check_appointment_details = $this->db->query("SELECT ID FROM bz_appointment_details WHERE IS_DELETED='N' AND IS_ACTIVE='Y' AND (APPOINTMENT_STATUS='".APPOINTMENT_STATUS_BOOKED."' OR APPOINTMENT_STATUS='".APPOINTMENT_STATUS_HOLD."') AND USER_ID=".$user_id." AND APPOINTMENT_DATE='".date("Y-m-d", strtotime($date))."' AND APPOINTMENT_START_TIME='".$time->format('H:i:s')."'");

                    $check_vacation_details = $this->db->query("SELECT USER_ID as ID FROM bz_slot_details where IS_ACTIVE='Y' AND IS_DELETED='N' AND IS_VACATION=1 AND '".date("Y-m-d", strtotime($date))."' BETWEEN VACATION_START_DATE AND VACATION_END_DATE");
                    
                    if($check_appointment_details->num_rows() > 0)
                        $slot_array[] = "Booked";

                    else if($check_vacation_details->num_rows() > 0)
                        $slot_array[] = "Vacation";

                    else
                        $slot_array[] = $slot_time = $time->format('H:i').'-'.$time->add($interval)->format('H:i');
                }
            }
           
            return $slot_array;
        } else {
            return false;
        }

    }

    public function generate_receipt_id() {
        $get_receipt_details = $this->db->query("SELECT id, custom_order_id FROM bz_payment_custom_order_details WHERE status='Y' ORDER BY id DESC LIMIT 1");
  
        $custom_order_id = "BIZ_".date("Ymd")."_"."00001";
        if ($get_receipt_details->num_rows() > 0) {
            $get_receipt_details = $get_receipt_details->row();
            $explode = explode("_", $get_receipt_details->custom_order_id);
            
            $custom_order_id = "BIZ_".date("Ymd")."_".str_pad(($explode[2] + 1), 5, "0", STR_PAD_LEFT);
            $check_custom_order_id_exists = $this->db->query("SELECT custom_order_id FROM bz_payment_custom_order_details WHERE custom_order_id='".$custom_order_id."'");
            if($check_custom_order_id_exists->num_rows() == 0)
            $this->db->query("INSERT INTO bz_payment_custom_order_details (custom_order_id,status,created_time) VALUES('".$custom_order_id."','N','".date("y-m-d H:i:s")."')");
            return $custom_order_id;
        } else {
            $this->db->query("INSERT INTO bz_payment_custom_order_details (custom_order_id,status,created_time) VALUES('".$custom_order_id."','N','".date("y-m-d H:i:s")."')");
            return $custom_order_id;
        }
    }

    public function save_service_appointment_booking_details() {
        $postdata_array = $this->Functions_Library->addslashes_to_array_element($this->input->post());
        if(!empty($postdata_array['SITE_USER_NAME']) && !empty($postdata_array['SITE_MOBILE_NUMBER']) && !empty($postdata_array['SITE_EMAIL_ID'])) {
           
            if(strpos($postdata_array["SERVICE_SLOT"],"-")!= false)
                $appointment_time = explode("-", $postdata_array["SERVICE_SLOT"]);
            else
                $appointment_time = [];
           
            $insertdata = array(
                                "BIZICARD_USER_ID" => $this->Functions_Library->openssl_decrypt_string($postdata_array["USER_ID"]),
                                "SITE_USER_NAME" => $postdata_array["SITE_USER_NAME"],
                                "SITE_USER_MOB_NO" => $postdata_array["SITE_MOBILE_NUMBER"],	
                                "SITE_USER_EMAIL_ID" => $postdata_array["SITE_EMAIL_ID"],
                                "SELECTED_SERVICE_ID" => $postdata_array["SELECTED_SERVICE_ID"],
                                "APPOINTMENT_DAY" => date("l", strtotime($postdata_array["SERVICE_DATE"])),	
                                "APPOINTMENT_DATE" => date("Y-m-d", strtotime($postdata_array["SERVICE_DATE"])),	
                                "APPOINTMENT_START_TIME" => (isset($appointment_time[0]) && !empty($appointment_time[0])) ? $appointment_time[0] : "",
                                "APPOINTMENT_END_TIME" => (isset($appointment_time[1]) && !empty($appointment_time[1])) ? $appointment_time[1] : "",	
                                "DURATION" => $postdata_array["SERVICE_TIMING"],	
                                "PAYMENT_STATUS" => PAYMENT_PENDING,	
                                "APPOINTMENT_STATUS" => APPOINTMENT_STATUS_HOLD,	
                                "IS_ACTIVE" => "Y",
                                "IS_DELETED" => "N",
                                "CREATED_AT" => $this->created_time,
                                "CREATED_BY" => $postdata_array["SITE_USER_NAME"],
                                "ENTRY_SOURCE" => BOOK_APPMNT
                            );
            $this->db->insert("bz_appointment_details", $insertdata);

            if(!empty($this->db->insert_id()))
                return $this->db->insert_id();
            else
                return false;
        } else {
            return false;
        }
    }

    public function post_razorpay_payment_data() {
        $returndata_array = $this->Razorpay_API_Library->post_razorpay_payment_data();
        
        //Get card holder's information
        $card_holder_information =  $this->db->query("SELECT id, display_name,email_id FROM bz_user_profile WHERE id=".$this->Functions_Library->openssl_decrypt_string($this->input->post("USER_ID")));
        
        if($card_holder_information->num_rows() > 0) {
            $card_holder_information = $card_holder_information->row();

            //Send email from here to bizicard user
            $mail_to_name = $card_holder_information->display_name;
            $mail_to = $card_holder_information->email_id;
            $subject = "Service Booking Details";
            $message = "Hello ".$card_holder_information->display_name."<br>";
            $message .= "Please click on following zoom meeting link at the time of appointment. Link will be activated at that time only.<br>";
            $message .= '<a href="'.$returndata_array['start_url'].'">Open Zoom Meeting</a><br/><br/>';
            $message .= "Following inquiry have been done as service booking against your card. <br>";
            $message .= "Name - ".$this->input->post("payment_from_name")."<br>";
            $message .= "Email Id - ".$this->input->post("payment_from_emailid")."<br>";
            $message .= "Mobile Number - ".$this->input->post("payment_from_mobilenumber")."<br>";
            $message .= "Service Name - ".$this->input->post("SELECTED_SERVICE_TEXT")."<br>";
            $message .= "Duration - ".$this->input->post("SERVICE_TIMING")." min<br>";
            $message .= "Date - ".$this->input->post("SERVICE_DATE")."<br>";
            $message .= "Time - ".$this->input->post("SERVICE_SLOT")."<br>";
            $message .= "Amount paid - <span class='rupee_symbol'>&#x20B9;</span>".$_POST['payment_price'];
            
            $this->Functions_Library->sendmail_info($mail_to_name, $mail_to, $subject, $message);

            //Send email from here to site user who contacted to bizcard user
            $mail_to_name = $this->input->post("payment_from_name");
            $mail_to = $this->input->post("payment_from_emailid");
            $subject = "Service Booking Details";
            $message = "Hello ".$this->input->post("payment_from_name")."<br>";
            $message .= "Thanks to reach to us. <br>";            
            $message .= "Please click on following zoom meeting link at the time of appointment. Link will be activated at that time only.<br>";
            $message .= '<a href="'.$returndata_array['join_url'].'">Open Zoom Meeting</a><br/><br/>';
            $message .= "Please find the following details of your service booking - <br>";
            $message .= "Service Name - ".$this->input->post("SELECTED_SERVICE_TEXT")."<br>";
            $message .= "Duration - ".$this->input->post("SERVICE_TIMING")." min<br>";
            $message .= "Date - ".$this->input->post("SERVICE_DATE")."<br>";
            $message .= "Time - ".$this->input->post("SERVICE_SLOT")."<br>";
            $message .= "Amount you paid - <span class='rupee_symbol'>&#x20B9;</span>".$_POST['payment_price'];
            
            $this->Functions_Library->sendmail_info($mail_to_name, $mail_to, $subject, $message);

        } else
            $card_holder_information = null;

        
        return true;
    }

    public function get_service_booking_details($username) {
        $get_slider_image_one_query = $this->db->query("SELECT TBL_USER.id,TBL_USER.name,TBL_USER.email_id FROM bz_user_profile as TBL_USER WHERE TBL_USER.name='".$username."' AND TBL_USER.is_active=1 ");
        
        $return_data_array = array();
        if($get_slider_image_one_query->num_rows() > 0) {

            $row = $get_slider_image_one_query->row();       
            $service_booking_details = $this->get_service_details($row->id);
            $return_data_array  = array("id" => $row->id, "name" => $row->name, "email_id"=> $row->email_id, "service_booking_details"=>$service_booking_details);

            return $return_data_array;
            
        } else {
            return false;
        }
    }

    public function get_service_details($user_id) {
      //$query_to_check_offer_payment_details = $this->get_users_service_payment_details($user_id);
      //$this->db->query("SELECT txn_date FROM bz_payment_details WHERE user_id=".$user_id." AND payment_for='".PAYMENT_FOR_SERVICE."' ORDER BY id DESC LIMIT 1");

      //if($query_to_check_offer_payment_details != false) {
        $service_data = $this->db->query("SELECT USER_ID, SERVICE, PRICE, TIMING FROM bz_service_details WHERE IS_ACTIVE='Y' AND IS_DELETED='N' AND USER_ID=".$user_id);

        if($service_data->num_rows() >0 ) {
            return $service_data->result();
        } else {
            return false;
        }                   
        // } else {
        //     return false;
        // }
    }
    public function get_users_service_payment_details($user_id) {
      $query_to_check_offer_payment_details = $this->db->query("SELECT txn_date FROM bz_payment_details WHERE user_id=".$user_id."  ORDER BY id DESC LIMIT 1"); // AND payment_for='".PAYMENT_FOR_SERVICE."'
      
      if($query_to_check_offer_payment_details->num_rows() > 0) {
            $offer_payment_date = $query_to_check_offer_payment_details->row();
            $date1=date_create($offer_payment_date->txn_date);
            $date2=date_create(date("Y-m-d"));
            $diff=date_diff($date1,$date2);
            $days = $diff->format("%y");
            if($days >= PAYMENT_VALID_TILL_YEAR)
                return false;
            else {
            return true;
            }              
        } else {
            return false;
        }
    }
    
    public function delete_page($page_id) {
        $update_query = $this->db->query("UPDATE bz_template_accordian_data SET is_deleted='Y', updated_time='".date("Y-m-d H:i:s")."', updated_by=".$this->session->userdata("id")." WHERE id=".$page_id);

        return true; 
    }
    
    public function get_accordian_information($username) {
        $ger_user_data = $this->db->query("SELECT id FROM bz_user_profile WHERE name='".$username."' AND is_active=1");
        
        if($ger_user_data->num_rows() > 0) {
            $user_data = $ger_user_data->row();
            $get_accordian_information = $this->db->query("SELECT * FROM bz_template_accordian_data WHERE user_id=".$user_data->id);
            if($get_accordian_information->num_rows() > 0) {
                $is_active_page = "";
                foreach($get_accordian_information->result() as $row) {
                    $is_active_page .= $row->id."#".$row->is_deleted."###";
                }
                $is_active_page = rtrim($is_active_page, "###");
                return $is_active_page;
            }
        } else
            return false;
    }
    
}
?>