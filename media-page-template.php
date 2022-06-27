<?php
/*
 * Template Name: Media Page Template
 * description: >-
  Page template without sidebar
 */

get_header();
$home_section_media_header = get_field('home_section_media_header', get_option( 'page_on_front' ));
$home_section_media_subheader = get_field('home_section_media_subheader', get_option( 'page_on_front' ));
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main subpage">

				<header class="entry-header entry-header-blog">
				<div class="blog-posts__header">
				<h1><?php echo $home_section_media_header ?></h1>
				<span class="sub-text--grey"><?php echo $home_section_media_subheader ?></span>
				</div>
				</header><!-- .entry-header -->

				<section class="media-posts">
               		<?php get_template_part( 'template-parts/home-media', 'page' ); ?>
				</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();