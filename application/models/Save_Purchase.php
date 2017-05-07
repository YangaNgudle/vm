<?php

class Save_Purchase extends CI_Model{
  public function __construct() {
    // Call the CI_Model constructor
     parent::__construct();
     $this->load->database();
  }

  public function save($foreign_currency, $exchange_rate, $surcharge_percentage, $amount_foreign, $ZAR_amount, $total_amount) {
    $data = array(
        'Amount_Foreign_Currency' => $amount_foreign,
        'Exchange_Rate' => $exchange_rate,
        'Foreign_Currency' => $foreign_currency,
        'Surchage_Percentage' => $surcharge_percentage,
        'Total_Amount' => $total_amount,
        'ZAR_amount' => $ZAR_amount,
    );

     $this->db->insert('purchases', $data);
  }
}

?>