<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

$cookie_info = get_field('cookie_info', get_option( 'page_on_front' ));
?>

	</div><!-- #content -->

	<!-- <footer id="colophon" class="site-footer">
		<div class="sub-text--grey site-info">
			@ EKIPA <span class="txt-lowercase">Holding</span>
		</div>
	<div id="cookie-text">
		<p><?php echo $cookie_info ?></p>
	</div>
	</footer> -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
