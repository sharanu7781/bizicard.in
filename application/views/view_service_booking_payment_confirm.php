<?php $this->load->view('layouts/service_header'); ?>

    <div class="account-pages pt-sm-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-10 col-xl-10">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            
                            <div class="row">
                                <div class=" col-lg-2"></div>
                                <div class=" col-lg-8">
                                    <h4 class="text-center">Added appointment details here</h4>
                                </div>
                                <div class=" col-lg-2"></div>
                            </div>
                            <div class="row">
                                <div class=" col-lg-4"></div>
                                <div class=" col-lg-4"></div>
                                <div class=" col-lg-4"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                        
                                            <div class="card-body">
                                                <input type="hidden" name="USER_ID" value="<?php echo $USER_ID;?>" class="form-control user_id"/>
                                                <input type="hidden" name="USER_EMAIL" value="<?php echo $USER_EMAIL;?>" class="form-control "/>
                                                <input type="hidden" name="SITE_USER_NAME" value="<?php echo $this->input->post("SITE_USER_NAME");?>" class="form-control user_id"/>
                                                <input type="hidden" name="SITE_MOBILE_NUMBER" value="<?php echo $this->input->post("SITE_MOBILE_NUMBER");?>" class="form-control user_id"/>
                                                <input type="hidden" name="SITE_EMAIL_ID" value="<?php echo $this->input->post("SITE_EMAIL_ID");?>" class="form-control user_id"/>
                                                <input type="hidden" name="SELECT_SERVICE" value="<?php echo $this->input->post("SELECT_SERVICE");?>" class="form-control user_id"/>
                                                <input type="hidden" name="SERVICE_SLOT" value="<?php echo $this->input->post("SERVICE_SLOT");?>" class="form-control user_id"/>
                                                <input type="hidden" name="SERVICE_PRICE" value="<?php echo $this->input->post("SERVICE_PRICE");?>" class="form-control user_id"/>

                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2"> </div>
                                                    <div class="col-lg-8 col-md-8">   
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">   
                                                                <div class="form-group">
                                                                    <label class="label">Name - <?php echo $this->input->post("SITE_USER_NAME");?></label>                                                                        
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label">Mobile Number - <?php echo $this->input->post("SITE_MOBILE_NUMBER");?></label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label">Email Address - <?php echo $this->input->post("SITE_EMAIL_ID");?></label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label">Selected Service - <?php echo $this->input->post("SELECTED_SERVICE_TEXT");?></label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label">Date and Time for booking - <?php echo date("d M Y", strtotime($this->input->post("SERVICE_DATE")))." between ".$this->input->post("SERVICE_SLOT");?></label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="label">Price - <?php echo "&#x20B9;".$this->input->post("SERVICE_PRICE");?></label>
                                                                </div>
                                                            </div>
                                                        </div>                                                            
                                                    </div>
                                                    <div class="col-lg-2 col-md-2"> </div>
                                                </div>                                                

                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2"> </div>
                                                    <div class="col-lg-8 col-md-8">
                                                        <?php 
                                                        $razorpay_values_array = array(
                                                                                    "payment_price"=>$this->input->post("SERVICE_PRICE"), 
                                                                                    "payment_for" => "Payment for Service Booking", 
                                                                                    "payment_from_name" => $this->input->post("SITE_USER_NAME"),
                                                                                    "payment_from_emailid" => $this->input->post("SITE_EMAIL_ID"),
                                                                                    "payment_from_mobilenumber" => $this->input->post("SITE_MOBILE_NUMBER"),
                                                                                    "bizicard_receipt_no" => $bizicard_receipt_no,
                                                                                    "go_back_url" => base_url()."service_booking/book_service_appointment/".$CARD_USER_NAME."/".$USER_EMAIL."/".$USER_ID,
                                                                                    "submit_url" => base_url()."service_booking/post_razorpay_data",
                                                                                    "insert_id" => $insert_id,
                                                                                    "plan_selected_name" => PAYMENT_FOR_SERVICE,
                                                                                    "SELECTED_SERVICE_TEXT" => $SELECTED_SERVICE_TEXT,
                                                                                    "SERVICE_TIMING" => $SERVICE_TIMING,
                                                                                    "SERVICE_DATE" => $SERVICE_DATE,
                                                                                    "SERVICE_SLOT" => $SERVICE_SLOT,
                                                                                    "USER_ID" => $USER_ID
                                                                                );
                                                        //print_r($razorpay_values_array);
                                                        echo $this->Razorpay_API_Library->make_payment($razorpay_values_array);?>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2"> </div>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('layouts/root/footer.php'); ?>