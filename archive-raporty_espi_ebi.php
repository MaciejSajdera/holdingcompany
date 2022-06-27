<?php
/*
 * Template Name: ESPI/EBI Raports Page Template
 * description: >-
  Page template without sidebar
 */

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main subpage">
 
			<div class="subpage__header-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>); background-repeat: no-repeat;">
							<?php echo '<h1>Raporty</h1>' ?>

							<?php
								// the_archive_title( '<h1 class="page-title">', '</h1>' );
								// the_archive_description( '<div class="archive-description">', '</div>' );
							?>
					</div>
					
			<div class="content__wrapper--motionless">

				<?php

				$count_posts = wp_count_posts('raporty_espi_ebi')->publish;

				if ( !have_posts() && $count_posts == 0) :

					echo '<h3 class="content__intro-text">Brak sprawozdań finansowych na moment obecny. Pierwszym okresem obrachunkowym spółki będzie okres 05.11.2020 - 31.12.2021.</h3>';

				else :

				?>

					<h3 class="content__intro-text">Wyszukiwarka raportów</h3>

					<div>

					<?php echo do_shortcode( '[searchandfilter id="561"]' ); ?>

					</div>

					<div class="results">

						<?php

						if ( have_posts() ) :
						
						?>

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
												<p class="sub-text--grey">Raport '.wp_get_object_terms( $post->ID, 'rodzaj_raportu', array( 'fields' => 'names' ) )[0].' nr '.get_field('report_id').'</p>

											</div>

											<div class="single-result__bottom">

												<p><a href="'.get_the_permalink().'">'.get_the_title().'</a></p>

											</div>

										</div>

										<a href="'.get_the_permalink().'"><p class="sub-text--grey read-more">Szczegóły<span class="arrow-right"></span></p></a>


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

					endif;

					?>

				</div> <!-- results -->

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();