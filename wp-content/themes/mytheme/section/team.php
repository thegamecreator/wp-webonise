<div class="container" style="padding:10px;">
	<div class="col-sm-6">
		<strong>Team</strong>
		<ul style="list-style-type: circle;">
			<div class="col-sm-6">
	<?php 

$args = array(
    'taxonomy'	=>	'theme',
    'number'	=>	8
); 

$tax = get_terms($args);
	//var_dump($tax);
		for ($i=0; $i < 4; $i++) { 
			?>
			<li><?php echo $tax[$i]->name; ?></li><?php
		}
	?>
			</div>
			<div class="col-sm-6">
	<?php	for ($i=4; $i < 8; $i++) { 
			?>
			<li><?php echo $tax[$i]->name; ?></li><?php
		}
	?>
			</div>
		</ul>
	</div>
	<div class="col-sm-6">
		<strong>Occasion</strong>
		<ul>
			<div class="col-sm-6">
			<?php
			$args = array(
			    'taxonomy'	=>	'Occasion',
			    'number'	=>	8
			); 

			$tax = get_terms($args);
				for ($i=0; $i < 4; $i++) { 
					?><li><?php echo $tax[$i]->name;?></li><?php
					
				}
			?>
			</div>
			<div class="col-sm-6">
			<?php
				for ($i=4; $i < 8; $i++) { 
					?><li><?php echo $tax[$i]->name;?></li><?php
					
				}
			?>
			</div>
		</ul>
	</div>
</div>