<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ENPS
 * @version 1.0.0
 */

get_header();
?>

	<main id="primary" class="site-main">

        <p>this is the front page</p>
        <div>
            <!-- recent notices -->
            <div class="notices">
                <div class="flex">
                    <!-- start the loop -->
                    
                    <!-- end while loop -->
                </div> <!-- end flex -->
            </div> <!-- end inner container -->

            <!-- events -->
            <div class="events">
                <div class="flex">
                    <!-- argument for displaying the customized loop -->
                    <?php
                        $args = array(
                            'post_type' => 'events',
                            'posts_per_page' => 3,
                        );
                        $the_event_query = new WP_Query ($args);
                    ?>
                    <!-- end argument -->
                    <!-- display the customized loop -->
                    <?php if( $the_event_query->have_posts()): ?>
                        <?php while( $the_event_query->have_posts()) :$the_event_query->the_post(); ?>
                            <!-- display content -->
                            <div class="card">
                                <header>
                                    <?php echo get_the_post_thumbnail( $post->ID, 'large') ?>
                                </header>
                                <div class="card-body">
                                    <?php the_excerpt('...'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                        <?php else: ?>
                        <p><?php _e('Sorry, no post matched your criteria.'); ?></p>

                    <?php endif; ?>
                    <!-- end display customized loop -->
                </div> <!-- end flex -->
            </div> <!-- end inner container -->
        </div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
