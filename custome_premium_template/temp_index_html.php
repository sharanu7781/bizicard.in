<?php 

$dynamic_index_html = '<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Your Name - Designation</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">

        <link rel="stylesheet" href="'.base_url().'/custome_premium_template/template/css/main.css">
        <link rel="stylesheet" href="'.base_url().'/custome_premium_template/css/style.css">
        <link rel="stylesheet" href="'.base_url().'/custome_premium_template/fonts/flaticon/font/flaticon.css">

  </head>
  <body>
    <div class="container">
      <div class="row row-centered">
        <div class="col-lg-3"></div>
            <div class="col-lg-6 col-centered-flex align-items-center justify-content-center" style="padding-bottom: 35px">
                <div class=" col-centered-flex d-flex flex-column align-items-center justify-content-center ">
                    <img src="'.base_url().'custome_premium_template/img/gallery_image.png" width="25%" height="15%" class="company_logo"  alt="Company Logo" >
                    <div class="col col-centered-flex d-flex flex-column align-items-center justify-content-center" style="background-color: #e0f2f1;">
                    <img src="'.base_url().'custome_premium_template/img/avatar_user.png" class="img-fluid photo" alt="Your Name" >
                            
                    <span class="pname">Your Name</span>
                    <span class="pdes">Designation</span> 
                    <span class="pdes">Company Name</span>
                    <p>Your Bio Details goes here</p>
                </div>              
                <div class="col"  style="background-color: #80cbc4;">
                    <div class="row icon-row">
                    <!-- <div class="col mini-box"> -->
                    <!-- </div> -->
                    <div class="col mini-box">                
                      <a href="javscript:void(0)"><img src="'.base_url().'/custome_premium_template/template/img/whatsapp-disable.png" class="icon" alt="WhatsApp"></a>
                    </div>
                    <div class="col mini-box">

                      <a href="javscript:void(0)" target="_blank"><img src="'.base_url().'/custome_premium_template/template/img/call-disable.png" class="icon" alt="Call me"></a>
                    </div>
                    <div class="col mini-box">
                        <a href="javascript:void(0)"><img src="'.base_url().'/custome_premium_template/template/img/FB-disable.png" class="icon" alt="Facebook"></a>
                      </div>    
                    <div class="col mini-box">
                        <a href="javascript:void(0)"><img src="'.base_url().'/custome_premium_template/template/img/website-disable.png" class="icon" alt="Website"></a> 
                    </div>
                    <!-- <div class="col mini-box"> -->

                    <!-- </div> -->
                  </div>
                  <div class="row icon-row">
                    <!-- <div class="col mini-box"> -->
                    <!-- </div> -->
                    <div class="col mini-box">
                      <a href="javscript:void(0)" target="_blank"><img src="'.base_url().'/custome_premium_template/template/img/save-disable.png" class="icon" alt="Save to Address Book"></a>
                    </div>
                    <div class="col mini-box">
                      <a href="javscript:void(0)" target="_blank"><img src="'.base_url().'/custome_premium_template/template/img/email-disable.png" class="icon" alt="Send mail"></a>                
                    </div>
                    <div class="col mini-box">
                      <a href="javascript:void(0)"><img src="'.base_url().'/custome_premium_template/template/img/insta-disable.png" class="icon" alt="Instagram"></a>
                    </div>
                    <div class="col mini-box">
                        <a href="javascript:void(0)"><img src="'.base_url().'custome_premium_template/template/img/Youtube-disable.png" class="icon" alt="Website"></a> 
                      </div>';
                    
                $dynamic_index_html .= '  </div>
                </div>
          </div>
        </div> <!-- col-6 -->
      </div> <!-- row -->
      <div class="col-lg-3"></div>
    </div> <!-- container -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
  </body>
</html>';

echo $dynamic_index_html;

?>
