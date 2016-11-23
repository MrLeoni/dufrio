<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dufrio
 */
 
 // Get category "Newsletter" ID
 $NewsletterId = get_cat_ID("Newsletter");
 
 // Querying posts from "Sidebar" category
 $sidebarQuery = new WP_Query(array(
 		
 		"category_name" => "sidebar",
 		"orderby"				=> "modified"
 		
 	));

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
?>

<div id="sidebar-box" class="col-sm-offset-9 col-sm-3 hidden-xs absolute">
	<aside id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' );
			
	    while ( $sidebarQuery->have_posts() ) : $sidebarQuery->the_post();
	    // Get posts category and the ID of the respective category
	    $postCat = get_the_category();
	    $postCatId = $postCat[0]->cat_ID;
	    
	    if ($postCatId == $NewsletterId) :
		  	get_template_part( 'template-parts/content', 'newsletter' );
		  else:
		  	get_template_part( 'template-parts/content', 'sidebar_post' );
		  endif;
  		endwhile; wp_reset_postdata(); ?>
	</aside><!-- #secondary -->
</div>

