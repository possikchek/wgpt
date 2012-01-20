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
		<form method='post' action='<?php echo base_url()."Find/FindPlayersResults" ?>'>
			<br>
			Players Fraction: <select name='fraction'>
								  <option value="Both">Both</option>
								  <option value="Alliance">Alliance</option>
								  <option value="Horde">Horde</option>
								</select> <br><br>
			Players Nickname: <input type='text' name='playerName'><br><br>
			Players Class: <select name='playerClass'>
								<option value="All">All Classes</option>
								  <?php foreach($classes as $cla) {
										echo "<option value=".$cla->name.">".$cla->name."</option>";
									} ?>
								</select> <br><br>
			<input type='submit' value='Find Player'>
		</form>
	</div>
</div>
<div id='right'>
	
</div>
</div>
