
<article class="" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container singlepost">
		<div class="row">
			<div class="col-sm-6">
				<div class="post-image">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) ); ?></a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="post-title">
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				</div>
				<div class="post-date">
					<small>Posted on: <?php echo get_the_date(); ?> | By: <?php the_author(); ?></small>
				</div>
				<div class="post-excerpt">
					<p><?php the_content(); ?></p>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
