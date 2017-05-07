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
	            <h2 class="text-center">Select And Purchase below</h2>
	            <p class="text-center">Leave the value you want to calculate empty</p>
	            <div class="col-md-3">
	            	
	            </div>
	            <div class="col-md-6">
	     
		       	  <form class="form-inline" action="<?php echo site_url('order');?>" method="POST">
		       	    <div class="form-group">
		       	      <input type="text" name="zar_amount" id="zar_amount" class="form-control" placeholder="Rand amount"> <label>ZAR</label> 
		       	    </div>
		       	    <input type="hidden" value="" name="exchange_rate" id="exchange_rate"> 
		       	    <br/>
		       	    <br/>
		       	    <div class="form-group">
		       	       <input type="text" name="currency_amount" id="currency_amount" class="form-control" placeholder="Currency"> 
		       	       <select id="currencyType" name="currencyType" class="form-control"
                         onchange="(
	                        function(e){ var zar_amount = document.getElementById('zar_amount').value;
	                        var currency_amount = document.getElementById('currency_amount').value;

	                        var currencyType = e.target.value; 

	                        
	                        
	                        // check if both amounts are emtpy
	                        if(zar_amount == '' && currency_amount == '') {
                              alert('Insert atleast one amount');
	                        } else {

	                        	if(zar_amount == '' && !isNaN(currency_amount)) {
	                        	 
	                        	  var xhttp;
							   	  if(window.XMLHttpRequest) {
							   	  	xhttp = new XMLHttpRequest();
							   	  }else{
							   	  	xhttp = new ActiveXObject('Microsoft.XMLHTTP');
							   	  }

							   	  xhttp.onreadystatechange = function() {

							   	  	  if(xhttp.readyState == 4 && xhttp.status == 200)
							   	  	  {

							   	  	  	var response = JSON.parse(xhttp.responseText);

							   	  	  	var rate = response['rates']['ZAR'];
							   	  	  	var amount = currency_amount * rate;

							   	  	  	

							   	  	  	document.getElementById('exchange_rate').value = rate;
							   	  	  	
							            document.getElementById('zar_amount').value = amount;
							            
							   	  	  }
							   	  }

							   	  xhttp.open('GET', 'http://api.fixer.io/latest?base='+currencyType+'&symbols=ZAR', true);
							   	  xhttp.send();

	                        	} else if( currency_amount == '' && !isNaN(zar_amount)) {
	         
	                        	  var xhttp;
							   	  if(window.XMLHttpRequest) {
							   	  	xhttp = new XMLHttpRequest();
							   	  }else{
							   	  	xhttp = new ActiveXObject('Microsoft.XMLHTTP');
							   	  }

							   	  xhttp.onreadystatechange = function() {

							   	  	  if(xhttp.readyState == 4 && xhttp.status == 200)
							   	  	  {
							   	  	  	var response = JSON.parse(xhttp.responseText);
							   	  	  	var rate = response['rates'][currencyType];
							   	  	  	var amount = zar_amount * rate;

							   	  	  	document.getElementById('exchange_rate').value = rate;
 
							            document.getElementById('currency_amount').value = amount;
							             // document.getElementById('load-faculties').innerHTML = xhttp.responseText;
							            
							   	  	  }
							   	  }

							   	  xhttp.open('GET', 'http://api.fixer.io/latest?base=ZAR&symbols='+currencyType, true);
							   	  xhttp.send();


	                        	} else {
	                        		// alert('Validation error occured, please make sure you\'re only inserting number values');
	                        	   var xhttp;
							   	  if(window.XMLHttpRequest) {
							   	  	xhttp = new XMLHttpRequest();
							   	  }else{
							   	  	xhttp = new ActiveXObject('Microsoft.XMLHTTP');
							   	  }

							   	  xhttp.onreadystatechange = function() {

							   	  	  if(xhttp.readyState == 4 && xhttp.status == 200)
							   	  	  {
							   	  	  	var response = JSON.parse(xhttp.responseText);
							   	  	  	var rate = response['rates'][currencyType];
							   	  	  	var amount = zar_amount * rate;

							   	  	  	document.getElementById('exchange_rate').value = rate;

							            document.getElementById('currency_amount').value = amount;
							             // document.getElementById('load-faculties').innerHTML = xhttp.responseText;
							            
							   	  	  }
							   	  }

							   	  xhttp.open('GET', 'http://api.fixer.io/latest?base=ZAR&symbols='+currencyType, true);
							   	  xhttp.send();
	                        	}
	                    
	                        }
                         })(event)"
		       	       >
		       	       	 <option value="USD">US Dollar (USD)</option>
		       	       	 <option value="GBP">British Pound (GBP)</option>
		       	       	 <option value="EUR">Euro (EUR)</option>
		       	       	 <option value="KES">Kenyan Shilling (KES)</option>
		       	       </select>
		       	    </div>
		       	    <br/>
		       	    <br/>
		       	    <div>
		       	       
		       	       <button type="submit" class="btn btn-primary pull-right" style="width: 40%">Order</button>
		       	       <button type="button" class="btn btn-success pull-left" style="width: 40%"
                        onclick="
                          (
	                        function(){ var zar_amount = document.getElementById('zar_amount').value;
	                        var currency_amount = document.getElementById('currency_amount').value;

	                        var currencyType = document.getElementById('currencyType').value; 
	                        
	                        // check if both amounts are emtpy
	                        if(zar_amount == '' && currency_amount == '') {
                              alert('Insert atleast one amount');
	                        } else {

	                        	if(zar_amount == '' && !isNaN(currency_amount)) {
	                        	  var xhttp;
							   	  if(window.XMLHttpRequest) {
							   	  	xhttp = new XMLHttpRequest();
							   	  }else{
							   	  	xhttp = new ActiveXObject('Microsoft.XMLHTTP');
							   	  }

							   	  xhttp.onreadystatechange = function() {

							   	  	  if(xhttp.readyState == 4 && xhttp.status == 200)
							   	  	  {
							   	  	  	var response = JSON.parse(xhttp.responseText);
							   	  	  	var rate = response['rates']['ZAR'];
							   	  	  	var amount = currency_amount * rate;

							   	  	  	document.getElementById('exchange_rate').value = rate;

							            document.getElementById('zar_amount').value = amount;
							            
							   	  	  }
							   	  }

							   	  xhttp.open('GET', 'http://api.fixer.io/latest?base='+currencyType+'&symbols=ZAR', true);
							   	  xhttp.send();

	                        	} else if( currency_amount == '' && !isNaN(zar_amount)) {
	         
	                        	  var xhttp;
							   	  if(window.XMLHttpRequest) {
							   	  	xhttp = new XMLHttpRequest();
							   	  }else{
							   	  	xhttp = new ActiveXObject('Microsoft.XMLHTTP');
							   	  }

							   	  xhttp.onreadystatechange = function() {

							   	  	  if(xhttp.readyState == 4 && xhttp.status == 200)
							   	  	  {
							   	  	  	var response = JSON.parse(xhttp.responseText);
							   	  	  	var rate = response['rates'][currencyType];
							   	  	  	var amount = zar_amount * rate;

							   	  	  	document.getElementById('exchange_rate').value = rate;

							            document.getElementById('currency_amount').value = amount;
							             // document.getElementById('load-faculties').innerHTML = xhttp.responseText;
							            
							   	  	  }
							   	  }

							   	  xhttp.open('GET', 'http://api.fixer.io/latest?base=ZAR&symbols='+currencyType, true);
							   	  xhttp.send();


	                        	} else {
	                        		// alert('Validation error occured, please make sure you\'re only inserting number values');
	                        	   var xhttp;
							   	  if(window.XMLHttpRequest) {
							   	  	xhttp = new XMLHttpRequest();
							   	  }else{
							   	  	xhttp = new ActiveXObject('Microsoft.XMLHTTP');
							   	  }

							   	  xhttp.onreadystatechange = function() {

							   	  	  if(xhttp.readyState == 4 && xhttp.status == 200)
							   	  	  {
							   	  	  	var response = JSON.parse(xhttp.responseText);
							   	  	  	var rate = response['rates'][currencyType];
							   	  	  	var amount = zar_amount * rate;

							   	  	  	document.getElementById('exchange_rate').value = rate;

							            document.getElementById('currency_amount').value = amount;
							             // document.getElementById('load-faculties').innerHTML = xhttp.responseText;
							            
							   	  	  }
							   	  }

							   	  xhttp.open('GET', 'http://api.fixer.io/latest?base=ZAR&symbols='+currencyType, true);
							   	  xhttp.send();
	                        	}
	                    
	                        }
                         })()

                        " 

		       	       >Calculate</button>
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