<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<img class="frontpage-image" src="<?php echo get_template_directory_uri() . './image/qod-logo.svg';?>" />
		<?php if ( have_posts() ) : 
		
			while( have_posts() ): the_post();

			get_template_part( 'template-parts/content' );


		endwhile;

			else:
				get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
