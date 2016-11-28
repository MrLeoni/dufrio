<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dufrio
 */

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
	
	// Build a query to handle the "complementos" post type.
	// Only get posts within "Sidebar Posts" taxonomy term
	$sidebar_posts_args = array(
		"post_type"	=> "complementos",
		"order_by"	=> "modified",
		"tax_query"	=> array(array(
			"taxonomy"	=> "complementos-categorias",
			"field"	=> "slug",
			"terms"	=> "sidebar-post",
		))
	);
	$sidebar_posts = new WP_Query( $sidebar_posts_args );
?>

<div class="sidebar-wrapper">
	<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
	<?php
		while($sidebar_posts->have_posts()): $sidebar_posts->the_post(); ?>
			
			<aside id="secondary" class="widget-area" role="complementary">
				<div class="sidebar-posts-box">
					<h4><?php the_title(); ?></h4>
					<p><?php the_content(); ?></p>
				</div>
			</aside>
			
		<?php
		endwhile;
		wp_reset_postdata();
	?>
</div>

