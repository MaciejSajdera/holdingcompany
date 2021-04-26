<?php
/*
 * Template Name: Contact Page Template
 * description: >-
  Page template without sidebar
 */

get_header('blog');
$contact_for_fans = get_field("contact_for_fans");
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main subpage">

				<div class="subpage__header-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>); background-repeat: no-repeat;">
					<?php echo '<h1>'.$contact_for_fans["welcome_header"].'</h1>' ?>
				</div>
					<div class="content__wrapper">
					
					<h3 class="content__intro-text"> <?php echo $contact_for_fans["welcome_text"] ?> </h3>

					<?php echo do_shortcode('[contact-form-7 id="273" title="Napisz do nas"]'); ?>

				</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();