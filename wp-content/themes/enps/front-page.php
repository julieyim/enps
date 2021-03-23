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
            <?php if(have_posts()) : ?>
                <div class="notices">
                    <div class="flex">
                        <!-- start the loop -->
                        <?php while(have_posts()) : the_post(); ?>
                            <!-- permalink creates a link -->
                            <div class="blog-card">
                                <header>
                                    <?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
                                    <a href="<?php the_permalink(); ?>"><?php single_post_title('<h4>','</h4>'); ?></a>
                                </header>
                                <div class="blog-content">
                                    <?php the_category(); ?>
                                    <ul>
                                        <li><?php echo get_the_date(); ?></li>
                                    </ul>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>"><?php _e('Read More >');?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <!-- end while loop -->
                    </div> <!-- end flex -->
                </div> <!-- end inner container -->
            <?php else : ?>
                <!-- send to search page / some other general page with search
                function, tags, categories, archives,etc.. -->
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
