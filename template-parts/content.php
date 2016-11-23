<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dufrio
 */

?>

<div class="post-page-box-info">
	<div class="post-date">
		<p><img src="<?php bloginfo( "stylesheet_directory" ); ?>/assets/img/shapes/calendar-icon.png" alt="Calendar"><?php echo get_the_date(); ?></p>
		<hr>
	</div>
	<h2><?php the_title(); ?></h2>
	<div class="content">
		<?php the_content(); ?>
	</div>
	<hr>
</div>
