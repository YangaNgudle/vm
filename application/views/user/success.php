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

		    <h1 class="text-center">Saved To Database</h1> 

		    <p class="text-center">You purchased has been saved</p>

		    <p class="text-center"><a href="<?php echo site_url('/');?>" class="text-center">Click here to go back</a></p> 

		  </div>

		  

		</div>
		
	</div>

</body>
	<script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
</html>