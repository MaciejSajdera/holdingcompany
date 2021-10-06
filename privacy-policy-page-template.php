<?php
/*
 * Template Name: Privacy Policy Page Template
 * description: >-
  Page template without sidebar
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="content__wrapper">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'privacypolicy' );


				endwhile; // End of the loop.
				?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
