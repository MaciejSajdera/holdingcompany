<?php
/*
 * Template Name: Collaboration Page Template
 * description: >-
  Page template without sidebar
 */

get_header('blog');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php the_content(); ?>

		<?php echo do_shortcode('[contact-form-7 id="280" title="Prześlij ofertę"]'); ?>

		<?php get_template_part( 'template-parts/home-contact', 'page' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();