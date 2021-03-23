<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ENPS
 * @version 1.0.0
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
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
			</div>
			
			<nav class="main-navigation footer-nav">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-nav',
							'menu_class' => 'footer-nav',
							'menu_id' => 'footer-nav',
						)
					);
				?>
			</nav>

			<div class="newsletter">
				<form>
					<label>Sign up to the Wildflower Newsletter</label>
					<div class="sign-up">
						<input type="text">
						<button>Sign Up</button>
					</div>
				</form>
			</div>

			<div class="social">
				
			</div>

			<div class="site-info">
				<p> <?php echo date('Y'); ?> &copy; Edmonton Native Plant Society. All rights reserved.</p>
				<p>Website created by Large Macchiato.</p>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>