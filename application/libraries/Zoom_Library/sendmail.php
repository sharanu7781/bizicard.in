<?php
require_once("Mail.php");

$recipients = $_POST['mail_to'];

$headers['MIME-Version'] = "1.0";
$headers['Content-type'] = "text/html";
$headers['charset='] = "UTF-8";
$headers['From']    = 'DFH Admin <admin@doctorfromhome.in>';
//$headers['To']      = $_POST['mail_cc'];
$headers['Subject'] = $_POST['mail_subject'];

$body = $_POST['mail_body'];

$params['sendmail_path'] = '/usr/sbin/sendmail';

// Create the mail object using the Mail::factory method
$mail_object =& Mail::factory('sendmail', $params);

var_dump($mail_object->send($recipients, $headers, $body));

?>