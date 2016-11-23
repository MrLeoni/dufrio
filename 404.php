<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Dufrio
 */

get_header(); ?>

<section class="not-found">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				
				<h1 class="page-title">404</h1>
				<h2 class="page-title">Desculpe, mas não encontramos a página desejada</h2>
				<div class="not-found-search">
					<p>Talvez uma busca ajude?</p>
					<div class="not-found-search-form">
						<?php get_search_form(); ?>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section><!-- .not-found -->

<?php
get_footer();
