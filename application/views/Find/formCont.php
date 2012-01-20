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
		<form method='post' action='<?php echo base_url()."Find/FindContentsResults" ?>'>
			<br>
			Content Level Name: <input type='text' name='contentName'><br><br>
			Content Level Location: <input type='text' name='contentLocation'><br><br>
			<input type='submit' value='Find Content Levels'>
		</form>
	</div>
</div>
<div id='right'>
	
</div>
</div>
