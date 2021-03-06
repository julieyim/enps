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
	<div class="cta-banner">
        <div class="inner-container cta-volunteer flex">
            <p>Interested in joining the fun? We have many projects going on that may be right for you. Come volunteer today!</p>
            <a href="/volunteer" class="btn btn-green">
                Volunteer Now
            </a>
        </div>
    </div>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="flex">
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

				<div class="flex">
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
						<?php if(is_active_sidebar( 'footer-col-three')): ?>
							<?php dynamic_sidebar( 'footer-col-three' ); ?>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="social">
					<?php if(is_active_sidebar( 'footer-col-four')): ?>
						<?php dynamic_sidebar( 'footer-col-four' ); ?>
					<?php endif; ?>
				</div>
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