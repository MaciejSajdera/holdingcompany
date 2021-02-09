<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="my-page-header" <?php post_class(); ?> style="background-image: url(<?php echo get_field('home_background_photo') ?>); background-repeat: no-repeat; background-size: cover; background-position: 20%;">
	<header class="entry-header">

		<!-- <span id="mainSlogan"><?php the_content(); ?></span> -->
	</header><!-- .entry-header -->
	<div class="scroll-down"></div>
</article><!-- #post-<?php the_ID(); ?> -->
