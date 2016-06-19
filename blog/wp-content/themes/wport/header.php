<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a class="screen-reader-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'amp' ); ?>"><?php _e( 'Skip to content', 'wport' ); ?></a>
    <header class="head" id="header">
        <figure class="logo">
    
        <?php if ( get_header_image() ) : ?>
        
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="logo" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt=""></a>
        
        <?php endif; // End header image check. ?>
        </figure>
            <div class="hgroup">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>/"><?php bloginfo('name'); ?></a> <span class="site-description"><?php bloginfo('description'); ?></span></h1>
            </div><div class="clearfix"></div>
    </header>
        <div class="sidespacer"></div>
            <div id="wrap"><!-- page wrap ends in footer -->

                <div id="sidebar">
                    <div id="mobile-menu">  
                        <div class="mobi-menu">
                            <div class="toggleline">
                                <div id="toggle" title="&#8648; / &#8650;"><span class="icon-reorder"> ||| </span></div>
                            </div>
                     
                            <div class="span toggle">
                                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu' ) ); ?>
                            </div>
                        </div>
                    </div><!-- ends mobile menu -->
                       
                    <nav class="access">

                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

                    </nav>	
                        <div class="sidebar-container">
                            <?php get_sidebar(); ?>
                        </div>

                </div><!-- ends sidebar -->