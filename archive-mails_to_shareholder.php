<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ekipa
 */

get_header();

?>

	<div id="primary" class="content-area">
		
		<main id="main" class="site-main subpage">
 
			<header class="entry-header entry-header-blog">
				<div class="blog-posts__header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<span class="sub-text--grey">', '</span>' );
					?>
				</div>
			</header><!-- .entry-header -->

			<section class="blog-posts">

				<?php echo do_shortcode( '[searchandfilter id="685"]' ); ?>

				<div class="blog-grid blog-grid--mails">
					
				<?php

				if ( have_posts() ) :

					while (have_posts() ) :
						// post_title();
						the_post();
						// $category = get_the_category();

						echo '<a class="blog-post" href="'. get_permalink() .'">';
						// echo '<div class="blog-post__upper" style="background-image: url(' .get_the_post_thumbnail_url(). ')"></div>';
						echo '<div class="blog-post__caption">';
						echo '<h3 class="uppercase">' . get_the_title() . '</h3>';
						echo '<span class="blog-post__date sub-text--grey">'. get_the_time( 'Y-m-d, G:i' ) .'</span>';
						echo '<p>'.mb_strimwidth( get_the_excerpt(), 0, 220, '...' ).'</p>';
						echo '<p class="sub-text--grey read-more ">Dowiedz się więcej <span class="arrow-right"></span></p>';
						echo '</div>';
						?>
				
						<?php echo '</a>';

					endwhile;

				?>
				</div><!-- blog-grid -->
			</section>
			<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();