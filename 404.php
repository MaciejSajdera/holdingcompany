<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _s
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found2">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Przykro nam, ale strona której szukasz nie istnieje.', '_s' ); ?></h1>
					<a class="button button--black" href=<?php echo home_url(); ?>>Powrót</a>
				</header><!-- .page-header -->

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
