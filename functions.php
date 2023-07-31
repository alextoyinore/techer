<?php
require get_template_directory() . '/inc/techer-widgets.php';
require get_template_directory() . '/inc/techer-gutenberg.php';

/*
Adds dynamic title tag support
 */
function techer_theme_support(){
    add_theme_support('title-tag');
    add_theme_support( 'custom-logo');
    add_theme_support( 'post-thumbnails');
    add_theme_support('align-wide');
    add_theme_support('dark-editor-style');
    add_theme_support('automatic-feed-links');
    add_theme_support(
        'html5',
        ['search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style']
    );
    add_theme_support('post-formats',
        ['aside', 'gallery', 'video', 'audio']
    );

    //remove_theme_support( 'widgets-block-editor' );
}

add_action('after_setup_theme', 'techer_theme_support');


/**
 * Register Sidebars
 */

function techer_widgets_init() {
    register_sidebar( array(
        'name'          => 'TC Frontpage',
        'id'            => 'front-page',
    ) );

    register_sidebar( array(
        'name' => 'TC Widgetized Page',
        'id' => 'widgetized-page',
    ) );

    register_sidebar( array(
        'name' => 'TC After Post',
        'id' => 'after-post'
    ) );

    register_sidebar( array(
        'name' => 'TC Archive',
        'id' => 'archive'
    ) );
}

add_action( 'widgets_init', 'techer_widgets_init');


function techer_register_styles(){

    wp_enqueue_style(
        'techer-style', 
        get_template_directory_uri()."/style.css", 
        array(), 
        filemtime(get_template_directory().'/style.css'), 
        'all'
    );

    wp_enqueue_style(
        'techer-mobile-style', 
        get_template_directory_uri()."/assets/css/techer-mobile.css", 
        array(), 
        filemtime(get_template_directory().'/assets/css/techer-mobile.css'), 
        'all'
    );

    wp_enqueue_style(
        'techer-gutenberg-style',
        get_template_directory_uri()."/assets/css/techer-gutenberg.css",
        array(),
        filemtime(get_template_directory().'/assets/css/techer-gutenberg.css'),
        'all'
    );
}

add_action('wp_enqueue_scripts', 'techer_register_styles');


function techer_register_scripts(){

    wp_enqueue_script(
        'techer-script', 
        get_template_directory_uri()."/assets/js/techer.js", 
        array(), 
        filemtime(get_template_directory().'/assets/js/techer.js'), 
        true);


    wp_enqueue_script(
        'techer-mobile-script', 
        get_template_directory_uri()."/assets/js/techer-mobile.js", 
        array(), 
        filemtime(get_template_directory()."/assets/js/techer-mobile.js"),
        true
    );
}

add_action('wp_enqueue_scripts', 'techer_register_scripts');


function techer_menus(){
    $locations = array(
        'primary' => 'Primary header navigation for techer theme',
        'footer' => 'Footer navigation for techer theme',
        'site' => 'Full site navigation for techer theme'
    );

    register_nav_menus( $locations );
}

add_action( 'init', 'techer_menus' );


// function techer_excerpt_length( $length ) {
//     return 20;
// }
// add_filter( 'excerpt_length', 'techer_excerpt_length', 999 );
