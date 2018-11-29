<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<img class="frontpage-image" src="<?php echo get_template_directory_uri() . './image/qod-logo.svg';?>" alt="quotes-on-dev-banner"/>
			
			<section class="error-404 not-found">
				

				<div class="page-content">
					<header class="page-header">
					<h1 class="page-title"><?php echo esc_html( 'Oops!' ); ?></h1>
				</header><!-- .page-header -->
					<p><?php echo esc_html( 'It looks like nothing was found at this location. Maybe try a search?' ); ?></p>

					<div class="all-search">
					<?php get_search_form(); ?>
					<span class="search-icon" aria-hidden="true">
					<i class="fas fa-search"></i>
					</span>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
