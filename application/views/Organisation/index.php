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
			<th> Fraction </th>
		</tr>
		<?php
			$i = 0;
			foreach ($org as $orgg) {
				$url = str_replace(" ","_",$orgg->name);
				echo "<tr>\n";
				echo "<td> ".++$i." </td>\n";
				echo "<td><a href='".base_url()."Organisations/showOrganisation/".$url."'>".$orgg->name." </a></td>\n";
				echo "<td> ".$orgg->fraction." </td>\n";
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
