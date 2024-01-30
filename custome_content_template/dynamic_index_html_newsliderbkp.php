<?php 
if(!empty($postdata_array['website_url']))
$website_url = stripslashes( $postdata_array['website_url']);
else
$website_url = base_url().stripslashes($postdata_array["name"]);

$dynamic_index_html = '<!DOCTYPE html>
<html lang="en">
  <head>
        <title>'.$display_name.'</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">

        <link rel="stylesheet" href="'.base_url().'custome_content_template/template/css/main.css">
        <link rel="stylesheet" href="'.base_url().'custome_content_template/css/style.css">
        <link rel="stylesheet" href="'.base_url().'custome_content_template/fonts/flaticon/font/flaticon.css">
        
        <link href="https://kenwheeler.github.io/slick/slick/slick.css" rel="stylesheet" />
        <link href="https://kenwheeler.github.io/slick/slick/slick-theme.css" rel="stylesheet"/>
        
        <style>.slick-carousel {width: 510px;margin: 30px auto;}
          .header_div{background-color: '.$header_background_color.';color:'.$header_font_color.'}.content_div{background-color: '.$content_background_color.';color:'.$content_font_color.' !important}.contact_us_div{background-color: '.$contact_background_color.';color:'.$contact_font_color.';padding-bottom:5px !important;}.photo{border-radius:50%;margin-top:0px !important;width:100px;height:100px}.company_logo{padding-top:5px;}.sidebar-box {max-height: 100px;position: relative;overflow: hidden;}.sidebar-box .read-more { position: absolute; bottom: 0; left: 0;width: 100%; text-align: center;
          margin: 0; background-image: linear-gradient(to bottom, transparent, '.$content_background_color.');}.read_more_button{font-weight:bold;font-size:16px;color:#fff;opacity:0%;background-color:#8B8888 !important;}.pdes{padding-bottom:8px !important;}.profile_pic_row,.company_logo_row{padding-top:5px !important;padding-bottom:5px !important;}.btn_share{background-color:'.$contact_background_color.';border-color:'.$contact_background_color.'}.btn_share:hover{background-color:'.$contact_background_color.';border-color:'.$contact_background_color.'} @media (max-width: 576px) {.slick-carousel { width: 260px; } }</style>

        <meta property="og:image" content="'.str_replace(" ","",$avatar_filepath).'">  
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
        <div class="col-lg-6 col-centered-flex align-items-center justify-content-center" style=" padding-bottom: 35px">
          <div class="col-lg6 col-centered-flex d-flex flex-column align-items-center justify-content-center header_div" style="background-color: '.$content_background_color.'" >';
          //if(!empty($co_logo_filepath))
            //$dynamic_index_html .= '<div class="col col-centered-flex d-flex flex-column align-items-center justify-content-center"  style="background-color:#ffffff;padding-bottom: 5px;"></div>';

          $dynamic_index_html .= '
            <div class="col col-centered-flex d-flex flex-column align-items-center justify-content-center content_div" >';
          if(!empty($avatar_filepath) && !empty($co_logo_filepath))
            $dynamic_index_html .= '
              <div class="row company_logo_row">
                <div class="form-group row" style="margin-bottom:0px !important">
                  <div class="col-md-12 col-lg-12 float-center">
                    <img alt="'.$company_name.'" src="'.$co_logo_filepath.'" class="img-fluid company_logo" style="padding-bottom:5px"/>
                  </div>
                </div>
              </div>
              <div class="row profile_pic_row">
                <div class="form-group row" style="margin-bottom:0px !important">
                  <div class="col-md-12 col-lg-12 float-center">
                    <img alt="'.$display_name.'" src="'.$avatar_filepath.'" class="img-fluid photo" />
                  </div>
                </div>
              </div>';
          else if(!empty($avatar_filepath))
            $dynamic_index_html .= '
            <div class="row profile_pic_row">
                <div class="form-group row">
                  <div class="col-md-12 col-lg-12 float-center">
                    <img alt="'.$display_name.'" src="'.$avatar_filepath.'" class="img-fluid photo" />
                  </div>
                </div>
              </div>';
          
          $dynamic_index_html .= '
              <span class="pname">'.$display_name.'</span>
              <span class="pdes">';
              $dynamic_index_html .= $designation.', ';
                
              $dynamic_index_html .= $company_name;
              
              $dynamic_index_html .= '</span>';
              if(!empty($bio)){
                $dynamic_index_html .= '<div class="sidebar-box">
                <div class="bio_text">'.$bio.'<br/>
                <p class="read-less"><a href="#" class="btn btn-secondary btn-block waves-effect read_less_button">Read Less</a></p>
                </div>
                <p class="read-more"><a href="#" class="btn btn-secondary btn-block waves-effect read_more_button">Read More</a></p>
              </div>';
              }
              $dynamic_index_html .='
              
            </div>              
            <div class="col contact_us_div">
              <div class="row icon-row">
                <div class="col mini-box">                
                  <a href="https://api.whatsapp.com/send?phone='.$whatsapp_number.'&amp;text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20about%20your%20products%20and%20services."><img src="'.base_url().'custome_content_template/template/img/new-whatsapp.png" class="icon" alt="WhatsApp"></a>
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
                  <a href="tel:'.$mobile_number.'" target="_blank"><img src="'.base_url().'custome_content_template/template/img/new-call.png" class="icon" alt="Call me"></a>
                </div>
                <div class="col mini-box">
                  <a href="mailto:'.stripslashes($postdata_array['email_id']).'" target="_blank"><img src="'.base_url().'custome_content_template/template/img/new-email.png" class="icon" alt="Send mail"></a>                
                </div>
                ';
              $dynamic_index_html .= '</div>';
              $dynamic_index_html .= '<div class="row icon-row">';
              if(isset($postdata_array['facebook_page_link']) && !empty($postdata_array['facebook_page_link']))
                $dynamic_index_html .= '
                  <div class="col mini-box">
                    <a href="'.stripslashes($postdata_array['facebook_page_link']).'" target="_blank"><img src="'.base_url().'custome_content_template/template/img/new-fb.png" class="icon" alt="Facebook"></a>
                  </div>';
              else
                $dynamic_index_html .= '
                  <div class="col mini-box">
                    <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/FB-disable.png" class="icon" alt="Facebook"></a>
                  </div>';

              if(isset($postdata_array['instagram_page_link']) && !empty($postdata_array['instagram_page_link']))    
                $dynamic_index_html .= '
                  <div class="col mini-box">
                    <a href="'.stripslashes($postdata_array['instagram_page_link']).'" target="_blank"><img src="'.base_url().'custome_content_template/template/img/new-insta.png" class="icon" alt="Instagram"></a>
                  </div>';
              else
                $dynamic_index_html .= '
                  <div class="col mini-box">
                    <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/insta-disable.png" class="icon" alt="Instagram"></a>
                  </div>';

              if(!empty($postdata_array['linkedin_page_link']))  
                $dynamic_index_html .= '
                <div class="col mini-box">
                  <a href="'.$postdata_array['linkedin_page_link'].'" target="_blank"><img src="'.base_url().'custome_premium_template/template/img/linkedin-icon-white.png" class="icon" alt="Linkedin"></a>
                </div>';
              else
                $dynamic_index_html .= '
                <div class="col mini-box">
                  <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/linkedin-icon-gray.png" class="icon" alt="Linkedin"></a>
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
              if(isset($postdata_array['youtube_page_link']) && !empty($postdata_array['youtube_page_link']))  
                $dynamic_index_html .= '
                  <div class="col mini-box">
                    <a href="'.stripslashes($postdata_array['youtube_page_link']).'" target="_blank"><img src="'.base_url().'custome_content_template/template/img/new-youtube.png" class="icon" alt="Youtube"></a> 
                  </div>';
              else
                $dynamic_index_html .= '
                  <div class="col mini-box">
                    <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/Youtube-disable.png" class="icon" alt="Youtube"></a> 
                  </div>';            
            
              if(!empty($website_url))                
                $dynamic_index_html .= '
                <div class="col mini-box">
                  <a href="'.stripslashes($website_url).'"><img src="'.base_url().'custome_premium_template/template/img/new-website.png" class="icon" alt="Website"></a> 
                </div>';
              else
                $dynamic_index_html .= '
                <div class="col mini-box">
                  <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/website-disable.png" class="icon" alt="Website"></a> 
                </div>';           

              $dynamic_index_html .= '<div class="col mini-box">
                  <a href="'.base_url().'vcf_files/'.stripslashes($postdata_array["name"]).'.vcf"><img src="'.base_url().'custome_content_template/template/img/new-save.png" class="icon" alt="Save to Address Book"></a>
                </div>';
            
              if(!empty($postdata_array['gmap_pin_url']))
                $dynamic_index_html .= '
                  <div class="col">
                    <a href="'.$postdata_array['gmap_pin_url'].'" target="_blank"><img src="'.base_url().'custome_content_template/template/img/new-map.png" class="icon" alt="Maps"></a>
                  </div>';
              else
                $dynamic_index_html .= '
                  <div class="col ">
                    <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/map-disable.png" class="icon" alt="Maps"></a>
                  </div>';
            $dynamic_index_html .= '</div>';
            $dynamic_index_html .= '   </div>  ';  
            $dynamic_index_html .= '
            <div id="slider_section"></div>';     
            $dynamic_index_html .= '</div>';
            
            $dynamic_index_html .='
          </div>
        </div>
    <div class="col-lg-3"></div>
    </div> <!-- row -->
    </div> <!-- container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
