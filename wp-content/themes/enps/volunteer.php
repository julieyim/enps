<?php
/**
 * Template Name: Volunteer
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
	<div class="hero volunteer">
        <div class="inner-hero">
        </div>
    </div>
	
	<main id="primary" class="site-main">
		<div class="page-banner">
			<div class="inner-container">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php get_template_part( 'content-banner.php' ); ?>
			</div>
		</div><!-- .page-banner -->
		<div class="inner-container">
			<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile; // End of the loop.
			?>
			<!-- argument for displaying the customized loop -->
			<?php
				$args = array(
					'post_type' => 'projects',
					'orderby'   => 'date',
        			'order'     => 'ASC',
				);
				$the_projects_query = new WP_Query ($args);
			?>
			<!-- end argument -->
			<!-- display the customized loop -->
			<?php if( $the_projects_query->have_posts()): ?>
				<?php while( $the_projects_query->have_posts()) :$the_projects_query->the_post(); ?>
					<!-- display content -->
					<div class="post">
						<header>
							<?php echo get_the_post_thumbnail( $post->ID, 'large') ?>
						</header>
						<div class="post-body">
							<?php the_title('<h4>','</h4>'); ?>
							<?php the_content(''); ?>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			<?php else: ?>
			<p><?php _e('Sorry, no post matched your criteria.'); ?></p>

			<?php endif; ?>
			<!-- end display customized loop -->

			<!-- go to top button -->
			<div class="gtt-btn">
				<?php //$go_to_top_btn = get_field('go_to_top_btn'); ?>
				<?php 
					if ($go_to_top_btn):
						// create variable to store information and to display content to the browser
						$btn_label = $go_to_top_btn['title'];
						$btn_url = $go_to_top_btn['url'];
					endif;
				?>
				<!-- display go to top button -->
				<a href="<?php print_r(esc_url($btn_url)); ?>" class="btn btn-white">
					<?php print_r(esc_html($btn_label)); ?>
				</a>
				<!-- end go to top button -->
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();
