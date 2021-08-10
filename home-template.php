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

			<?php get_template_part( 'template-parts/home-structure', 'page' ); ?>

			<?php
			$home_section_media_header = get_field('home_section_media_header', get_option( 'page_on_front' ));
			$home_section_media_subheader = get_field('home_section_media_subheader', get_option( 'page_on_front' ));
			?>

			<section class="media-posts">
				<div class="media-posts__header section-header">

					<h3><?php echo $home_section_media_header ?></h3>
					<span class="sub-text--grey"><?php echo $home_section_media_subheader ?></span>

				</div>

				<?php get_template_part( 'template-parts/home-media', 'page' ); ?>

			</section>

			<?php 
			$home_section_contact_header = get_field('home_section_contact_header', get_option( 'page_on_front' ));
			$home_section_contact_subheader = get_field('home_section_contact_subheader', get_option( 'page_on_front' ));
			?>

			<section class="contact-section">
				<div class="contact-section__header section-header">
					<h3><?php echo $home_section_contact_header ?></h3>
					<span class="sub-text--grey"><?php echo $home_section_contact_subheader ?></span>
				</div>
			<?php
			get_template_part( 'template-parts/home-contact', 'page' ); ?>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('home');