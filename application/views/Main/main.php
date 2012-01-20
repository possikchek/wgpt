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
		<p><strong>Welcome to Wow Guild Progress Tracker!</strong></p>
	</div>
</div>
<div id='right'>
	<div id='comboBox'>
		<select>
			<option value="sortAZ" selected='true'>Sort by A-Z</option>
			<option value="sortZA">Sort by Z-A</option>
			<?php foreach($combo as $option) {
				echo "<option value=".$option['value'].">".$option['name']."</option>";
			} ?>
		</select> 
	</div>
</div>
</div>
