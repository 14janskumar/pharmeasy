<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

<title>Pharmeasy Home</title>

<link id="bootstrap-style" rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/bootstrap-responsive.min.css" />
<link id="base-style" rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>/css/style.css" />
</head>
<body>
    <div id="content" class="login-bg">
	<div class="row-fluid">
    	<div class="span4 offset4">
        	<div class="a-center admin-logo test"><img src="<?php echo site_url(); ?>images/phrameasy_logo.png" ></div>
		<div class="login-part">
        	<div class="down-symbol"></div>
        	<script>
  $(document).ready(function(){
	$.validator.addMethod("loginRegex", function(value, element) {
		return this.optional(element) || /^[a-z0-9\-]+$/i.test(value);
	}, "Must contain only letters, numbers, or dashes.");
    $("#login-form").validate();
  });
  </script>
<section id="login-block">

      <form action="ValidateLogin" method="post" id="login-form" name="login-form" class="form-with-margin">
        <input type="hidden" value="send" id="a" name="a">
		<p class="inline-small-label" style="text-align:center; color:#FFFFFF;">
				</p>
        <div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span>
        <input id="login" name="login" type="text" placeholder="Login" class="input-xlarge required loginRegex">    
          				        </div>
       
       <div class="input-prepend">
        <span class="add-on"><i class="icon-key"></i></span>
          <input class="input-xlarge" value="" type="password" placeholder="Password" id="password" name="password">          
          <button type="submit" class="btn btn-success btn-custome-cruve"><i class="icon-chevron-right"></i></button>   
          <label  class="error alert alert-error login-alert">The Password field is required.</label>		    
        </div>        
                <div class="clearfix"></div>
         </form>
       <div class="clr"></div>

</section>

        </div>
        </div>
    </div>

</div>
</body>
</html>
	
