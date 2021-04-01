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
		<div class="inner-container">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php while ( have_posts() ) : the_post(); ?>
					<header>
						<?php echo get_the_post_thumbnail( $post->ID, 'large') ?>
					</header>
					<?php the_title('<h1>','</h1>'); ?>
					<?php get_the_date('<p>','</p>'); ?>
					<?php the_content(); ?>
				<?php endwhile; // End of the loop. ?>
			<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'enps' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'enps' ) . '</span> <span class="nav-title">%title</span>',
					)
				);
			?>
			</article>
		</div>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
