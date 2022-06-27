<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */



?>


		<div class="media-grid media-grid-home">
					<?php
						// query for the MEDIA POSTS page

						$args = array(  
							'post_type' => 'media-posts',
							'post_status' => 'publish',
							'posts_per_page' => 999,
							'order' => 'DESC', 
						);
					
						$your_query = new WP_Query( $args );
						// "loop" through query (even though it's just one page) 
						while ( $your_query->have_posts() ) :
							
							$your_query->post_title(); $your_query->the_post();
							$category = get_the_category();

							$media_link = get_field('media_link',get_the_ID());
							$media_post_description = get_field('media_post_description', get_the_ID());

							echo '<a class="media-post" href="'.$media_link.'" target="_blank">';
							echo '<div class="media-post__title"><h3>' . get_the_title() . '</h3></div>';
							echo '<p class="uppercase">'. $media_post_description .'</p>';
							echo '</a>';


						endwhile;
				// reset post data (important!)
				wp_reset_postdata();
				?>
			</div>
