<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'application/PHPMailer-master/src/Exception.php';
require 'application/PHPMailer-master/src/PHPMailer.php';
require 'application/PHPMailer-master/src/SMTP.php';

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

class Functions_Library {
    public function addslashes_to_array_element($array_data) {
        if(is_array($array_data))
        {
            $array_data = $array_data;
            foreach($array_data as $key=>$value)
            {
                if(!is_array($value))
                    $array_data[$key] = addslashes($value);
            }

            return $array_data;
        }
        else
            return false;
    }
    public function generate_password()  { 
      
        // String of all alphanumeric character 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
      
        // Shufle the $str_result and returns substring 
        // of specified length 
        return substr(str_shuffle($str_result),  
                           0, 10); 
    } 

    public function sendmail($to, $subject, $message) {
        //These must be at the top of your script, not inside a function
        $mail = new PHPMailer(true);

        try {
            $mail = new PHPMailer();
            $mail->SMTPDebug = 1;
            $mail->isSMTP();
            // $mail->Host = "smtp.gmail.com";
            // $mail->SMTPAuth = true;
            // $mail->SMTPSecure = "tls";  
            // $mail->Port = 587; 
            // $mail->Username = 'mitechinfotest@gmail.com';
            // $mail->Password = 'gutx mmra xblr wkhz';
            // $mail->setFrom('mitechinfotest@gmail.com');

            $mail->Host = "us2.smtp.mailhostbox.com";
            $mail->SMTPAuth = true;
            $mail->Port = 25; 
            $mail->Username = 'info@bizicard.in';
            $mail->Password = '*RR)oqbQ#4';
           
            $mail->setFrom('info@bizicard.in');
            $mail->addAddress($to);
            // $mail->IsHTML(true); 
            $mail->Subject = $subject;
            $mail->Body    = $message;
            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                // Add the following line to display the full debugging output
                echo '<pre>' . print_r($mail->Debugoutput, true) . '</pre>';
            } else {
                echo "Message sent!";
            }
           
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendmail_donotreply($mail_to_name, $mail_to, $subject, $message) { 
        $mail = new PHPMailer(true);

        try {
            $mail = new PHPMailer();
            $mail->SMTPDebug = 1;
            $mail->isSMTP();
            $mail->Host = "us2.smtp.mailhostbox.com";
            $mail->SMTPAuth = true;
            $mail->Port = 25; 
            $mail->Username = 'info@bizicard.in';
            $mail->Password = '*RR)oqbQ#4';
           
            $mail->setFrom('info@bizicard.in');
            $mail->addAddress($mail_to, $mail_to_name);
            $mail->IsHTML(true); 
            $mail->Subject = $subject;
            $mail->Body    = $message;
            if (!$mail->Send()) {
                $mail_error = $mail->ErrorInfo;
                // Add the following line to display the full debugging output
                // echo '<pre>' . print_r($mail->Debugoutput, true) . '</pre>';
                return 0;
            } else {
               return 1;
            }
           
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendmail_info($mail_to_name, $mail_to, $subject, $message) {    
        $post_array = array("mail_to_name"=>$mail_to_name, "mail_to"=>$mail_to,"subject"=>$subject,"message"=>$message);
		$request_url = 'https://www.a2hosting.in/kb/getting-started-guide/setting-up-e-mail/using-external-smtp-servers-to-send-e-mail';        
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_URL, $request_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$post_array);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//$response = curl_exec($ch);		
        //echo "<pre>"; print_r($response);	
     
		curl_close($ch);
    }

    public function sendmail_donotreply_old($mail_to_name, $mail_to, $subject, $message) {    
        $post_array = array("mail_to_name"=>$mail_to_name, "mail_to"=>$mail_to,"subject"=>$subject,"message"=>$message);
		$request_url = 'https://dev.123mentor.com/sendmail_info_bizicard.php';//sendmail_donotreply_bizicard.php';        
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_URL, $request_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$post_array);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
		$response = curl_exec($ch);
		curl_close($ch);
    }

    public function generate_token($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i ++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function openssl_encrypt_string($string_to_encrypt) {
        // Store the cipher method
        $ciphering = "AES-128-CTR";
        
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        
        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';
        
        // Store the encryption key
        $encryption_key = "Bizicards";
        
        // Use openssl_encrypt() function to encrypt the data
        $encryption = base64_encode($string_to_encrypt);//str_replace("/","*", openssl_encrypt($string_to_encrypt, $ciphering, $encryption_key, $options, $encryption_iv));
        return $encryption;
    }

    public function openssl_decrypt_string($string_to_decrypt) {
        // Store the cipher method
        $ciphering = "AES-128-CTR";
        
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        
        // Non-NULL Initialization Vector for encryption
        $decryption_iv = '1234567891011121';
        
        // Store the encryption key
        $decryption_key = "Bizicards";
        
        // Use openssl_decrypt() function to decrypt the data
        //$string_to_decrypt = str_replace("*","/",$string_to_decrypt);
        $decryption=base64_decode($string_to_decrypt);//openssl_decrypt($string_to_decrypt, $ciphering, $decryption_key, $options, $decryption_iv);
        return $decryption;
    }

    public function resize_image($image_path, $percentage) {
        
    
        $image_name = $image_path;
        $im_php = imagecreatefromjpeg($image_name);
        $get_new_width = imagesx($im_php) / $percentage;
        
        $im_php = imagescale($im_php, $get_new_width, $height);

        $new_name = date("YmdHis").".jpg"; 
        imagejpeg($im_php, 'upload_images/'.$new_name);
        return 'upload_images/'.$new_name;
    }

    // public function php_gd_resize_image_using_file($file_uploader_tmp_name, $base64_image) {
    //     $this->process_image_upload_using_file($file_uploader_tmp_name, $file_name, $IMAGE_WIDTH, $IMAGE_HEIGHT,"slider_images");
    // }

    // public function php_gd_resize_image_using_base64_image($file_uploader_tmp_name, $base64_image, $IMAGE_WIDTH, $IMAGE_HEIGHT) {
    //     return $this->process_image_upload_using_base64_image($file_uploader_tmp_name, $base64_image, $IMAGE_WIDTH, $IMAGE_HEIGHT,"upload_images");
    // }
        
    function generate_image_thumbnail($source_image_path, $thumbnail_image_path, $IMAGE_WIDTH, $IMAGE_HEIGHT) {
        list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
        switch ($source_image_type) {
            case IMAGETYPE_GIF:
                $source_gd_image = imagecreatefromgif($source_image_path);
                break;
            case IMAGETYPE_JPEG:
                $source_gd_image = imagecreatefromjpeg($source_image_path);
                break;
            case IMAGETYPE_PNG:
                $source_gd_image = imagecreatefrompng($source_image_path);
                break;
        }
        if ($source_gd_image === false) {
            return false;
        }
        if($IMAGE_WIDTH == 0)
            $IMAGE_WIDTH = $source_image_width;
        else
            $IMAGE_WIDTH = $IMAGE_WIDTH;

        $source_aspect_ratio = $source_image_width / $source_image_height;
        $thumbnail_aspect_ratio = $IMAGE_WIDTH / $IMAGE_HEIGHT;
        if ($source_image_width <= $IMAGE_WIDTH && $source_image_height <= $IMAGE_HEIGHT) {
            $thumbnail_image_width = $source_image_width;
            $thumbnail_image_height = $source_image_height;
        } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
            $thumbnail_image_width = (int) ($IMAGE_HEIGHT * $source_aspect_ratio);
            $thumbnail_image_height = $IMAGE_HEIGHT;
        } else {
            $thumbnail_image_width = $IMAGE_WIDTH;
            $thumbnail_image_height = (int) ($IMAGE_WIDTH / $source_aspect_ratio);
        }
        $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
        imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
        imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
        imagedestroy($source_gd_image);
        imagedestroy($thumbnail_gd_image);
        return true;
    }

                
    function process_image_upload_using_file($file_uploader_tmp_name, $base64_image, $IMAGE_WIDTH, $IMAGE_HEIGHT, $DIRECTORY_NAME, $USERNAME)
    {
        $temp_image_path = $file_uploader_tmp_name;
        $temp_image_name = $USERNAME."_".date("YmdHis").".jpg";//$_FILES[$field]['name'];
        list(, , $temp_image_type) = getimagesize($file_uploader_tmp_name);
        if ($temp_image_type === NULL) {
            return false;
        }
        switch ($temp_image_type) {
            case IMAGETYPE_GIF:
                break;
            case IMAGETYPE_JPEG:
                break;
            case IMAGETYPE_PNG:
                break;
            default:
                return false;
        }
        $uploaded_image_path = $DIRECTORY_NAME ."/". $temp_image_name;
        move_uploaded_file($temp_image_path, $uploaded_image_path);
        $thumbnail_image_path = $DIRECTORY_NAME ."/". preg_replace('{\\.[^\\.]+$}', '.jpg', $temp_image_name);
        $result = $this->generate_image_thumbnail($uploaded_image_path, $thumbnail_image_path, $IMAGE_WIDTH, $IMAGE_HEIGHT);
        
        return $result ? $uploaded_image_path : false;
    }

    function process_image_upload_using_base64_image($file_uploader_tmp_name, $base64_image, $IMAGE_WIDTH, $IMAGE_HEIGHT, $DIRECTORY_NAME,$USERNAME) {
        $temp_image_path = $base64_image;
        $temp_image_name = $USERNAME."_".date("YmdHis").".jpg";//$_FILES[$field]['name'];
        list(, , $temp_image_type) = getimagesize($file_uploader_tmp_name);
        if ($temp_image_type === NULL) {
            return false;
        }
        switch ($temp_image_type) {
            case IMAGETYPE_GIF:
                break;
            case IMAGETYPE_JPEG:
                break;
            case IMAGETYPE_PNG:
                break;
            default:
                return false;
        }

        $data = $base64_image;
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
       
        $uploaded_image_path = $DIRECTORY_NAME ."/".$USERNAME."_". date("Ymd")."_".time().'.jpg';
        file_put_contents($uploaded_image_path, $data);
        $thumbnail_image_path = $DIRECTORY_NAME ."/".$USERNAME."_". date("Ymd")."_".time().'.jpg';
        $result = $this->generate_image_thumbnail($uploaded_image_path, $thumbnail_image_path, $IMAGE_WIDTH, $IMAGE_HEIGHT);
        return $result ? str_replace("./", "", $uploaded_image_path) : false ;
    }
}