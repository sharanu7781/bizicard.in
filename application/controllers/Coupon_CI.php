<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon_CI extends CI_Controller {
    

    public function __construct() {
        parent::__construct();
        $this->load->model('Coupon_model');
    }

    public function index() {
        $data['coupon_code'] = '';
        $this->load->view('coupon_code', $data);
    }

public function coupon_code_generate() {
    $data['coupon_code'] = '';

    if ($this->input->post('generate_code')) {
        $percentage = $this->input->post('percentage');
        $expiration_date = $this->input->post('expiration_date');

       
        $coupon_code = $this->Coupon_model->generateCouponCode(10);

       
        $this->Coupon_model->saveCouponDetails($coupon_code, $percentage, $expiration_date);

        $data['coupon_code'] = $coupon_code;
    }

    $this->load->view('coupon_code', $data);
}

    
    public function applyCoupon() {
        $couponCode = $this->input->post('couponCode');
    
       
        $couponData = $this->db->get_where('coupon_table', array('coupon_code' => $couponCode))->row_array();
    
        if ($couponData) {
          
            $currentDate = date('Y-m-d');
            if ($couponData['expiration_date'] && $couponData['expiration_date'] < $currentDate) {
                $response = array(
                    'status' => 'error',
                    'message' => 'Coupon code has expired.'
                );
            } else {
                
                $response = array(
                    'status' => 'success',
                    'discount_percentage' => $couponData['percentage']
                );
            }
        } else {
           
            $response = array(
                'status' => 'error',
                'message' => 'Invalid coupon code.'
            );
        }
    
        echo json_encode($response);
    }
    
    
}
