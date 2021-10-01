<?php
/*
 * Template Name: Shareholding Structure Page Template
 * description: >-
  Page template without sidebar
 */
$shareholding = get_field("shareholding_structure");

$shareholding_position = $shareholding['shareholding_position'];

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

					<h2 class="content__intro-text">
						
					<?php
						the_content();
					?>

					</h2>

					<div class="shareholding shareholding__container">

					<?php

						if ($shareholding_position) {

							// foreach($shareholding_position as $position => $name ) {
							// 	// $fields = get_field_object($name);

							// 	var_dump($name);
							// }

							$subfields = get_field_object("shareholding_structure")['sub_fields'][0]['sub_fields'];
							echo '<div class="shareholding__position media-post header">';

							foreach($subfields as $subfield) {
								echo 
								'
								<div class="media-post__title">
									<p>'.$subfield['label'].'</p>
								</div>
								';
							}

							echo '</div>';


							foreach($shareholding_position as $position ) {


								echo '<div class="shareholding__position media-post position">
								
										<div class="media-post__title name">
											<p>'.$position['person'].'</p>
										</div>

										<div class="media-post__title">
											<p>'.$position['number_of_shares'].'</p>
										</div>

										<div class="media-post__title">
											<p>'.$position['percentage_in_share_capital'].'</p>
										</div>

										<div class="media-post__title">
											<p>'.$position['number_of_votes'].'</p>
										</div>

										<div class="media-post__title">
											<p>'.$position['percentage_in_number_of_votes'].'</p>
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