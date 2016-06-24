<?php
get_header();

get_template_part( 'section/bigtitle' );
get_template_part('section/team');
get_template_part('section/packs');
get_template_part('section/detail');
get_template_part('section/custompack');
?>
<div id="sidebar" class="footer-section">
	<?php dynamic_sidebar('sidebar-2'); ?>
</div>
<?php
get_footer();?>