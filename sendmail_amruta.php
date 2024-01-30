<?php
/* Attempt- 1
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'application/PHPMailer-master/src/Exception.php';
require 'application/PHPMailer-master/src/PHPMailer.php';
require 'application/PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
//$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.bizicard.in";
$mail->Username   = "noreply@bizicard.in";
$mail->Password   = "pOCbU#u6";

$mail->IsHTML(true);
$mail->AddAddress("amruta.mitech@gmail.com", "Amruta Ranade");
$mail->SetFrom("noreply@bizicard.in", "Bizicard");
$mail->AddReplyTo("noreply@bizicard.in", "Bizicard");
//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>"; 

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  
} else {
  echo "Email sent successfully";
}
*/


/* Attempt - 2
$subject = "Welcome to Bizicards";
$message = "This is system generated test mail to check email is working or not";

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To:Amruta Ranade<amrut.mitech@gmail.com>';
$headers[] = 'From: Bizicard <noreply@vocalforlocal.biz>';
//$headers[] = 'Cc: birthdayarchive@example.com';
//$headers[] = 'Bcc: birthdaycheck@example.com';

// Mail it
var_dump(mail("amrut.mitech@gmail.com", $subject, $message, implode("\r\n", $headers)));
*/
/* Attempt- 3 */

error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'application/PHPMailer-master/src/Exception.php';
require 'application/PHPMailer-master/src/PHPMailer.php';
require 'application/PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();
$mail->SMTPDebug = 1;
$mail->isSMTP();
$mail->Host = "smtp.bizicard.in";//gethostname();
$mail->SMTPAuth = true;
//$mail->SMTPSecure = "tls";
$mail->Port       = 25;
$mail->Username = 'info@bizicard.in';
$mail->Password = 'MSlJce$#l7';
$mail->setFrom('info@bizicard.in','Bizicard' );
$mail->addAddress("info@bizicard.in");
$mail->IsHTML(true); 
$mail->Subject = 'Test Mail';
$mail->Body    = 'This is system generated test mail to check email is working or not';
var_dump($mail->send());






// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'path/to/PHPMailer.php'; // Adjust the path to the PHPMailer library
// require 'path/to/SMTP.php'; // Adjust the path to the SMTP library
// require 'path/to/Exception.php'; // Adjust the path to the Exception library

// $mail = new PHPMailer();

// try {
//     $mail->isSMTP();
//     $mail->Host = 'smtp.bizicard.in';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'info@bizicard.in';
//     $mail->Password = 'MSlJce$#l7';
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = 587;

//     $mail->setFrom('info@bizicard.in','Bizicard');
//     $mail->addAddress($mail_to, $mail_to_name);

//     $mail->isHTML(true);
//     $mail->Subject = $subject;
//     $mail->Body = $message;

//     if ($mail->send()) {
//         // Email sent successfully
//         echo 'Email sent!';
//     } else {
//         // Email sending failed
//         echo 'Email sending failed: ' . $mail->ErrorInfo;
//     }
// } catch (Exception $e) {
//     echo 'Email sending failed: ' . $e->getMessage();
// }

?>



