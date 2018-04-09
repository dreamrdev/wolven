<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wolven
 */

get_header();
?>

	<div class="container" id="single-page-block">
    <?php if ( is_active_sidebar('sidebar-1') ) : ?>
        <div class="row">
            <div class="col-sm-8">
	            <?php
	            while ( have_posts() ) :
		            the_post();

		            get_template_part( 'template-parts/content', 'page' );

		            // If comments are open or we have at least one comment, load up the comment template.
		            if ( comments_open() || get_comments_number() ) :
			            comments_template();
		            endif;

	            endwhile; // End of the loop.
	            ?>
            </div>
            <div class="col-sm-4">
                <aside>
                <?php get_sidebar(); ?>
                </aside>
            </div>
        </div>
    <?php else : ?>
        <div class="row">
            <div class="col-sm-12">
			    <?php
			    while ( have_posts() ) :
				    the_post();

				    get_template_part( 'template-parts/content', 'page' );

				    // If comments are open or we have at least one comment, load up the comment template.
				    if ( comments_open() || get_comments_number() ) :
					    comments_template();
				    endif;

			    endwhile; // End of the loop.
			    ?>
            </div>
        </div>
    <?php endif; ?>
    </div>

<?php
get_footer();
