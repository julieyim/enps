<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ENPS
 * @version 1.0.0
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'enps' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$enps_description = get_bloginfo( 'description', 'display' );
			if ( $enps_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $enps_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<div class="top-nav">
			<nav id="site-navigation" class="main-navigation main-nav">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'enps' ); ?></button>
				<?php
				wp_nav_menu(
						array(
							'theme_location' => 'main-nav',
							'menu_class' => 'main-nav',
							'menu_id' => 'main-nav',
						)
					);
				?>
			</nav><!-- #site-navigation -->

			<nav class="main-navigation sub-nav">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'sub-nav',
							'menu_class' => 'sub-nav',
							'menu_id' => 'sub-nav',
						)
					);
				?>
			</nav>
		</div>
		
	</header><!-- #masthead -->
