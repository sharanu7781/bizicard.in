<?php $base_url = "http://localhost/Amruta_Workspace/bizicards/sample_template/"; ?>
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <title>NJ Design Studio - Neha Jathar</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900" rel="stylesheet">
        
            <link rel="stylesheet" href="<?php echo $base_url;?>css/main.css">
            <link rel="stylesheet" href="<?php echo $base_url;?>css/style.css">
            <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
            <!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> -->
            <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->
          </head>
          <body>
            <div class="container">
              <div class="row row-centered">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 col-centered-flex align-items-center justify-content-center" style="background-color: black; padding-bottom: 35px">
                  <div class="col-centered-flex d-flex flex-column align-items-center justify-content-center border border-dark" style="margin-top: 10px; padding-bottom:20px; background-color: black;">
                    <div class="banner-container">
                      <div class="banner col-centered-flex d-flex flex-column align-items-center justify-content-center "> 
                        <div class="banner-inside border border-secondary"> 
                          <div class="name-container">
                            <span class="pname">Amruta Phadke</span> <br><span class="pdes">Founder,NJ Studio</span>
                          </div>
                        </div>  
                      </div>
                    </div>
                    <div class="col">
                      <div class="row icon-row">
                        <div class="col mini-box">
                        </div><div class="col mini-box">                
                          <a href="https://api.whatsapp.com/send?phone=7588820262&amp;text=Got%20reference%20from%20your%20Digital%20vCard.%20Want%20to%20know%20more%20about%20your%20products%20and%20services."><img src="<?php echo $base_url;?>img/icons/white-whatsapp-icon.png" class="icon" alt="WhatsApp"></a>
                        </div>
                        <div class="col mini-box">
                          <a href="tel:7588820262" target="_blank"><img src="<?php echo $base_url;?>img/icons/white-call-icon.png" class="icon" alt="Call me"></a>
                        </div><div class="col mini-box">
                          <a href="https://goo.gl/maps/PYZvB9zcTDKiSRbf7"><img src="<?php echo $base_url;?><?php echo $base_url;?>img/icons/white-facebook-icon.png" class="icon" alt="WhatsApp"></a>
                        </div>
                        <div class="col mini-box">
                          <a href="mailto:designwithnj@gmail.com" target="_blank"><img src="<?php echo $base_url;?>img/icons/white-gmail-icon.png" class="icon" alt="WhatsApp"></a>
                        </div>
                        <div class="col mini-box">
                        </div>
                      </div>
                      <div class="row icon-row">
                        <div class="col mini-box">
                        </div>
                        <div class="col mini-box">
                          <a href=""><img src="<?php echo $base_url;?>img/icons/white-save-me-icon.png" class="icon" alt="WhatsApp"></a>
                        </div><div class="col mini-box">
                          <a href="https://goo.gl/maps/PYZvB9zcTDKiSRbf7"><img src="<?php echo $base_url;?>img/icons/white-linkedin-icon.png" class="icon" alt="WhatsApp"></a>
                        </div><div class="col mini-box">
                          <a href="https://goo.gl/maps/PYZvB9zcTDKiSRbf7"><img src="<?php echo $base_url;?>img/icons/white-instagram-icon.png" class="icon" alt="WhatsApp"></a>
                        </div>
                        <div class="col mini-box">
                          <a href="http://localhost/Amruta_Workspace/bizicards/amrutaphadke"><img src="<?php echo $base_url;?>img/icons/white-browser-icon.png" class="icon" alt="WhatsApp"></a>
                        </div>
                        <div class="col mini-box">
                        </div>
                      </div>
                    </div>
        
                    <div style="width: 101%; margin-left: -4px;">
                      <div class="about col-centered-flex d-flex flex-column align-items-center justify-content-center "> 
                        <div class="about-inside border border-secondary align-self-center justify-content-center"> 
        <button type="button" class="abutton" data-toggle="modal" data-target="#aboutModal">
          About
        </button>
                        </div>  
                      </div> 
                    </div>
        
                          <div style="width: 101%; margin-left: -4px;">
                            <div class="services col-centered-flex d-flex flex-column align-items-center justify-content-center "> 
                              <div class="services-inside border border-secondary align-self-center justify-content-center"> 
                                <button type="button" class="abutton " data-toggle="modal" data-target="#servicesmodal">
                                  Services
                                </button>                      
                              </div>  
                            </div>
                          </div>
        <!-- Button trigger modal -->
        
        
        <!-- Modal -->
        <div class="modal fade" id="servicesmodal" tabindex="-1" role="dialog" aria-labelledby="servicesmodalTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-bg">
              <div class="modal-header">
                <h5 class="modal-title" id="servicesmodalTitle">Services</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <div class="card card-body bgcard">
                              <div>
                                <p>
                                  Logo design, Stationary design
                                </p>
                                <p>
                                  Overall Branding and brand book design
                                </p>
                                <p>
                                  Campaign ideas and planning for social media
                                </p>
                                <p>
                                  <p>
                                  </p>
                                  Brochures and Catalogues
                                </p>
                                <p>
                                  Website design and development
                                </p>
                                <p>
                                  Press ads and pamphlets
                                </p>
                                <p>
                                  Packaging and booklets
                                </p>
                                <p>
                                  Websites and Emailers
                                </p>
                                <p>
                                  Menucards
                                </p>
                                <p>
                                  Designing for events
                                </p>
                                <p>
                                  Invitations, greeting cards and certificates
                                </p>
                                <p>
                                  Internal office branding
                                </p>
                                <p>
                                  Presentation design etc.
                                </p>
        
                                <p>
                                  You can contact us for any other kind of design requirements as well
                                </p>
                              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
                            </div> 
              </div>
            </div>
          </div>
        </div>
        <!-- Button trigger modal -->
        
        
        <!-- Modal -->
        <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-bg">
              <div class="modal-header">
                <h5 class="modal-title" id="aboutModalTitle">About us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
        <p>WHO WE ARE?</p>
        <p>Creative Brand Designer with 10+ years of experience in designing customized brand identities & products. We provide 360 degree design identities for print and digital media.</p>
        <p></p>
        <br>
        <hr>
        <p>Worked for several top clients like 
        <p>  Abbott, </p>
        <p>  Glenmark, </p>
        <p>  Kaushalya Hospital, </p>
        <p>  Joyalukas, </p>
        <p>  Cipla, </p>
        <p>  Urban Dhaba and </p>
        <p>  many more</p>
        </p>
        <p></p>
        <hr>
        <br>
        <p>WHY US ?</p>
        <p>We don’t just design.</p>
        <p>We give creative design solutions </p>
        <p>which are target audience</p>
        <p>and concept based with</p>
        <p>a result driven approach.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
                          <div class="collapse" id="about">
                            <div class="card card-body bgcard">
                              <h5>
                                About
                              </h5>
                              <div class"col-6">
        
        <p>WHO WE ARE?</p>
        <p>Creative Brand Designer with 10+ years of experience in designing customized brand identities & products. We provide 360 degree design identities for print and digital media.</p>
        <p></p>
        <br>
        <hr>
        <p>Worked for several top clients like 
        <p>  Abbott, </p>
        <p>  Glenmark, </p>
        <p>  Kaushalya Hospital, </p>
        <p>  Joyalukas, </p>
        <p>  Cipla, </p>
        <p>  Urban Dhaba and </p>
        <p>  many more</p>
        </p>
        <p></p>
        <hr>
        <br>
        <p>WHY US ?</p>
        <p>We don’t just design.</p>
        <p>We give creative design solutions </p>
        <p>which are target audience</p>
        <p>and concept based with</p>
        <p>a result driven approach.</p>
        <!-- <hr> -->
                              </div>  
                            </div>
                          </div>          
                  </div>
                  <div class="col col-centered-flex align-items-center justify-content-center footer">
                    <a href="https://goo.gl/maps/BsysK6h95JdqwZTw7"><img src="<?php echo $base_url;?>img/icons/white-map-icon.png" class="icon" alt="WhatsApp"></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3"></div>
            </div>
          </body>
        </html>
        
        