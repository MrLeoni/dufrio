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
		<div class="container">
			
		<?php if ( have_posts() ) : ?>
		<h1 class="page-title"><?php printf( esc_html__( 'Resultados da busca para: %s', 'dufrio' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		
		<div class="row">
			
			<div class="col-md-9">
				<div class="row">
					<?php /* Start the Loop */
					while ( have_posts() ) : the_post(); ?>
					<div class="col-sm-12">
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
								<a href="<?php the_permalink(); ?>" class="read-more-btn fill">Ler mais</a>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			
				
			<div class="col-md-3 hidden-xs hidden-sm">
				<?php get_sidebar(); ?>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-sm-9">
				<div class="pagination">
					<?php echo paginate_links(array(
						
						"prev_text"			=> '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
						"next_text"			=> '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
					
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

		</div><!-- .container -->
	</section><!-- #search -->

<?php get_footer(); ?>
