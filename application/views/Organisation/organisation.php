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
	<div id='logo'>
		<img id='logoImg' src='<?php echo base_url().$org->logo; ?>'>
		</img>
	</div>
	<p id='fract'><?php echo $org[0]->fraction ?></p>
	<div id='radio'>
		<input type="radio" name="group1" value="Players" checked='true'> Players<br>
		<input type="radio" name="group1" value="LastKilledAntagonists"> Last Killed Antagonists<br>
		<input type="radio" name="group1" value="FullContent"> Full Content<br>
	</div>
	</div>
	<div id='left_right'>
		<table id=playersTable>
		<tr>
			<th> # </td>
			<th> Nickname </td>
			<th> Race </td>
			<th> Class </td>
			<th> Level </td>
		</tr>
		<?php
			$i = 0;
			$url2 = str_replace(" ","_",$header);
			foreach ($players as $player) {
				echo "<tr>\n";
				echo "<td> ".++$i." </td>\n";
				echo "<td><a href='".base_url()."Players/showPlayer/".$player->nickname."'>".$player->nickname." </a></td>\n";
				echo "<td> ".$player->race." </td>\n";
				echo "<td> ".$player->class." </td>\n";
				echo "<td> ".$player->level." </td>\n";
				echo "</tr>\n";
			}
		?>
		</table>
	</div>
	<div id='input'>
	<form name='inputForm' method='post' id="messageForm" action='<?php echo base_url()."Organisations/addComment/".$url2; ?>'>
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
