<?php
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_Management_CI extends CI_Controller {	

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");      

        if($this->session->userdata("id") == '')
		{
			$this->session->set_flashdata("message", "<span style='color:red'>Please login to continue to portal</span>");
			redirect("login");
		}

        $this->created_by = $this->session->userdata("id");
        $this->created_time = date("Y-m-d H:i:s");
        $this->Functions_Library  = new Functions_Library();
        $this->plan_details = $this->Profile_Management_Model->get_plan_details($this->session->userdata("plan_selected"));
    }

	public function index($template_id)
	{      
        // print_r($this->session->userdata());die;
        /*if ($this->session->userdata("role")) {
            $this->load->view("view_partner_dashboard");
        }else {
                
            $data["userdata"] = $this->Profile_Management_Model->get_userdata($this->session->userdata("email_id"));   
            $data['digital_card_html_data'] = $this->Profile_Management_Model->get_digital_card_data($this->session->userdata("id")); 
            $data['template_id'] = $template_id;
            $data['template_data'] = $this->Profile_Management_Model->get_template_setup_data($template_id);        
            $data['country_data'] = $this->Profile_Management_Model->get_country_data();    
            $data['audio_settings_data'] = $this->Profile_Management_Model->get_audio_settings_data();
            // print_r($data);die;
            $this->load->view("view_profile", $data);
        } */
        $data["userdata"] = $this->Profile_Management_Model->get_userdata($this->session->userdata("email_id"));   
        $data['digital_card_html_data'] = $this->Profile_Management_Model->get_digital_card_data($this->session->userdata("id")); 
        $data['template_id'] = $template_id;
        $data['template_data'] = $this->Profile_Management_Model->get_template_setup_data($template_id);        
        $data['country_data'] = $this->Profile_Management_Model->get_country_data();  
        $data['business_category_data'] = $this->Profile_Management_Model->get_business_category_data();  
        $data['audio_settings_data'] = $this->Profile_Management_Model->get_audio_settings_data();
        // print_r($data);die;
        $this->load->view("view_profile", $data);
    }

    public function show_digital_card($flag_text){
        
        if(!empty($this->session->userdata("digital_card_url"))) {
            if($this->session->userdata("is_payment_done") == "N"){
                //Revert user's template selection to basic if payment popup is closed
                if(base64_decode($flag_text) =="payment_cancelled") {
                    $this->Profile_Management_Model->revert_user_template_to_basic();
                    $this->session->set_userdata("template_choosen", "3");
                }
            }
            $data['flag_text'] = $flag_text;
            $this->load->view("view_digital_card", $data);
        } else{
            redirect("profile/".base64_encode($this->session->userdata("template_choosen")));   
        }     
    }

    public function save_profile_bio_details() { 
        //echo "<pre>";  print_r($_FILES);die;
       
        $this->form_validation->set_rules('name', 'Username', 'required',array('required' => '<span style="color:red">Please enter username</span>')); 
        $this->form_validation->set_rules('company_name', 'Company Name', 'required',array('required' => '<span style="color:red">Please enter Company Name</span>'));
        $this->form_validation->set_rules('display_name', 'Your Name', 'required',array('required' => '<span style="color:red">Please enter your Name</span>'));
        $this->form_validation->set_rules('mobile_number', 'Telephone Number', 'required',array('required' => '<span style="color:red">Please enter your telephone number</span>'));
        $this->form_validation->set_rules('email_id', 'Email Id', 'required',array('required' => '<span style="color:red">Please enter your email ID</span>'));

        if ($this->form_validation->run() == FALSE) {
            $temp_data["userdata"] = $this->Profile_Management_Model->get_userdata($this->session->userdata("email_id"));        
            $this->load->view("view_profile", $temp_data);
        } else {

            //Upload profile pic as avatar image
            $avatar_filename = "";
            $avatar_filepath = "";
            $co_logo_filename = "";
            $co_logo_filepath = "";

                 
                                 // Upload Profile image from base64_encoded string
                                   if (!empty($this->input->post("cropped_image"))) {
                                $data = $this->input->post('cropped_image');
                            
                                $image_array_1 = explode(";", $data);
                                $image_array_2 = explode(",", $image_array_1[1]);
                                $data = base64_decode($image_array_2[1]);
                            
                                // Specify the directory path
                                $directory = DOCUMENT_ROOT . 'upload_images/';
                            
                                // Create the directory if it doesn't exist
                                if (!is_dir($directory)) {
                                    mkdir($directory, 0755, true); // Adjust the permissions as needed
                                }
                            
                                // Generate a unique image filename
                                $image_name = $directory . date("Ymd_His") . '.png';
                            
                                // Set the initial compression quality
                                $compression_quality = 90;
                            
                                do {
                                    // Load the image using GD
                                    $source_image = imagecreatefromstring($data);
                            
                                    if ($source_image === false) {
                                        die('Error creating source image');
                                    }
                            
                                    // Reduce the image size (e.g., resize it to 500x300 pixels)
                                    $width = imagesx($source_image);
                                    $height = imagesy($source_image);
                                    $resized_image = imagecreatetruecolor($width, $height);
                            
                                    if ($resized_image === false) {
                                        die('Error creating resized image');
                                    }
                            
                                    imagecopyresampled($resized_image, $source_image, 0, 0, 0, 0, $width, $height, imagesx($source_image), imagesy($source_image));
                            
                                    // Compress the image
                                    ob_start();
                                    imagejpeg($resized_image, null, $compression_quality);
                                    $compressed_image_data = ob_get_clean();
                            
                                    // Clean up resources
                                    imagedestroy($source_image);
                                    imagedestroy($resized_image);
                            
                                    // Adjust compression quality for the next iteration
                                    $compression_quality -= 5;
                            
                                    // Check the resulting file size
                                    $file_size = strlen($compressed_image_data);
                                } while ($file_size > 150 * 1024 && $compression_quality >= 50);
                            
                                // Save the resized and compressed image
                                file_put_contents($image_name, $compressed_image_data);
                            
                                // Use base_url() to generate the correct URL
                                $avatar_filepath = str_replace(DOCUMENT_ROOT, base_url(), $image_name);
                            } else {
                                $avatar_filepath = $this->input->post("avatar_filename_hidden_path");
                            }


            //Upload company logo

            if(isset($_FILES['company_avatar_file']) && $_FILES['company_avatar_file']['tmp_name']!='') {                
                $config['upload_path']          = "./upload_images/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
                $config['max_size']             = 1000000;
                // $config['max_width']            = 15000;
                // $config['max_height']           = 15000;
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);

                $_FILES['company_avatar_file']['name'] = date("YmdHis")."_".str_replace(" ","_",$_FILES['company_avatar_file']['name']);
                if ( ! $this->upload->do_upload('company_avatar_file'))
                {
                    $temp_data['error'] = array('error' => $this->upload->display_errors());
                    $temp_data["userdata"] = $this->Profile_Management_Model->get_userdata($this->session->userdata("email_id"));       
                    $this->load->view("view_profile", $temp_data);
                }
                else
                {    
                    $co_logo_filename = $_FILES['company_avatar_file']['name'];
                    $co_logo_filepath = base_url().str_replace("./", "", $config['upload_path']).$co_logo_filename;
                }
            }
           
            //Upload slider images from here
            $slider_array = (isset($_FILES["slider_images"])) ? $_FILES['slider_images']:""; 
            $slider_images_path = array();

            if(isset($slider_array) && !empty($slider_array)) {                

                $config['upload_path']          = "./slider_images/";
                $config['allowed_types']        = 'gif|jpg|png|jpeg|svg';
                $config['max_size']             = 1000000;
                // $config['max_width']            = 15000;
                // $config['max_height']           = 15000;
                $config['overwrite']            = TRUE;

                $this->load->library('upload', $config);

                $cnt = 0;
                for($i=0; $i<count($slider_array['name']); $i++) {
                    if(isset($slider_array['name'][$i]) && !empty($slider_array['name'][$i])) {
                        $_FILES['slider_images']['name'] = date("YmdHis")."_".base64_encode($this->session->userdata("name")).".jpg";
                        //str_replace(" ","_",$slider_array['name'][$i]);
                        $_FILES['slider_images']['tmp_name'] = str_replace(" ","_",$slider_array['tmp_name'][$i]);
                        $_FILES['slider_images']['type'] = str_replace(" ","_",$slider_array['type'][$i]);
                        $_FILES['slider_images']['error'] = str_replace(" ","_",$slider_array['error'][$i]);
                        $_FILES['slider_images']['size'] = str_replace(" ","_",$slider_array['size'][$i]);
                        if ( ! $this->upload->do_upload('slider_images'))
                        {
                            $temp_data['error'] = array('error' => $this->upload->display_errors());                        
                        }
                        else
                        {           
                            $slider_images_filename = $_FILES['slider_images']['name'];
                            $slider_images_path[$i] = base_url().str_replace("./", "", $config['upload_path']).$slider_images_filename;
                        }
                    }

                    
                    $cnt++;
                }
            }

            //Upload Menus files from here, if selected
            $menus_file_path_array = array();
            for($i=1; $i<=5; $i++) {                
                $menus_files_array = (isset($_FILES["menus_content_images_".$i])) ? $_FILES["menus_content_images_".$i]:""; 
                
                if(isset($menus_files_array) && !empty($menus_files_array)) {                

                    $config['upload_path']          = "./menus_images/";
                    $config['allowed_types']        = '*';
                    $config['max_size']             = 1000000;
                    // $config['max_width']            = 15000;
                    // $config['max_height']           = 15000;
                    $config['overwrite']            = TRUE;

                    $this->load->library('upload', $config);
                    
                    if(isset($menus_files_array['name']) && !empty($menus_files_array['name'])) {
                        $_FILES['menus_content_images']['name'] = date("YmdHis")."_".str_replace(" ", "", $this->session->userdata("name"))."_".($i+1).".jpg";                        
                        //str_replace(" ","_",$menus_files_array['name']);
                        $_FILES['menus_content_images']['tmp_name'] = str_replace(" ","_",$menus_files_array['tmp_name']);
                        $_FILES['menus_content_images']['type'] = str_replace(" ","_",$menus_files_array['type']);
                        $_FILES['menus_content_images']['error'] = str_replace(" ","_",$menus_files_array['error']);
                        $_FILES['menus_content_images']['size'] = str_replace(" ","_",$menus_files_array['size']);
                        if ( ! $this->upload->do_upload('menus_content_images'))
                        {
                            $temp_data['error'] = array('error' => $this->upload->display_errors()); 
                        }
                        else
                        {    
                            $menus_file_path_name = $_FILES['menus_content_images']['name'];
                            $menus_file_path_array[$i] = base_url().str_replace("./", "", $config['upload_path']).$menus_file_path_name;
                        }
                    }                      
                }
            }
            
            //Upload video file from here
            $video_file_path = "";
            if(isset($_FILES["video_file"]) && !empty($_FILES["video_file"])) {                

                $configVideo['upload_path']          = "./video_files/";
                $configVideo['allowed_types']        = '*';
                $configVideo['max_size']             = 100000000;
                $configVideo['max_width']            = 150000;
                $configVideo['max_height']           = 150000;
                $configVideo['overwrite']            = TRUE;

                $this->load->library('upload', $configVideo);
                $this->upload->initialize($configVideo);
                
                $_FILES['video_file']['name'] = date("YmdHis").str_replace(" ","_",$_FILES["video_file"]['name']);
                $_FILES['video_file']['tmp_name'] = str_replace(" ","_",$_FILES["video_file"]['tmp_name']);
                $_FILES['video_file']['type'] = str_replace(" ","_",$_FILES["video_file"]['type']);
                $_FILES['video_file']['error'] = str_replace(" ","_",$_FILES["video_file"]['error']);
                $_FILES['video_file']['size'] = str_replace(" ","_",$_FILES["video_file"]['size']);
                if ( ! $this->upload->do_upload('video_file'))
                {
                    $temp_data['error'] = array('error' => $this->upload->display_errors());     
                }
                else
                {    
                    $video_name = $_FILES['video_file']['name'];
                    $video_file_path = base_url().str_replace("./", "", $configVideo['upload_path']).$video_name;
                }
            }
           
            //Removed resizing as client suggested to add checks on file size. 24 sep2021
            //$co_logo_filepath = (empty($_FILES['company_avatar_file']['tmp_name'])) ? $this->input->post("company_filename_hidden_path") : base_url().$this->Functions_Library->process_image_upload_using_base64_image($_FILES['company_avatar_file']['tmp_name'], $this->input->post("base64_image"), "0", "100", "upload_images",$this->session->userdata("username"));
            $co_logo_filepath = (empty($_FILES['company_avatar_file']['tmp_name'])) ? $this->input->post("company_filename_hidden_path") : $co_logo_filepath;

            //$this->Functions_Library->resize_image($this->input->post("base64_image"), "100");
            //$this->input->post("company_filename_hidden_path");
            //die;
            
            $result = $this->Profile_Management_Model->save_profile_bio_details($avatar_filepath, $co_logo_filepath, $slider_images_path, $video_file_path, $menus_file_path_array);
            
            if(is_string($result) && $result == "EXIST") 
				$this->session->set_flashdata("message", "EXIST");
			else if($result == true)           
                $this->session->set_flashdata("message", "success");
            else
                $this->session->set_flashdata("message", "error");
            
            redirect("show_digital_card/".base64_encode("card_done"));
            
        }
    }

    public function check_username() {
        $username = $this->input->post("username");

        if(!empty($username)) {
            $result = $this->Profile_Management_Model->check_username($username);

            if($result == true)
                echo "true";
            else
                echo "false";
        }
        else
            echo "empty";
    }   
    
    public function template_Management() {
        $result['template_setup_data'] = $this->Profile_Management_Model->get_template_setup_data("");
        $this->load->view("view_template_Management", $result);
    }

    public function template_setup_data($id = "")
    {
        $result['template_setup_data'] = $this->Profile_Management_Model->get_template_setup_data($id);
        $this->load->view('view_template_Management', $result);
    }

    public function get_template_preview() {
        $background_color = $this->input->post("background_color");
        $font_color = $this->input->post("font_color");
        $data['background_color'] = $background_color;
        $data['font_color'] = $font_color;

        $this->load->view("ajax_get_template_preview", $data);
    }

    public function crop_upload_image() {        
        //upload.php
        if(isset($_POST['image']))
        {
            $data = $_POST['image'];
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = 'upload_images/' . time()."_".$_POST['imagename']; //time() . '.png';
            file_put_contents($image_name, $data);
            echo base_url().$image_name;
        }
    }    

    public function change_password() {
        $data['template_id'] = $this->session->userdata("template_choosen");
        $this->load->view("view_change_password", $data);
    }

    public function save_profile_password_details() {
        $result = $this->Profile_Management_Model->save_profile_password_details();
            
        if(is_string($result) && $result == "EXIST") 
            $this->session->set_flashdata("message", "EXIST");
        else if($result == true)           
            $this->session->set_flashdata("message", "success");
        else
            $this->session->set_flashdata("message", "error");
        
            
        redirect("profile_setup/change_password");
    }

    public function add_offers() {
        // if($this->session->userdata("template_choosen") == "null"){
        //     $this->session->set_flashdata("message", "Select Template");
        //     redirect("templates_selection");
        // }
        //Check for if user had made a payement for offer section
        /*$check_offer_payment_details = $this->Profile_Management_Model->get_offer_payment_details();
        if($check_offer_payment_details == false) {
            redirect("payment/make_offers_payment");
        }*/
        $data['template_data'] = $this->Profile_Management_Model->get_template_setup_data(base64_encode($this->session->userdata("template_choosen")));
        $data['offers_slider_data'] = $this->Profile_Management_Model->get_offers_data();
        $data['template_id'] = $this->session->userdata("template_choosen");
        $data['digital_card_html_data'] = $this->Profile_Management_Model->get_digital_card_data($this->session->userdata("id")); 
        /*if(empty($data['digital_card_html_data'])){
            $this->session->set_flashdata("message", "To continue Offer section first complete your profile");
            redirect("profile/".base64_encode($this->session->userdata("template_choosen")));
        }*/
        $data['slider_details_data'] = $this->Profile_Management_Model->get_slider_information();
        
        $this->load->view("view_add_offers", $data);
    }

    public function save_offer_slider_details() {
        //echo "<pre>"; print_r($_POST); print_r($_FILES);die;
        $result = $this->Profile_Management_Model->save_offer_slider_details();
        
        if(is_string($result) && $result == "EXIST") 
            $this->session->set_flashdata("message", "EXIST");
        else if($result == true)           
            $this->session->set_flashdata("message", "success");
        else
            $this->session->set_flashdata("message", "error");
        
            
        redirect("profile_management/add_offers");
    }

    public function choosed_templated($template_id) {
        echo $result = $this->Profile_Management_Model->save_profile_bio_details_after_template_selected($template_id);        
    }

    public function view_add_slot() {
        $service_payment_details = $this->Profile_Management_Model->get_users_service_payment_details($this->session->userdata("id"));
        $id = $this->session->userdata("id");
        if(isset($service_payment_details) && !empty($service_payment_details) && $service_payment_details == false) {
            redirect("profile_management/service_booking_payment");
        }
        $data['service_data'] = $this->Profile_Management_Model->get_service_details($this->session->userdata("id"));
        $data['edit_row_id'] = base64_encode($this->session->userdata("id"));
        $data['slot_data'] = $this->Profile_Management_Model->get_slot_data();
        $data['vacation_data'] = $this->Profile_Management_Model->get_vacation_data();
        $data['view_data'] = $this->Profile_Management_Model->get_view_data($id);
        $data['view_service_data'] = $this->Profile_Management_Model->get_view_service_data($id);
        
        $this->load->view("view_add_slot", $data);
    }

    public function save_slot_data() {
        
        $result = $this->Profile_Management_Model->save_slot_data();
        
        if ($result != false) {
            $this->session->set_flashdata("message", "success");
        } else {
            $this->session->set_flashdata("message", "error");
        }

        redirect(base_url()."profile_management/view_add_slot");
    }

    public function delete_slot_data() {
        
		$id = $this->input->post('ID');
        // print_r($id);die;
        $dataDelete = $this->Profile_Management_Model->deleteData($id); 
        // print_r($dataDelete) ;
		// $dataDelete = $this->Profile_Management_Model->deleteData('bz_slot_details',array('id'=>$id));
        // print_r($dataDelete);die;
		if($dataDelete)
		{
			// $response['status'] = "1";
			$response['message'] = "slot not deleted";
		}
		else
		{
			$response['status'] = true;
			$response['message'] = "Slot successfully deleted  !";
		}
        echo json_encode($response);
    }

    public function delete_service() {
        
		$id = $this->input->post('ID');
        // print_r($id);die;
        // $dataDelete = $this->Profile_Management_Model->deleteData($id); 
        $dataDelete = $this->db->where("SERVICE", $id);  
        $dataDelete = $this->db->delete("bz_service_details");
        // print_r($this->db->last_query());
		if($dataDelete == 0)
		{
			// $response['status'] = "1";
			$response['message'] = "slot not deleted";
		}
		else
		{
			$response['status'] = true;
			$response['message'] = "Slot successfully deleted  !";
		}
        echo json_encode($response);
    }

    public function view_appointment($user_id) 
    {
       // $data['user_data'] = $this->Masters_Model->get_user_data($mentor_id);
        $data['user_id'] = $user_id;
        $data['total_consultation'] = $this->Profile_Management_Model->get_total_consultation($user_id);
        // $this->session->set_userdata("invitees_list", array($this->session->userdata("ID")));
        $this->load->view("view_appointment",$data);
    }

    public function view_payment_history() {
        $data['edit_row_id'] = base64_encode($this->session->userdata("id"));
        $data['payment_details'] = $this->Profile_Management_Model->get_payment_details();
        $this->load->view("view_payment_history",$data);
    }

    public function unlink_slider_image_from_root() {
        $slider_image_path = $this->input->post("slider_image_path");
        $slider_row_id = $this->input->post("slider_row_id");
        if(!empty($slider_image_path) && !empty($slider_row_id)) {
            $root_path = explode("slider_images", $slider_image_path);
            //print_r($root_path);
            unlink(DOCUMENT_ROOT."/slider_images". $root_path[1]);
            $this->Profile_Management_Model->delete_slider_row($slider_row_id);
        }
    }   

    public function unlink_video_file_from_root() {
        $video_file_path = $this->input->post("video_file_path");
        if(!empty($video_file_path)) {
            $root_path = explode("video_files", $video_file_path);
            //print_r($root_path);
            unlink(DOCUMENT_ROOT."/video_files". $root_path[1]);
        }
    }   

    public function encrypt_password(){
        //echo password_hash("Viralmonks@17", PASSWORD_DEFAULT);//JP
        //echo password_hash("Bizicard192027", PASSWORD_DEFAULT);//Shashank
        //echo password_hash("Mitech@123", PASSWORD_DEFAULT);//Amruta
        echo password_hash("Avnish@123", PASSWORD_DEFAULT);

        //echo $this->Functions_Library->openssl_encrypt_string("amruta.mitech@gmail.com");
        echo "<br><br>".$this->Functions_Library->openssl_decrypt_string("$2y$10$jKF53r3X1jgLEFQeNOAQbe1F6rcraH91HHeSLQLeBn8b9yL.ykRcW");
    }

    public function view_booked_appointments() {        
        $data['booked_appointment_data'] = $this->Profile_Management_Model->get_booked_appointment_data();
        $data['edit_row_id'] = "true";
        $this->load->view("view_booked_appointments", $data);
    }
        
    public function save_cropped_profile_image() {
        if(isset($_FILES['croppedImage']) && $_FILES['croppedImage']['tmp_name']!='') {                
            $config['upload_path']          = "./upload_images/";
            $config['allowed_types']        = '*';
            $config['max_size']             = 1000000;
            // $config['max_width']            = 15000;
            // $config['max_height']           = 15000;
            $config['overwrite']            = TRUE;

            $this->load->library('upload', $config);
            $explode_image_type = explode("/", $_FILES['croppedImage']['type']);
            $_FILES['croppedImage']['name'] = date("YmdHis")."_".str_replace(" ","_",$_FILES['croppedImage']['name']).".".$explode_image_type[1];
            if ( ! $this->upload->do_upload('croppedImage'))
            {
                echo "error"; 
            }
            else
            {    
                $profile_filename = $_FILES['croppedImage']['name'];
                $profile_filename = str_replace("./", "", $config['upload_path']).$profile_filename;
                echo $profile_filename;
            }
        }
    }

    public function view_shared_card_details() {
        $data['shared_card_details'] = $this->Profile_Management_Model->get_shared_card_details();
        $data['card_views_details'] = $this->Profile_Management_Model->get_card_views_details();
        $data["edit_row_id"] = true;
        $this->load->view("view_shared_card_details", $data);
    }
      public function view_admin_change_password() {
        $this->load->view("view_admin_change_password");
    }
    public function admin_change_plan() {
        $this->load->view("admin_change_plan");
    }
       public function admin_change_email_id() {
        $this->load->view("admin_change_email_id");
    }
      public function admin_suspend_card() {
        $this->load->view("admin_suspend_card");
    }
    public function coupon_code() {
        $this->load->view("coupon_code");
    }

}
