<?php 
$dynamic_index_html = '    
        <!DOCTYPE html>
        <html>        
        <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
        <head>        
        <base>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8"> 
        <link rel="stylesheet" href="'.base_url().'premium_template/css/header.css">
        <link rel="stylesheet" href="'.base_url().'premium_template/css/page.css">
        <link rel="stylesheet" href="'.base_url().'premium_template/css/app.css">
        <link rel="stylesheet" href="'.base_url().'premium_template/css/footer.css">  
        <link rel="stylesheet" href="'.base_url().'premium_template/public/assets/css/bootstrap.min.css">      
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">        
        <script>        
            var globalPortalId = "vcards";
            var globalWsUrl = "ZugmugWS/index.html";
        </script>        
        <title>'.stripslashes($postdata_array['display_name']).'</title>
        <link rel="stylesheet" href="'.base_url().'premium_template/bootstrap-3.3.7/css/bootstrap.css">
        <script type="text/javascript" src="'.base_url().'premium_template/bootstrap-3.3.7/js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="'.base_url().'premium_template/bootstrap-3.3.7/js/bootstrap.js"></script>
        <script src="'.base_url().'premium_template/Js/preloaders.js"></script>
        <link rel="stylesheet" href="'.base_url().'premium_template/fontawesome-free-5.2.0/css/fontawesome.css">
        <link rel="stylesheet" href="'.base_url().'premium_template/css/custom-layout-clasess.css">
        <link rel="stylesheet" href="'.base_url().'premium_template/css/grapejs-latest/custom-layout-clasess.css">        
        <meta property="og:title" content="'.stripslashes($postdata_array['display_name']).'"/>
        <meta property="og:url" content="bizicard.in"/>    
        </head>        
        <body ng-app="header" ng-controller="register-login-controller as lvm">         
        <style>
        .c27731
        {
        height:auto;
        width:100%;
        outline-offset:4px;
        }        
        .c27821
        {
        width:100%;
        min-height:0;
        }        
        .c27846
        {
        width:100%;
        min-height:inherit;
        float:none;
        }        
        .c27871
        {
        width:100%;
        min-height:inherit;
        }       
        .c27952
        {
        height:auto;
        width:100%;
        outline-offset:4px;
        background-color:#f9d1e5;
        text-align:center;
        float:none;
        }
        .c56061
        {
        height:auto;
        padding-top:0px;
        width:100%;
        outline-offset:4px;
        float:none;
        background-image: url("images/back.jpg");
        background-repeat: no-repeat;
        background-position: left top;
        background-size: cover;
        }        
        .c28262
        {
        color:black;
        padding:25px 0 0 0;
        width:100px;
        float:none;
        }
        .c108288
        {
        padding:10px 10px 0 10px;
        color:#751139;
        font-family:"Montserrat", sans-serif;
        text-align:center;
        float:none;
        font-weight:bold;
        font-size:16px;
        }        
        .c108352
        {
        padding:5px 10px 0px 10px;
        color:#751139;
        font-size:14px;
        font-family:"Montserrat", sans-serif;
        text-align:center;
        float:none;
        font-weight:bold;
        }        
        .aboutme
        {
        padding:5px 10px 25px 10px;
        color:#751139;
        font-size:13px;
        font-family:"Montserrat", sans-serif;
        text-align:justify;
        float:none;
        }  
        .c56544
        {
        padding:10px;
        font-family:"Montserrat", sans-serif;
        color:#fff;
        background: rgba(0, 0, 0, 0.5);
        margin:0px 0px 0px 0px;
        font-size:14px;
        font-weight:600;
        background-color:#f190bb;
        }
        .c56594
        {
        height:auto;
        width:100%;
        outline-offset:4px;
        margin:0 0 0 0;
        text-align:center;
        background-color:#e94582;
        }        
        .c56690
        {
        color:black;
        padding:0 0 0 0;
        width:42px;
        height:42px;
        }        
        .c136914
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px;
        float:none;
        }  
        .c137207
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px;
        }        
        .c137300
        {
        color:black;
        width:42px;
        height:42px;
        }        
        .c190811
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px;
        }  
        .c190854
        {
        color:black;
        width:42px;
        height:42px;
        }
        .c244365
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px 5px 0 0;
        }
        .c244448
        {
        color:black;
        width:42px;
        height:42px;
        }
        .c298075
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px 0 0 0;
        }   
        .c298162
        {
        color:black;
        width:42px;
        height:42px;
        }
        .three-grid-container-2
        {
        padding:0 0 0 0;
        }
        .three-grid-container-1
        {
        padding:0   0;
        }
        .three-grid-container-3
        {
        padding:0 0 0 0;
        }
        .c627188
        {
        padding:10px;
        margin:0px;
        background: rgba(0, 0, 0, 0.5);
        color:#fff;
        font-family:"Montserrat", sans-serif;
        font-size:14px;
        font-weight:600;
        background-color:#e94582;
        }
        .c627391
        {
        height:auto;
        width:100%;
        outline-offset:4px;
        text-align:center;
        background-color:#f190bb;
        }
        .c627456
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px;
        }
        .c627551
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px;
        }        
        .c627602
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:20px 0 0 0;
        }   
        .c628095
        {
        color:black;
        width:42px;
        height:42px;
        }        
        .c708616
        {
        color:black;
        width:42px;
        height:42px;
        }        
        .c762265
        {
        color:black;
        width:42px;
        height:42px;
        }        
        .c845407
        {
        padding:10px;
        font-size:14px;
        font-family:"Montserrat", sans-serif;
        color:#ffffff;
        background: rgba(0, 0, 0, 0.5);
        font-weight:600;
        margin:0px;
        background-color:#c4124f;
        }    
        .c845706
        {
        height:auto;
        width:100%;
        outline-offset:4px;
        text-align:center;
        background-color:#c4124f;
        }  
        .c845767
        {
        padding:10px;
        background: rgba(0, 0, 0, 0.5); 
        color:#ffffff;
        font-size:14px;
        font-family:"Montserrat", sans-serif;
        font-weight:600;
        margin:0px;
        background-color:#751139;
        }
        .c845868
        {
        height:auto;
        width:100%;
        outline-offset:4px;
        text-align:center;
        background-color:#751139;
        }
        .c845934
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px;
        }
        .c845985
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px 0 0 0;
        }
        .c846066
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px;
        }
        .c846117
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px;
        }
        .c846168
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px;
        }
        .c846219
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px 5px 0 0;
        }        
        .c846270
        {
        display:inline-block;
        padding:5px;
        min-height:50px;
        min-width:50px;
        margin:0px 0 10px 0;
        }        
        .c846688
        {
        color:black;
        width:42px;
        height:42px;
        }  
        .c927165
        {
        color:black;
        width:42px;
        height:42px;
        }        
        .c980927
        {
        color:black;
        width:42px;
        height:42px;
        }
        .c1034696
        {
        color:black;
        width:42px;
        height:42px;
        }        
        .c1088532
        {
        color:black;
        width:42px;
        height:42px;
        }        
        .c1142427
        {
        color:black;
        width:42px;
        height:42px;
        }    
        .c1196358
        {
        color:black;
        width:42px;
        height:42px;
        }        
        .c1546431
        {
        padding:0 0px 0 0px;
        margin:0 0 0 0;
        color:#ffffff;
        font-family:"Montserrat", sans-serif;
        font-size:10px;
        text-align:center;
        }          
        span
        {
        color:white;
        font-size:12px;
        font-family:"Montserrat", sans-serif;
        text-align:center;
        }        
        .c1546567
        {
        display:inline-block;
        padding:5px 5px 5px 5px;
        min-height:0;
        min-width:50px;
        text-align:center;
        }        
        .c1546703
        {
        height:auto;
        width:100%;
        text-align:center;
        background-color:#000000;
        margin:20px 0 0 0;
        }         
        </style>
        
        
        <div class="summary">
        <div class="c27731">
        <div class="three-grid-flex-container">
        <div class="three-grid-container-1"><div class="c27821"></div></div>
        
        <div class="three-grid-container-2">
        
        <div class="c27846">
        <div class="c27952">';
        if(!empty($slider_image_one_name) || !empty($slider_image_two_name) || !empty($slider_image_three_name)) {
          $dynamic_index_html .= '<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner" role="listbox">';
           
            $active = "";
            if(empty($slider_image_one_name))
              $active = "active";
            else if(empty($slider_image_two_name))
              $active = "active";
            else if(empty($slider_image_three_name))
              $active = "active";
              
              if(isset($postdata_array['hidden_deleted_flag_slider_image_one']) && $postdata_array["hidden_deleted_flag_slider_image_one"] =="slider_one_deleted") {

              } else {
                  if(!empty($slider_image_one_name))    
                    $dynamic_index_html .= '<div class="carousel-item active">
                                          <figure><img class="d-block img-fluid" src="'.$slider_image_one_name.'" alt="First Slide"></figure>
                                      </div>';
              }

              if(isset($postdata_array['hidden_deleted_flag_slider_image_two']) && $postdata_array["hidden_deleted_flag_slider_image_two"] =="slider_two_deleted") {

              } else {
                  if(!empty($slider_image_two_name))
                    $dynamic_index_html .= '<div class="carousel-item '.$active.'">
                                          <figure><img class="d-block img-fluid" src="'.$slider_image_two_name.'" alt="Second Slide"></figure>
                                        </div>';
              }

              if(isset($postdata_array['hidden_deleted_flag_slider_image_three']) && $postdata_array["hidden_deleted_flag_slider_image_three"] =="slider_three_deleted") {

              } else {
                  if(!empty($slider_image_three_name))
                    $dynamic_index_html .= '<div class="carousel-item '.$active.'">
                                            <figure><img class="d-block img-fluid " src="'.$slider_image_three_name.'" alt="Third Slide"></figure>
                                        </div>';
              }

              $dynamic_index_html .= '               
                </div>
            </div>';
          }
        if(!empty($avatar_filepath))
          $dynamic_index_html .= '<img class="photo circle_image" alt="'.stripslashes($postdata_array['display_name']).'" src="'.$avatar_filepath.'"/>';  
        
        $dynamic_index_html .='
        <div class="c108288">'.stripslashes($postdata_array['display_name']).'</div>
        <div class="c108352">'.stripslashes($postdata_array['designation']).'</div>
        <div class="aboutme">'.stripslashes($postdata_array['bio']).'</div>
        </div>
        
        <div class="c56061">
        
        <div class="c56544">Profile:</div>
        <div class="c627391">
        <a class="c627456" onclick="aboutme()"><img src="'.base_url().'premium_template/images/about me.png" class="c628095"/><br><span>About Me</span></a>
        <a class="c627551" onclick="achievement()"><img src="'.base_url().'premium_template/images/awards.png" class="c708616"/><br><span>Achievement</span></a>
        </div>
        
        
        
        
        <div class="c627188">Contact :</div>
        <div class="c56594">
        <a href="tel:'.stripslashes($postdata_array['whatsapp_number']).'" class="c136914"><img src="'.base_url().'premium_template/public/assets/images/social_media_icons/enable-call.png" class="c56690"/><br><span>Call Me</span></a>
        
        <a href="mailto:'.stripslashes($postdata_array['email_id']).'" class="c137207"><img src="'.base_url().'premium_template/public/assets/images/social_media_icons/enable-email.png" class="c137300"/><br><span>Email Me</span></a>
        
        <a href="https://api.whatsapp.com/send?phone='.stripslashes(str_replace("+","",$postdata_array['whatsapp_number'])).'&amp;text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20about%20your%20products%20and%20services." class="c190811">
        <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/enable-whatsapp.png" class="c190854"/><br><span>Whatsapp</span>
        </a>
        <a href="'.base_url().'vcf_files/'.stripslashes($postdata_array["name"]).'.vcf" class="c298075"><img src="'.base_url().'premium_template/public/assets/images/social_media_icons/enable-save.png" class="c298162"/>
        <br><span>Save Me</span></a>
        </div>        
        <div class="c845407">Company:</div>
        <div class="c845706">';

        if(!empty($postdata_array['website_url']))
          $website_url = stripslashes($postdata_array['website_url']);
        else
          $website_url = base_url().stripslashes($postdata_array["name"]);
        
        $dynamic_index_html .= '<a href="'.$website_url.'" target="_blank" class="c845934">
        <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/enable-website.png" class="c846688"/><br><span>Visit Website</span>
        </a>';
        
        /*<a href="http://jugmug.biz/default/" target="_blank" class="c845934">
        <img src="'.base_url().'premium_template/images/browser.png" class="c846688"/><br><span>Jugmug.biz</span>
        </a>
        
        <a href="https://www.bizicard.in/" target="_blank" class="c845985" >
        <img src="'.base_url().'premium_template/images/browser.png" class="c927165"/><br><span>bizicard.in</span>
        </a>';*/


        if(!empty($postdata_array['gmap_pin_url']))
          $dynamic_index_html .= '<a href="https://goo.gl/maps/Gy28bkB1sjpF6Lt47" target="_blank" class="c845985" >
            <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/enable-map.png" class="c927165"/><br><span>Location</span>
            </a>';
        else 
          $dynamic_index_html .= '<a href="javascript:void(0)" target="_blank" class="c845985" >
            <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/disable-map.png" class="c927165"/><br><span>Location</span>e
            </a>';
        
        $dynamic_index_html .= '</div>';
        
        $dynamic_index_html .= '<div class="c845767">Follow Me:</div>
        <div class="c845868">';

        if(!empty($postdata_array['facebook_page_link']))
          $dynamic_index_html .= '<a href="'.stripslashes($postdata_array['facebook_page_link']).'" class="c846066">
            <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/enable-facebook.png" class="c980927"/>
            </a>';
        else
          $dynamic_index_html .= '<a href="javascript:void(0)" class="c846066">
            <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/disable-facebook.png" class="c980927"/>
            </a>';
        
        if(!empty($postdata_array['instagram_page_link']))
          $dynamic_index_html .= '<a href="'.stripslashes($postdata_array['instagram_page_link']).'" class="c846117">
            <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/enable-instapng" class="c1034696"/>
            </a>';
        else
          $dynamic_index_html .= '<a href="javascript:void(0)" class="c846117">
            <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/disable-insta.png" class="c1034696"/>
            </a>';
        
        if(!empty($postdata_array['linkedin_page_link']))
          $dynamic_index_html .= '<a href="'.stripslashes($postdata_array['linkedin_page_link']).'" class="c846270">
            <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/enable-linkedin.png" class="c1196358"/>
            </a>';
        else
          $dynamic_index_html .= '<a href="javascript:void(0)" class="c846270">
            <img src="'.base_url().'premium_template/public/assets/images/social_media_icons/disable-linkedin.png" class="c1196358"/>
            </a>';
        
        
        
      $dynamic_index_html .= '</div>
        </div>';

      if(isset($postdata_array["hidden_deleted_video_file"]) && $postdata_array["hidden_deleted_video_file"] != "video_deleted")
      {}
      else { 
        if(!empty($video_file_name))
          $dynamic_index_html .= '<div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="'.$video_file_name.'"></iframe>
          </div>';
      }
    
        $dynamic_index_html .= '</div>
        <div class="three-grid-container-3"><div class="c27871"></div></div>
        </div>
        </div>
        </div>
        </div>
        
        <script> 
                var Window; 
          
                // Function that open the new Window 
                function aboutme() { 
                    Window = window.open( 
                      "premium_template/about me/about me.html", 
                        "_blank", "width=100%"); 
                } 
          
          
            function achievement() { 
                    Window = window.open( 
                      "premium_template/about me/achievement.html", 
                        "_blank", "width=100%"); 
                } 
            
            
          
          
                // function that Closes the open Window 
                function windowClose() { 
                    Window = window.close(); 
                } 
          </script> 
          <script src="'.base_url().'premium_template/public/assets/js/jquery-3.5.1.js"></script>
          <script src="'.base_url().'premium_template/public/assets/libs/bootstrap/js/bootstrap.min.js"></script>
        
        </body>
        </html>
        
        ';
        echo $dynamic_index_html;
        ?>