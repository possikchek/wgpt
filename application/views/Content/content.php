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
	<div id='left_left'>
	<p id='fract'><?php echo $content[0]->location ?></p>
	</div>
	<div id='left_right'>
	<div id='playersDiv'>
		<table id=playersTable>
		<tr>
			<th> # </th>
			<th> Name </th>
			<th> Level </th>
			<th> Hitpoints </th>
		</tr>
		<?php
			$i = 0;
			$url2 = str_replace(" ","_",$header);
			foreach ($antagonists as $antagonist) {
				$url = str_replace(" ","_",$antagonist->name);
				echo "<tr>\n";
				echo "<td> ".++$i." </td>\n";
				echo "<td><a href='".base_url()."Antagonists/showAntagonist/".$url."'>".$antagonist->name." </a></td>\n";
				echo "<td> ".$antagonist->ant_level." </td>\n";
				echo "<td> ".$antagonist->hitpoints." </td>\n";
				echo "</tr>\n";
			}
		?>
		</table>
		</div>
	</div>
	<div id='input'>
	<form name='inputForm' method='post' id="messageForm" action='<?php echo base_url()."Contents/addComment/".$url2 ?>'>
	    <textarea name='messageName' id="message" rows='2' cols='96' onkeypress="ifEnter(this,event)">
		<?php echo "Enter your Comment"; ?>
		</textarea>
		<input type='text' name='comment' id='hiddenInput'>
	    <input id="send" type="submit" value="Add Comment">
	</form>
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
	<div id='chat'>
				<?php foreach($comments as $comment) {
				echo "<p># ".$comment->commentary."</p>";
			} ?>	
	</div>
</div>
</div>
