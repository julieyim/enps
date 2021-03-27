<?php
/**
 * Template Name: Notices
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ENPS
 * @version 1.0.0
 */

get_header();
?>
	
	<main id="primary" class="site-main">
		<div class="inner-container">
			<?php
				while ( have_posts() ) :
					the_post();
					the_title('<h1>','</h1>');
					the_content();
				endwhile; // End of the loop.
			?>

			<!-- argument for displaying the customized loop -->
			<?php
				$args = array(
					'post_type' => 'notices',
					'posts_per_page' => 5,
				);
				$the_notice_query = new WP_Query ($args);
			?>
			<!-- end argument -->
			<!-- display the customized loop -->
			<?php if( $the_notice_query->have_posts()): ?>
				<?php while( $the_notice_query->have_posts()) :$the_notice_query->the_post(); ?>
					<!-- display content -->
					<div class="card card-wide">
						<header>
							<a href="<?php the_permalink(); ?>">
								<?php echo get_the_post_thumbnail( $post->ID, 'large') ?>
							</a>
						</header>
						<div class="card-body">
							<a href="<?php the_permalink(); ?>">
								<!-- limit post title length -->
								<?php if (strlen($post->post_title) > 55) {
									echo substr(the_title('<h4>', $before = '', $after = '', FALSE, ),  0, 55) . '...', '</h4>';
								} 
								else {
									the_title('<h4>','</h4>');
								} 
								?>
								<!-- end limit post title length -->
							</a>
							<?php get_the_date('<p>','</p>'); ?>
							<?php the_excerpt(''); ?>
							<a href="<?php the_permalink(); ?>"><?php _e('Read more...');?></a>
						</div>
					</div>
				<?php endwhile; ?>

				<!-- pagination -->
				<div class="pagination">
					<p>(pagination)</p>
				</div>

				<?php wp_reset_postdata(); ?>

				<?php else: ?>
				<p><?php _e('Sorry, no post matched your criteria.'); ?></p>

			<?php endif; ?>
			<!-- end display customized loop -->

			
		</div>
		

	</main><!-- #main -->

<?php
get_footer();
