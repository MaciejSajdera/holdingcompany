<?php
/*
 * Template Name: Corporate documents Page Template
 * description: >-
  Page template without sidebar
 */

get_header();
$document_file = get_field('document_file');
$document_title = get_field('document_title');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main subpage">

			<div class="subpage__header-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>); background-repeat: no-repeat;">
							<?php echo '<h1>Dokumenty korporacyjne</h1>' ?>

							<?php
								// the_archive_title( '<h1 class="page-title">', '</h1>' );
								// the_archive_description( '<div class="archive-description">', '</div>' );
							?>
					</div>
					
			<div class="content__wrapper--motionless">

				<!-- <h3 class="content__intro-text">Wyszukiwarka raportów</h3> -->

				<?php
					if (get_the_post_type_description()) {
						echo get_the_post_type_description();
					}
				?>


				<div class="results">

					<?php

					if ( have_posts() ) : ?>

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							// var_dump(wp_get_object_terms( $post->ID, 'rodzaj_raportu', array( 'fields' => 'names' ) ));

							echo '
								<div class="single-result">

									<div class="single-result__content">

										<div class="single-result__top">

											<p class="sub-text--grey">Opublikowano: '.get_the_date().'</p>

										</div>

										<div class="single-result__bottom">

											<p>'.get_the_title().'</p>

										</div>

									</div>

									<a class="button button--black button--download" href="'.$document_file['url'].'" download>Pobierz</a>

								</div>
							';


			
							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							// get_template_part( 'template-parts/content', get_post_type() );
			
						endwhile;
			
						the_posts_navigation();
			
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif;

					?>

				</div> <!-- results -->

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();