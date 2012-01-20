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
			<th> Name </th>
			<th> Level </th>
			<th> Hitpoints </th>
			<th> Content Level </th>
		</tr>
		<?php
			$i = 0;
			foreach ($antagonists as $antagonist) {
				$url = str_replace(" ","_",$antagonist->name);
				$url2 = str_replace(" ","_",$antagonist->content);
				echo "<tr>\n";
				echo "<td> ".++$i." </td>\n";
				echo "<td><a href='".base_url()."Antagonists/showAntagonist/".$url."'>".$antagonist->name." </a></td>\n";
				echo "<td> ".$antagonist->ant_level." </td>\n";
				echo "<td> ".$antagonist->hitpoints." </td>\n";
				echo "<td><a href='".base_url()."Contents/showContent/".$url2."'>".$antagonist->content." </a></td>\n";
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
