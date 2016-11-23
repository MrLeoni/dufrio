<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dufrio
 */

get_header(); 
?>

	<section id="post">
		<div class="container">
			<div class="row">
				<div class="row sidebar-wrapper">
					<?php get_sidebar(); ?>
				</div>
				<div class="post-wrap clearfix">
					<?php	while ( have_posts() ) : the_post(); ?>
					
						<div class="col-sm-9">
							<?php get_template_part( 'template-parts/content', get_post_format() );?>
						</div>
						<div class="col-sm-9">
							<div class="tags">
								<h2>Tags</h2>
								<?php the_tags(" ", " ", " "); ?>
							</div>
						</div>
						
					<?php endwhile;?>
				</div>
			</div>
			<div class="row">
				<div class="related-posts clearfix">
					<h2 class="col-sm-12">Posts Relacionados</h2>
					
					<?php $relatedCat = get_the_category(); //"current_category"	=> $relatedCat[0]->cat_ID?>
					<?php $relatedPost = new WP_Query( array( 
					
					'posts_per_page'		=> 4,
					'meta_key'					=> 'wpb_post_views_count',
					'orderby'						=> 'meta_value_num',
					'order' 						=> 'DESC',
					'cat'								=>  $relatedCat[0]->cat_ID
					
					));
					while ( $relatedPost->have_posts() ) : $relatedPost->the_post(); ?>
					
						<div class="col-xs-6 col-sm-3">
							<div class="post-popular-box">
								<div class="post-popular-box-img">
								<?php the_post_thumbnail("full", array("class"=>" center-block")); ?>
								</div>
								<div class="post-popular-box-title">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</div>
						</div>
					
					<?php endwhile; ?>
					<?php wp_reset_postdata();?>
					
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>