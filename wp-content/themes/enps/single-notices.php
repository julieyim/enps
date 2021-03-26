<?php
/**
 * The template for displaying single notices posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ENPS
 * @version 1.0.0
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if(have_posts()) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_title('<h1>','</h1>'); ?>
				<?php get_the_date('<p>','</p>'); ?>
				<?php the_content(); ?>
			<?php 	
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'enps' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'enps' ) . '</span> <span class="nav-title">%title</span>',
					)
				);
			?>
			<?php endwhile; // End of the loop. ?>
		<?php endif; ?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
