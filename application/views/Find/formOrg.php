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
	<div id='singleLeftFind'>
		<form method='post' action='<?php echo base_url()."Find/FindOrganisationsResults" ?>'>
			<br>
			Organisation Fraction: <select name='fraction'>
						  <option value="Both">Both</option>
						  <option value="Alliance">Alliance</option>
						  <option value="Horde">Horde</option>
						</select> <br><br>
			Organisation Name: <input type='text' name='orgName'><br><br>
			<input type='submit' value='Find Organisation'>
		</form>
	</div>
</div>
<div id='right'>
	
</div>
</div>
