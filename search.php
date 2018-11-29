<?php
/**
 * The template for displaying search results pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<img class="frontpage-image" src="<?php echo get_template_directory_uri() . './image/qod-logo.svg';?>" alt="quotes-on-dev-banner" />


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<div class="all-results">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php if (is_search() && ($post->post_type=='page')) continue; ?>
			
				<?php get_template_part( 'template-parts/content', 'search' ); ?>


			<?php endwhile; ?>

			<?php qod_numbered_pagination(); ?>
			

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
