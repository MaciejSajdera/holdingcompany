<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="my-page-header" <?php post_class(); ?>>
	<header class="entry-header">
		<span id="mainSlogan"><?php the_content(); ?></span>
	</header><!-- .entry-header -->
	<!-- <div class="scroll-down"></div> -->
</article><!-- #post-<?php the_ID(); ?> -->
