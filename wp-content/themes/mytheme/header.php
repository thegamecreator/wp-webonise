<!DOCTYPE html>
<html>
<head>
	<title><?php wp_title( '-', true, 'right' ); ?></title>
	<?php wp_head();?>
</head>
<body>
<nav>
	<?php wp_nav_menu(
		array(
			'theme_location'	=>	'Primary'
		)
	); ?>
</nav>