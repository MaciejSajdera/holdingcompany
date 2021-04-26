<?php
/*
 * Template Name: Career Page Template
 * description: >-
  Page template without sidebar
 */

get_header('blog');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main subpage">

					<div class="content__wrapper">

					<h3 class="content__intro-text"> <?php echo $contact_for_fans["welcome_text"] ?> </h3>

						<div class="job-offers-wrapper">

							<div class="job-offers__ajax-element job-offers-grid">
							
						<?php

						/*
						* Custom Post Pagination
						* @since 1.0.0
						* return 
						*/
						if ( get_query_var( 'paged' ) ) { 
							$paged = get_query_var( 'paged' ); 
						} elseif ( get_query_var( 'page' ) ) { 
							$paged = get_query_var( 'page' ); 
						} else { 
							$paged = 1; 
						}

						// $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;


						// if (!function_exists('ic_custom_posts_pagination')) :
							function ic_custom_posts_pagination($the_query=NULL, $paged){

								global $wp_query;
								$the_query = !empty($the_query) ? $the_query : $wp_query;

								if ($the_query->max_num_pages > 1) {
									$big = 999999999; // need an unlikely integer
									$items = paginate_links(apply_filters('adimans_posts_pagination_paginate_links', array(
										'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
										'format' => '?paged=%#%',
										'prev_next' => TRUE,
										'current' => max(1, $paged),
										// 'current' => max( 1, $the_query->query_vars['paged'] ),
										'total' => $the_query->max_num_pages,
										'type' => 'array',
										'prev_text' => '',
										'next_text' => '',
										'end_size' => 1,
										'mid_size' => 1
									)));

									$pagination = "<div class=\"pagination-container\"><div class=\"ic-pagination\"><ul><li>";
									$pagination .= join("</li><li>", (array)$items);
									$pagination .= "</li></ul></div></div>";

									echo apply_filters('ic_posts_pagination', $pagination, $items, $the_query);
								}
							}


						// endif;



						$job_offers_per_page = 3;

						$job_offers = array(
						'post_type'=> 'oferty-pracy',
						'orderby'        => 'DESC',
						'post_status' => 'publish',
						'posts_per_page'  	=> $job_offers_per_page ? (int)$job_offers_per_page : 3,
						'paged' 		=> $paged,
						);    

						$job_offers_query = new WP_Query( $job_offers );

						if ( $job_offers_query->have_posts() ) : 

							while ($job_offers_query->have_posts() ) :

								$job_offers_query->post_title(); $job_offers_query->the_post();

								// $your_query->post_title(); $your_query->the_post();
								// post_title();
								// the_post();
								// $category = get_the_category();

								echo '<a class="blog-post" href="'. get_permalink() .'">';
									echo '<div class="blog-post__upper" style="background-image: url(' .get_the_post_thumbnail_url(). ')"></div>';
									echo '<div class="blog-post__caption">';
									echo '<span class="blog-post__date sub-text--grey">'. get_the_date() .'</span>';
									echo '<h3 class="uppercase">' . get_the_title() . '</h3>';
									echo '<p class="sub-text--grey read-more ">Dowiedz się więcej <span class="arrow-right"></span></p>';
									echo '</div>';
								echo '</a>';

							endwhile;

						?>
							</div>
						<!-- </div> -->

						<!-- pagination here -->
						<div class="job-offers__ajax-element">
							<div class="col-md-12">
								<?php ic_custom_posts_pagination($job_offers_query, $paged); ?>
							</div>
						</div>

						</div><!-- blog-grid -->

						<?php wp_reset_postdata(); ?>



						<?php else : ?>
   							 <p class="text-warning"><?php esc_html_e( 'Brak ofert do wyświetlenia.'); ?></p>
						<?php endif; ?>

					<?php echo do_shortcode('[contact-form-7 id="278" title="Prześlij swoje CV"]'); ?>

				</div>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();