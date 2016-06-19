<?php
/**
 * customizer for theme options
 * theme =wport
 */

function wport_customize_register( $wp_customize ) {

// custom link colors
    $wp_customize->add_setting( 'wport_link_color', array( 
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#5a5a5a',
	'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wport_link_color', array(
	'label'        => __( 'Links Color', 'wport' ),
        'section'  => 'colors',
        'settings' => 'wport_link_color',
    ) ) );

// custom site title colors
    $wp_customize->add_setting( 'wport_title_color', array( 
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#faf9ee',
	'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wport_title_color', array(
	'label'        => __( 'Title and Description Color', 'wport' ),
        'section'  => 'colors',
        'settings' => 'wport_title_color',
    ) ) );

// header background color
    $wp_customize->add_setting( 'wport_header_back', array( 
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#118833',
	'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wport_header_back', array(
        'label'    => __( 'Header Background', 'wport' ),
        'section'  => 'colors',
        'settings' => 'wport_header_back',
    ) ) );

// sidespacer background color
    $wp_customize->add_setting( 'wport_spacer_back', array( 
        'sanitize_callback' => 'sanitize_hex_color',
        'default'           => '#50c85a',
        'capability'        => 'edit_theme_options',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wport_spacer_back', array(
        'label'    => __( 'Side Spacer Background', 'wport' ),
        'section'  => 'colors',
        'settings' => 'wport_spacer_back',
    ) ) );

}

    add_action( 'customize_register', 'wport_customize_register' );
	
// now put the options to work in wport theme
function wport_customize_css() {
?>
    <style type="text/css">
    a { 
        color:<?php echo esc_html( get_theme_mod( 'wport_link_color', '#5a5a5a' ) ); ?>; 
    }

    .site-title a, .site-description { 
        color:<?php echo esc_html( get_theme_mod( 'wport_title_color', '#faf9ee' ) ); ?> !important; 
    }

    .head, input.search-submit, .more-link, #navigation a, .top-link { 
        background: <?php echo esc_html( get_theme_mod( 'wport_header_back', '#118833' ) ); ?> !important; 
    }		

    input.search-submit { 
        color: <?php echo esc_html( get_theme_mod( 'wport_header_back', '#118833' ) ); ?> !important; 
    }		

    .sidespacer { 
        background-color: <?php echo esc_html( get_theme_mod( 'wport_spacer_back', '#50c85a' ) ); ?> !important; 
    }		
    .sidespacer:before { 
        border-right-color: <?php echo esc_html( get_theme_mod( 'wport_header_back', '#118833' ) ); ?> !important; 	
        border-bottom-color: <?php echo esc_html( get_theme_mod( 'wport_spacer_back', '#50c85a' ) ); ?> !important;
    }	
    .sidespacer:after { 
        border-right-color: <?php echo esc_html( get_theme_mod( 'wport_spacer_back', '#50c85a' ) ); ?> !important;	
        border-bottom-color: #<?php background_color(); ?> !important;
        
    }		
	
    </style>
    <?php
}
add_action( 'wp_head', 'wport_customize_css');