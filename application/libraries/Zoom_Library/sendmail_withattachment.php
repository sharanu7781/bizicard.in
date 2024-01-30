<?php

require_once('Mail.php');
require_once('Mail/mime.php');

$text = $_POST['mail_body'];
$file = 'Step_by_step_guide_document_after_Successfull_Registration_of_Doctor.docx';

$message = new Mail_mime();
$message->setTXTBody($text);
$message->addAttachment($file);
$body = $message->get();
$extraheaders = array("From"=>"DFH Admin<admin@doctorfromhome.in>", "Subject"=>$_POST['mail_subject'],"Reply-To"=>"admin@doctorfromhome.in");

$headers = $message->headers($extraheaders);

$mail = Mail::factory("mail");

var_dump($mail->send($_POST['mail_to'], $headers, $body));
?>