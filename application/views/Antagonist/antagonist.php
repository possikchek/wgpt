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
	<p id='fract'><?php echo $antagonist[0]->content;
								$url2 = str_replace(" ","_",$header);?></p>
	</div>
	<div id='left_right'>
	<div id='playersDiv'>
		<p>Antagonist's Name: <?php echo $antagonist[0]->name; ?> </p>
		<p>Antagonist's  Hitpoints: <?php echo $antagonist[0]->hitpoints; ?> </p>
		<p>Antagonist's  Level: <?php echo $antagonist[0]->ant_level; ?> </p>
		<p>Antagonist's  Content Level: <?php echo "<a href='".base_url()."Contents/showContent/".str_replace(" ","_",$antagonist[0]->content)."'>".$antagonist[0]->content." </a>"; ?> </p>
		</div>
	</div>
	<div id='input'>
	<form name='inputForm' method='post' id="messageForm" action='<?php echo base_url()."Antagonists/addComment/".$url2 ?>'>
	    <textarea name='messageName' id="message" rows='2' cols='96' onkeypress="ifEnter(this,event)">
		<?php echo "Enter your Comment"; ?>
		</textarea>
		<input type='text' name='comment' id='hiddenInput'>
	    <input id="send" type="submit" value="Add Comment">
	</form>
	</div>
</div>
<div id='right'>
	<div id='chat'>
			<?php foreach($comments as $comment) {
				echo "<p># ".$comment->commentary."</p>";
			} ?>
	</div>
</div>
</div>
