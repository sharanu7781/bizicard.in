<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon_model extends CI_Model {

    public function generateCouponCode($length = 8, $percentage = 0, $expiration_date = null) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $coupon_code = '';

        for ($i = 0; $i < $length; $i++) {
            $coupon_code .= $characters[rand(0, strlen($characters) - 1)];
        }

        if ($percentage > 0) {
            $coupon_code .= "_{$percentage}%";
        }

      
        if ($expiration_date) {
            
            $coupon_code .= "_Exp{$expiration_date}";
        }
        $data = array(
            'id' => 1, 
            'coupon_code' => $coupon_code,
            'percentage'  => $percentage,
            'expiration_date' => $expiration_date
        );

        $this->db->replace('coupon_table', $data);

        return $coupon_code;
    }
    public function saveCouponDetails($code, $percentage, $expiration_date) {
       
        $existingCoupon = $this->db->get_where('coupon_table', array('id' => 1))->row();

        if ($existingCoupon) {
          
            $data = array(
                'coupon_code' => $code,
                'percentage' => $percentage,
                'expiration_date' => $expiration_date
            );

            $this->db->where('id', 1);
            $this->db->update('coupon_table', $data);
        } else {
          
            $data = array(
                'coupon_code' => $code,
                'percentage' => $percentage,
                'expiration_date' => $expiration_date
            );

            $this->db->insert('coupon_table', $data);
        }
    }
}
?>
