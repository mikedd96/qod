<?php
/**
 * The template for displaying the footer.
 *
 * @package QOD_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php printf( esc_html( 'Proudly powered by %s' ), 'WordPress' ); ?></a>
				</div><!-- .site-info -->
				<div class="footer-content">
				<ul class="menu">
			<li>
				<a class="footer-about" href="about">About</a>
			</li>
			<li>
			<a href="archives">Archives</a>
			</li>
			<li>
			<a href="submit">Submit A Quote</a>
			</li>
		</ul>
<p class="brought">Brought to you by <span class="red">RED Academy<span></p>
</div>
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>
	</body>
</html>
