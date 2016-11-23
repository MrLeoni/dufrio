<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dufrio
 */

get_header(); ?>

	<section class="page">
		<div class="container">

			<article class="recent-post">
				<div class="row">
					<?php get_sidebar(); ?>
					<h2 class="col-sm-9">Ultimas Postagens</h2>
					<?php while ( have_posts() ) : the_post(); wpb_set_post_views(get_the_ID()); ?>
					
					<div class="col-sm-9">
						<div class="js-get-height post-recent-box clearfix">
								<div class="js-display-height post-recent-box-img">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="post-recent-box-info clearfix">
									<div class="post-date">
										<p><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_date(); ?></p>
										<hr>
									</div>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="excerpt"><?php the_excerpt(); ?></div>
									<a href="<?php the_permalink(); ?>" class="read-more-btn">Ler mais</a>
								</div>
							</div>
					</div>
					
					<?php endwhile; ?>
				</div>
			</article>

		</div>
	</section>

<?php get_footer(); ?>
