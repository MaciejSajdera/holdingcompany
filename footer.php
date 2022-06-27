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

$cookie_info = get_field('cookie_info', 8);
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="sub-text--grey site-info">
			@ <?php echo get_bloginfo( 'name' ); ?>
		</div>

	<div class="cookie-law-notification">
			<button id="cookie-law-button">Akceptuję</button>
			<p><?php echo $cookie_info ?></p>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
