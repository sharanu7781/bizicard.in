<?php 
if(!empty($postdata_array['website_url']))
$website_url = stripslashes( $postdata_array['website_url']);
else
$website_url = base_url().stripslashes($postdata_array["name"]);

$dynamic_index_html = '<!DOCTYPE html>
<html lang="en">
  <head>
        <title>'.$display_name.' - '.$designation.'</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">

        <link rel="stylesheet" href="'.base_url().'/custome_premium_template/template/css/main.css">
        <link rel="stylesheet" href="'.base_url().'/custome_premium_template/css/style.css">
        <link rel="stylesheet" href="'.base_url().'/custome_premium_template/fonts/flaticon/font/flaticon.css">
        
        <link href="https://kenwheeler.github.io/slick/slick/slick.css" rel="stylesheet" />
        <link href="https://kenwheeler.github.io/slick/slick/slick-theme.css" rel="stylesheet"/>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
         
        <style>.slick-carousel {width: 510px;margin: 30px auto;}.header_div{background-color:'.$content_background_color.';color:'.$content_font_color.'}.modal_setting_class{background-color: '.$modal_menu_background_color.'!important;color:'.$modal_menu_font_color.'!important;height: 40px !important;align-items: center !important;display: flex !important;justify-content: center !important;}a{color:'.$modal_menu_font_color.'!important;}/*.image_custome_style{width:400px !important;height:300px !important}*/.slider_image_style{width:500px !important;height:300px !important}#slider_section{/*width:500px;height:300px;padding-bottom:10px; padding-top:10px*/}.photo{border-radius:50%;margin-top:0px !important;width:100px;height:100px}.company_logo{padding-top:5px;}.sidebar-box {max-height: 100px;position: relative;overflow: hidden;}.sidebar-box .read-more { position: absolute; bottom: 0; left: 0;width: 100%; text-align: center;margin: 0; background-image: linear-gradient(to bottom, transparent, '.$content_background_color.');}.read_more_button{font-weight:bold;font-size:16px;color:#fff;opacity:0%;background-color:#8B8888 !important;}.pdes{padding-bottom:8px !important;}.profile_pic_row,.company_logo_row{padding-top:5px !important;padding-bottom:5px !important;}</style>
        <style>.required{color:red}.btn_share{background-color:'.$contact_background_color.';border-color:'.$contact_background_color.'}.btn_share:hover{background-color:'.$contact_background_color.';border-color:'.$contact_background_color.'} @media (max-width: 576px) {.slick-carousel { width: 260px; } }</style>
        <meta property="og:image" content="'.str_replace(" ", "", $avatar_filepath).'"  /> 
        <meta property="og:title" content="'.$display_name.'" />
        <meta property="og:description" content="'.strip_tags($bio).'" />
        <meta property="og:url" content="'.$website_url.'" />
        <meta property="og:type" content="website" />
        <meta property="og:image:width" content="1200"/>
        <meta property="og:image:height" content="630"/>
        
        
  </head>
  <body>
    <div class="container">
      <div class="row row-centered">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 col-centered-flex align-items-center justify-content-center" style=" padding-bottom: 35px;">
           ';

          // if(!empty($avatar_filepath))
          //   $dynamic_index_html .= '<div style="background-color: '.$content_background_color.';"><img src="'.$avatar_filepath.'" class="img-fluid photo" alt="'.$display_name.'" ></div>';
          $dynamic_index_html .= '
            <div class="col col-centered-flex d-flex flex-column align-items-center justify-content-center header_div" >';
          if(!empty($avatar_filepath) && !empty($co_logo_filepath))
            $dynamic_index_html .= '
              <div class="row">
                <div class="form-group row company_logo_row">
                  <div class="col-md-12 col-lg-12 float-center">
                    <img alt="'.$company_name.'" src="'.$co_logo_filepath.'" class="img-fluid company_logo" style="padding-bottom:5px"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group row profile_pic_row">
                  <div class="col-md-12 col-lg-12 float-center">
                    <img alt="'.$display_name.'" src="'.$avatar_filepath.'" class="img-fluid photo" />
                  </div>
                 
                </div>
              </div>';
          else if(!empty($avatar_filepath))
            $dynamic_index_html .= '<div class="row profile_pic_row">
                <div class="form-group row">
                  <div class="col-md-12 col-lg-12 float-center">
                    <img alt="'.$display_name.'" src="'.$avatar_filepath.'" class="img-fluid photo" />
                  </div>
                </div>
              </div>';
            
          $dynamic_index_html .= '</div>
          <div class="col-lg-12 col-centered-flex d-flex flex-column align-items-center justify-content-center " style="background-color: '.$content_background_color.';color:'.$content_font_color.'">
                    <span class="pname">'.$display_name.'</span>
                    <span class="pdes">'.$designation.'</span>
                    <span class="pdes"><b>'.$company_name.'</b></span>
                    <span class="share_button"></span>
            
            <div class="col col-centered-flex d-flex flex-column align-items-center justify-content-center " style="background-color: '.$content_background_color.';color:'.$content_font_color.'">
            <br>';
              if(!empty($bio)){
                $dynamic_index_html .= '<div class="sidebar-box">
                <div class="bio_text">'.$bio.'<br/>
                <p class="read-less"><a href="#" class="btn btn-secondary btn-block waves-effect read_less_button">Read Less</a></p>
                </div>
                <p class="read-more"><a href="#" class="btn btn-secondary btn-block waves-effect read_more_button">Read More</a></p>
              </div>';
              }
            
            
            $dynamic_index_html .=' <div>
              </div>
            </div>              
            <div class="col" style="background-color: '.$contact_background_color.';">
              <div class="row icon-row">
                    <!-- <div class="col mini-box"> -->
                    <!-- </div> -->
                      <div class="col mini-box">                
                        <a href="https://api.whatsapp.com/send?phone='.$whatsapp_number.'&amp;text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20about%20your%20products%20and%20services."><img src="'.base_url().'custome_premium_template/template/img/new-whatsapp.png" class="icon" alt="WhatsApp"></a>
                      </div>';
                      if(!empty($postdata_array['telegram_link']))
                        $dynamic_index_html .= '
                        <div class="col mini-box">
                          <a href="'.stripslashes($postdata_array['telegram_link']).'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/telegram-icon.png" class="icon" alt="Telegram"></a>
                        </div>';
                      else
                        $dynamic_index_html .= '
                        <div class="col mini-box">
                          <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/telegram_desabled-new.png" class="icon" alt="Telegram"></a>
                        </div>    ';
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="tel:'.$mobile_number.'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/new-call.png" class="icon" alt="Call me"></a>
                      </div>
                      <div class="col mini-box">
                        <a href="mailto:'.stripslashes($postdata_array['email_id']).'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/new-email.png" class="icon" alt="Send mail"></a>                
                      </div>                      
                    </div>
                    ';
                    $dynamic_index_html .= '<div class="row icon-row">';
                    if(!empty($postdata_array['facebook_page_link']))
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="'.stripslashes($postdata_array['facebook_page_link']).'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/new-fb.png" class="icon" alt="Facebook"></a>
                      </div>';
                    else
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/FB-disable.png" class="icon" alt="Facebook"></a>
                      </div>    ';
                      
                    if(!empty($postdata_array['instagram_page_link']))  
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="'.$postdata_array['instagram_page_link'].'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/new-insta.png" class="icon" alt="Instagram"></a>
                      </div>';
                    else
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/insta-disable.png" class="icon" alt="Instagram"></a>
                      </div>';

                    if(!empty($postdata_array['linkedin_page_link']))  
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="'.$postdata_array['linkedin_page_link'].'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/linkedin-icon-white.png" class="icon" alt="Instagram"></a>
                      </div>';
                    else
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/linkedin-icon-gray.png" class="icon" alt="Instagram"></a>
                      </div>';

                    if(!empty($postdata_array['twitter_page_link']))  
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="'.$postdata_array['twitter_page_link'].'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/new-twitter.png" class="icon" alt="Twitter"></a>
                      </div>';
                    else
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/twitter-disable.png" class="icon" alt="Twitter"></a>
                      </div>';

                    $dynamic_index_html .= '</div><div class="row icon-row">';

                      
                    if(!empty($postdata_array['youtube_page_link']))  
                      $dynamic_index_html .= '
                        <div class="col mini-box">
                          <a href="'.stripslashes($postdata_array['youtube_page_link']).'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/new-youtube.png" class="icon" alt="Youtube"></a> 
                        </div>';
                    else
                      $dynamic_index_html .= '
                        <div class="col mini-box">
                          <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/Youtube-disable.png" class="icon" alt="Youtube"></a> 
                        </div>';

                    if(!empty($website_url))                
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="'.stripslashes($website_url).'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/new-website.png" class="icon" alt="Website"></a> 
                      </div>';
                    else
                      $dynamic_index_html .= '
                      <div class="col mini-box">
                        <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/website-disable.png" class="icon" alt="Website"></a> 
                      </div>';

                    $dynamic_index_html .= '<div class="col mini-box">
                        <a href="'.base_url().'vcf_files/'.stripslashes($postdata_array["name"]).'.vcf" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/new-save.png" class="icon" alt="Save to Address Book"></a>
                      </div>';

                    if(!empty($postdata_array['gmap_pin_url']))
                      $dynamic_index_html .= '
                        <div class="col mini-box">
                          <a href="'.$postdata_array['gmap_pin_url'].'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/new-map.png" class="icon" alt="Maps"></a>
                        </div>';
                    else
                      $dynamic_index_html .= '
                        <div class="col mini-box">
                          <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/map-disable.png" class="icon" alt="Maps"></a>
                        </div>';

                    $dynamic_index_html .= '
                  </div>';
                  
                    

                    $dynamic_index_html .= '
                </div>    
                <div id="slider_section"></div>         
            </div>
       
            <div style="">';
            if(isset($postdata_array["hidden_deleted_video_file"]) && $postdata_array['hidden_deleted_video_file']!='' && $postdata_array["hidden_deleted_video_file"] != "video_deleted")
            {}
            else { 
              if(!empty($video_file_name))
                $dynamic_index_html .= '<!--<div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="'.$video_file_name.'"></iframe>
                </div>-->
                <div class="embed-responsive embed-responsive-16by9">
                <video controls>
                  <source src="'.$video_file_name.'" type="video/mp4">
                  <source src="'.$video_file_name.'" type="video/ogg">
                Your browser does not support the video tag.
                </video>
                </div>';
            }

            $dynamic_index_html .= '<div class="service_booking_div"></div>';
            
            $dynamic_index_html.= '</div>';

            $dynamic_index_html .= '<!-- Accordian -->';
            if(isset($postdata_array['input_counter']) && !empty($postdata_array['input_counter'])) {
              $input_counter = $postdata_array['input_counter'];
              if(!empty($input_counter) && count($input_counter) > 0) {
                
                $i = 1;
                foreach($input_counter as $row) {
                  $accordian_label = $postdata_array['accordian_label_'.$row];
                  $accordian_content = $postdata_array['accordian_content_'.$row];

                  if(isset($menus_file_path_array[$i]) && !empty($menus_file_path_array[$i]))
                    $accordian_content = '<img src="'.$menus_file_path_array[$i].'" class="img-fluid" alt="Menu Image" />'.$accordian_content;
                  else if(!empty($this->input->post("hidden_deleted_menu_image_".$i)))
                    $accordian_content = '<img src="'.$this->input->post("hidden_deleted_menu_image_".$i).'" class="img-fluid" alt="Menu Image" />'.$accordian_content;
                  else
                    $accordian_content = $accordian_content;

                  
                  if(!empty($accordian_label) && !empty($accordian_content) && $postdata_array['menus_opened_as'] == "Accordian") { 
                
                    // $dynamic_index_html .= '
                    // <p class="modal_setting_class">
                    //   <a data-toggle="collapse" href="#'.strtolower(str_replace(" ","",$accordian_label)).'" aria-expanded="false" aria-controls="'.strtolower(str_replace(" ","",$accordian_label)).'" ">
                    //   '.$accordian_label.'
                    //   </a>
                    // </p>
                    // <div class="collapse" id="'.strtolower(str_replace(" ","",$accordian_label)).'" data-parent="#accordion">
                    //   <div style="text-align:left;">
                    //     <p>'.$accordian_content.'</p>
                    //   </p>
                    // </div>
                    // </div>';

                    $dynamic_index_html .= '<div id="accordion">
                                              <div class="card mb-1 shadow-none">
                                                  <div class="" id="'.strtolower(str_replace(" ","",$accordian_label)).'">
                                                      <h6 class="m-0 font-size-14">
                                                          <a href="#collapse_menu_'.$i.'" class="modal_setting_class" data-toggle="collapse"
                                                                  aria-expanded="false"
                                                                  aria-controls="collapse_menu_'.$i.'">
                                                              '.$accordian_label.'
                                                          </a>
                                                      </h6>
                                                  </div>
                                                <div id="collapse_menu_'.$i.'" class="collapse" aria-labelledby="'.strtolower(str_replace(" ","",$accordian_label)).'" data-parent="#accordion">
                                                  <div class="card-body">
                                                      <div class="row">
                                                          <div class="col-lg-12">
                                                              <div class="form-group">
                                                              '.$accordian_content.'
                                                              </div>
                                                          </div> 
                                                      </div>                                                                
                                                  </div>
                                                </div>
                                              </div>';
                    
                  } 
                  if(!empty($accordian_label) && !empty($accordian_content) && $postdata_array['menus_opened_as'] == "Modal") { 
                    $dynamic_index_html .= '
                    <p class="modal_setting_class">
                      <a data-toggle="modal" data-target="#modal_menu_'.$i.'" href="javascript:void(0)">'.$accordian_label.'</a>
                    </p>

                      <!-- Modal -->
                      <div aria-hidden="true" aria-labelledby="modal_menu_'.$i.'" class="modal fade" id="modal_menu_'.$i.'" role="dialog"
                        tabindex="-1">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modal_menu_'.$i.'">'.$accordian_label.'</h5><button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                              <p>'.$accordian_content.'</p>
                            </div>
                          </div>
                        </div>
                      </div>';
                  }
                  $i++;
                }
                $dynamic_index_html .='<br/>';                
              }
            }

          $dynamic_index_html .= '                  
          </div>
    
        </div>
      
      <div class="col-lg-3"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
    
    <script>
      $(document).ready(function(){   
        //This code to reveal bioi details when clicked on "Read More" button
        var $el, $ps, $up, totalHeight;

        $(".sidebar-box .read_more_button").click(function() {
              
          totalHeight = 0

          $el = $(this);
          $p  = $el.parent();
          $up = $p.parent();
          //$ps = $up.find("p:not(".read-more")");
          
          // measure how tall inside should be by adding together heights of all inside paragraphs (except read-more paragraph)
          //$ps.each(function() {
            totalHeight += $(".bio_text").outerHeight();
            //alert($(".bio_text").outerHeight());
          //});
                
          $up
            .css({
              // Set height to prevent instant jumpdown when max height is removed
              "height": $up.height(),
              "max-height": 9999
            })
            .animate({
              "height": totalHeight
            });
          
          // fade out read-more
          $p.fadeOut();
          
          // prevent jump-down
          return false;
            
        });  

        $(".sidebar-box .read_less_button").click(function() {
              
            $up
            .css({
            // Set height to prevent instant jumpdown when max height is removed
            "height": $up.height(),
            "max-height": 9999
            })
            .animate({
            "height": totalHeight
            })
            .click(function() {
            //After expanding, click paragraph to revert to original state
            $p.fadeIn();
            $up.animate({
            "height": 120
            });
            });
            
        });

        //Get Slider information     
        $.ajax({
          url:"'.base_url().'digital_card/get_slider_information",
          type:"POST",
          data:{username:"'.$postdata_array["name"].'"},
          success:function(data){
            $("#slider_section").html($.trim(data));
            $(".slick-carousel").slick({
              arrows: false,
              centerPadding: "0px",
              infinite: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              centerMode: true
            });
          }
        });

        //Get service booking details
        $.ajax({
          url:"'.base_url().'digital_card/get_service_booking_details",
          type:"POST",
          data:{username:"'.$postdata_array["name"].'"},
          success:function(data){
            var data = $.trim(data);
            if(data !="" && data != "ERROR")
              $(".service_booking_div").html($.trim(data));
          }
        });

        //Check if bizicard user is logged in, if so then show share button
        $.ajax({
          url:"'.base_url().'digital_card/get_loggedin_userdata",
          type:"POST",
          success:function(data){
            if($.trim(data) != "false")
              $(".share_button").html(data);
          }
        });

        
      });
      //check mobile number validation
      function validate_mobile_number(value){
        $(".mobile_number").val($(".mobile_number").val().replace(/[^\d]/ig, ""));
      }

      function submit_data() {
        if($(".mobile_number").val() == ""){
          alert("Please enter mobile number");
          return false;
        }
        if($(".message_content").val() == ""){
          alert("Please enter message content");
          return false;
        }

        $.ajax({
          url:"'.base_url().'digital_card/submit_share_button_data",
          type:"POST",
          data:{country_code:$(".country_code option:selected").val(), mobile_number:$(".mobile_number").val(),message_content:$(".message_content").val(),user_id:'.$this->session->userdata("id").'},
          success:function(data) {
            if($.trim(data) != "false") {
              var win = window.open(data, "_blank");
              win.focus();
              $(".mobile_number").val(null);
              $("#myModal").modal("toggle");
            } else {
              alert("Error in process, please try again after some time");
              return false;
            }
          }
        });
      }
      
    </script>
  </body>
</html>';

echo $dynamic_index_html;


?>
