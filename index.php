<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dufrio
 */
get_header(); ?>

<section id="home">
	<div class="container">
	
	<?php
		if ( have_posts() ) : ?>
			<article class="destaques">
				<div class="row">
					<h2 class="col-sm-12">Destaques</h2>
					
					<?php $destaques = new WP_Query(array(
							
							"category_name"		=> "destaques",
							"posts_per_page"	=> 4,
							"posts_count"			=> 4
							
						));
					while ( $destaques->have_posts() ) : $destaques->the_post(); ?>
						<div class="col-xs-6 col-sm-3">
							<div class="post-destaque-box">
								<div class="post-destaque-box-img">
									<?php the_post_thumbnail("full", array("class"=>" center-block")); ?>
								</div>
								<div class="post-destaque-box-title">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</div>
						</div>
					<?php endwhile; ?>

				</div>
			</article>
			
			<div class="row sidebar-wrapper">
				<?php get_sidebar(); ?>
			</div>
			
			<article class="recent-post">
				<div class="row">
					<h2 class="col-sm-9">Ultimas Postagens</h2>
				</div>
				
				<?php while ( have_posts() ) : the_post(); wpb_set_post_views(get_the_ID()); ?>
					
					<?php if ( in_category( 'newsletter' ) || in_category( 'posts_sidebar' ) ) : ?>
				 		<div class="hidden"></div>
				 	<?php else : ?>
					 	<div class="row">
						 	<div class="col-sm-9">
								<div class="post-recent-box clearfix">
										<div class="post-recent-box-img">
											<?php the_post_thumbnail("full"); ?>
										</div>
										<div class="post-recent-box-info clearfix">
											<div class="post-date">
												<p><img src="<?php bloginfo( "stylesheet_directory" ); ?>/assets/img/shapes/calendar-icon.png" alt="Calendar"><?php echo get_the_date(); ?></p>
												<hr>
											</div>
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="excerpt"><?php the_excerpt(); ?></div>
											<a href="<?php the_permalink(); ?>" class="read-more-btn">Ler mais</a>
										</div>
									</div>
							</div>
						</div>
					<?php endif; ?>
					
				<?php endwhile; ?>
				
			</article>
			
			<div class="row">
				<div class="col-sm-9">
					<div class="pagination">
						<?php echo paginate_links(array(
							
							"prev_text"			=> "<i class='ion-ios-arrow-left'></i>",
							"next_text"			=> "<i class='ion-ios-arrow-right'></i>"
						
						)); ?>
					</div>
				</div>
			</div>
			
			<article class="popular">
				<div class="row">
					<h2 class="col-sm-12">Post Populares</h2>
					
					<?php $popularpost = new WP_Query( array( 
					
					'posts_per_page'		=> 4,
					'meta_key'					=> 'wpb_post_views_count',
					'orderby'						=> 'meta_value_num',
					'order' 						=> 'DESC',
					'cat'								=> '-15'
					
					));
					while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
					
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
			</article>
			
			<?php	else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
		
	</div>
</section>

<?php
get_footer();
?>
