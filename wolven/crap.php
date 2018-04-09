<div class="site-branding">
	<?php
	the_custom_logo();
	if ( is_front_page() && is_home() ) :
		?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<?php
	else :
		?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	<?php
	endif;
	$wolven_description = get_bloginfo( 'description', 'display' );
	if ( $wolven_description || is_customize_preview() ) :
		?>
		<p class="site-description"><?php echo $wolven_description; /* WPCS: xss ok. */ ?></p>
	<?php endif; ?>
</div><!-- .site-branding -->

<nav id="site-navigation" class="main-navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wolven' ); ?></button>
	<?php
	wp_nav_menu( array(
		'theme_location' => 'menu-1',
		'menu_id'        => 'primary-menu',
	) );
	?>
</nav><!-- #site-navigation -->




<header class="entry-header">
	<?php
	if ( is_singular() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif;

	if ( 'post' === get_post_type() ) :
		?>
        <div class="entry-meta">
			<?php
			wolven_posted_on();
			wolven_posted_by();
			?>
        </div><!-- .entry-meta -->
	<?php endif; ?>
</header><!-- .entry-header -->

<?php wolven_post_thumbnail(); ?>

<div class="entry-content">
	<?php
	the_content( sprintf(
		wp_kses(
		/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wolven' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		get_the_title()
	) );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wolven' ),
		'after'  => '</div>',
	) );
	?>
</div><!-- .entry-content -->

<footer class="entry-footer">
	<?php wolven_entry_footer(); ?>
</footer><!-- .entry-footer -->



