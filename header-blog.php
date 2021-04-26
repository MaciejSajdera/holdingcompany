<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="my-preloader">
	<div class="preloader-content"></div>
</div>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link-dark" rel="home" aria-current="page"></a>

		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', '_s' ); ?></button>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'items_wrap' => '<a href="'.esc_url( home_url( '/' ) ).'" class="menu-logo" rel="home" aria-current="page"></a><ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);
			?>
		</nav>


	</header><!-- #masthead -->

	<div id="content" class="site-content">
