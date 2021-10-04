<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

$home_section_blog_header = get_field('home_section_blog_header');
$home_section_blog_subheader = get_field('home_section_blog_subheader');
?>

<section class="blog-posts">
		<div class="blog-posts__header section-header">
			<a href=<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>>
			<h3><?php echo $home_section_blog_header ?></h3>
			<span class="sub-text--grey"><?php echo $home_section_blog_subheader ?></span>
			</a>
		</div>

		<div class="blog-grid blog-grid--news blog-grid-home">
					<?php
						// query for the BLOG page
						// displays only 4 most recent posts
						$your_query = my_custom_query();
						// "loop" through query (even though it's just one page) 
						while ( $your_query->have_posts() ) :
							$your_query->post_title(); $your_query->the_post();

							echo '
							<a class="blog-post" href="'. get_permalink() .'">
								<div class="blog-post__upper" style="background-image: url(' .get_the_post_thumbnail_url(). ')"></div>
								<div class="blog-post__caption">
									<div>
									<span class="blog-post__date sub-text--grey">'. get_the_date() .'</span>
									<h3 class="uppercase">' . mb_strimwidth( html_entity_decode(get_the_title()), 0, 70, '...' ) . '</h3>
									</div>
									<p class="sub-text--grey read-more ">Dowiedz się więcej <span class="arrow-right"></span></p>
								</div>
							</a>
							';

				endwhile;
				// reset post data (important!)
				wp_reset_postdata();
				?>

		</div>
		
		<div class="blog__read-more txt-centered">


		<?php
			// don't display the button if there are not enough posts
			if (  $your_query->found_posts > 4 ) {
				?> <a class="my_loadmore button button--black" href=<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>>Zobacz więcej</a> <?php

			} else {
				?>	<a class="button button--black" href=<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>>Zobacz wszystkie</a> <?php
			}
		?>
		
		</div>
	</section>
