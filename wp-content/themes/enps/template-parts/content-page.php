<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ENPS
 * @version 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hero">
		<?php enps_post_thumbnail(); ?>
    </div>

	<div class="page-banner">
		<div class="inner-container">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php get_template_part( 'content-banner.php' ); ?>
		</div>
	</div><!-- .page-banner -->
	<div class="container">
		<div class="inner-container">
			<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'enps' ),
						'after'  => '</div>',
					)
				);
			?>

			<!-- go to top button -->
			<div class="gtt-btn">
				<?php $go_to_top_btn = get_field('go_to_top_btn') ?>
				<?php 
					if ($go_to_top_btn):
						// create variable to store information and to display content to the browser
						$btn_label = $go_to_top_btn['title'];
						$btn_url = $go_to_top_btn['url']; ?>

						<!-- display go to top button -->
						<a href="<?php print_r(esc_url($btn_url)); ?>" class="btn btn-white">
							<?php print_r(esc_html($btn_label)); ?>
						</a>
						<!-- end go to top button -->	
				<?php endif;?>
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
