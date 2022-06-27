<?php

/*
Template Name: Job Offer Template
Template Post Type: post, page, oferty-pracy
*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single_job-offer">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/single-job-offer-content', get_post_type() );

			echo '<div class="post-navigation">';
			?>
				<div>
				<?php previous_post_link('%link', '<span class="post-navigation__prev">Poprzedni</span> <p>%title</p>'); ?>
			</div>

				<div>

				<?php next_post_link('%link', '<span class="post-navigation__next">Następny</span> <p>%title</p>'); ?>
				</div>

					<?php
			echo '</div>';


		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

