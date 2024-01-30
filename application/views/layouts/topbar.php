 <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="<?php echo base_url();?>show_digital_card" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?php echo base_url();?>public/assets/images/bizicard-logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo base_url();?>public/assets/images/bizicard-logo.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="<?php echo base_url();?>show_digital_card" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?php echo base_url();?>public/assets/images/biz-logo1.png" alt="">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo base_url();?>public/assets/images/bizicard-logo.png" alt="">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?php echo ($this->session->userdata("avatar_path") != '') ? $this->session->userdata("avatar_path"):base_url()."public/assets/images/users/avatar_user.png";?>"
                                alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle mr-1"></i> <?php echo $this->session->userdata("display_name");?></a>
                            
                            <a class="dropdown-item" href="<?php echo base_url();?>profile_setup/change_password"><i class="mdi mdi-pencil-lock-outline"></i> Change Password</a>
                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="<?php echo base_url();?>logout"><i class="mdi mdi-power font-size-17 text-muted align-middle mr-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        
                    </div>
            
                </div>
            </div>
        </header>