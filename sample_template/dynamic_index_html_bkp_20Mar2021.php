<?php 
$dynamic_index_html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <title>'.stripslashes($postdata_array['company_name']).' '.stripslashes($postdata_array['display_name']).'</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">

     <link rel="stylesheet" href="'.base_url().'sample_template/public/assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="'.base_url().'sample_template/public/assets/css/icons.min.css">
     <style>.div_container{background-color: '.stripslashes($postdata_array['background_color']).' !important; padding-bottom: 35px !important}.div_section_first{margin-top: 10px !important; padding-bottom:20px !important; background-color: '.stripslashes($postdata_array['background_color']).'!important;}.accordian_one{width: 101% !important; margin-left: -4px !important;}.footer{left:0px !important;}.pname{color:'.stripslashes($postdata_array['font_color']).' !important}.pdes{color:'.stripslashes($postdata_array['font_color']).'!important}.modal_button{background-color:white !important}</style>
  </head>
  <body>
    <div class="container">
      <div class="row row-centered">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 col-centered-flex align-items-center justify-content-center div_container" style="background-color: black; padding-bottom: 35px">
          <div class="col-centered-flex d-flex flex-column align-items-center justify-content-center border border-dark div_section_first" style="margin-top: 10px; padding-bottom:20px; background-color: black;">';

          /*if(!empty($co_logo_filepath))
          $dynamic_index_html .= '<img class="img-fluid clogo" alt="'.stripslashes($postdata_array['company_name']).'" src="'.base_url().$co_logo_filepath.'"/><br>';*/

          if(empty($video_file_path)) {
            $video_file_data = $this->db->query("SELECT video_file_path FROM bz_digital_card_html_data WHERE is_active='Y' AND is_deleted='N' AND template_id=1 AND user_id=".$this->session->userdata("id"));
            if($video_file_data->num_rows() > 0) {
              foreach($video_file_data->result() as $row) {} 
              $video_file_path = (!empty($row->video_file_path)) ? $row->video_file_path : "";
            }
          }
         
          if(!empty($slider_image_one_name) || !empty($slider_image_two_name) || !empty($slider_image_three_name)) {
          $dynamic_index_html .= '<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner" role="listbox">';
           
              if(!empty($slider_image_one_name))    
                $dynamic_index_html .= '<div class="carousel-item active">
                                            <figure><img class="d-block img-fluid" src="'.$slider_image_one_name.'" alt="First Slide"></figure>
                                        </div>';
              if(!empty($slider_image_two_name))
                $dynamic_index_html .= '<div class="carousel-item ">
                                          <figure><img class="d-block img-fluid" src="'.$slider_image_two_name.'" alt="Second Slide"></figure>
                                        </div>';
              if(!empty($slider_image_three_name))
                $dynamic_index_html .= '<div class="carousel-item">
                                            <figure><img class="d-block img-fluid " src="'.$slider_image_three_name.'" alt="Third Slide"></figure>
                                        </div>';

              $dynamic_index_html .= '               
                </div>
            </div>';
          }
          if(!empty($avatar_filepath))
          $dynamic_index_html .= '<img class="photo circle_image" alt="'.stripslashes($postdata_array['display_name']).'" src="'.$avatar_filepath.'"/><br>';    
          $dynamic_index_html .= '
            <div class="banner-container">
              <div class="banner col-centered-flex d-flex flex-column align-items-center justify-content-center "> 
                <div class="banner-inside border border-secondary"> 
                  <div class="name-container">
                    <span class="pname">'.stripslashes($postdata_array['display_name']).'</span> <br><span class="pdes">';
                      if(!empty($postdata_array['designation']))
                        $dynamic_index_html .= stripslashes($postdata_array['designation']).', ';
                        
                      if(!empty($postdata_array['company_name']))
                        $dynamic_index_html .= stripslashes($postdata_array['company_name']);
                        
                      $dynamic_index_html .= '</span>
                  </div>
                </div>  
              </div>';
          if(!empty($postdata_array['bio']))
              $dynamic_index_html .= '<div class="container"><p>'.($postdata_array['bio']).'</p></div>';

          $dynamic_index_html .= '
            </div>
            <div class="col">
              <div class="row icon-row">
                <div class="col col-md-2">
                </div>';

                if(!empty($postdata_array['whatsapp_number']))
                $dynamic_index_html .= '<div class="col col-md-2">                
                  <a href="https://api.whatsapp.com/send?phone='.stripslashes($postdata_array['whatsapp_number']).'&amp;text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20about%20your%20products%20and%20services."><img src="'.base_url().'sample_template/public/assets/icons/white-whatsapp-icon.png" class="icon" alt="WhatsApp"></a>
                </div>
                <div class="col col-md-2">
                  <a href="tel:'.stripslashes($postdata_array['whatsapp_number']).'" target="_blank"><img src="'.base_url().'sample_template/public/assets/icons/white-call-icon.png" class="icon" alt="Call me"></a>
                </div>';

                if(!empty($postdata_array['facebook_page_link']))
                $dynamic_index_html .= '<div class="col col-md-2">
                    <a target="_blank" href="'.stripslashes($postdata_array['facebook_page_link']).'"><img src="'.base_url().'sample_template/public/assets/icons/white-facebook-icon.png" class="icon" alt="WhatsApp"></a>
                  </div>
                  <div class="col col-md-2">
                    <a href="mailto:'.stripslashes($postdata_array['email_id']).'" target="_blank"><img src="'.base_url().'sample_template/public/assets/icons/white-gmail-icon.png" class="icon" alt="WhatsApp"></a>
                  </div>';
                
                
                $dynamic_index_html .= '
                  <div class="col col-md-2">
                  </div>
                </div>';
                $dynamic_index_html .= '
                <div class="row icon-row">
                  <div class="col col-md-2">
                  </div>
                  <div class="col col-md-2">
                    <a href="'.base_url().'vcf_files/'.stripslashes($postdata_array["name"]).'.vcf"><img src="'.base_url().'sample_template/public/assets/icons/white-save-me-icon.png" class="icon" alt="WhatsApp"></a>
                  </div>';

                if(!empty($postdata_array['linkedin_page_link']))
                  $dynamic_index_html .= '<div class="col col-md-2">
                          <a target="_blank" href="'.stripslashes($postdata_array['linkedin_page_link']).'"><img src="'.base_url().'sample_template/public/assets/icons/white-linkedin-icon.png" class="icon" alt="WhatsApp"></a>
                        </div>';

                if(!empty($postdata_array['instagram_page_link']))
                  $dynamic_index_html .= '<div class="col col-md-2">
                                      <a target="_blank" href="'.stripslashes($postdata_array['instagram_page_link']).'"><img src="'.base_url().'sample_template/public/assets/icons/white-instagram-icon.png" class="icon" alt="WhatsApp"></a>
                                    </div>';

                if(!empty($postdata_array['website_url']))
                  $website_url = stripslashes( $postdata_array['website_url']);
                else
                  $website_url = base_url().stripslashes($postdata_array["name"]);
                  $dynamic_index_html .= '
                  <div class="col col-md-2">
                    <a target="_blank" href="'.$website_url.'"><img src="'.base_url().'sample_template/public/assets/icons/white-browser-icon.png" class="icon" alt="WhatsApp"></a>
                  </div>
                  <div class="col col-md-2">
                  </div>
                </div>
              </div>';

              if(isset($postdata_array["hidden_deleted_video_file"]) && $postdata_array["hidden_deleted_video_file"] != "video_deleted")
              {}
              else { 
                if(!empty($video_file_name))
                  $dynamic_index_html .= '<div class="col col-centered-flex align-items-center justify-content-center footer"><div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="'.$video_file_name.'"></iframe>
                  </div></div><br/><br/>';
              }

            $dynamic_index_html .= '<!-- Accordian -->';
            $input_counter = $postdata_array['input_counter'];
            if(!empty($input_counter) && count($input_counter) > 0) {
              if($postdata_array['menus_opened_as'] !='' && $postdata_array['menus_opened_as']=="Accordian") {
                $dynamic_index_html .= '<div id="accordion" style="width:101%;margin-left:-4px;">';
                foreach($input_counter as $row) {
                  $accordian_label = $postdata_array['accordian_label_'.$row];
                  $accordian_content = $postdata_array['accordian_content_'.$row];
                  if(!empty($accordian_label) && !empty($accordian_content)) { 
                    $dynamic_index_html .= '<div class="container mb-1 shadow-none">
                      <div class="card-header p-3" id="headingOne">
                          <h6 class="m-0 font-size-14">
                              <a href="#'.strtolower(str_replace(" ","",$accordian_label)).'" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="'.strtolower(str_replace(" ","",$accordian_label)).'">
                                 '.$accordian_label.'
                              </a>
                          </h6>
                      </div>
      
                      <div id="'.strtolower(str_replace(" ","",$accordian_label)).'" class="collapsed collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                            '.$accordian_content.'
                          </div>
                      </div>
                  </div>';
                  }
                }
                $dynamic_index_html .= '</div><br/>';
              } else {
                $dynamic_index_html .= '<div class="" style="width:101%;margin-left:-4px;">';
                foreach($input_counter as $row) {
                  $accordian_label = $postdata_array['accordian_label_'.$row];
                  $accordian_content = $postdata_array['accordian_content_'.$row];
                  if(!empty($accordian_label) && !empty($accordian_content)) { 
                
                    $dynamic_index_html .= '<div class=" text-center">
                            <button type="button" class="btn btn-block waves-effect waves-light modal_button mb-2" data-toggle="modal" data-target="#'.strtolower(str_replace(" ","",$accordian_label)).'">'.$accordian_label.'</button>
                        </div>

                        <!-- sample modal content -->
                        <div id="'.strtolower(str_replace(" ","",$accordian_label)).'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="'.strtolower(str_replace(" ","",$accordian_label)).'Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                       
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                    '.$accordian_content.'
                                    </div>
                                   
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->';
                    
                  }
                }
                $dynamic_index_html .='</div><br/>';
              }
            }
           
       
            $dynamic_index_html .= '<!-- End Accordian -->';

            if(!empty($postdata_array['gmap_pin_url']))
            $dynamic_index_html .= '<div class="col col-centered-flex align-items-center justify-content-center footer">
                <a href="'.$postdata_array['gmap_pin_url'].'"><img src="'.base_url().'sample_template/public/assets/icons/white-map-icon.png" class="icon" alt="WhatsApp"></a>
              </div>';
            $dynamic_index_html .= '</div>
                    </div>
                    <div class="col-lg-3"></div>
                  </div>
                  <script src="'.base_url().'sample_template/public/assets/js/jquery-3.5.1.js"></script>
                  <script src="'.base_url().'sample_template/public/assets/libs/bootstrap/js/bootstrap.min.js"></script>
                  
                </body>
              </html>';
            echo $dynamic_index_html;
              ?>