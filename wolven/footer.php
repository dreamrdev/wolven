<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wolven
 */

?>
<?php wp_footer();?>
	</div><!-- #content -->
    <div class="container-fluid" id="footer-widgets-area">
        <div class="row">
            <div class="col-sm-12">
                <?php
                /* The footer widget area is triggered if any of the areas
                 * have widgets. So let's check that first.
                 *
                 * If none of the sidebars have widgets, then let's bail early.
                 */
                if (   ! is_active_sidebar( 'first-footer-widget-area'  )
                    && ! is_active_sidebar( 'second-footer-widget-area' )
                    && ! is_active_sidebar( 'third-footer-widget-area'  )
                    && ! is_active_sidebar( 'fourth-footer-widget-area' )
                )
                    return;

                if (   is_active_sidebar( 'first-footer-widget-area'  )
                       && is_active_sidebar( 'second-footer-widget-area' )
                       && is_active_sidebar( 'third-footer-widget-area'  )
                       && is_active_sidebar( 'fourth-footer-widget-area' )
                ) : ?>

                <aside class="fatfooter" role="complementary">
                    <div class="first quarter left widget-area">
			            <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                    </div><!-- .first .widget-area -->

                    <div class="second quarter widget-area">
			            <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                    </div><!-- .second .widget-area -->

                    <div class="third quarter widget-area">
			            <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                    </div><!-- .third .widget-area -->

                    <div class="fourth quarter right widget-area">
			            <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
                    </div><!-- .fourth .widget-area -->
                </aside><!-- #fatfooter -->
                <?php
                elseif ( is_active_sidebar( 'first-footer-widget-area'  )
                         && is_active_sidebar( 'second-footer-widget-area' )
                         && is_active_sidebar( 'third-footer-widget-area'  )
                         && ! is_active_sidebar( 'fourth-footer-widget-area' )
                ) : ?>
                <aside class="fatfooter" role="complementary">
                    <div class="first one-third left widget-area">
			            <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                    </div><!-- .first .widget-area -->

                    <div class="second one-third widget-area">
			            <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                    </div><!-- .second .widget-area -->

                    <div class="third one-third right widget-area">
			            <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                    </div><!-- .third .widget-area -->

                </aside><!-- #fatfooter -->
                <?php
                elseif ( is_active_sidebar( 'first-footer-widget-area'  )
                         && is_active_sidebar( 'second-footer-widget-area' )
                         && ! is_active_sidebar( 'third-footer-widget-area'  )
                         && ! is_active_sidebar( 'fourth-footer-widget-area' )
                ) : ?>
                <aside class="fatfooter" role="complementary">
                    <div class="first half left widget-area">
			            <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                    </div><!-- .first .widget-area -->

                    <div class="second half right widget-area">
			            <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                    </div><!-- .second .widget-area -->

                </aside><!-- #fatfooter -->
                <?php
                elseif ( is_active_sidebar( 'first-footer-widget-area'  )
                         && ! is_active_sidebar( 'second-footer-widget-area' )
                         && ! is_active_sidebar( 'third-footer-widget-area'  )
                         && ! is_active_sidebar( 'fourth-footer-widget-area' )
                ) :
                ?>
                <aside class="fatfooter" role="complementary">
                    <div class="first full-width widget-area">
			            <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                    </div><!-- .first .widget-area -->
                </aside><!-- #fatfooter -->

                <?php endif;?>
            </div>
        </div>
    </div>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wolven' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'wolven' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'wolven' ), 'Wolven', '<a href="http://underscores.me/">Dreamr Development</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/bootstrap.js"></script>
</body>
</html>
