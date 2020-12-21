<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

$home_header_2 = get_field('home_header_2');

?>

<section class="media-posts">
		<div class="media-posts__header">
			<a href=<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>>
			<h3>Media o nas</h3>
			<span class="sub-text--grey"><?php echo $home_header_2 ?></span>
			</a>
		</div>

		<div class="media-grid media-grid-home">
					<?php
						// query for the MEDIA POSTS page

						$args = array(  
							'post_type' => 'media-posts',
							'post_status' => 'publish',
							'posts_per_page' => 999, 
							'orderby' => 'title', 
							'order' => 'ASC', 
						);
					
						$your_query = new WP_Query( $args );
						// "loop" through query (even though it's just one page) 
						while ( $your_query->have_posts() ) :
							
							$your_query->post_title(); $your_query->the_post();
							$category = get_the_category();

							$media_link = get_field('media_link',get_the_ID());

							echo '<a class="media-post" href="'.$media_link.'" target="_blank">';
							echo '<h3 class="uppercase">' . get_the_title() . '</h3>';
							echo '</a>';


						endwhile;
				// reset post data (important!)
				wp_reset_postdata();
				?>
			</div>

		<!-- <div class="txt-centered">
		<a class="read-more" href=<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>>Zobacz wszystkie</a> -->

</section>

