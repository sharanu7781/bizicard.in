   <!-- ========== Left Sidebar Start ========== -->
   <div class="vertical-menu">

       <div data-simplebar class="h-100">
           <?php //print_r($this->session->userdata());die; ?>
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
                   <?php
                            if ($this->session->userdata("role")) { ?>
                   <li>
                       <a href="<?php echo base_url()."partner/partner_management";?>" class="waves-effect">
                           <i class="mdi mdi-view-dashboard"></i>
                           <span>Dashboard</span>
                       </a>
                   </li>
                   <li>
                       <a href="<?php echo base_url()."partner/add_partner";?>" class="waves-effect">
                           <i class="mdi mdi-credit-card-plus"></i>
                           <span>Add partner</span>
                       </a>
                   </li>
                   <li>
                       <a href="<?php echo base_url()."partner/register_user";?>" class="waves-effect">
                           <i class="mdi mdi-account-box"></i>
                           <span>Register User</span>
                       </a>
                   </li>
                   <?php } else if($this->session->userdata("email_id") == "info@bizicard.in") { ?>
                   <li>
                       <a href="<?php echo base_url()."change_plan";?>" class="waves-effect">
                           <i class="mdi mdi-view-dashboard"></i>
                           <span>Change Plan</span>
                       </a>
                   </li>
                   <li>
                       <a href="<?php echo base_url();?>profile_management/view_admin_change_password"
                           class="waves-effect">
                           <i class="mdi mdi-clipboard-list-outline"></i>
                           <span>Change Password</span>
                       </a>
                   </li>
                   <!-- <li>
                       <a href="<?php echo base_url("view_admin_change_password");?>" class="waves-effect">
                           <i class="mdi mdi-credit-card-plus"></i>
                           <span>Change Password</span>
                       </a>
                   </li> -->
                   <?php }  else { ?>
                   <li>
                       <?php if($this->session->userdata("template_choosen") != "") { ?>
                       <a href="<?php echo base_url();?>profile/<?php echo base64_encode($this->session->userdata("template_choosen"));?>"
                           class="waves-effect">
                           <i class="mdi mdi-account-card-details-outline"></i>
                           <span>Profile Details</span>
                       </a>
                       <?php } else { ?>
                       <a href="<?php echo base_url();?>profile/<?php echo base64_encode("null");?>"
                           class="waves-effect">
                           <i class="mdi mdi-account-card-details-outline"></i>
                           <span>Profile Details</span>
                       </a>
                       <?php } ?>

                   </li>

                   <li>
                       <a href="<?php echo base_url()."show_digital_card/".$this->session->userdata("name");?>"
                           class="waves-effect">
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
                           <i class="mdi mdi-calendar-account"></i>
                           <span>Service Booking</span>
                       </a>
                   </li>

                   <li>
                       <a href="<?php echo base_url();?>profile_management/view_booked_appointments"
                           class="waves-effect">
                           <i class="mdi mdi-clipboard-list-outline"></i>
                           <span>My Bookings</span>
                       </a>
                   </li>
                   <!-- <li>
                       <a href="<?php echo base_url();?>profile_management/view_admin_change_password"
                           class="waves-effect">
                           <i class="mdi mdi-clipboard-list-outline"></i>
                           <span>Change Password</span>
                       </a>
                   </li> -->
                   <li>
                       <a href="<?php echo base_url()."profile_management/admin_suspend_card";?>" class="waves-effect">
                           <i class="mdi mdi-view-dashboard"></i>
                           <span>Suspend Card</span>
                       </a>
                   </li>
                   <li>
                       <a href="<?php echo base_url()."profile_management/admin_change_plan";?>" class="waves-effect">
                           <i class="mdi mdi-view-dashboard"></i>
                           <span>Change Plan</span>
                       </a>
                   </li>
                   <li>
                       <a href="<?php echo base_url();?>profile_management/admin_change_email_id" class="waves-effect">
                           <i class="fa fa-history"></i>
                           <span>Change Email_id</span>
                       </a>
                   </li>
                   <li>
                       <a href="<?php echo base_url();?>profile_management/coupon_code" class="waves-effect">
                           <i class="fa fa-history"></i>
                           <span>Coupon Code</span>
                       </a>
                   </li>
                   <?php } ?>

                   <li>
                       <a href="<?php echo base_url();?>profile_management/view_payment_history" class="waves-effect">
                           <i class="fa fa-history"></i>
                           <span>Payment History</span>
                       </a>
                   </li>
                   <?php } ?>

                   <li>
                       <a href="<?php echo base_url();?>profile_management/view_shared_card_details"
                           class="waves-effect">
                           <i class="mdi mdi-share"></i>
                           <span>Shared Card Details</span>
                       </a>
                   </li>

               </ul>
           </div>
           <!-- Sidebar -->
       </div>
   </div>
   <!-- Left Sidebar End -->