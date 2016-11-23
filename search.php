<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Dufrio
 */

get_header(); ?>

	<section id="search">
		

		<?php
		if ( have_posts() ) : ?>

	<h1 class="page-title"><?php printf( esc_html__( 'Resultados da busca para: %s', 'dufrio' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	
	<div class="container">
		<div class="row sidebar-wrapper">
			<?php get_sidebar(); ?>
		</div>
	</div>
	
	<div class="container">
			<?php /* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
				<div class="row">
					<?php if ( in_category( 'newsletter' ) || in_category( 'posts_sidebar' ) ) : ?>
						<div class="hidden"></div>
				 	<?php else : ?>
				 	<div class="col-sm-9">
						<div class="js-get-height post-recent-box clearfix">
								<div class="js-display-height post-recent-box-img">
									<?php the_post_thumbnail(); ?>
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
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		

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

		<?php else : ?>
			
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1 class="page-title"><?php printf( esc_html__( 'Não encontramos resultados para a busca: %s', 'dufrio' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>
			</div>

			<?php get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
