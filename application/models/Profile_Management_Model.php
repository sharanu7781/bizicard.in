<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_Management_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->Functions_Library = new Functions_Library();
    }

  function recurse_copy($src,$dst) {
      $dir = opendir($src);
      @mkdir($dst);
      while(false !== ( $file = readdir($dir)) ) {
          if (( $file != '.' ) && ( $file != '..' )) {
              if ( is_dir($src . '/' . $file) ) {
                  $this->recurse_copy($src . '/' . $file,$dst . '/' . $file);
              }
              else {
                  copy($src . '/' . $file,$dst . '/' . $file);
              }
          }
      }
      closedir($dir);
  }

  public function get_digital_card_data($id) {
    $query = $this->db->query("SELECT id, user_id, template_id, background_color, font_color, font_color_for_bio,profile_background_color,profile_font_color,contact_link_background_color, contact_link_font_color, appointment_background_color, appointment_font_color, tribe_background_color, tribe_font_color, podcast_background_color, podcast_font_color, book_background_color, book_font_color, media_background_color, media_font_color, blog_background_color, blog_font_color, menus_opened_as,slider_image_one,slider_image_two,slider_image_three,video_file_path,index_html_data,is_default_template, 
      header_background_color, header_font_color, content_background_color, content_font_color, contact_background_color,
      contact_font_color, modal_menu_background_color, modal_menu_font_color FROM bz_digital_card_html_data WHERE user_id='".$id."' AND is_active='Y' AND is_deleted='N' AND template_id=".$this->session->userdata("template_choosen"));

    $final_data_array = array();
    if($query->num_rows() > 0) {
      $result = $query->result();
      $template_id = "";
      foreach($result as $row){}
        $template_id = $row->template_id;
        
      $final_data_array['digital_card_data'] = $row;
      // echo "<pre>"; print_r($query);die;

      //Get menus setup data from template_id
      $menus_setup_query = $this->db->query("SELECT id, template_id, accordian_label, accordian_contents, accordian_menu_image_path FROM bz_template_accordian_data where is_active='Y' ANd is_deleted='N' AND template_id=".$template_id." AND user_id=".$this->session->userdata("id"));
     
      if($menus_setup_query->num_rows() > 0) {            
          $final_data_array['menus_data'] = $menus_setup_query->result();
      }
      return $final_data_array;
    } else {
        return false;
    }
  }

  public function save_profile_bio_details($avatar_filepath, $co_logo_filepath, $slider_images_path, $video_file_path, $menus_file_path_array) {
      //echo "<pre>"; print_r($_POST);die;

      $postdata_array = $this->input->post();//$this->Functions_Library->addslashes_to_array_element($this->input->post());

      if(!empty($postdata_array['name']))
          $this->session->set_userdata("username", $postdata_array['name']);

      $email_id = $this->session->userdata("email_id");
      $get_userdata = $this->get_userdata($email_id);
      

      $vcf_file_contents = fopen(DOCUMENT_ROOT."/vcf_files/".$postdata_array["name"].".vcf", "w");// or die("Unable to open file!"); 
      
      $explode = explode(" ", $postdata_array['display_name']);
      $vCard = "BEGIN:VCARD\r\n";
      $vCard .= "VERSION:2.1\r\n";
    //   if(isset($explode[1]))
    //     $vCard .= "N:".$explode[1];
    //   if(isset($explode[2]))
    //     $vCard .= ";".$explode[2].";;;\r\n";
      $vCard .= "FN:".$postdata_array['display_name']."\r\n";
      $phone_number = null;
      if(isset($postdata_array['telephone_country_code']) && !empty($postdata_array['telephone_country_code'])){
        $phone_number = "+".$postdata_array['telephone_country_code'].$postdata_array['mobile_number'];
      } else {
          $phone_number = $postdata_array['mobile_number'];
      }
      $vCard .= "TEL;CELL:".$phone_number."\r\n";
      $vCard .= "EMAIL;HOME:".$postdata_array['email_id']."\r\n";
      if(!empty($postdata_array['website_url']))
        $vCard .= "URL:".$postdata_array['website_url']."\r\n";
      else
        $vCard .= "URL:".base_url().stripslashes($postdata_array["name"])."\r\n";
      
      $vCard .= "END:VCARD";
      //echo $vCard;
      

      fwrite($vcf_file_contents, $vCard);
      fclose($vcf_file_contents);
     
      
      //Fetch company and profile images from database if files are not selected for profile and company logo
      $profile_image_data = $this->db->query("SELECT avatar_filename,avatar_path,co_logo_filename,co_logo_path FROM bz_user_profile WHERE email_id='".$this->session->userdata("email_id")."' AND is_active=1 AND is_enabled=1");

      // $company_logo_file = "";
      // $profile_logo_file = "";

      if($profile_image_data->num_rows() > 0) {
        $profile_image_data = $profile_image_data->row();
      
        if(isset($co_logo_filepath) && !empty($co_logo_filepath)) {
          $co_logo_filepath = $co_logo_filepath;
        } else {
          $co_logo_filepath = $profile_image_data->co_logo_path;
        } 

        if(isset($avatar_filepath) && !empty($avatar_filepath)){
          $avatar_filepath = $avatar_filepath;
        } else {
          $avatar_filepath = $profile_image_data->avatar_path;
        } 
      }

      $prof_display_name = $this->session->userdata("display_name");
      $digital_card_url = $this->session->userdata("digital_card_url");
      $prof_user_id = $this->session->userdata("id");
      $qr_page_link = $this->Qr_generation($prof_display_name, $digital_card_url, $prof_user_id);
      
      $updatedata = array(
                          "name" => (isset($postdata_array["name"]) && !empty($postdata_array["name"])) ? $postdata_array["name"] : "", 
                          "telephone_country_code" => (isset($postdata_array["telephone_country_code"]) && !empty($postdata_array["telephone_country_code"])) ? $postdata_array['telephone_country_code']:"",
                          "whatsapp_country_code" => (isset($postdata_array["whatsapp_country_code"]) && !empty($postdata_array["whatsapp_country_code"])) ? $postdata_array['whatsapp_country_code']:"",
                          "whatsapp_number" => (isset($postdata_array["whatsapp_number"]) && !empty($postdata_array["whatsapp_number"])) ? $postdata_array["whatsapp_number"] : "", 
                          "mobile_number" => (isset($postdata_array["mobile_number"]) && !empty($postdata_array["mobile_number"])) ? $postdata_array["mobile_number"] : "",  
                          "company_name" => (isset($postdata_array["company_name"]) && !empty($postdata_array["company_name"])) ? $postdata_array["company_name"] : "", 
                          "designation" => (isset($postdata_array["designation"]) && !empty($postdata_array["designation"])) ? $postdata_array["designation"] : "",  
                          "gmap_pin_url" => (isset($postdata_array["gmap_pin_url"]) && !empty($postdata_array["gmap_pin_url"])) ? $postdata_array["gmap_pin_url"] : "",  
                          "display_name" => (isset($postdata_array["display_name"]) && !empty($postdata_array["display_name"])) ? $postdata_array["display_name"] : "",  
                          "bio" => (isset($postdata_array["bio"]) && !empty($postdata_array["bio"])) ? (str_replace("'","''", $postdata_array["bio"])) : "",  
                          "website_url" => (isset($postdata_array["website_url"]) && !empty($postdata_array["website_url"])) ? $postdata_array["website_url"] : "",  
                          "facebook_page_link" => (isset($postdata_array["facebook_page_link"]) && !empty($postdata_array['facebook_page_link'])) ? $postdata_array['facebook_page_link']:"",
                          "instagram_page_link" => (isset($postdata_array["instagram_page_link"]) && !empty($postdata_array['instagram_page_link'])) ? $postdata_array['instagram_page_link']:"",
                          "linkedin_page_link" => (isset($postdata_array["linkedin_page_link"]) && !empty($postdata_array['linkedin_page_link'])) ? $postdata_array['linkedin_page_link']:"",
                          "youtube_link" => (isset($postdata_array["youtube_page_link"]) && !empty($postdata_array['youtube_page_link'])) ? $postdata_array['youtube_page_link']:"",
                          "vcf_file_name" => $postdata_array["name"].".vcf",
                          "avatar_path" => (isset($avatar_filepath) && !empty($avatar_filepath)) ? $avatar_filepath : "",
                          "co_logo_path" => (isset($co_logo_filepath) && !empty($co_logo_filepath)) ? $co_logo_filepath : "",
                          "video_file_path" => (isset($postdata_array["hidden_deleted_video_file"]) && $postdata_array["hidden_deleted_video_file"] == "video_deleted") ? "" : $video_file_path,
                          "qr_page_link"=>$qr_page_link,
                          "twitter_page_link"=>(isset($postdata_array['twitter_page_link']) && !empty($postdata_array['twitter_page_link'])) ? $postdata_array['twitter_page_link'] : "",
                          "google_business_page_link" => (isset($postdata_array['google_business_page_link']) && !empty($postdata_array['google_business_page_link'])) ? $postdata_array['google_business_page_link'] : "",
                          "facebook_business_page_link" => (isset($postdata_array['facebook_business_page_link']) && !empty($postdata_array['facebook_business_page_link'])) ? $postdata_array['facebook_business_page_link'] : "",
                          "business_category_id" => $postdata_array['business_category_id'],

                          // "request_url" => (!empty($postdata_array["request_url"])) ? $postdata_array["request_url"] : "", 
                      );
      $this->db->where("email_id", $this->session->userdata("email_id"));
      $this->db->update("bz_user_profile", $updatedata);                                   
      
      $this->session->set_userdata("digital_card_url", base_url().$postdata_array["name"]);   
      $this->session->set_userdata("display_name", $postdata_array["display_name"]);
      $this->session->set_userdata("avatar_path", $avatar_filepath);
      $this->session->set_userdata("username", $postdata_array["name"]);
      $this->session->set_userdata("mobile_no", $postdata_array['mobile_number']);
      $this->session->set_userdata("name", $postdata_array["name"]);
      
      //Get 
      if(empty($video_file_path)) {
        $video_file_data = $this->db->query("SELECT video_file_path FROM bz_digital_card_html_data WHERE is_active='Y' AND is_deleted='N' AND template_id=".base64_decode($postdata_array['template_id'])." AND user_id=".$this->session->userdata("id"));
        if($video_file_data->num_rows() > 0) {
          foreach($video_file_data->result() as $row) {} 
          $video_file_path = (!empty($row->video_file_path)) ? $row->video_file_path : "";
        }
      }

      //Get Service details for booking, check validity period too
      $postdata_array['service_booking_details'] = $this->get_service_details($this->session->userdata("id"));        
      
      //Further check that video file is available
      if(isset($postdata_array["hidden_deleted_video_file"]) && $postdata_array["hidden_deleted_video_file"] == "video_deleted")
        $video_file_name = "";
      else if(!empty($video_file_path))
        $video_file_name = $video_file_path;
      else
        $video_file_name = "";

      //Set variables here to be used in HTML, if iinitiated then use else replace with null
      if(isset($postdata_array['display_name']) && !empty($postdata_array['display_name']))
        $display_name = stripslashes($postdata_array['display_name']);
      else
        $display_name="";

      if(isset($postdata_array['bio']) && !empty($postdata_array['bio']))
        $bio = stripslashes(strip_tags($postdata_array['bio']));
      else
        $bio="";

      if(isset($postdata_array['header_background_color']) && !empty($postdata_array['header_background_color']))
        $header_background_color = stripslashes($postdata_array['header_background_color']);
        $header_background_color = "";

      if(isset($postdata_array['header_font_color']) && !empty($postdata_array['header_font_color']))
        $header_font_color = stripslashes($postdata_array['header_font_color']);
      else
        $header_font_color = "";

      if(isset($postdata_array['content_background_color']) && !empty($postdata_array['content_background_color']))
        $content_background_color = stripslashes($postdata_array['content_background_color']);
      else
        $content_background_color = "";

      if(isset($postdata_array['content_font_color']) && !empty($postdata_array['content_font_color']))
        $content_font_color = stripslashes($postdata_array['content_font_color']);
      else
        $content_font_color = "";

      if(isset($postdata_array['contact_background_color']) && !empty($postdata_array['contact_background_color']))
        $contact_background_color = stripslashes($postdata_array['contact_background_color']);
      else
        $contact_background_color = "null";

      if(isset($postdata_array['contact_font_color']) && !empty($postdata_array['contact_font_color']))
        $contact_font_color = stripslashes($postdata_array['contact_font_color']);
      else
        $contact_font_color = "null";

      if(isset($postdata_array['modal_menu_background_color']) && !empty($postdata_array['modal_menu_background_color']))
        $modal_menu_background_color = stripslashes($postdata_array['modal_menu_background_color']);
      else
        $modal_menu_background_color = "null";  

      if(isset($postdata_array['modal_menu_font_color']) && !empty($postdata_array['modal_menu_font_color']))
        $modal_menu_font_color = stripslashes($postdata_array['modal_menu_font_color']);
      else
        $modal_menu_font_color = "null";  

      if(isset($postdata_array['profile_background_color']) && !empty($postdata_array['profile_background_color']))
        $profile_background_color = stripslashes($postdata_array['profile_background_color']);
      else
        $profile_background_color = "null";
      
      if(isset($postdata_array['profile_font_color']) && !empty($postdata_array['profile_font_color']))
        $profile_font_color = stripslashes($postdata_array['profile_font_color']);
      else
        $profile_font_color = "null";  
      
      if(isset($postdata_array['contact_link_background_color']) && !empty($postdata_array['contact_link_background_color']))
        $contact_link_background_color = stripslashes($postdata_array['contact_link_background_color']);
      else
        $contact_link_background_color = "null";    

      if(isset($postdata_array['contact_link_font_color']) && !empty($postdata_array['contact_link_font_color']))
        $contact_link_font_color = stripslashes($postdata_array['contact_link_font_color']);
      else
        $contact_link_font_color = "null";    

      if(isset($postdata_array['appointment_background_color']) && !empty($postdata_array['appointment_background_color']))
        $appointment_background_color = stripslashes($postdata_array['appointment_background_color']);
      else
        $appointment_background_color = "null";    

      if(isset($postdata_array['appointment_font_color']) && !empty($postdata_array['appointment_font_color']))
        $appointment_font_color = stripslashes($postdata_array['appointment_font_color']);
      else
        $appointment_font_color = "null";    

      if(isset($postdata_array['tribe_background_color']) && !empty($postdata_array['tribe_background_color']))
        $tribe_background_color = stripslashes($postdata_array['tribe_background_color']);
      else
        $tribe_background_color = "null";    

      if(isset($postdata_array['tribe_font_color']) && !empty($postdata_array['tribe_font_color']))
        $tribe_font_color = stripslashes($postdata_array['tribe_font_color']);
      else
        $tribe_font_color = "null";    

      if(isset($postdata_array['podcast_background_color']) && !empty($postdata_array['podcast_background_color']))
        $podcast_background_color = stripslashes($postdata_array['podcast_background_color']);
      else
        $podcast_background_color = "null";    

      if(isset($postdata_array['podcast_font_color']) && !empty($postdata_array['podcast_font_color']))
        $podcast_font_color = stripslashes($postdata_array['podcast_font_color']);
      else
        $podcast_font_color = "null";    

      if(isset($postdata_array['book_background_color']) && !empty($postdata_array['book_background_color']))
        $book_background_color = stripslashes($postdata_array['book_background_color']);
      else
        $book_background_color = "null";    

      if(isset($postdata_array['book_font_color']) && !empty($postdata_array['book_font_color']))
        $book_font_color = stripslashes($postdata_array['book_font_color']);
      else
        $book_font_color = "null";    

      if(isset($postdata_array['media_background_color']) && !empty($postdata_array['media_background_color']))
        $media_background_color = stripslashes($postdata_array['media_background_color']);
      else
        $media_background_color = "null";    

      if(isset($postdata_array['media_font_color']) && !empty($postdata_array['media_font_color']))
        $media_font_color = stripslashes($postdata_array['media_font_color']);
      else
        $media_font_color = "null";    

      if(isset($postdata_array['blog_background_color']) && !empty($postdata_array['blog_background_color']))
        $blog_background_color = stripslashes($postdata_array['blog_background_color']);
      else
        $blog_background_color = "null";    

      if(isset($postdata_array['blog_font_color']) && !empty($postdata_array['blog_font_color']))
        $blog_font_color = stripslashes($postdata_array['blog_font_color']);
      else
        $blog_font_color = "null";

      if(isset($postdata_array['company_name']) && !empty($postdata_array['company_name']))
        $company_name = stripslashes($postdata_array['company_name']);
      else
        $company_name = "";

      if(isset($postdata_array['designation']) && !empty($postdata_array['designation']))
        $designation = stripslashes($postdata_array['designation']);
      else
        $designation = "";

      if(isset($postdata_array['bio']) && !empty($postdata_array['bio']))
        $bio = stripslashes($postdata_array['bio']);
      else
        $bio = "";

      if(isset($postdata_array['bio']) && !empty($postdata_array['bio']))
        $bio = stripslashes($postdata_array['bio']);
      else
        $bio = "";

      if(isset($postdata_array['whatsapp_country_code']) && !empty($postdata_array['whatsapp_country_code']) && isset($postdata_array['whatsapp_number']) && !empty($postdata_array['whatsapp_number']))
        $whatsapp_number = stripslashes("+".$postdata_array['whatsapp_country_code']."".$postdata_array['whatsapp_number']);
      else
        $whatsapp_number = "";

      if(isset($postdata_array['telephone_country_code']) && !empty($postdata_array['telephone_country_code']) && isset($postdata_array['mobile_number']) && !empty($postdata_array['mobile_number']))
        $mobile_number = stripslashes("+".$postdata_array['telephone_country_code']."".$postdata_array['mobile_number']);
      else
        $mobile_number = "";

      //Insert Audio settings details
      $audio_setting_counter = $this->input->post("audio_setting_counter");
      if(isset($audio_setting_counter) && !empty($audio_setting_counter)) {
        foreach($audio_setting_counter as $audio_row) {
          if(!empty($this->input->post("podcast_type_".$audio_row)) && !empty($this->input->post("podcast_link_".$audio_row))) {
            $is_active = (isset($_POST["audio_is_active_".$audio_row]) && $_POST["audio_is_active_".$audio_row]=="on") ? "Y":"N";
            $insertdata = array(
                                "audio_name" => $this->input->post("podcast_type_".$audio_row),	
                                "audio_link" => $this->input->post("podcast_link_".$audio_row),	
                                "is_active" => $is_active,	
                                "is_deleted" => "N",	
                                "created_by" => $this->created_by,
                                "created_time" => $this->created_time,
                                "entry_source" => "web"
                              );

            $this->db->insert("bz_user_audio_setting_details", $insertdata);
          }
        }
      }
      
      //Insert accordian contents
      $input_counter = (isset($postdata_array['input_counter'])) ? $postdata_array['input_counter'] : "";
      if(!empty($input_counter) && count($input_counter) > 0) {
        //Soft delete accordian data for the same template
        //$this->db->query("UPDATE bz_template_accordian_data SET is_active='N', is_deleted='Y', updated_by='".$this->created_by."',updated_time='".$this->created_time."' WHERE user_id=".$this->session->userdata("id"));
        //$this->db->query("DELETE FROM bz_template_accordian_data WHERE user_id=".$this->session->userdata("id"));
        
        $accordian_id_array = [];
        
        $i = 1;
        foreach($input_counter as $row) {
          $accordian_label = $postdata_array['accordian_label_'.$row];
          $accordian_content = $postdata_array['accordian_content_'.$row];
          $menus_file_path_array = $menus_file_path_array;

          if(!empty($accordian_label) && !empty($accordian_content)) {

            //Delete menu image from here, if deleted by user
            if(isset($postdata_array['delete_menu_image_path_'.$i]) && !empty($postdata_array['delete_menu_image_path_'.$i])) {
              if(!empty($this->input->post("hidden_deleted_menu_image_".$i))) {
                $root_path = explode("menus_images", $this->input->post("hidden_deleted_menu_image_".$i));
                unlink(DOCUMENT_ROOT."/menus_images". $root_path[1]);
              }
            } 
            else if(!empty($this->input->post("hidden_deleted_menu_image_".$i)))
              $menus_file_name = $this->input->post("hidden_deleted_menu_image_".$i);              
            else if(isset($menus_file_path_array[$i]) && !empty($menus_file_path_array[$i]))
              $menus_file_name = $menus_file_path_array[$i];              
            else 
              $menus_file_name = null;
            
            //Check if row id for accordian table if available then update row else insert
            if(isset($postdata_array['accordian_table_row_id_'.$i]) && !empty($postdata_array['accordian_table_row_id_'.$i]) ){
                $insertdata = array(
                                    "accordian_label" => str_replace("'","''", $accordian_label),	
                                    "accordian_contents" => str_replace("'","''", $accordian_content),	
                                    "accordian_menu_image_path" => (isset($menus_file_name) && !empty($menus_file_name)) ? $menus_file_name : "",
                                    "updated_by" => $this->created_by,	
                                    "updated_time" => $this->created_time
                                    );
                $this->db->where("id", base64_decode($postdata_array['accordian_table_row_id_'.$i]));
                $this->db->update("bz_template_accordian_data", $insertdata);
                $accordian_id_array[$i-1] = base64_decode($postdata_array['accordian_table_row_id_'.$i]);
            } else {
                $insertdata = array(
                                    "template_id" => base64_decode($postdata_array['template_id']),	
                                    "user_id" => $this->session->userdata("id"),
                                    "accordian_label" => str_replace("'","''", $accordian_label),	
                                    "accordian_contents" => str_replace("'","''", $accordian_content),	
                                    "accordian_menu_image_path" => (isset($menus_file_name) && !empty($menus_file_name)) ? $menus_file_name : "",
                                    "menus_opened_as" => (isset($postdata_array['menus_opened_as'])) ? $postdata_array['menus_opened_as']:"",
                                    "is_active" => "Y",	
                                    "is_deleted" => "N",	
                                    "created_by" => $this->created_by,	
                                    "created_time" => $this->created_time,
                                    "entry_source" => "web"
                                    );
                $this->db->insert("bz_template_accordian_data", $insertdata);
                //echo "<br>update----".$this->db->last_query();
                $accordian_id_array[$i-1] = $this->db->insert_id();
            }
          }
          $i++;
        }
      }
      
      $postdata_array['podcast_type'] = $this->get_audio_settings_data();
      //Get template data according to choosen by user
      $template_data = $this->db->query("SELECT template_name,thumbnail_path,index_file_path FROM bz_template_master WHERE is_active='Y' AND is_deleted='N' AND id=".base64_decode($postdata_array['template_id']))->row();
      ob_start();
      include($template_data->index_file_path);        
      $html_data = ob_get_contents();// $dynamic_index_html; 
      ob_end_clean();

      //echo $html_data;

      //Soft delete previous digital card details with slider and video fil ref's    
      /*$this->db->query("UPDATE bz_digital_card_html_data SET is_active='N',is_deleted='Y',updated_at='".date("Y-m-d H:i:s")."' WHERE  user_id=".$this->session->userdata("id"));*/

      //Insert digital card HTML data if not added against selected template
      $check_html_data = $this->db->query("SELECT id FROM bz_digital_card_html_data WHERE is_active='Y' AND is_deleted='N' AND template_id=".base64_decode($postdata_array['template_id'])." AND user_id=".$this->session->userdata("id"));
      //$check_html_data = $this->db->query("SELECT id FROM bz_digital_card_html_data WHERE is_active='Y' AND is_deleted='N' AND user_id=".$this->session->userdata("id"));
      
      if($check_html_data->num_rows() > 0){
        //Update default template sto 'N' if any other template is set as default
        //if(isset($postdata_array['default_digital_card']) && $postdata_array['default_digital_card'] == "Y") {
          //$this->db->query("UPDATE bz_digital_card_html_data SET is_default_template='N' WHERE user_id=".$this->session->userdata("id")." AND template_id!=".base64_decode($postdata_array['template_id']));
        //}
        $template_html_data = $check_html_data->row();
        $update_digital_card_html_data = array(
                                                "current_template_id" => base64_decode($postdata_array['template_id']),
                                                //"previous_template_id" => $previous_template_id,
                                                "menus_opened_as" => (isset($postdata_array['menus_opened_as'])) ? $postdata_array['menus_opened_as']:"",
                                                "header_background_color" => (isset($postdata_array['header_background_color'])) ? $postdata_array['header_background_color']:"",
                                                "header_font_color" => (isset($postdata_array['header_font_color'])) ? $postdata_array['header_font_color'] : "",
                                                "content_background_color" => (isset($postdata_array['content_background_color'])) ? $postdata_array['content_background_color']:"",
                                                "content_font_color" => (isset($postdata_array['content_font_color'])) ? $postdata_array['content_font_color']:"",
                                                "contact_background_color" => (isset($postdata_array['contact_background_color'])) ?  $postdata_array['contact_background_color']:"",
                                                "contact_font_color" => (isset($postdata_array['contact_font_color'])) ? $postdata_array['contact_font_color']:"",
                                                "modal_menu_background_color" => (isset($postdata_array['modal_menu_background_color'])) ? $postdata_array['modal_menu_background_color']:"",
                                                "modal_menu_font_color" => (isset($postdata_array['modal_menu_font_color'])) ? $postdata_array['modal_menu_font_color']:"",
                                                "profile_background_color" => (isset($postdata_array['profile_background_color'])) ? $postdata_array['profile_background_color']:"",
                                                "profile_font_color" => (isset($postdata_array['profile_font_color'])) ? $postdata_array['profile_font_color']:"",
                                                "contact_link_background_color" => (isset($postdata_array['contact_link_background_color'])) ? $postdata_array['contact_link_background_color']:"",
                                                "contact_link_font_color" => (isset($postdata_array['contact_link_font_color'])) ? $postdata_array['contact_link_font_color']:"",
                                                "appointment_background_color" => (isset($postdata_array['appointment_background_color'])) ? $postdata_array['appointment_background_color']:"",
                                                "appointment_font_color" => (isset($postdata_array['appointment_font_color'])) ? $postdata_array['appointment_font_color']:"",
                                                "tribe_background_color" => (isset($postdata_array['tribe_background_color'])) ? $postdata_array['tribe_background_color']:"",
                                                "tribe_font_color" => (isset($postdata_array['tribe_font_color'])) ? $postdata_array['tribe_font_color']:"",
                                                "podcast_background_color" => (isset($postdata_array['podcast_background_color'])) ? $postdata_array['podcast_background_color']:"",
                                                "podcast_font_color" => (isset($postdata_array['podcast_font_color'])) ? $postdata_array['podcast_font_color']:"",
                                                "book_background_color" => (isset($postdata_array['book_background_color'])) ? $postdata_array['book_background_color']:"",
                                                "book_font_color" => (isset($postdata_array['book_font_color'])) ? $postdata_array['book_font_color']:"",
                                                "media_background_color" => (isset($postdata_array['media_background_color'])) ? $postdata_array['media_background_color']:"",
                                                "media_font_color" => (isset($postdata_array['media_font_color'])) ? $postdata_array['media_font_color']:"",
                                                "blog_background_color" => (isset($postdata_array['blog_background_color'])) ? $postdata_array['blog_background_color']:"",
                                                "blog_font_color" => (isset($postdata_array['blog_font_color'])) ? $postdata_array['blog_font_color']:"",
                                                "background_color" => (isset($postdata_array['background_color'])) ? $postdata_array['background_color'] : "",
                                                "font_color" => (isset($postdata_array['font_color'])) ? $postdata_array['font_color']:"",
                                                "video_file_path" => (isset($postdata_array["hidden_deleted_video_file"]) && $postdata_array["hidden_deleted_video_file"] == "video_deleted") ? "" : $video_file_name,
                                                "index_html_data" => $html_data,	
                                                "updated_at" => date("Y-m-d H:i:s"),
                                                "is_default_template" => "Y"
                                              );
        $this->db->where("id", $template_html_data->id);
        $this->db->where("template_id", base64_decode($postdata_array['template_id']));
        $this->db->where("user_id", $this->session->userdata("id"));
        $this->db->update("bz_digital_card_html_data", $update_digital_card_html_data);
      } else {
        //Check for if user have not selected set default template checkbox but its very first template of him then this falg to Y
        $check_template_exist = $this->db->query("SELECT id FROM bz_digital_card_html_data WHERE is_deleted='N' AND is_active='Y' AND user_id=".$this->session->userdata("id"));
        if($check_template_exist->num_rows() < 0 || empty($check_template_exist->num_rows()))
          $check_default_template_flag = "Y";
        else if(isset($postdata_array['default_digital_card']) && $postdata_array['default_digital_card'] == "Y")
          $check_default_template_flag = "Y";          
        else
          $check_default_template_flag = "Y";

       
        $insert_digital_card_html_data = array(
                                              "template_id" => base64_decode($postdata_array['template_id']),
                                              "menus_opened_as" => (isset($postdata_array['menus_opened_as'])) ? $postdata_array['menus_opened_as']:"",
                                              "header_background_color" => (isset($postdata_array['header_background_color'])) ? $postdata_array['header_background_color']:"",
                                              "header_font_color" => (isset($postdata_array['header_font_color'])) ? $postdata_array['header_font_color'] : "",
                                              "content_background_color" => (isset($postdata_array['content_background_color'])) ? $postdata_array['content_background_color']:"",
                                              "content_font_color" => (isset($postdata_array['content_font_color'])) ? $postdata_array['content_font_color']:"",
                                              "contact_background_color" => (isset($postdata_array['contact_background_color'])) ?  $postdata_array['contact_background_color']:"",
                                              "contact_font_color" => (isset($postdata_array['contact_font_color'])) ? $postdata_array['contact_font_color']:"",
                                              "modal_menu_background_color" => (isset($postdata_array['modal_menu_background_color'])) ? $postdata_array['modal_menu_background_color']:"",
                                              "modal_menu_font_color" => (isset($postdata_array['modal_menu_font_color'])) ? $postdata_array['modal_menu_font_color']:"",
                                              "background_color" => (isset($postdata_array['background_color'])) ? $postdata_array['background_color'] : "",
                                              "font_color" => (isset($postdata_array['font_color'])) ? $postdata_array['font_color']:"",
                                              "video_file_path" => (isset($postdata_array["hidden_deleted_video_file"]) && $postdata_array["hidden_deleted_video_file"] == "video_deleted") ? "" : $video_file_name,
                                              "user_id" => $this->session->userdata("id"),	
                                              "index_html_data" => $html_data,	
                                              "is_active" => "Y", 	
                                              "is_deleted" => "N",
                                              "created_at" => date("Y-m-d H:i:s"),
                                              "is_default_template" => "Y"
                                            );
        $this->db->insert("bz_digital_card_html_data", $insert_digital_card_html_data);
        $insert_id = $this->db->insert_id();
      }
      

      //Insert Audio settings details
        $audio_setting_counter = $this->input->post("audio_setting_counter");
        if(isset($audio_setting_counter) && !empty($audio_setting_counter)) {
          foreach($audio_setting_counter as $audio_row) {
            if(!empty($this->input->post("podcast_type_".$audio_row)) && !empty($this->input->post("podcast_link_".$audio_row))) {
              $is_active = (isset($_POST["audio_is_active_".$audio_row]) && $_POST["audio_is_active_".$audio_row]=="on") ? "Y":"N";

              //Set icon name as per audio type
              if($this->input->post("podcast_type_".$audio_row) == "Apple")
                $audio_icon = base_url()."custome_platinum_template/icon/apple-podcast-icon.png";
              else if($this->input->post("podcast_type_".$audio_row) == "Google")
                $audio_icon = base_url()."custome_platinum_template/icon/google-podcast-icon.png";
              else if($this->input->post("podcast_type_".$audio_row) == "Spotify")
                $audio_icon = base_url()."custome_platinum_template/icon/spotify-icon.png";
              else if($this->input->post("podcast_type_".$audio_row) == "Gaana")
                $audio_icon = base_url()."custome_platinum_template/icon/apple-podcast-icon.png";
              else if($this->input->post("podcast_type_".$audio_row) == "Anchor")
                $audio_icon = base_url()."custome_platinum_template/icon/anchor-icon.png";

              $insertdata = array(
                                  "audio_name" => $this->input->post("podcast_type_".$audio_row),	
                                  "audio_link" => $this->input->post("podcast_link_".$audio_row),	
                                  "audio_icon" => $audio_icon,	
                                  "is_active" => $is_active,	
                                  "is_deleted" => "N",	
                                  "created_by" => $this->created_by,
                                  "created_time" => $this->created_time,
                                  "entry_source" => "web"
                                );

              $this->db->insert("bz_user_audio_setting_details", $insertdata);
            }
          }
        }
        //Update audio setting if availabel
        $audio_setting_counter_rowid = $this->input->post("audio_setting_counter_rowid");
        if(isset($audio_setting_counter_rowid) && !empty($audio_setting_counter_rowid)) {
          foreach($audio_setting_counter_rowid as $row_id) {
            if(!empty($row_id)) {
              $is_active = (isset($_POST["audio_is_active_".$row_id]) && $_POST["audio_is_active_".$row_id]=="on") ? "Y":"N";

                //Set icon name as per audio type
                if($this->input->post("podcast_type_".$row_id) == "Apple")
                  $audio_icon = base_url()."custome_platinum_template/icon/apple-podcast-icon.png";
                else if($this->input->post("podcast_type_".$row_id) == "Google")
                  $audio_icon = base_url()."custome_platinum_template/icon/google-podcast-icon.png";
                else if($this->input->post("podcast_type_".$row_id) == "Spotify")
                  $audio_icon = base_url()."custome_platinum_template/icon/spotify-icon.png";
                else if($this->input->post("podcast_type_".$row_id) == "Gaana")
                  $audio_icon = base_url()."custome_platinum_template/icon/apple-podcast-icon.png";
                else if($this->input->post("podcast_type_".$row_id) == "Anchor")
                  $audio_icon = base_url()."custome_platinum_template/icon/anchor-icon.png";

                $updatedata = array(
                                    "audio_name" => $this->input->post("podcast_type_".$row_id),	
                                    "audio_link" => $this->input->post("podcast_link_".$row_id),
                                    "audio_icon" => $audio_icon,	
                                    "is_active" => $is_active,	
                                    "is_deleted" => "N",	
                                    "updated_by" => $this->created_by,
                                    "updated_time" => $this->created_time
                                  );

                $this->db->where("id", $row_id);
                $this->db->update("bz_user_audio_setting_details", $updatedata);
            }
          }
        }
      //die;
      return true;
  }

  public function Qr_generation($prof_display_name, $digital_card_url, $prof_user_id) {
    // Include the link in the QR code data
    $params['data'] = $prof_display_name . " - " . $prof_user_id . " - " . $digital_card_url;

    $params['level'] = 'H';
    $params['size'] = 50;

    $params['savename'] = FCPATH . 'qrcode_images/' . $prof_display_name  . '_' . $prof_user_id . '.png';

    $this->ciqrcode->generate($params);

    $qr_url = 'qrcode_images/' . $prof_display_name . '_' . $prof_user_id . '.png';

    return $qr_url;
}

   public function get_userdata($email) {
      $this->db->select("id, name, whatsapp_number, mobile_number, whatapp_message, company_name, designation, address, gmap_pin_url, avatar_filename, avatar_path, co_logo_filename, co_logo_path, is_active, is_enabled, date_join, date_left, date_last_login, 
      display_name, password, account_number, bio, email_id, website_url, request_url, facebook_page_link, instagram_page_link, 
      linkedin_page_link,vcf_file_name,youtube_link,whatsapp_country_code,telephone_country_code,plan_selected,qr_page_link,twitter_page_link,google_business_page_link,facebook_business_page_link,business_category_id,trial_end_date");
      $this->db->from("bz_user_profile");
      $this->db->where("is_active", 1);
      $this->db->where("is_enabled", 1);
      $this->db->where("email_id", $email);
      $query = $this->db->get();
      
      if($query->num_rows() > 0) {
          return $query->result();
      } else {
          return false;
      }
  }

  public function check_username($username) {
    $result = $this->db->query("SELECT id FROM bz_user_profile WHERE name='".$username."'");

    if($result->num_Rows() > 0) 
      return true;
    else
      return false; 
  } 

  public function get_template_setup_data($id = "") {
    $this->db->select("id,template_name,thumbnail_path,index_file_path,is_active,is_deleted,created_by,created_time,is_accordian_modal_supported,is_video_supported,is_slider_supported,is_basic_color_supported,is_custome_color_supported,is_accordian_modal_color_supported,is_company_logo_supported,basic_background_color,basic_font_color,header_background_color,header_font_color,content_background_color,content_font_color,contact_background_color,contact_font_color, accordian_background_color,accordian_font_color,template_charges,is_linkedtree_color_supported");
    $this->db->from("bz_template_master");
    $this->db->where("is_active", "Y");
    $this->db->where("is_deleted", "N");
    if (isset($id) && !empty($id))
      $this->db->where("id", base64_decode($id));

    $query = $this->db->get();
    
    if ($query->num_rows() > 0)
        return $query->result();
    else
        return false;

  } 

  public function save_profile_password_details() {
    $this->db->query("UPDATE bz_user_profile SET password='".$this->input->post("new_password")."' WHERE is_active=1 AND is_enabled=1 AND id=".$this->session->userdata("id"));

    if($this->db->affected_rows() != '')
      return true;
    else
      return false;
  }

  public function get_offers_data() {
    $this->db->select("slider_image_one,slider_image_two,slider_image_three");
    $this->db->from("bz_digital_card_html_data");
    $this->db->where("is_active", "Y");
    $this->db->where("is_deleted", "N");
    $this->db->where("template_id", $this->session->userdata("template_choosen"));
    $this->db->where("user_id", $this->session->userdata("id"));
    $this->db->where("is_default_template", "Y");

    $query = $this->db->get();
    
    if ($query->num_rows() > 0)
        return $query->result();
    else
        return false;
  }

  public function save_offer_slider_details() {
    //echo "<pre>"; print_r($_POST); print_r($_FILES);die;
    $postdata_array = $this->Functions_Library->addslashes_to_array_element($this->input->post());
    
    // //Check for if data is existing in database table for user and about slider information, if yes then first delete files from document roo first and then delete data from table, then freshly insert new records
    // $slider_existing_details = $this->db->query("SELECT id,slider_image_path FROM bz_slider_details WHERE is_active='Y' AND is_deleted='N' AND user_id=".$this->session->userdata("id"));
    // if($slider_existing_details->num_rows() > 0){
    //   $directory_name = "slider_images";
    //   foreach($slider_existing_details->result() as $slider_row){
    //     //Delete file form docuemnt root
    //     $explode = explode("slider_images", $slider_row->slider_image_path);
    //     var_dump(unlink(DOCUMENT_ROOT."/".$directory_name.'/'.ltrim($explode[1], "/")));
    //     $this->db->query("DELETE FROM bz_slider_details WHERE id=".$slider_row->id);
    //     echo "<br>".$this->db->last_query();
    //   }
    // } 
    // die;

    //echo "<pre>";print_r($_POST);print_r($_FILES);
    
    $slider_images = $_FILES['slider_images'];
    $i = 0;
    $number_string_array = array("one","two","three","four","five");
    $image_sr_no = array(1,2,3,4,5);
    //$this->db->query("UPDATE bz_slider_details SET is_deleted='Y' WHERE user_id=".$this->session->userdata("id"));
    $this->db->query("DELETE FROM bz_slider_details WHERE  user_id=".$this->session->userdata("id"));
    
    foreach($number_string_array as $row) {       
      
     
      if(isset($postdata_array['slider_'.$number_string_array[$i].'_cropped_image']) && !empty($postdata_array['slider_'.$number_string_array[$i].'_cropped_image'])){
        // echo "inside if";
        $slider_path =  base_url().$this->Functions_Library->process_image_upload_using_base64_image($postdata_array['slider_'.$number_string_array[$i].'_cropped_image'], $postdata_array['slider_'.$number_string_array[$i].'_cropped_image'], 0, 300, "slider_images", $this->session->userdata("username"));
      }
      else{
        // echo "inside else";
        $slider_path = $postdata_array['slider_'.$number_string_array[$i].'_hidden_path'];
      }
      
      
      if(!empty($slider_path)) {
        
        $insertdata = array(
                            "slider_url" => $postdata_array['slider_url'][$i],	
                            "slider_image_path" => $slider_path,
                            "image_sr_no" => $image_sr_no[$i],
                            "user_id" => $this->session->userdata("id"),	
                            "is_active" => "Y",	
                            "is_deleted" => "N",	
                            "created_by" => $this->created_by,	
                            "created_time" => $this->created_time
                          );
        $this->db->insert("bz_slider_details", $insertdata);
        
        sleep(5);
        $slider_path = null;
      }
     
      $i++;
    }
    //die;
    return true;
  }

  public function get_offer_payment_details() {
    $offer_data_query = $this->db->query("SELECT txn_date FROM bz_payment_details WHERE status='".PAYMENT_SUCCESS."' AND payment_for='".PAYMENT_FOR_OFFER."' AND user_id=".$this->session->userdata("id")." ORDER BY ID DESC LIMIT 1");
    
    if($offer_data_query->num_rows() > 0) {
      $offer_payment_date = $offer_data_query->row();
      $date1=date_create($offer_payment_date->txn_date);
      $date2=date_create(date("Y-m-d"));
      $diff=date_diff($date1,$date2);
      $days = $diff->format("%y years");
      
      if($days >= 1)
        return false;
      else
        return true;
    } else {
      return false;
    }
  }

  public function get_slider_information() {
    $query = $this->db->query("SELECT id, slider_url, slider_image_path, image_sr_no FROM bz_slider_details WHERE is_active='Y' AND is_deleted='N' AND user_id=".$this->session->userdata("id"));
    
    if($query->num_rows() > 0) {
      $final_data_array = array();
      foreach($query->result() as $row) 
        $final_data_array[$row->image_sr_no] = $row;
      
      return $final_data_array;
    }else
      return false;
  }

  public function generate_html($template_id) {
    $user_data = $this->db->query("SELECT * FROM bz_user_profile WHERE name!='' AND id=".$this->session->userdata("id"));
    
    if(empty($user_data->num_rows())) {        
      $this->session->set_userdata("username", "empty_digital_card");
      $this->session->set_userdata("digital_card_url", base_url()."empty_digital_card");   
      $this->db->query("UPDATE bz_user_profile SET current_template_id=".base64_decode($template_id).", previous_template_id=3 WHERE id=".$this->session->userdata("id"));
      return true;
    } else {
      $this->db->query("UPDATE bz_user_profile SET current_template_id=".base64_decode($template_id).", previous_template_id=3 WHERE id=".$this->session->userdata("id"));
      $check_template_exists = $this->db->query("SELECT * FROM bz_digital_card_html_data WHERE template_id=".base64_decode($template_id)." AND user_id=".$this->session->userdata("id"));        
      
      //$check_template_exists = $this->db->query("SELECT * FROM bz_digital_card_html_data WHERE user_id=".$this->session->userdata("id"));
      if($check_template_exists->num_rows() > 0) {
        foreach($check_template_exists->result() as $template_row){}
      }
      if(isset($template_row) && !empty($template_row->current_template_id)) 
        $previous_template_id = $template_row->current_template_id;
      else
        $previous_template_id = "0";

      //Form, from here $postdata_array variable so that dynamic html php file will not need to be changed
      $user_data_row = $user_data->row();
      $postdata_array['website_url'] = $user_data_row->website_url;
      $postdata_array["name"] = $user_data_row->name;
      $postdata_array['display_name'] = $user_data_row->display_name;
      $postdata_array['designation'] = $user_data_row->designation;
      $postdata_array['bio'] = str_replace("''","'", $user_data_row->bio);
      $avatar_filepath = $user_data_row->avatar_path;
      $co_logo_filepath = $user_data_row->co_logo_path;
      $postdata_array['company_name'] = $user_data_row->company_name;          
      $postdata_array['whatsapp_number'] = $user_data_row->whatsapp_number;
      $postdata_array['mobile_number'] = $user_data_row->mobile_number;
      $postdata_array['whatsapp_country_code'] = $user_data_row->whatsapp_country_code;
      $postdata_array['telephone_country_code'] = $user_data_row->telephone_country_code;
      $postdata_array['facebook_page_link'] = $user_data_row->facebook_page_link;
      $postdata_array['email_id'] = $user_data_row->email_id;
      $postdata_array['instagram_page_link'] = $user_data_row->instagram_page_link;
      $postdata_array['youtube_page_link'] = $user_data_row->youtube_link;
      $postdata_array['gmap_pin_url'] = $user_data_row->gmap_pin_url;

      $vcf_file_contents = fopen(DOCUMENT_ROOT."/vcf_files/".$postdata_array["name"].".vcf", "w");// or die("Unable to open file!"); 
    
      $explode = explode(" ", $postdata_array['display_name']);
      $vCard = "BEGIN:VCARD\r\n";
      $vCard .= "VERSION:2.1\r\n";
      if(isset($explode[1]))
        $vCard .= "N:".$explode[1];
      if(isset($explode[2]))
        $vCard .= ";".$explode[2].";;;\r\n";
      $vCard .= "FN:".$postdata_array['display_name']."\r\n";
      $vCard .= "TEL;CELL:".$postdata_array['mobile_number']."\r\n";
      $vCard .= "EMAIL;HOME:".$postdata_array['email_id']."\r\n";
      if(!empty($postdata_array['website_url']))
        $vCard .= "URL:".$postdata_array['website_url']."\r\n";
      else
        $vCard .= "URL:".base_url().stripslashes($postdata_array["name"])."\r\n";
      
      $vCard .= "END:VCARD";
      
      fwrite($vcf_file_contents, $vCard);
      fclose($vcf_file_contents);

      //Get template data according to choosen by user             
      $template_data = $this->get_template_setup_data($template_id);           
      $template_data = $template_data[0];
      
      $postdata_array["header_background_color"] = (isset($template_row) && !empty($template_row->header_background_color)) ?$template_row->header_background_color : $template_data->header_background_color;
      $postdata_array["header_font_color"] = (isset($template_row) && !empty($template_row->header_font_color)) ?$template_row->header_font_color : $template_data->header_font_color;
      $postdata_array["content_background_color"] = (isset($template_row) && !empty($template_row->content_background_color)) ?$template_row->content_background_color : $template_data->content_background_color;
      $postdata_array["content_font_color"] = (isset($template_row) && !empty($template_row->content_font_color)) ?$template_row->content_font_color : $template_data->content_font_color;
      $postdata_array["contact_background_color"] = (isset($template_row) && !empty($template_row->contact_background_color)) ?$template_row->contact_background_color : $template_data->contact_background_color;
      $postdata_array["contact_font_color"] = (isset($template_row) && !empty($template_row->contact_font_color)) ?$template_row->contact_font_color : $template_data->contact_font_color;
      $postdata_array['modal_menu_background_color'] = (isset($template_row) && !empty($template_row->modal_menu_background_color)) ?$template_row->modal_menu_background_color : $template_data->accordian_background_color;
      $postdata_array['modal_menu_font_color'] = (isset($template_row) && !empty($template_row->modal_menu_font_color)) ?$template_row->modal_menu_font_color : $template_data->accordian_font_color; 
      $postdata_array['menus_opened_as'] = (isset($template_row)  && !empty($template_row->menus_opened_as)) ? $template_row->menus_opened_as : "";
      $video_file_name = (isset($template_row)  && !empty($template_row->video_file_path)) ? $template_row->video_file_path : "";
      
      //Get accordian menu contents
      $template_accordian_data = $this->db->query("SELECT id, template_id, accordian_label, accordian_contents, accordian_menu_image_path,menus_opened_as FROM bz_template_accordian_data where is_active='Y' ANd is_deleted='N' AND user_id=".$this->session->userdata("id"));

      //Get Service details for booking, check validity period too
      $postdata_array['service_booking_details'] = $this->get_service_details($this->session->userdata("id"));
      
      if($template_accordian_data->num_rows() > 0){
        $cnt = 1;
        $menus_file_path_array = [];
        foreach($template_accordian_data->result() as $accordian_row) {
          $postdata_array['input_counter'][] = $cnt;
          $postdata_array['accordian_label_'.$cnt] = str_replace("''","'", $accordian_row->accordian_label);
          $postdata_array['accordian_content_'.$cnt] = str_replace("''","'", $accordian_row->accordian_contents);
          $postdata_array['hidden_deleted_menu_image_'.$cnt] = $accordian_row->accordian_menu_image_path;
          $menus_file_path_array[$cnt] = $accordian_row->accordian_menu_image_path;
          $cnt++;
        }

      }
      //Further check that video file is available
      if(isset($postdata_array["hidden_deleted_video_file"]) && $postdata_array["hidden_deleted_video_file"] == "video_deleted")
        $video_file_name = "";
      else if(!empty($video_file_path))
        $video_file_name = $video_file_path;
      else
        $video_file_name = "";

      //Set variables here to be used in HTML, if iinitiated then use else replace with null
      if(isset($postdata_array['display_name']) && !empty($postdata_array['display_name']))
        $display_name = stripslashes($postdata_array['display_name']);
      else
        $display_name="";

      if(isset($postdata_array['bio']) && !empty($postdata_array['bio']))
        $bio = stripslashes(strip_tags($postdata_array['bio']));
      else
        $bio="";

      if(isset($postdata_array['header_background_color']) && !empty($postdata_array['header_background_color']))
        $header_background_color = stripslashes($postdata_array['header_background_color']);
        $header_background_color = "";

      if(isset($postdata_array['header_font_color']) && !empty($postdata_array['header_font_color']))
        $header_font_color = stripslashes($postdata_array['header_font_color']);
      else
        $header_font_color = "";

      if(isset($postdata_array['content_background_color']) && !empty($postdata_array['content_background_color']))
        $content_background_color = stripslashes($postdata_array['content_background_color']);
      else
        $content_background_color = "";

      if(isset($postdata_array['content_font_color']) && !empty($postdata_array['content_font_color']))
        $content_font_color = stripslashes($postdata_array['content_font_color']);
      else
        $content_font_color = "";

      if(isset($postdata_array['contact_background_color']) && !empty($postdata_array['contact_background_color']))
        $contact_background_color = stripslashes($postdata_array['contact_background_color']);
      else
        $contact_background_color = "null";

      if(isset($postdata_array['contact_font_color']) && !empty($postdata_array['contact_font_color']))
        $contact_font_color = stripslashes($postdata_array['contact_font_color']);
      else
        $contact_font_color = "null";

      if(isset($postdata_array['modal_menu_background_color']) && !empty($postdata_array['modal_menu_background_color']))
        $modal_menu_background_color = stripslashes($postdata_array['modal_menu_background_color']);
      else
        $modal_menu_background_color = "null";  

      if(isset($postdata_array['modal_menu_font_color']) && !empty($postdata_array['modal_menu_font_color']))
        $modal_menu_font_color = stripslashes($postdata_array['modal_menu_font_color']);
      else
        $modal_menu_font_color = "null";  

      if(isset($postdata_array['company_name']) && !empty($postdata_array['company_name']))
        $company_name = stripslashes($postdata_array['company_name']);
      else
        $company_name = "";

      if(isset($postdata_array['designation']) && !empty($postdata_array['designation']))
        $designation = stripslashes($postdata_array['designation']);
      else
        $designation = "";

      if(isset($postdata_array['bio']) && !empty($postdata_array['bio']))
        $bio = stripslashes($postdata_array['bio']);
      else
        $bio = "";

      if(isset($postdata_array['bio']) && !empty($postdata_array['bio']))
        $bio = stripslashes($postdata_array['bio']);
      else
        $bio = "";

      if(isset($postdata_array['whatsapp_country_code']) && !empty($postdata_array['whatsapp_country_code']) && isset($postdata_array['whatsapp_number']) && !empty($postdata_array['whatsapp_number']))
        $whatsapp_number = stripslashes("+".$postdata_array['whatsapp_country_code']."".$postdata_array['whatsapp_number']);
      else
        $whatsapp_number = "";

      if(isset($postdata_array['telephone_country_code']) && !empty($postdata_array['telephone_country_code']) && isset($postdata_array['mobile_number']) && !empty($postdata_array['mobile_number']))
        $mobile_number = stripslashes("+".$postdata_array['telephone_country_code']."".$postdata_array['mobile_number']);
      else
        $mobile_number = "";
      ob_start();
      include($template_data->index_file_path);        
      $html_data = ob_get_contents();// $dynamic_index_html; 
      ob_end_clean();
      
    
      if(empty($check_template_exists->num_rows())) {
        $insert_digital_card_html_data = array(
                                              "template_id" => base64_decode($template_id),
                                              "menus_opened_as" => (isset($postdata_array['menus_opened_as'])) ? $postdata_array['menus_opened_as']:"",
                                              "header_background_color" => (isset($postdata_array['header_background_color'])) ? $postdata_array['header_background_color']:"",
                                              "header_font_color" => (isset($postdata_array['header_font_color'])) ? $postdata_array['header_font_color'] : "",
                                              "content_background_color" => (isset($postdata_array['content_background_color'])) ? $postdata_array['content_background_color']:"",
                                              "content_font_color" => (isset($postdata_array['content_font_color'])) ? $postdata_array['content_font_color']:"",
                                              "contact_background_color" => (isset($postdata_array['contact_background_color'])) ?  $postdata_array['contact_background_color']:"",
                                              "contact_font_color" => (isset($postdata_array['contact_font_color'])) ? $postdata_array['contact_font_color']:"",
                                              "modal_menu_background_color" => (isset($postdata_array['modal_menu_background_color'])) ? $postdata_array['modal_menu_background_color']:"",
                                              "modal_menu_font_color" => (isset($postdata_array['modal_menu_font_color'])) ? $postdata_array['modal_menu_font_color']:"",
                                              "background_color" => (isset($postdata_array['background_color'])) ? $postdata_array['background_color'] : "",
                                              "font_color" => (isset($postdata_array['font_color'])) ? $postdata_array['font_color']:"",
                                              "video_file_path" => $video_file_name,
                                              "user_id" => $this->session->userdata("id"),	
                                              "index_html_data" => $html_data,	
                                              "is_active" => "Y", 	
                                              "is_deleted" => "N",
                                              "created_at" => date("Y-m-d H:i:s"),
                                              "is_default_template" => "Y"
                                            );
        $this->db->insert("bz_digital_card_html_data", $insert_digital_card_html_data);
        
        $insert_id = $this->db->insert_id();
        $this->db->query("UPDATE bz_digital_card_html_data SET is_default_template='N' WHERE user_id=".$this->session->userdata("id")." AND template_id!=".base64_decode($template_id));
        
        //echo $this->db->last_query();
      } else {
        $databse_object = get_instance()->db->conn_id;
        
        $this->db->query("UPDATE bz_digital_card_html_data SET current_template_id=".base64_decode($template_id).",previous_template_id=".$previous_template_id.",is_default_template='Y',index_html_data='".str_replace("'","''",$html_data)."',updated_at='".date("Y-m-d H:i:s")."' WHERE template_id=".base64_decode($template_id)." AND user_id=".$this->session->userdata("id")." AND template_id=".base64_decode($template_id));
        //echo $this->db->last_query();
        $this->db->query("UPDATE bz_digital_card_html_data SET is_default_template='N' WHERE user_id=".$this->session->userdata("id")." AND template_id!=".base64_decode($template_id));
        //echo $this->db->last_query();
      }
      
    }
    //die;
    return true;
      
  }


  public function revert_user_template_to_basic() {
    //$this->db->query("UPDATE bz_user_profile SET current_template_id=3 WHERE id=".$this->session->userdata("id"));
    $this->db->query("UPDATE bz_digital_card_html_data SET current_template_id=3 WHERE user_id=".$this->session->userdata("id"));
    if($this->db->affected_rows() > 0){
      
    } else {
      
      $this->session->set_userdata("username", "empty_digital_card");
      $this->session->set_userdata("digital_card_url", base_url()."empty_digital_card");   
    }
  }

  public function get_slot_data() {
    $this->db->select("ID, USER_ID, DAY_NAME, START_TIME, END_TIME");
    $this->db->from("bz_slot_details");
    $this->db->where("USER_ID", $this->session->userdata('id'));
    $this->db->where("IS_DELETED", "N");
    $this->db->where("IS_ACTIVE", "Y");
    $query = $this->db->get();
    
    if ($query->num_rows() > 0) {
      return $query->result(); 
    } else{
        return false;
    }
  }
  public function get_get()
  {
    // print_r('ss');
      $query=$this->db->get('bz_slot_details');
      $data['count'] = $query->num_rows();
      $data['result'] = $query->result();
      $data['session'] = $this->session->userdata('ID');
      // print_r($data);
      return $data; 
  }

  public function save_slot_data()
  {
    //echo "<pre>"; print_r($_POST);
    //Insert data for availalibity of a Mentor      
    $i = 0;
    $DAY_ARRAY = $this->input->post("DAY_ARRAY");
    $START_TIME_SEC = $this->input->post("Monday_START");
    $START_TIME_ARRAY = $this->input->post("START_TIME");
    $END_TIME_ARRAY = $this->input->post("END_TIME");
    $END_TIME_SEC = $this->input->post("END_TIME");
    $error_flag = 0;

    foreach ($DAY_ARRAY as $day) {
      if( (isset($DAY_ARRAY[$i]) && !empty($DAY_ARRAY[$i])) && (isset($START_TIME_ARRAY[$i]) && !empty($START_TIME_ARRAY[$i])) && (isset($END_TIME_ARRAY[$i]) && !empty($END_TIME_ARRAY[$i])) ) {
        $insertdata = array(
                    "USER_ID" => ($this->session->userdata('id')),	
                    "DAY_NAME" => $DAY_ARRAY[$i],	
                    "START_TIME" => date("H:i:s", strtotime($START_TIME_ARRAY[$i])),
                    "END_TIME" => date("H:i:s", strtotime($END_TIME_ARRAY[$i])),	
                    "IS_VACATION" => "0",
                    "IS_ACTIVE" => "Y",	
                    "IS_DELETED" => "N",	
                    "CREATED_AT" => $this->created_time,	
                    "CREATED_BY" => $this->created_by,
                    "ENTRY_SOURCE" => "web"
                ); 
        $this->db->insert("bz_slot_details", $insertdata);  
      }else {
          $error_flag++;
      }
      $i++; 
    }


    //Insert vacation details from here
    $VACATION_START_DATE = $this->input->post("VACATION_START_DATE");
    $VACATION_END_DATE = $this->input->post("VACATION_END_DATE");
    if(!empty($VACATION_START_DATE) && !empty($VACATION_END_DATE)) {
      //Insert Vacation record 
      $check_vacation_record = $this->db->query("SELECT ID FROM bz_slot_details WHERE IS_VACATION=1 AND USER_ID =".($this->session->userdata('id')));
      if($check_vacation_record->num_rows() > 0) {    
          // check is vacation is equal to 0 then insert else update the column SELECT 
          $this->db->query(" UPDATE bz_slot_details SET IS_VACATION='1' , VACATION_START_DATE = '".$VACATION_START_DATE."',VACATION_END_DATE = '".$VACATION_END_DATE."',IS_ACTIVE='Y',IS_DELETED='N',CREATED_AT='".$this->created_time."',CREATED_BY='".$this->created_by."',ENTRY_SOURCE='web' WHERE IS_VACATION=1 AND USER_ID= ".($this->session->userdata('id'))." ");
      } else {                
          $this->db->query("INSERT INTO bz_slot_details(USER_ID, IS_VACATION, VACATION_START_DATE,VACATION_END_DATE,IS_ACTIVE,IS_DELETED,CREATED_AT,CREATED_BY,ENTRY_SOURCE) VALUES(".$this->created_by.",'1','".date("Y-m-d", strtotime($VACATION_START_DATE))."','".date("Y-m-d", strtotime($VACATION_END_DATE))."','Y','N','".$this->created_time."','".$this->created_by."','web')");                        
          // die; 
      }             
    }


    // Insert data for service
    $counter = $this->input->post("counter");
    $i = 0;

    $this->db->query("UPDATE bz_service_details SET IS_DELETED='Y' WHERE USER_ID=".$this->session->userdata('id'));

    $SERVICE_ID_COUNTER = 1;
    foreach($counter as $row) {
      //echo "here";die;
        $SERVICE = $this->input->post("SERVICE_".$row);
        //$PRICE = $this->input->post("PRICE_".$row);
        $IS_ACTIVE = $this->input->post("IS_ACTIVE_".$row);
        //$TIMING = $this->input->post("TIMING_".$row);
        // $TIME_COMMMA_SEPERATED = "";
        // foreach($TIMING as $time_row) {
        //     $TIME_COMMMA_SEPERATED .= $time_row.",";
        // }

        //$TIME_COMMMA_SEPERATED = rtrim($TIME_COMMMA_SEPERATED, ",");
        
        for($inner_count=1;$inner_count<=3;$inner_count++) {
          
          if($this->input->post("TIMING_".$row."_".$inner_count) != '' && $this->input->post("PRICE_".$row."_".$inner_count) != '') {
            $insertdata = array(
                              "SERVICE_ID" => $SERVICE_ID_COUNTER,
                              "USER_ID" => ($this->session->userdata('id')),
                              "SERVICE" => $SERVICE,
                              "PRICE" => $this->input->post("PRICE_".$row."_".$inner_count),	
                              "TIMING" => $this->input->post("TIMING_".$row."_".$inner_count),
                              "IS_ACTIVE" => $IS_ACTIVE,	
                              "IS_DELETED" => "N",	
                              "CREATED_AT" => $this->created_time,	
                              "CREATED_BY" => $this->created_by,
                              "ENTRY_SOURCE" => "web"
                          );
            $this->db->insert("bz_service_details", $insertdata); 
            echo "<br>". $this->db->last_query();
          }           
        }  
        $i++;
        $SERVICE_ID_COUNTER++;
      }
      //die;
      return true;
  }

  public function deleteData($id)
  {
    // print_r('rr');die;
    $this->db->where("ID", $id);  
    $this->db->delete("bz_slot_details");  
    //DELETE FROM users WHERE id = '$user_id'  
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

  public function get_payment_details() {
    $query = $this->db->query("SELECT TBL_PAYMENT.id, TBL_PAYMENT.user_id, TBL_PAYMENT.txn_id, TBL_PAYMENT.amount, TBL_PAYMENT.txn_date, TBL_PAYMENT.status, TBL_PAYMENT.payment_for,TBL_CUST_ORD.custom_order_id FROM bz_payment_details AS TBL_PAYMENT LEFT JOIN bz_payment_custom_order_details as TBL_CUST_ORD ON TBL_PAYMENT.order_id COLLATE utf8mb4_general_ci=TBL_CUST_ORD.razorpay_order_id WHERE TBL_PAYMENT.user_id=".$this->session->userdata('id'));      
       
    if ($query->num_rows() > 0) {
        return $query->result();
    } else
        return false;
  }

  public function get_view_data()
  {
      $this->db->select("ID,USER_ID,DAY_NAME,START_TIME,END_TIME,SLOT_DURATION,IS_VACATION,VACATION_START_DATE,VACATION_END_DATE,IS_ACTIVE,IS_DELETED");
      $this->db->from("bz_slot_details");
      $this->db->where("USER_ID", $this->session->userdata('id'));
      $query = $this->db->get();
      if ($query->num_rows() > 0)
          return $query->result();
      else
          return false;
  }

  public function get_view_service_data()
  {
      $this->db->select("ID,USER_ID,SERVICE,IS_ACTIVE,IS_DELETED");
      $this->db->from("bz_service_details");
      $this->db->where("USER_ID", $this->session->userdata('id'));
      $this->db->group_by("SERVICE");
      $this->db->order_by("ID", "ASC");
      $query = $this->db->get();
      // print_r($query->result());die;
      if ($query->num_rows() > 0) {

        $final_data_array = array();
        foreach($query->result() as $row) {
          $PRICE_TIMING_QUERY = $this->db->query("SELECT PRICE,TIMING FROM bz_service_details WHERE SERVICE='".$row->SERVICE."'"); 
          // print_r($this->db->last_query());
          // echo "<pre>";print_r($PRICE_TIMING_QUERY->result());die;
          if($PRICE_TIMING_QUERY->num_rows() > 0) {
            $PRICE_TIMING_ARRAY = [];
            // echo "<pre>"; print_r($PRICE_TIMING_QUERY->result());
            // $res = $PRICE_TIMING_QUERY->result();
            // echo "<pre>";print_r($res);
            $i = 1;
            foreach($PRICE_TIMING_QUERY->result() as $PRICE_TIMING_ROW) {
              // echo "<pre>"; print_r($PRICE_TIMING_ROW->TIMING);
              $PRICE_TIMING_ARRAY["PRICE_".$PRICE_TIMING_ROW->TIMING] = $PRICE_TIMING_ROW->PRICE;
              $PRICE_TIMING_ARRAY["TIMING_".$PRICE_TIMING_ROW->TIMING] = $PRICE_TIMING_ROW->TIMING;
              // echo "<pre>"; print_r($PRICE_TIMING_ARRAY["PRICE_".$PRICE_TIMING_ROW->PRICE]);
              $i++;
            }
          } 
          // echo "<pre>"; print_r($res);
          $row->price_timing_array = $PRICE_TIMING_ARRAY;
          $final_data_array[] = $row;
          // print_r($final_data_array);
        }
        return $final_data_array;
      } else
          return false;
  }

  public function get_service_details($user_id) {
    $query_to_check_offer_payment_details = $this->get_users_service_payment_details($user_id);
    //$this->db->query("SELECT txn_date FROM bz_payment_details WHERE user_id=".$user_id." AND payment_for='".PAYMENT_FOR_SERVICE."' ORDER BY id DESC LIMIT 1");

    if($query_to_check_offer_payment_details != false) {
      $service_data = $this->db->query("SELECT USER_ID, SERVICE, PRICE, TIMING FROM bz_service_details WHERE IS_ACTIVE='Y' AND IS_DELETED='N' AND USER_ID=".$user_id);
     
      if($service_data->num_rows() >0 ) {
        return $service_data->result();
      } else{
        return false;
        }                   
    } else {
      return false;
    }
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

  public function get_country_data() {
    $country_query = $this->db->query("SELECT contry_isd_code,contry_name,is_default FROM bz_contry_codes");
    if($country_query->num_rows() > 0) 
      return $country_query->result();
    else
      return false;
  }

  public function get_plan_feature_details() {
    $plan_query = $this->db->query("SELECT id, plan_name, plan_price, plan_validity FROM bz_plan_master WHERE is_active='Y' AND is_deleted='N'");
    if($plan_query->num_rows() > 0) {
      //Get features for every plan with active and deleted flag and push to plan data array with new key
      $final_data_array = array();
      foreach($plan_query->result() as $plan_row) {
        $feature_plan_mapping_query = $this->db->query("SELECT TBL_FTR.id,TBL_FTR.feature_name,TBL_FTR.know_more FROM `bz_plan_feature_mapping` AS TBL_MAPP JOIN bz_plan_features AS TBL_FTR ON TBL_MAPP.feature_id=TBL_FTR.id AND TBL_FTR.is_active='Y' AND TBL_MAPP.is_active='Y' AND TBL_MAPP.is_deleted='N' AND TBL_FTR.is_deleted='N' JOIN bz_plan_master as TBL_PLN ON TBL_MAPP.plan_id=TBL_PLN.id AND TBL_PLN.id=".$plan_row->id);
        if($feature_plan_mapping_query->num_rows() > 0) 
          $plan_row->plan_feature_mapping = $feature_plan_mapping_query->result();
        else
          $plan_row->plan_feature_mapping = [];

        $final_data_array[] = $plan_row;
      }

      return $final_data_array;
    } else 
      return false;
  }

  public function validate_plan($plan_id) {
      $plan_query = $this->db->query("SELECT id, plan_price FROM bz_plan_master WHERE id=".base64_decode($plan_id));
      if($plan_query->num_rows() > 0) 
          return $plan_query->row();
      else
          return false;
  }

  public function get_plan_details($plan_id) {
      $plan_query = $this->db->query("SELECT TBL_FTR.feature_name FROM `bz_plan_master` as TBL_PLN JOIN bz_plan_feature_mapping AS TBL_MAPP ON TBL_PLN.id=TBL_MAPP.plan_id AND TBL_MAPP.is_active='Y' AND TBL_MAPP.is_deleted='N' JOIN bz_plan_features AS TBL_FTR ON TBL_MAPP.feature_id = TBL_FTR.id AND TBL_MAPP.is_active='Y' AND TBL_MAPP.is_deleted='N' AND TBL_PLN.id=".($plan_id));
      if($plan_query->num_rows() > 0) {
          $final_data_array = array();
          foreach($plan_query->result() as $row) {
            $final_data_array[] = $row->feature_name;
          }
          return $final_data_array;
      } else
          return false;
  }

  public function delete_slider_row($slider_row_id) {
      if(!empty($slider_row_id) && $slider_row_id!='0'){
          $this->db->query("DELETE FROM bz_slider_details WHERE id=".$slider_row_id);
      }
  }

  public function get_booked_appointment_data() {
      $get_booked_appointment_query = $this->db->query("SELECT TBL_APP.SITE_USER_NAME,TBL_APP.SITE_USER_MOB_NO, TBL_APP.SITE_USER_EMAIL_ID,TBL_SERVICE.SERVICE,TBL_APP.APPOINTMENT_DAY,TBL_APP.APPOINTMENT_DATE, TBL_APP.APPOINTMENT_START_TIME,TBL_APP.DURATION,TBL_APP.ZOOM_START_URL,TBL_APP.ZOOM_JOIN_URL FROM `bz_appointment_details` as TBL_APP join bz_user_profile as TBL_BIZ_USER ON TBL_APP.BIZICARD_USER_ID=TBL_BIZ_USER.id AND TBL_BIZ_USER.id=".$this->session->userdata("id")." JOIN bz_service_details as TBL_SERVICE ON TBL_APP.SELECTED_SERVICE_ID=TBL_SERVICE.ID");
      if($get_booked_appointment_query->num_rows() > 0) 
          return $get_booked_appointment_query->result();
      else
          return false;
  }

  public function get_vacation_data() {
      $vacation_query = $this->db->query("SELECT VACATION_START_DATE, VACATION_END_DATE FROM bz_slot_details WHERE USER_ID=".$this->session->userdata("id")." AND IS_VACATION=1 AND IS_ACTIVE='Y' AND IS_DELETED='N' ");
      if($vacation_query->num_rows() > 0) 
          return $vacation_query->result();
      else
          return false;
  }

  public function get_audio_settings_data() {
    $audio_setting_query = $this->db->query("SELECT id, audio_name, audio_link, is_active FROM bz_user_audio_setting_details WHERE created_by=".$this->session->userdata("id")." ORDER BY id ASC");
      if($audio_setting_query->num_rows() > 0) 
          return $audio_setting_query->result();
      else
          return false;
  }

  public function submit_share_button_data() {
      if(!empty($_POST)) {
          $this->db->query("INSERT INTO bz_card_shared_with_details(user_id, contry_code, mobile_number, message_content, shared_on, is_active, is_deleted) VALUES(".$this->input->post("user_id").",".$this->input->post("country_code").",'".$this->input->post("mobile_number")."','".addslashes($this->input->post("message_content"))."','".date("Y-m-d H:i:s")."','Y','N')");

          if(!empty($this->db->insert_id()))
            return 'https://api.whatsapp.com/send?phone=+'.$this->input->post("country_code").$this->input->post("mobile_number").'&text='.urlencode($this->input->post("message_content"));
          else
            return "false";
      } else {
          return "false";
      }
  }

  public function get_shared_card_details() {
      $shared_card_details_query = $this->db->query("SELECT TBL_SHARE.contry_code, TBL_CONTRY.contry_name, TBL_SHARE.mobile_number, TBL_SHARE.message_content, TBL_SHARE.shared_on FROM bz_card_shared_with_details as TBL_SHARE INNER JOIN bz_contry_codes AS TBL_CONTRY ON TBL_SHARE.contry_code = TBL_CONTRY.contry_isd_code WHERE TBL_SHARE.user_id=".$this->session->userdata("id")." ORDER BY TBL_SHARE.id ASC");
      if($shared_card_details_query->num_rows() > 0) 
          return $shared_card_details_query->result();
      else
          return false;
  }

  public function get_card_views_details() {
      $card_views_details = $this->db->query("SELECT view_count FROM bz_card_view_details WHERE user_id=".$this->session->userdata("id"));
        if($card_views_details->num_rows() > 0) 
            return $card_views_details->row();
        else
            return false;
  }
  public function get_business_category_data() {
      $business_category_data = $this->db->query("SELECT id,business_category_name FROM bz_business_category");
        if($business_category_data->num_rows() > 0) 
            return $business_category_data->result();
        else
            return false;
  }
}