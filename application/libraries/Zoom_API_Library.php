<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Zoom_Library/generate_zoom_meeting.php';

class Zoom_API_Library {
   
    public function generate_zoom_meeting($SITE_USER_DETAILS) {      
        $zoom_meeting = new Zoom_Api();

        try{          
            date_default_timezone_set("Asia/Kolkata");  
            $z = $zoom_meeting->createAMeeting(
                array(
                'start_date'=>$SITE_USER_DETAILS->APPOINTMENT_DATE." ".$SITE_USER_DETAILS->APPOINTMENT_START_TIME,
                'meetingTopic'=>'Bizicard - Service Booking',
                'timezone'=>'Asia/Kolkata'
                )
            );
            return json_encode(array($z));
        } catch (Exception $ex) {
            return $ex;
        }
    }
}