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
		<img id='logoImg' src='<?php echo base_url().$player[0]->logo; ?>'>
		</img>
	</div>
	<p id='fract'><?php echo $player[0]->fraction ?></p>
	</div>
	<div id='left_right'>
	<div id='playersDiv'>
		<p>Player's Nickname: <?php echo $player[0]->nickname; ?> </p>
		<p>Player's Level: <?php echo $player[0]->level; ?> </p>
		<p>Player's Class: <?php echo $player[0]->class; ?> </p>
		<p>Player's Organisation: <?php echo "<a href='".base_url()."organisations/showOrganisation/".$player[0]->org."'>".$player[0]->org." </a>"; ?> </p>
		</div>
	</div>
	<div id='input'>
	<form name='inputForm' method='post' id="messageForm" action='<?php echo base_url()."Players/addComment/".$player[0]->nickname ?>'>
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
