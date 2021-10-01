<?php
/*
 * Template Name: Management Page Template
 * description: >-
  Page template without sidebar
 */
$management = get_field("management");

$management_person = $management['management_person'];

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main subpage">

				<div class="subpage__header-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>); background-repeat: no-repeat;">
						<?php echo '<h1>'.get_the_title().'</h1>' ?>
				</div>
				
				<div class="content__wrapper">

					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
						}
					?>
					
					<h2 class="content__intro-text">Zarząd</h2>

					<div class="management management__container">

					<?php

						if ($management_person) {

							foreach($management_person as $person) {

								echo '<div class="management__person person">
								
										<div class="person__image-holder">
											<img src="'.$person['image']['url'].'" alt="'.$person['image']['alt'].'">
										</div>

										<div class="person__header">
											<div class="person__name">
												<p>'.$person['name'].'</p>
											</div>

											<div class="person__role">
												<p>'.$person['role'].'</p>
											</div>
										</div>

										<div class="person__description">
											<p>'.$person['description'].'</p>
										</div>
								
									  </div>';

							}

						}

					?>

					</div>

				</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();