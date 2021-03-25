<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ENPS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hero">
        <div class="inner-hero">
        </div>
    </div>
	<?php enps_post_thumbnail(); ?>

	<div class="page-banner">
		<div class="inner-container">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
	</div><!-- .page-banner -->

</article><!-- #post-<?php the_ID(); ?> -->
