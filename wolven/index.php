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
 * @package Wolven
 */

get_header();
?>

	<div class="container" id="post-page-header">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="post-page-header">
                    <?php if(get_theme_mod('post-page-about-title')) : ?>
                        <h3><?php echo get_theme_mod('post-page-about-title');?></h3>
                    <?php else : ?>

                    <?php endif; ?>


	                <?php if(get_theme_mod('post-page-about-text')) : ?>
                        <p><?php echo get_theme_mod('post-page-about-text');?></p>
	                <?php else : ?>

	                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="post-page">
        <div class="row">
            <div class="col-sm-12">

	            <?php
	            if ( have_posts() ) :

		            if ( is_home() && ! is_front_page() ) :
			            ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
		            <?php
		            endif; ?>
		            <?php
		            /* Start the Loop */
		            while ( have_posts() ) :
			            the_post();

			            /*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
			            get_template_part( 'template-parts/content', get_post_format() );

		            endwhile; ?>

                <?php

	            else :

		            get_template_part( 'template-parts/content', 'none' );

	            endif;

	            ?>
                <nav class="pagination">
		            <?php pagination_bar(); ?>
                </nav>
            </div>
        </div>
    </div>




<?php
get_footer();
