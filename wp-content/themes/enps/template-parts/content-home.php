<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ENPS
 * @version 1.0.0
 */

?>

<div class="inner-container">
    <!-- recent notices -->
    <div class="notice">
        <div class="flex">
            <h2>Recent Notice</h2>
            <!-- view all btn -->
            <?php $notices_all_btn = get_field('view_all_btn'); ?>
            <?php 
                if ($notices_all_btn):
                    // create variable to store information and to display content to the browser
                    $btn_label = $notices_all_btn['title'];
                    $btn_url = $notices_all_btn['url']; ?>

                    <!-- create a link to display the content -->
                    <a href="<?php print_r(esc_url($btn_url)); ?>" class="btn btn-yellow">
                        <?php print_r(esc_html($btn_label)); ?>
                    </a>
            <?php endif; ?>
            
        </div>
        
        <!-- argument for displaying the customized loop -->
        <?php
            $args = array(
                'post_type' => 'notices',
                'posts_per_page' => 1,
            );
            $the_event_query = new WP_Query ($args);
        ?>
        <!-- end argument -->
        <!-- display the customized loop -->
        <?php if( $the_event_query->have_posts()): ?>
            <?php while( $the_event_query->have_posts()) :$the_event_query->the_post(); ?>
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

            <?php wp_reset_postdata(); ?>

            <?php else: ?>
            <p><?php _e('Sorry, no post matched your criteria.'); ?></p>

        <?php endif; ?>
        <!-- end display customized loop -->
    </div> <!-- end notices -->

    <!-- events -->
    <div class="events">
        <div class="flex">
            <h2>Events</h2>
            <a href="/events" class="btn btn-yellow">
                See All Events&ensp;&gt;
            </a>
        </div>
        <?php if(is_active_sidebar( 'events-display')): ?>
            <?php dynamic_sidebar( 'events-display' ); ?>
        <?php endif; ?>
    </div>

    <!-- mission statement -->
    <div class="mission">
        <h2>Mission Statement</h2>
        <!-- argument for displaying the customized loop -->
        <?php
            $args = array(
                'category-name' => 'mission-statement',
                'posts_per_page' => 1,
            );
            $the_mission_query = new WP_Query ($args);
        ?>
        <!-- end argument -->
        <!-- display the customized loop -->
        <?php if( $the_mission_query->have_posts()): ?>
            <?php while( $the_mission_query->have_posts()) :$the_mission_query->the_post(); ?>
                <!-- display content -->
                <div class="card card-wide">
                    <header>
                        <?php echo get_the_post_thumbnail( $post->ID, 'large') ?>
                    </header>
                    <div class="card-body">
                        <?php the_content(); ?>
                        <a href="/about-us" class="btn btn-yellow">
                            About Us
                        </a>
                        <a href="/volunteer" class="btn btn-yellow">
                            Volunteer with Us
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else: ?>
            <p><?php _e('Sorry, no post matched your criteria.'); ?></p>
        <?php endif; ?>
        <!-- end display customized loop -->
    </div> <!-- end mission statement -->
</div>