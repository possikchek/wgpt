<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/header.css" ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/main.css" ?>" />
		<script type="text/javascript">           
			function ifEnter(field,event) {
				var theCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
				if (theCode == 13) {
					document.forms['inputForm'].elements['comment'].value = document.forms['inputForm'].elements['messageName'].value;
					document.getElementById('send').click();
					return false;
				} else {
					return true;
				}
			}
		</script>
        <title> <?php echo $title; ?> </title>
    </head>
    <body>
	<div id='container'>
		<h1> <?php echo $header; ?> </h1>
		<div id='buttons'>
			<div id = 'myOrgButton'>
				<form method="post" action="<?php echo base_url()."organisations/MyOrganisation"; ?>">
					<input type="submit" value="My Organisation" />
				</form>
			</div>
			<div id = 'logoutButton'>
				<form method="post" action="<?php echo base_url().$action; ?>">
					<input type="submit" value="<?php echo $action; ?>" />
				</form>
			</div>
		</div>
		<hr/>