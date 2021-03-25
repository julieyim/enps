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

    <div class="hero">
        <div class="inner-hero">
            <h1>Edmonton Native Plant Society</h1>
        </div>
    </div>
    <div class="cta-banner">
        <div class="inner-container flex">
            <div>
                <h4>Join Our Wildflower Newsletter</h4>
                <p>Stay in touch to know our latest events, projects, and news with the ENPS!</p>
            </div>
            <div class="sign-up">
                <input type="text">
                <button>Join</button>
            </div>
        </div>
    </div>
	<main id="primary" class="container">
        <div class="inner-container">
            <!-- recent notices -->
            <div class="notice">
                <h2>Recent Notice</h2>
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
                <!-- argument for displaying the customized loop -->
                <?php
                    $args = array(
                        'post_type' => 'events',
                        'posts_per_page' => 3,
                    );
                    $the_event_query = new WP_Query ($args);
                ?>
                <!-- end argument -->
                <div class="grid-3">
                    <!-- display the customized loop -->
                    <?php if( $the_event_query->have_posts()): ?>
                        <?php while( $the_event_query->have_posts()) :$the_event_query->the_post(); ?>
                            <!-- display content -->
                            <div class="card card-tall">
                                <header>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo get_the_post_thumbnail( $post->ID, 'large') ?>
                                    </a>
                                </header>
                                <div class="card-body">
                                    <a href="<?php the_permalink(); ?>">
                                        <!-- limit post title length -->
                                        <?php if (strlen($post->post_title) > 43) {
                                            echo substr(the_title('<h4>', $before = '', $after = '', FALSE, ),  0, 43) . '...', '</h4>';
                                        } 
                                        else {
                                            the_title('<h4>','</h4>');
                                        } 
                                        ?>
                                        <!-- end limit post title length -->
                                    </a>
                                    <p>
                                        <b> Date: </b>
                                        <?php $date = get_field('date'); ?>
                                        <?php 
                                            if($date){
                                                _e($date);
                                            }
                                        ?>

                                        <?php $time = get_field('time'); ?>
                                        <?php 
                                            if($time){
                                                _e($time);
                                            }
                                        ?>
                                    </p>
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php the_permalink(); ?>"><?php _e('See Event');?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                        <?php else: ?>
                        <p><?php _e('Sorry, no post matched your criteria.'); ?></p>

                    <?php endif; ?>
                    <!-- end display customized loop -->
                </div> <!-- end grid-3 -->
            </div> <!-- end events-->

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
	</main><!-- #main -->
    <div class="cta-banner">
        <div class="inner-container cta-volunteer flex">
            <p>Interested in joining the fun? We have many projects going on that may be right for you. Come volunteer today!</p>
            <a href="/volunteer" class="btn btn-green">
                Volunteer Now
            </a>
        </div>
    </div>
<?php
get_footer();
