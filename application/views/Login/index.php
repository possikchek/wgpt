<div id='main'>
<div id='left'>
	<div id='menu'>
		<ul>
			<li><a href='<?php echo base_url()."Organisations" ?>'>Organisations</a></li>
			<li><a href='<?php echo base_url()."Players" ?>'>Players</a></li>
			<li><a href='<?php echo base_url()."Contents" ?>'>Content Levels</a></li>
			<li><a href='<?php echo base_url()."Antagonists" ?>'>Antagonists</a></li>
			<li><a href='<?php echo base_url()."Find" ?>'>Find</a></li>
		</ul>
	</div>
	<div id='singleLeft'>
		<form method='post' action='<?php echo base_url()."Login/authenticate" ?>'>
			<br>
			<p id='error'><?php if($error) echo "ERROR: ".$error; ?> </p>
			Login: <input type='text' name='login'><br><br>
			Password: <input type='password' name='password'><br><br>
			<input type='submit' value='Login'>
		</form>
	</div>
</div>
<div id='right'>
	
</div>
</div>
