<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main general-meeting">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-general_meetings', get_post_type() );

			echo '<div class="post-navigation">';
			?>
				<div>
				<?php
				
				// previous_post_link('%link', '<span class="post-navigation__prev">Poprzedni</span> <p>'.trim_title(60, '%title').'</p>');

				$prev_post = get_adjacent_post(false, '', true);
				if(!empty($prev_post)) {
				echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '"><span class="post-navigation__prev">Poprzedni</span><p>' . mb_strimwidth( $prev_post->post_title, 0, 60, '...' ) . '</p></a>'; }
				?>
			</div>

				<div>

				<?php
				//  next_post_link('%link', '<span class="post-navigation__next">Następny</span> <p>%title</p>');
				 
				 $next_post = get_adjacent_post(false, '', false);
				 if(!empty($next_post)) {
				 echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '"><span class="post-navigation__next">Następny</span><p>' . mb_strimwidth( $next_post->post_title, 0, 60, '...' ) . '</p></a>'; }
				 ?>
				</div>

					<?php
			echo '</div>';


		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
