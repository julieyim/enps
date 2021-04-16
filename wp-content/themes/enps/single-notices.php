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
					<div class="notices-body">
						<?php the_title('<h1>','</h1>'); ?>
						<?php get_the_date('<p>','</p>'); ?>
						<?php the_content(); ?>
					</div>
				<?php endwhile; // End of the loop. ?>
			<?php post_pagination(); ?>
			</article>
		</div>
	</main><!-- #main -->
<?php
get_footer();
