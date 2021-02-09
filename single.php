<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header('blog');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

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
