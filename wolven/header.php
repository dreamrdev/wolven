<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wolven
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <link href="<?php bloginfo('template_directory'); ?>/assets/fonts/fontawesome-all.min.css" rel="stylesheet">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wolven' ); ?></a>
    <?php if ( is_home() ) : ?>
	<header id="masthead" class="site-header">
        <nav class="navbar navbar-expand-md">
            <span class="navbar-brand site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".collapse" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-angle-double-down"></i>
            </button>
            <div class="collapse navbar-collapse">
	            <?php
	            wp_nav_menu(array(
		            'theme_location' => 'primary',
		            'container' => 'nav',
		            'container_class' => 'collapse navbar-collapse',
		            'menu_class' => 'nav navbar-nav'
	            ));
	            ?>
            </div>
        </nav>
        <div class="container" id="sitelogo-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="site-logo">
                        <?php
	                        the_custom_logo();
                        $wolven_description = get_bloginfo( 'description', 'display' );
                        if ( $wolven_description || is_customize_preview() ) :
                            ?>
                            <h5 class="site-description"><?php echo $wolven_description; /* WPCS: xss ok. */ ?></h5>
                        <?php endif; ?>
                        <br>
                        <?php if(get_theme_mod('cta-button-text')) :?>
	                        <?php if(get_theme_mod('cta-button-url')): ?>
                                <a id="cta-btn" href="<?php echo get_theme_mod('cta-button-url') ?>"><?php echo get_theme_mod('cta-button-text') ?></a>
	                        <?php else :?>
                                <a id="cta-btn" href="#content"><?php echo get_theme_mod('cta-button-text') ?></a>
	                        <?php endif; ?>
                        <? else: ?>

                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
	</header>
	<?php else : ?>
    <header id="masthead" class="site-header" style="height: auto !important;">
        <nav class="navbar navbar-expand-md">
            <span class="navbar-brand site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".collapse" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'container' => 'nav',
					'container_class' => 'collapse navbar-collapse',
					'menu_class' => 'nav navbar-nav'
				));
				?>
            </div>
        </nav>
    </header>
    <?php endif; ?>
	<div id="content" class="site-content">
