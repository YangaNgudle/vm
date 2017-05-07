<?php   
   session_destroy();
?>
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

		    <h1 class="text-center">VM Currency Application</h1> 

		    <p class="text-center">Please Login...</p>

		     <form class="form col-md-12 center-block" action="<?php echo base_url()?>login" method="POST">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Username" name="username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name="password">
            </div>
            <div class="form-group">
               <?php
                    if(isset($error))
                    {
                    	echo $error;
                    }
                   
               ?>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <br/>
              <span class="pull-right"><a href="<?php echo base_url() ?>register">Register Now</a></span>
            </div>
          </form>

		  </div>

		  
		</div>
		
	</div>

</body>
	<script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
</html