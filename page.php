<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();

$documents = get_field('documents');

$company = get_field('company');
$capital_market_institutions = get_field('capital_market_institutions');

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

				<div class="subpage__content">
					<?php
						the_content();
					?>
				</div>
			
			<?php

				if ($documents) {

					foreach($documents as $document) {
						echo '
						<div class="document-file-container">
							<p>'.$document['document_title'].'</p>
							<a class="button button--black button--download" href="'.$document['document_file']['url'].'" download>Pobierz</a>
						</div>
						';
					}


				}

				if ($company) {

					echo '<div class="collaborators-container">';

						foreach($company as $company) {
							echo '
							<p>'.$company['header'].'</p>

							<img src="'.$company['image']['url'].'" alt="'.$company['image']['alt'].'">
							<p>'.$company['description'].'</p>

							';


						}

					echo '</div>';
				}

				if ($capital_market_institutions) {

					echo '<div class="capital_market_institutions-container">';

					foreach($capital_market_institutions as $institution) {

						echo '
						<div class="institution">
							<p>'.$institution['title'].'</p>
							<a class="button button--black" href="'.$institution['link'].'" target="_blank">Sprawdź</a>
						</div>
						';

					}

					echo '</div>';
				}

			?>

			</div>

		 <?php
		// while ( have_posts() ) :
		// 	the_post();

		// 	get_template_part( 'template-parts/content', 'page' );


		// endwhile; // End of the loop.
		?> 

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
