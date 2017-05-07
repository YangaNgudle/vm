<?php
require_once('vendor/class.phpmailer.php');
require_once('vendor/class.pop3.php');
require_once('vendor/class.smtp.php');

class Confirmation extends CI_Controller {
  public function index() {
  	$this->load->model("Save_Purchase");

    // Form validation
    $currency_type = $this->input->post('currency_type');
    $currency_amount = $this->input->post('currency_amount');
    $exchange_rate = $this->input->post('exchange_rate');
    $surcharge_percentage = $this->input->post('surcharge_percentage');
    $surcharge = $this->input->post('surcharge');
    $rand = $this->input->post('rand');
    $total_including_surge = $this->input->post('total_including_surge');

    
    
    $this->Save_Purchase->save($currency_type, $exchange_rate, $surcharge_percentage, $currency_amount, $rand, $total_including_surge);

    // Send GBP email 
    if($currency_type == "GBP") {
    	$mail = new PHPMailer(); // the true param means it will throw exceptions on errors, which we need to catch

				$mail->IsSMTP(); // telling the class to use SMTP

				try {
				  $mail->Host       = "mail.gmail.com"; // SMTP server
				  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
				  $mail->SMTPAuth   = true;                  // enable SMTP authentication
				  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
				  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
				  $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
				  $mail->Username   = SMTP_USERNAME;  // GMAIL username
				  $mail->Password   = SMTP_PASSWORD;            // GMAIL password
				  $mail->AddAddress(SMTP_USERNAME);
				  $mail->SetFrom('VM_APP', 'VM_APP');
				  // $mail->AddReplyTo('name@yourdomain.com', 'First Last');
				  $mail->Subject = "Order Details From Vetro Media Foreign Exchange Application";
				  // $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
				   $mail->MsgHTML("<h1>Order Details: </h1> <hr/> <p>Currency Purchased: $currency_type</p>
                      <br/>
                      <p>Amount: $currency_amount</p> <br/>
                      <p>Exchange Rate: $exchange_rate</p> <br/>
                      <p>Surcharge Percentage: $surcharge_percentage</p> <br/>
                      <p>Surcharge: R $surcharge</p> <br/>
                      <p>Rand Amount: $rand </p> <br/>
                      <p>Total Including surcharge: R $total_including_surge</p>
				   	");
				  
				  $mail->Send();
  
				} catch (phpmailerException $e) {
				  //echo $e->errorMessage(); //Pretty error messages from PHPMailer

					echo "An Error Occured Sending The Email Message. Please Try Again.";
					exit();
				} catch (Exception $e) {
				  //echo $e->getMessage(); //Boring error messages from anything else!

					echo "Sorry, Something Went Wrong Please Try Again Later...";

					exit();
				}
    }

    $this->load->view('user/success');
  }
}