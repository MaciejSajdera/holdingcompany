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
	<section class="stock">
		<div class="stock-wrapper">
		<?php

// Wymagane jest aby w php.ini ustawić parametr allow_url_fopen na true / on

$url = "http://notowania.gpw.pl/wyniki/a45_u__8c/n_SLV_full_data.html";

// Po upublicznieniu spółki, wystarczy tylko zmienić powyższy adres URL. GPW powinno Wam wysłać odpowiedni link

$xml = new SimpleXMLElement($url, null, true);

$total = (count($xml->kurs))-1;
$percent = number_format((float)$xml->kurs_odniesienia - $xml->kurs[$total]->pion, 2, '.', '');

?>

<!--  Wyświetlanie ostatniej ceny akcji -->
	<b class="price"><?php echo number_format((float)$xml->kurs[$total]->pion, 2, '.', '')." PLN"; ?></b>
<!--  Wyświeltanie różnicy aktualnego kursu i kursu początkowego  -->
	<p class="percent"style="<?php if($percent == 0)echo "color:black;";elseif($percent < 0)echo "color:red;";else echo"color:green;" ?>"><?php echo $percent."%"; ?></p>
<!--  Wyświetlanie nazwy emitenta, ostatniej daty kursu  -->
	<p class="stock-info"><?php echo $xml->papier;?> | <?php echo $xml->kurs[$total]->poziom ?> | GPW</p>
		</div>
	</section>

