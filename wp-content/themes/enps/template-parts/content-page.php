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
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
