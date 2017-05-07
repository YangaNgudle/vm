<!DOCTYPE html>
<html>
<head>
	<title>Picasso</title>
	<?php echo link_tag('assets/css/bootstrap.css'); ?>
	<?php echo link_tag('assets/css/style.css'); ?>
</head>
<body>
	<div class="container">
	  <div class="container">
		<div class="jumbotron">
		  <h1 class="text-center">Buy Foreign Currencies</h1> 
		    <p class="text-center">by Siyavuya Yanga Ngudle</p> 
		</div>
	  </div>
	  <div class="container">
	    <div class="row">
	       <div class="col-md-2">
	       	
	       </div>
	       <div class="col-md-8">
	          <div class="row">
	            <h2 class="text-center">Order Confirmation</h2>
	            <div class="col-md-3">     	
	            </div>
	           
	            <div class="col-md-6">
	               <p>Purchasing: <?php echo $currency_type?> <?php echo $currency_amount?> </p>
	               <p>Exchange Rate: <?php echo $exchange_rate ?> according to <a href="http://fixer.io/" target="_blank">fixer.io</a> </p>
	               <p>Surcharge percentage: <?php echo $surcharge_percentage ?></p>
	               <p>Surcharge Amount: R <?php echo $surcharge ?></p>
	               <p>Rand Cost: R <?php echo $rand ?></p>
	               <p>Total Cost (Including service charge): R <?php echo $total_including_surge ?></p>
	               <hr/>
	               <form action="<?php echo site_url('confirmation'); ?>" method="POST">
	               	 <div>
	               	   <input type="hidden" name="currency_type" value="<?php echo $currency_type ?>">
	               	   <input type="hidden" name="currency_amount" value="<?php echo $currency_amount ?>">
	               	   <input type="hidden" name="exchange_rate" value="<?php echo $exchange_rate ?>">
	               	   <input type="hidden" name="surcharge_percentage" value="<?php echo $surcharge_percentage ?>">
	               	   <input type="hidden" name="surcharge" value="<?php echo $surcharge ?>">
	               	   <input type="hidden" name="rand" value="<?php echo $rand ?>">
	               	   <input type="hidden" name="total_including_surge" value="<?php echo $total_including_surge?>">
		       	       <button type="submit" class="btn btn-primary pull-right" style="width: 50%">Confirm Order</button>
		       	    </div>
	               </form>

	            </div>
	            <div class="col-md-3">
	            	
	            </div>        	
	          </div>
	       </div>
	       <div class="col-md-2">
	       	
	       </div>
	    </div>
	  </div>	
	</div>
</body>
	<script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
</html>