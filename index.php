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
			<section class="blog-posts">
			<div class="blog-grid blog-grid--news"> <?php

			while (have_posts() ) :
				// post_title();
				the_post();
				// $category = get_the_category();

				echo '
				<a class="blog-post" href="'. get_permalink() .'">
					<div class="blog-post__upper" style="background-image: url(' .get_the_post_thumbnail_url(). ')"></div>
					<div class="blog-post__caption">
						<div>
						<span class="blog-post__date sub-text--grey">'. get_the_date() .'</span>
						<h3 class="uppercase">' . mb_strimwidth( html_entity_decode(get_the_title()), 0, 70, '...' ) . '</h3>
						</div>
						<p class="sub-text--grey read-more ">Dowiedz się więcej <span class="arrow-right"></span></p>
					</div>
				</a>
				';
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