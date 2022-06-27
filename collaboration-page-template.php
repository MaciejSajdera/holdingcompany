<?php
/*
 * Template Name: Collaboration Page Template
 * description: >-
  Page template without sidebar
 */
$contact_for_collaboration = get_field("contact_for_collaboration");
get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main subpage">

				<div class="subpage__header-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>); background-repeat: no-repeat;">
						<?php echo '<h1>'.$contact_for_collaboration["welcome_header"].'</h1>' ?>
				</div>
				
				<div class="content__wrapper">
					
					<h3 class="content__intro-text"> <?php echo $contact_for_collaboration["welcome_text"] ?> </h3>

					<?php echo do_shortcode('[contact-form-7 id="280" title="Prześlij ofertę"]'); ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();