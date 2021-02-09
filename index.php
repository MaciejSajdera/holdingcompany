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
 * @package evenus
 */

get_header('blog');

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header class="entry-header entry-header-blog">
				<div class="blog-posts__header">
				<h1>Aktualności</h1>
				<span class="sub-text--grey">Bądź na bieżąco</span>
		</div>
				</header><!-- .entry-header -->
				<?php
			endif;
			
			?> 
			<section>
			<div class="blog-grid"> <?php
			/* Start the Loop */
			// while ( have_posts() ) :

			// 	the_post();

			// 	/*
			// 	 * Include the Post-Type-specific template for the content.
			// 	 * If you want to override this in a child theme, then include a file
			// 	 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			// 	 */

			// 	echo "<div class='post-wrapper'>";

			// 		echo "<div class='post-upper-wrapper'>";
			// 		if (has_post_thumbnail()):
			// 			the_post_thumbnail();
			// 		endif;

			// 		echo "</div>";

			// 	the_excerpt();

			// 	echo "</div>";

			// endwhile;

			while (have_posts() ) :
				// post_title();
				the_post();
				// $category = get_the_category();

				echo '<a class="blog-post" href="'. get_permalink() .'">';
				echo '<div class="blog-post__upper" style="background-image: url(' .get_the_post_thumbnail_url(). ')"></div>';
				echo '<div class="blog-post__caption">';
				echo '<span class="blog-post__date sub-text--grey">'. get_the_date() .'</span>';
				echo '<h3 class="uppercase">' . get_the_title() . '</h3>';
				echo '<p class="sub-text--grey read-more ">Dowiedz się więcej <span class="arrow-right"></span></p>';
				echo '</div>';
				?>
		
				<?php echo '</a>';

			endwhile;

			?>		</div><!-- blog-grid -->
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