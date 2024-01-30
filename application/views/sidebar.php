   <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <!-- <li>
                            <a href="<?php echo base_url();?>templates_selection" class="waves-effect">
                                <i class="  fas fa-calendar-check"></i>
                                <span>Choose Template</span>
                            </a>
                        </li> -->
                        
                        <li>
                            <?php if($this->session->userdata("template_choosen") != "") { ?>
                                <a href="<?php echo base_url();?>profile/<?php echo base64_encode($this->session->userdata("template_choosen"));?>" class="waves-effect">
                                    <i class="mdi mdi-account-card-details-outline"></i>
                                    <span>Profile Details</span>
                                </a>
                            <?php } else { ?>
                                <a href="<?php echo base_url();?>profile/<?php echo base64_encode("null");?>" class="waves-effect">
                                    <i class="mdi mdi-account-card-details-outline"></i>
                                    <span>Profile Details</span>
                                </a>
                            <?php } ?>
                            
                        </li>

                        <li>
                            <a href="<?php echo base_url()."show_digital_card/".$this->session->userdata("name");?>" class="waves-effect">
                                <i class="mdi mdi-credit-card-plus"></i>
                                <span>Show Digital Card</span>
                            </a>
                        </li>
                        <?php if(isset($this->plan_details) && in_array("Offers", $this->plan_details)) { ?>
                        <li>
                            <a href="<?php echo base_url();?>profile_management/add_offers" class="waves-effect">
                                <i class="mdi mdi-shield-star-outline"></i>
                                <span>Add Offers Details</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if(isset($this->plan_details) && in_array("Book Appointment", $this->plan_details)) { ?>
                        <li>
                            <a href="<?php echo base_url();?>profile_management/view_add_slot" class="waves-effect">
                                <i class="fas fa-calendar-week"></i>
                                <span>Service Booking</span>
                            </a>
                        </li>
                        <?php } ?>

                        <!-- <li>
                            <a href="//<?php //echo base_url();?>profile_management/view_appointment" class="waves-effect">
                                <i class="fa fa-clock"></i>
                                <span>Book Appointment</span>
                            </a>
                        </li>-->

                        <li>
                            <a href="<?php echo base_url();?>profile_management/view_payment_history" class="waves-effect">
                                <i class="fa fa-history"></i>
                                <span>Payment History</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->