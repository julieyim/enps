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
		<div class="container">
			<div class="flex">
				<div class="logo">
					<?php if ( ! has_custom_logo() ) { ?>
						<?php if ( is_front_page() && is_home() ) : ?>
						<!-- if your page is set to front-page or blog display the site title (appearance > customize) -->
						<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
						<?php else : ?>
						<!-- if your page is not set to front-page or blog display thesite title (appearance > customize) -->
						<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"itemprop="url"><?php bloginfo( 'name' ); ?></a>
					<?php endif;
					} 
					else{
						the_custom_logo();
					}?>
				</div>
				<div class="toggle-icon">
                    <svg svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M442 114H6a6 6 0 0 1-6-6V84a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6zm0 160H6a6 6 0 0 1-6-6v-24a6 6 0 0 1 6-6h436a6 6 0 0 1 6 6v24a6 6 0 0 1-6 6z"></path></svg>
                </div>
			</div>
			<div class="top-nav">
				<nav id="site-navigation" class="main-nav">
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
				<nav class="sub-nav">
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
		</div>
	</header><!-- #masthead -->
