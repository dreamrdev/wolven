<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wolven
 */

?>

<article class="post-block hideme" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-image">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) ); ?></a>
    </div>
    <div class="post-title">
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    </div>
    <div class="post-date">
        <small>Posted on: <?php echo get_the_date(); ?> | By: <?php the_author(); ?></small>
    </div>
    <div class="post-excerpt">
        <p><?php the_excerpt(); ?></p>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
