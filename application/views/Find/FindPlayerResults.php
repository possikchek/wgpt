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
		<table id=playersTable>
		<tr>
			<th> # </th>
			<th> Nickname </th>
			<th> Race </th>
			<th> Class </th>
			<th> Level </th>
			<th> Organisation </th>
		</tr>
		<?php
			$i = 0;
			foreach ($players as $player) {
				$url = str_replace(" ","_",$player->org);
				echo "<tr>\n";
				echo "<td> ".++$i." </td>\n";
				echo "<td><a href='".base_url()."Players/showPlayer/".$player->nickname."'>".$player->nickname." </a></td>\n";
				echo "<td> ".$player->race." </td>\n";
				echo "<td> ".$player->class." </td>\n";
				echo "<td> ".$player->level." </td>\n";
				echo "<td><a href='".base_url()."organisations/showOrganisation/".$url."'>".$player->org." </a></td>\n";
				echo "</tr>\n";
			}
		?>
		</table>
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
