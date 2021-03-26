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
        
		<?php get_template_part( 'template-parts/content', 'home' ); ?>

	</main><!-- #main -->
    
<?php
get_footer();
