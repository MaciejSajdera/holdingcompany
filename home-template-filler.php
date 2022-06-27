<?php
/*
 * Template Name: Home Page Template Filler
 * description: >-
  Page template without sidebar
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php get_template_part( 'template-parts/home-upper-slogan-filler', 'page' ); ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('filler');