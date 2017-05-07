<?php

class Order extends CI_Controller {
  public function index() {
    $this->load->library('form_validation');
    
    $rand = $this->input->post('zar_amount');
    $exchange_rate = $this->input->post('exchange_rate');
    $currency_amount = $this->input->post('currency_amount');
    $currencyType = $this->input->post('currencyType');

    // Form validation
    $this->form_validation->set_rules('zar_amount', 'Rand Amount', 'required');
    $this->form_validation->set_rules('exchange_rate', 'Exchange Rate', 'required');
    $this->form_validation->set_rules('currency_amount', 'Currency Amount', 'required');
    $this->form_validation->set_rules('currencyType', 'Type of Currency', 'required');

    
    // Surge calculations
    $surcharge = 0;
    $surcharge_percentage = '';
    switch ($currencyType) {
      case 'USD':
        $surcharge = $rand * (7.5 / 100);
        $surcharge_percentage = '7.5%';
        break;
      case 'GBP':
        $surcharge = $rand * (5 / 100);
        $surcharge_percentage = '5%';
        break; 
      case 'EUR':
        $surcharge = $rand * (5 / 100);
        $surcharge_percentage = '5%';
        break;
      case 'KES':
        $surcharge = $rand * (2.5 / 100);
        $surcharge_percentage = '2.5%';
        break;   
      default:
        $surcharge = 0;
        $surcharge_percentage = 'Not set.';
        break;
    }

    // Apply 2% discount on EUR
    if($currencyType == 'EUR') {
      $total = $rand + $surcharge;
      $discount = $total * ( 2 / 100);
      $total = ($total - $discount);
    } else {
      $total = $rand + $surcharge;
    }

    $data = array(
      'rand' => $rand,
      'exchange_rate' => $exchange_rate,
      'currency_amount' => $currency_amount,
      'currency_type' => $currencyType,
      'surcharge' => $surcharge,
      'surcharge_percentage' => $surcharge_percentage,
      'total_including_surge' => $total,
    );
    
   
    if ($this->form_validation->run() == FALSE) {
        echo "Failed...";
     } else {
        $this->load->view('user/confirmation', $data);
     }
  }
}