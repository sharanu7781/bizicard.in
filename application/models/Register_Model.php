<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->Functions_Library = new Functions_Library();
        date_default_timezone_set("Asia/Kolkata");
    }
    public function save_user_data()
    {
        //Check email id and mobile number in table before data insert
        //$check_profile_details = $this->db->query("SELECT id FROM bz_user_profile WHERE is_active=true AND is_enabled=true AND (email_id='".$this->input->post("email_id")."' OR mobile_number like '%".$this->input->post("mobile_number")."%')");
        $check_profile_details = $this->db->query("SELECT id FROM bz_user_profile WHERE is_active=true AND is_enabled=true AND (email_id='".$this->input->post("email_id")."')");
        if($check_profile_details->num_rows() > 0){
            return "EXISTS";
        }
        $insertdata = array(
                            "email_id" => $this->input->post('email_id'),
                            "display_name" => $this->input->post('display_name'), 
                            "telephone_country_code" => $this->input->post('telephone_country_code'),
                            "mobile_number" => $this->input->post('mobile_number'),
                            "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
                            "is_active" => true,
                            "is_enabled" => true,
                            "date_join" => date("Y-m-d H:i:s"),
                            "is_registration_fully_done" => "N"
                        );
        $this->db->insert('bz_user_profile', $insertdata);
        if(!empty($this->db->insert_id())) {
            //Send email after registration done
            $subject = "Welcome to Bizicards";
            $message = "Hello ".$this->input->post('display_name').",<br/>";
            $message .= "Congratulation on successful registration with us.<br/>Please login to <a href='".base_url()."login"."'>bizicard.in</a> with following details-<br/>Registered Email ID - ".$this->input->post('email_id')."<br/>";
            //Password - ".$this->input->post('password');

            //$this->Functions_Library->sendmail_info($this->input->post('display_name'), $this->input->post('email_id'), $subject, $message);
            
            return true;
        } else
            return false;
    }

    public function check_signup_email_exists() {
        $where = "";
        if(!empty($this->input->post("useremail")) && empty($this->input->post("usermobile")))
            $where = " email_id='".$this->input->post("useremail")."' ";
        else if(!empty($this->input->post("usermobile")) && empty($this->input->post("useremail")))
            $where = " mobile_number LIKE '%".$this->input->post("usermobile")."%'";
        else if(!empty($this->input->post("useremail")) && !empty($this->input->post("usermobile")))
            $where = " email_id='".$this->input->post("useremail")."' OR mobile_number LIKE '%".$this->input->post("usermobile")."%'";

        $check_signup_email_exists = $this->db->query("SELECT id FROM bz_user_profile WHERE is_active=true AND is_enabled=true AND ($where)");
        
        if($check_signup_email_exists->num_rows() > 0){
            return "EXISTS";
        } else {
            return "TRUE";
        }
    }
    public function get_plan_feature_details() {
        $plan_query = $this->db->query("SELECT id, plan_name, plan_price, plan_validity FROM bz_plan_master WHERE is_active='Y' AND is_deleted='N'");
        if($plan_query->num_rows() > 0) {
            //Get features for every plan with active and deleted flag and push to plan data array with new key
            $final_data_array = array();

            $bgcolor_array = array("#196e37","#ff1085","#772275");
            $i = 0;
            foreach($plan_query->result() as $plan_row) {
                $feature_plan_mapping_query = $this->db->query("SELECT TBL_FTR.id,TBL_FTR.feature_name,TBL_FTR.know_more FROM `bz_plan_feature_mapping` AS TBL_MAPP JOIN bz_plan_features AS TBL_FTR ON TBL_MAPP.feature_id=TBL_FTR.id AND TBL_FTR.is_active='Y' AND TBL_MAPP.is_active='Y' AND TBL_MAPP.is_deleted='N' AND TBL_FTR.is_deleted='N' JOIN bz_plan_master as TBL_PLN ON TBL_MAPP.plan_id=TBL_PLN.id AND TBL_PLN.id=".$plan_row->id." LIMIT 5");
                if($feature_plan_mapping_query->num_rows() > 0) 
                $plan_row->plan_feature_mapping = $feature_plan_mapping_query->result();
                else
                $plan_row->plan_feature_mapping = [];
                $plan_row->bgcolor = $bgcolor_array[$i];

                $final_data_array[] = $plan_row;
                $i++;
            }

            return $final_data_array;
        } else 
        return false;
    }

}
