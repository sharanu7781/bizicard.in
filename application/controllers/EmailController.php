<?php

class EmailController extends CI_Controller {

    public function sendNotifications() {
        $this->load->library('email');
        $this->load->database();

        // Get users whose cards are expiring within one month
        $today = date('Y-m-d');
        $oneMonthLater = date('Y-m-d', strtotime('+1 month', strtotime($today)));

        $query = $this->db->select('email, username')
            ->where('card_expiration_date <', $oneMonthLater)
            ->get('user_data');

        $expiringUsers = $query->result();

        foreach ($expiringUsers as $user) {
            $subject = "Your Card Is Expiring Soon";
            $message = "Dear {$user->username}, your card will expire in less than one month. Please renew it.";

            $this->email->clear();
            $this->email->to($user->email);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                // Email sent successfully
            } else {
                // Handle email sending failure
            }
        }

        // Notify the admin
        $adminEmail = 'mitecsharanu@gmail.com';
        $adminSubject = "Expiring Cards Report";
        $adminMessage = "The following users have cards expiring within one month: ";
        foreach ($expiringUsers as $user) {
            $adminMessage .= $user->username . ', ';
        }

        $this->email->clear();
        $this->email->to($adminEmail);
        $this->email->subject($adminSubject);
        $this->email->message($adminMessage);

        if ($this->email->send()) {
            // Email sent to admin successfully
        } else {
            // Handle admin email sending failure
        }
    }
}
