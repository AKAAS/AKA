<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" media="screen" type="text/css" />

</head>

<body>

  <html lang="en-US">
<head>

	<meta charset="utf-8">


	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>
<form action ="<?php echo base_url();?>c_index_aka/login" method="post">
    <div class="form">
		Username = admin Password = admin
		<div class="header">LOGIN<br></div>
		<div class="f_input">
			<center>
			<input type="text" name="username" class="in" placeholder="username" required>			
			<input type="password" name="password" class="in" placeholder="password" required>
			</center>
		</div>
		<div class="f_button">
			<center>				
				<input type="submit" name="login" class="button" value="Log In">
			</center>
		</div>
	</div>
</form>
</body>

</html>