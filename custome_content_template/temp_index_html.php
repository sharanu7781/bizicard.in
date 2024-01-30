<?php 

$dynamic_index_html = '<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Your Name - Designation</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">

        <link rel="stylesheet" href="'.base_url().'custome_content_template/template/css/main.css">
        <link rel="stylesheet" href="'.base_url().'custome_content_template/css/style.css">
        <link rel="stylesheet" href="'.base_url().'custome_content_template/fonts/flaticon/font/flaticon.css">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <div class="row row-centered">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 col-centered-flex align-items-center justify-content-center" style=" padding-bottom: 35px">
          <div class="col-lg6 col-centered-flex d-flex flex-column align-items-center justify-content-center " >
            <div class="col col-centered-flex d-flex flex-column align-items-center justify-content-center content_div" style="background-color: #f5e6ff;">
            <img src="'.base_url().'custome_content_template/img/gallery_image.png" alt="Company Logo" style="width:30%" />
            </div>
          <div class="col col-centered-flex d-flex flex-column align-items-center justify-content-center content_div" style="background-color: #f5e6ff;">
          
          <img alt="Your Name" src="'.base_url().'custome_content_template/img/avatar_user.png" class="img-fluid photo" />
          
            <span class="pname">Your Name</span>
              <span class="pdes">Your designation, Company Name</span>
              <p>Your bio details goes here</p>
              
            </div>              
            <div class="col contact_us_div" style="background-color: #6e4198;">
              <div class="row icon-row">
                <div class="col mini-box">                
                  <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/whatsapp-disable.png" class="icon" alt="WhatsApp"></a>
                </div>
                <div class="col mini-box">
                  <a href="javascript:void(0)" target="_blank"><img src="'.base_url().'custome_content_template/template/img/call-disable.png" class="icon" alt="Call me"></a>
                </div>
                <div class="col mini-box">
                  <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/FB-disable.png" class="icon" alt="Facebook"></a>
                </div>
                <div class="col mini-box">
                    <a href="javascript:void(0)"><img src="'.base_url().'/custome_premium_template/template/img/website-disable.png" class="icon" alt="Website"></a> 
                </div>
                
            </div>
            <div class="row icon-row">
                <div class="col mini-box">
                  <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/insta-disable.png" class="icon" alt="Instagram"></a>
                </div>
                <div class="col mini-box">
                  <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/Youtube-disable.png" class="icon" alt="Website"></a> 
                </div>
                <div class="col mini-box">
                  <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/save-disable.png" class="icon" alt="Save to Address Book"></a>
                </div>                
                <div class="col mini-box">
                  <a href="javascript:void(0)" target="_blank"><img src="'.base_url().'custome_content_template/template/img/email-disable.png" class="icon" alt="Send mail"></a>                
                </div>
            </div>
            <div class="col">
                <div class="col mini-box">
                  <a href="javascript:void(0)"><img src="'.base_url().'custome_content_template/template/img/map-disable.png" class="icon" alt="Maps"></a>
                </div>';

            $dynamic_index_html .= '</div>
            
          </div>
        </div>
    <div class="col-lg-3"></div>
    </div> <!-- row -->
    </div> <!-- container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
  </body>
</html>';
echo $dynamic_index_html;
?>
