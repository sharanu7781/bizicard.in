<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
//defined("RAZORPAY_KEYID") OR define("RAZORPAY_KEYID","rzp_test_p2nE5kI1sjS2K0"); //Razorpay Key ID Test Mode
//defined("RAZORPAY_SECRETKEY") OR define("RAZORPAY_SECRETKEY","c0NWA8qmDGzVqvNzKyAvz5CJ"); //Razorpay Secret Key Test Mode
// defined("RAZORPAY_KEYID") OR define("RAZORPAY_KEYID","rzp_live_7KAeJ91POMX6qw"); //Razorpay Key ID Live Mode
// defined("RAZORPAY_SECRETKEY") OR define("RAZORPAY_SECRETKEY","e9lUY7T63B36Z9IKsjvuNALt"); //Razorpay Secret Key Live mode
//Commented by Amruta on 17 June 2022
// defined("RAZORPAY_KEYID") OR define("RAZORPAY_KEYID","rzp_live_NMrSjR5hz728pZ"); //Razorpay Key ID Live Mode
// defined("RAZORPAY_SECRETKEY") OR define("RAZORPAY_SECRETKEY","M5U1SzsnZoEJ4Fl0Wr5kBCvY"); //Razorpay Secret Key Live mode
defined("RAZORPAY_KEYID") OR define("RAZORPAY_KEYID","rzp_live_wqfGhRt2y1u9PK"); //Razorpay Key ID Live Mode
defined("RAZORPAY_SECRETKEY") OR define("RAZORPAY_SECRETKEY","TggatENc9xQbFxuGjQcF1iXD"); //Razorpay Secret Key Live mode


defined("SLIDER_CHARGES") OR define("SLIDER_CHARGES","1"); // Basic theme template pricing for Offers id added
defined("BASIC_TEMPLATE_PRICING_OFFERS_VALIDITY") OR define("BASIC_TEMPLATE_PRICING_OFFERS_VALIDITY","1 year"); // Basic theme template pricing validity for Offers if added
defined("PREMIUM_TEMPLATE_PRICING_OFFERS") OR define("PREMIUM_TEMPLATE_PRICING_OFFERS","100"); // Premium theme template pricing for Offers id added
defined("PREMIUM_TEMPLATE_PRICING_OFFERS_VALIDITY") OR define("PREMIUM_TEMPLATE_PRICING_OFFERS_VALIDITY","1"); // Offers validity to be displayed on card
defined("PREMIUM_TEMPLATE_PRICE_ALL_IN_ONE") OR define("PREMIUM_TEMPLATE_PRICE_ALL_IN_ONE","2500"); // Premium theme template pricing for Offers id added
defined('PAYMENT_SUCCESS')      or define('PAYMENT_SUCCESS', "PAYMENT_SUCCESS"); // Payment status after success
defined('PAYMENT_FOR_OFFER')      or define('PAYMENT_FOR_OFFER', "PAYMENT_FOR_OFFER"); // Payment for offers
defined('PAYMENT_FOR_SERVICE') or define("PAYMENT_FOR_SERVICE", "PAYMENT_FOR_SERVICE_BOOKING");//Paymemt for enabling service booking
defined('PAYMENT_FOR_PREMIUM_TEMPLATE')      or define('PAYMENT_FOR_PREMIUM_TEMPLATE', "PAYMENT_FOR_PREMIUM_TEMPLATE"); //Payment for premium template
defined("UPLOADED_IMAGE_DESTINATION") or define("UPLOADED_IMAGE_DESTINATION", "./upload_images/");


defined('PAYMENT_PENDING')      or define('PAYMENT_PENDING', "PAYMENT_PENDING"); // Payment status before success
defined('PAYMENT_SUCCESS')      or define('PAYMENT_SUCCESS', "PAYMENT_SUCCESS"); // Payment status after success
defined('APPOINTMENT_STATUS_HOLD')      or define('APPOINTMENT_STATUS_HOLD', "HOLD"); // Payment status before success
defined('APPOINTMENT_STATUS_BOOKED')      or define('APPOINTMENT_STATUS_BOOKED', "BOOKED"); // Payment status after success
defined('TAX_PERCENTAGE')      or define('TAX_PERCENTAGE', "18"); // Payment status after success
defined('BOOK_APPMNT')      or define('BOOK_APPMNT', "BOOK_APPMNT"); // Payment status after success
defined('CASHFREE_SECRET_KEY')      OR define('CASHFREE_SECRET_KEY', "915fb8111607c18ddc2fd88293b0c3ab871f1d01"); // Cashfree PROD secretkey
defined('CASHFREE_CLIENT_ID')      OR define('CASHFREE_CLIENT_ID', "CF154602FOEYGVI56322QYE"); // Cashfree PROD secretkey
// defined('CASHFREE_SECRET_KEY')      OR define('CASHFREE_SECRET_KEY', "38cf61c9ff6e7a2ed391bad1fc0970127bdc5ac2"); // Cashfree TEST secretkey
// defined('CASHFREE_CLIENT_ID')      OR define('CASHFREE_CLIENT_ID', "CF109029BLJ86KOX80OIQEI"); // Cashfree TEST secretkey
// defined('CASHFREE_SECRET_KEY')      OR define('CASHFREE_SECRET_KEY', "0c8bfd4dbd71c910043f4e9a78e564f9552c547c"); // Cashfree TEST secretkey
// defined('CASHFREE_CLIENT_ID')      OR define('CASHFREE_CLIENT_ID', "CF109029EB484UHKM9G2AYQ"); // Cashfree TEST secretkey
//defined('CASHFREE_API_ENDPOINT')      OR define('CASHFREE_API_ENDPOINT', "https://cac-gamma.cashfree.com/"); // Cashfree TEST Endpoint
defined('CASHFREE_API_ENDPOINT')      OR define('CASHFREE_API_ENDPOINT', "https://cac-api.cashfree.com/"); // Cashfree TEST Endpoint
defined("DOCUMENT_ROOT") OR define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']."/"); // Docuement root for file reading and save files on document root
defined("PAYMENT_VALID_TILL_YEAR") OR define("PAYMENT_VALID_TILL_YEAR", "1"); // Payment valid till number of year
