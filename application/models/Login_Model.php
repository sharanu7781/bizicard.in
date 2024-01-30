<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        
        $this->Functions_Library = new Functions_Library();
        $this->created_time = date("Y-m-d H:i:s");
    }

    public function save_user_details($google_data) {
        $password = $this->Functions_Library->generate_password();
        
        if(!empty($google_data["name"]) && $google_data["email"]) {

            //Check email id already exists or not
            $check_email_exists = $this->check_email_exists($google_data["email"]);
            
            if($check_email_exists == false) {
                return false;
                // $insertdata = array(
                //                 "email_id" => $google_data["email"],
                //                 "password" => $password,
                //                 "is_active" => 1,
                //                 "is_enabled" => 1,
                //                 "date_join" => $this->created_time
                // );

                // $this->db->insert("bz_user_profile", $insertdata);

                // if(!empty($this->db->insert_id())){
                   
                //     $this->session->set_userdata("is_payment_done", "N");
                //     $this->session->set_userdata("id", $this->db->insert_id());
                //     $this->session->set_userdata("display_name", $google_data['name']);
                //     $this->session->set_userdata("base_url", base_url());

                //     //Send email after registration done
                //     $subject = "Welcome to Bizicards";
                //     $message = "Hello ".$google_data["name"].",<br/>";
                //     $message .= "Congratulation on successful registration with us.<br/>Please login to <a target='_blank' href='".base_url()."login"."'>bizicard.in</a> with following details-<br/>Registered Email ID - ".$google_data["email"]."<br/>Password - ".$password;

                //     $this->Functions_Library->sendmail_info($google_data["name"], $google_data["email"], $subject, $message);
                    
                //     return true;
                // }
                // else    
                    
            } else{ 
                
                $query = $this->db->query("SELECT * FROM bz_user_profile WHERE email_id='".$google_data["email"]."' AND is_active=1 AND is_enabled=1");
                
                if($query->num_rows() > 0) {
                    
                    $row = $query->row();

                    //Get template details for if usere directly goes to profile settings
                    $template_data = $this->db->query("SELECT template_id FROM bz_digital_card_html_data WHERE user_id=".$row->id." AND is_active='Y' AND is_deleted='N' AND is_default_template='Y'");

                    $template_id = null;
                    if($template_data->num_rows()>0) {
                        $template_data = $template_data->row();
                        $template_id = $template_data->template_id;
                    } 
                    
                    $sessiondata = array(
                                        "id" => $row->id,
                                        "name" => $row->name,
                                        "display_name" => $row->display_name,
                                        "email_id" => $row->email_id,
                                        "digital_card_url" => base_url().$row->name,
                                        "avatar_path" => $row->avatar_path,
                                        "template_choosen" => $template_id,
                                        "username" => $row->name,
                                        "is_payment_done" => $row->is_payment_done,
                                        "base_url" => base_url(),
                                        "plan_selected" => $row->plan_selected
                                    );

                    $this->session->set_userdata($sessiondata);

                    return true;
                } else            
                    return false;   
            }
                             
        } else {
                return false;
        }
    }

    public function validate_login() {
        $query = $this->db->query("SELECT * FROM bz_user_profile WHERE email_id='".$this->input->post("username")."' AND is_active=1 AND is_enabled=1");
        
        if($query->num_rows() > 0) {
            $row = $query->row();
            $verify_password = password_verify($this->input->post("password"), $row->password);

            if($verify_password){
            
                //Get template details for if usere directly goes to profile settings
                // $template_data = $this->db->query("SELECT template_id FROM bz_digital_card_html_data WHERE user_id=".$row->id." AND is_active='Y' AND is_deleted='N' AND is_default_template='Y'");
                
                // $template_id = null;
                // if($template_data->num_rows()>0) {
                //     $template_data = $template_data->row();
                //     $template_id = $template_data->template_id;
                // } else {
                //     $template_id = $row->current_template_id;
                // }
                
                $template_id = $row->current_template_id;

                $sessiondata = array(
                                    "id" => $row->id,
                                    "name" => $row->name,
                                    "display_name" => $row->display_name,
                                    "email_id" => $row->email_id,
                                    "digital_card_url" => base_url().$row->name,
                                    "avatar_path" => $row->avatar_path,
                                    "template_choosen" => $template_id,
                                    "username" => $row->name,
                                    "mobile_no" => $row->mobile_number,
                                    "is_payment_done" => $row->is_payment_done,
                                    "base_url" => base_url(),
                                    "plan_selected" => $row->plan_selected
                                );
                $this->session->set_userdata($sessiondata);
                return true;    
            } else
                return false;
        }            
        else
            return false;
    }

    public function check_email_exists($email_id) {
        $result = $this->db->query("SELECT id FROM bz_user_profile WHERE email_id='".$email_id."'");
        
        if($result->num_rows() > 0)
            return true;
        else
            return false;
    }

    public function check_forget_password_email_exists() {
        $email_id = $this->input->post("email_id");
        $result = $this->db->query("SELECT id,email_id FROM bz_user_profile WHERE email_id='".$email_id."'");

        if($result->num_rows() > 0)
            return "true";
        else
            return "false";
    }

    public function submit_forget_password_request() {
        
        //Get user details from table to generate token against him/her
        $email_id = $this->input->post("email_id");
        $user_details = $this->db->query("SELECT id,email_id,display_name FROM bz_user_profile WHERE email_id='".$email_id."'");

        if($user_details->num_rows() > 0){
            
            $user_details = $user_details->row();

            //generate token
            $token = $this->Functions_Library->generate_token(50);
            
            //Update user details with token generated details
            $this->db->query("UPDATE bz_user_profile SET reset_password='Y',reset_token_generated='".$token."',reset_generated_time='".date("Y-m-d H:i:s")."',token_expires_time='".date("Y-m-d H:i:s", strtotime("+6 hour"))."' WHERE email_id='".$user_details->email_id."'");
            
            $encrypted_token_email_id = base64_encode($token)."_".base64_encode($user_details->email_id);//$this->Functions_Library->openssl_encrypt_string($token."_".$user_details->email_id);
            $subject = "Bizicard Reset Password";
            $message = "Hello ".$user_details->display_name."<br/>";
            $message .= "You requested to reset your password with Bizicard. Kindly click on link below to reset your password. Please note reset password link is valid for 6hrs only.<br/>";
            $message .= '<a href="'.base_url().'password/reset_password/'.$encrypted_token_email_id.'" target="_blank">Click Here</a>';
            $message .= "<br/><br/><br/>";
            $message .= "Thanks and Regards,<br/>Bizicard Admin";
            
            $this->Functions_Library->sendmail_donotreply($user_details->display_name, $user_details->email_id, $subject, $message);
            
            return true;            
        } else {
            return false;
        }
    }

    public function reset_password($encrypted_token_email) {
        //$encrypted_token_email = $this->Functions_Library->openssl_decrypt_string($encrypted_token_email);
        $explode = explode("_", $encrypted_token_email);
       
        if(isset($explode[0]) && isset($explode[1])) {
            //Check decrypted email id is exists or not
            $user_details = $this->db->query("SELECT id,email_id,display_name,token_expires_time,reset_token_generated FROM bz_user_profile WHERE email_id='".base64_decode($explode[1])."'");

            if($user_details->num_rows() > 0){    
                
                $user_details = $user_details->row();  
                
                if(base64_decode($explode[0]) != $user_details->reset_token_generated) 
                    return "INVALID_TOKEN";
                else if(strtotime($user_details->token_expires_time) < strtotime(date("Y-m-d H:i:s")))
                    return "TOKEN_EXPIRE";
                else
                    return $user_details;
            } else {
                return "EMAIL_NOT_FOUND";
            }
        } else {
            return false;
        }
    }

    public function save_reset_password() {
        $new_password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
        $user_id = $this->input->post("user_id");
        
        if(isset($new_password) && !empty($new_password) && isset($user_id) && !empty($user_id)) {
            
            //Update user details with new password
            $this->db->query("UPDATE bz_user_profile SET reset_password='N',reset_token_generated=null,password='".$new_password."',reset_password_time='".date("Y-m-d H:i:s")."' WHERE id=".base64_decode($user_id));
            
            return true;
        } else {
            return false;
        }

    }


//     public function save_password() {
//         $new_password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
//         $user_id = $this->input->post("user_id");
        
//         if(isset($new_password) && !empty($new_password) && isset($user_id) && !empty($user_id)) {
            
//             //Update user details with new password
//             $this->db->query("UPDATE bz_user_profile SET reset_password='N',reset_token_generated=null,password='".$new_password."',reset_password_time='".date("Y-m-d H:i:s")."' WHERE id=".base64_decode($user_id));
            
//             return true;
//         } else {
//             return false;
//         }
// // After executing the query
// log_message('debug', $this->db->last_query());

//     }
}
?>