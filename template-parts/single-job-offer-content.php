<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */
$job_offer_traits = get_field("job_offer_traits");
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="post-thumbnail" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>); background-repeat: no-repeat;"></div>
		<div class="content__wrapper">

			<div class="entry-content">

				<div class="job-offer__traits_container">

					<header class="entry-header">
					<!-- <div class="entry-meta">
							<?php
							_s_posted_on();
							_s_posted_by();
							?>
					</div> -->
					<?php

					the_title( '<h1 class="entry-title">', '</h1>' );
					echo '<p>'. get_field("job_employer") . '</p>';

					if ( 'post' === get_post_type() ) :
						?>

					<?php endif; ?>
				</header><!-- .entry-header -->

					<div class="subpage job-offer__form-section">

						<h3 class="content__intro-text"><?php echo get_field("form_header", 276) ?></h3>

						<?php echo do_shortcode('[contact-form-7 id="278" title="Prześlij swoje CV"]'); ?>

					</div>

					<ul class="job-offer__traits">
						<li class="job-offer__traits__location">
							<div class="job-offer__traits--wrapper">
								<span class="job-offer__traits__location--icon"></span>
								<p><?php echo $job_offer_traits["location"] ?></p>
							</div>
						</li>
						<li class="job-offer__traits__recrutation_type">
							<div class="job-offer__traits--wrapper">
								<?php
								if ($job_offer_traits["recrutation_type"] == "zdalna") {
									echo '<span class="job-offer__traits__recrutation_type--icon job-offer__traits__recrutation_type--remote"></span>';
								}

								elseif ($job_offer_traits["recrutation_type"] == "stacjonarna") {
									echo '<span class="job-offer__traits__recrutation_type--icon job-offer__traits__recrutation_type--office"></span>';
								}

								?>

								<p>Rekrutacja <?php echo $job_offer_traits["recrutation_type"]; ?></p>
							</div>
						</li>
						<li class="job-offer__traits__job_schedule">
							<div class="job-offer__traits--wrapper">
								<span class="job-offer__traits__job_schedule--icon"></span>
								<p><?php echo $job_offer_traits["job_schedule"] ?></p>
							</div>
						</li>
						<li class="job-offer__traits__contract_type">
							<div class="job-offer__traits--wrapper">
								<span class="job-offer__traits__contract_type--icon"></span>
								<p><?php echo $job_offer_traits["contract_type"] ?></p>
							</div>
						</li>
					</ul>

				</div>



				<div class="job-offer__tasks_container">

				<h3>Zakres obowiązków</h3>

					<ul class="job-offer__tasks">
						<?php 
							$rows = get_field('job_tasks');
							if( $rows ) {
								foreach( $rows as $row ) {
									$task = $row['task'];

									echo '<li>';
										echo '<span class="list-bullet"></span>';
										echo '<p>'. $task .'</p>';
									echo '</li>';
								}

							}
						?>
					</ul>

				</div>

				
				<div class="job-offer__requirements_container">

				<h3>Wymagania</h3>

					<ul class="job-offer__requirements">
						<?php 
							$rows = get_field('job_requirements');
							if( $rows ) {
								foreach( $rows as $row ) {
									$task = $row['requirement'];
									echo '<li>';
										echo '<span class="list-bullet"></span>';
										echo '<p>'. $task .'</p>';
									echo '</li>';
								}

							}
						?>
					</ul>

				</div>

				<div class="job-offer__benefits_container">

					<h3>Oferujemy</h3>

					<ul class="job-offer__benefits">
						<?php 
							$rows = get_field('job_benefits');
							if( $rows ) {
								foreach( $rows as $row ) {
									$task = $row['benefit'];

									echo '<li>';
										echo '<span class="job-offer__benefits--icon" style="background-image: url('. $task['benefit_image'] .')"></span>';
										echo '<p>'. $task['benefit_text'] .'</p>';
									echo '</li>';
								}

							}
						?>
					</ul>

				</div>





				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		</div>
	<footer class="entry-footer">
		<?php _s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
