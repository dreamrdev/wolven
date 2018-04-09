<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wolven
 */

get_header();
?>

	<div class="container" id="archive-page">
    <?php if ( is_active_sidebar('sidebar-1') ) : ?>
        <div class="row">
            <div class="col-sm-8">
	            <?php if ( have_posts() ) : ?>

                    <header class="page-header">
			            <?php
			            the_archive_title( '<h1 class="page-title">', '</h1>' );
			            the_archive_description( '<div class="archive-description">', '</div>' );
			            ?>
                    </header><!-- .page-header -->

		            <?php
		            /* Start the Loop */
		            while ( have_posts() ) :
			            the_post();

			            /*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
			            get_template_part( 'template-parts/content', get_post_type() );

		            endwhile;

	            else :

		            get_template_part( 'template-parts/content', 'none' );

	            endif;
	            ?>
                <nav class="pagination">
		            <?php pagination_bar(); ?>
                </nav>
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
			    <?php if ( have_posts() ) : ?>

                    <header class="page-header">
					    <?php
					    the_archive_title( '<h1 class="page-title">', '</h1>' );
					    the_archive_description( '<div class="archive-description">', '</div>' );
					    ?>
                    </header><!-- .page-header -->

				    <?php
				    /* Start the Loop */
				    while ( have_posts() ) :
					    the_post();

					    /*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
					    get_template_part( 'template-parts/content', get_post_type() );

				    endwhile;

			    else :

				    get_template_part( 'template-parts/content', 'none' );

			    endif;
			    ?>
                <nav class="pagination">
				    <?php pagination_bar(); ?>
                </nav>
            </div>
        </div>
        <?php endif; ?>
    </div>


<?php
get_footer();
