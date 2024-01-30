<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home_CI';
$route['templates'] = "Home_CI/templates";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = "Login_CI";
$route['logout'] = "Login_CI/logout";
$route['validate_login'] = "Login_CI/validate_login";
$route['set_profile_password'] = "Login_CI/set_profile_password";
//$route['empty_digital_card'] = "Digital_Card_CI/empty_digital_card";

$route['legal'] = "Documents_CI";

$route['profile_setup/show_plans'] = "Razorpay_Payment_CI/show_plan";
$route['templates_selection'] = "Profile_Management_CI/template_Management";
$route['choosed_templated/(:any)'] = "Profile_Management_CI/choosed_templated/$1";
$route['profile/(:any)'] = "Profile_Management_CI/index/$1";
$route['save_profile_bio_details'] = "Profile_Management_CI/save_profile_bio_details";
$route['show_digital_card/(:any)'] = "Profile_Management_CI/show_digital_card/$1";
$route['get_template_preview'] = "Profile_Management_CI/get_template_preview";
$route['signup/register'] = "Register_CI/view_register";
$route['template_setup_data'] = "Profile_Management_CI/template_setup_data";
$route['check_username'] = "Profile_Management_CI/check_username";
$route['(:any)'] = "Digital_Card_CI/index/$1";
$route['signup/register_user'] = "Register_CI/register_user";
$route['crop_upload_image'] = "Profile_Management_CI/crop_upload_image";
$route['signup/check_signup_email_exists'] = "Register_CI/check_signup_email_exists";
$route['profile_setup/change_password'] = "Profile_Management_CI/change_password";







$route['signup/forget_password'] = "Login_CI/forget_password";
$route['signup/submit_forget_password_request'] = "Login_CI/submit_forget_password_request";
$route['signup/check_forget_password_email_exists'] = "Login_CI/check_forget_password_email_exists";
$route['password/reset_password/(:any)'] = "Login_CI/reset_password/$1";
$route['password/save_reset_password'] = "Login_CI/save_reset_password";
$route['profile_management/add_offers'] = "Profile_Management_CI/add_offers";
$route['profile_management/save_offer_slider_details'] = "Profile_Management_CI/save_offer_slider_details";
$route['digital_card/get_slider_information'] = "Digital_Card_CI/get_slider_information";
$route['get_service_booking_details'] = "";
$route['profile_management/unlink_slider_image_from_root'] = "Profile_Management_CI/unlink_slider_image_from_root";

//Routes for Payment of template
$route['payment/make_payment'] = "Razorpay_Payment_CI/view_payment";
$route['payment/pay'] = "Razorpay_Payment_CI/pay";

//Routes for Payment of offers
$route['payment/make_offers_payment'] = "Razorpay_Payment_CI/view_offers_payment";
$route['payment/pay_offers'] = "Razorpay_Payment_CI/pay_offers";
$route['view/offers'] = "Offers_CI/view_offers";

//add slot for avilability
$route['profile_management/view_add_slot'] = "Profile_Management_CI/view_add_slot";
$route['profile_management/save_slot_data'] = "Profile_Management_CI/save_slot_data";

//view book appointment 
$route['profile_management/view_appointment/(:any)'] = "Profile_Management_CI/view_appointment/$1";
$route['profile_management/save_slot_book_appointment_details'] = "Profile_Management_CI/save_slot_book_appointment_details";

//view payment history
$route['profile_management/view_payment_history'] = "Profile_Management_CI/view_payment_history";

//Routes for service booking appointment on card
$route['service_booking/book_service_appointment/(:any)'] = "Digital_Card_CI/book_service_appointment/$1";

//Admin change password for user


