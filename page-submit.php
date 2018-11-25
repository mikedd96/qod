<?php
/**
 * The template for displaying submit page.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <img class="frontpage-image" src="<?php echo get_template_directory_uri() . './image/qod-logo.svg';?>" />

		<section class="quote-submission">
            

            <?php if( is_user_logged_in() && current_user_can( 'edit_posts')): ?>
                <div class="quote-submission-wrapper">
                    <form name="quoteForm" id="quote-submission-form">
                        <div>
                            <label for=""> Author of Quote</label>
                            <input type="text" name="quote_author" id="quote-author">
                        </div>
                        <div>
                            <label for="quote-content">Quote</label>
                            <textarea name="quote_content" id="quote-content" rows="3" cols="20"></textarea>
                        </div>
                        <div>
                            <label for="">Where did you find this quote? (e.g. book name)</label>
                            <input type="text" name="quote_source" id="quote-source">
                        </div>
                        <div>
                            <label for="">Provide the URL of the quote source, if available.</label>
                            <input type="url" name="quote_source_url" id="quote-source-url">
                        </div>
                        <input type="submit" value="Submit Quote">
                    </form>
                </div>

                <?php else: ?>
                <div class="all-submit-out">
                <header class="entry-header">
                <?php the_title('<h1 class="entry-title">','</h1>'); ?>
            </header>
                <p> sorry, please log in to submit a quote.</p>
                <p><?php echo sprintf( '<a href"%1s">%2s</a>', esc_url( wp_login_url() ), 'click here to login.' );?></p>
                </div>
            <?php endif; ?>
        </section

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>