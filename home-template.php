<?php
/*
 * Template Name: Home Page Template
 * description: >-
  Page template without sidebar
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php get_template_part( 'template-parts/home-upper-slogan', 'page' ); ?>

			<?php get_template_part( 'template-parts/home-blog-feed', 'page' ); ?>

			<?php get_template_part( 'template-parts/home-media', 'page' ); ?>

			<?php get_template_part( 'template-parts/home-contact', 'page' ); ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();