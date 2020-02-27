<?php

    // LOAD STYLES
    function load_css() {
        wp_register_style('info', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('info');

        wp_register_style('main', get_template_directory_uri() . '/styles/main.css');
        wp_enqueue_style('main');
    }
    add_action('wp_enqueue_scripts', 'load_css');

    // LOAD SCRIPTS
    function load_js() {
        /* JQUERY */
        wp_enqueue_script('jquery');

        /* BOOTSTRAP JS */
        $bootstrapjs_path = get_template_directory_uri() . '/libs/bootstrap.min.js';
        $bootstrapjs_path_dev = get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/js/bootstrap.min.js';
        
        if(file_exists($bootstrapjs_path)) {
            wp_register_script('bootstrapjs', $bootstrapjs_path_dev, 'jquery', false, true);
            wp_enqueue_script('bootstrapjs');
        } else if (file_exists($bootstrapjs_path_dev)) {
            wp_register_script('bootstrapjs', $bootstrapjs_path_dev, 'jquery', false, true);
            wp_enqueue_script('bootstrapjs');
        } else {
            return new WP_Error( 'bootstrap-min-missing', __( 'It appears the bootstrap.min.js file may be missing.', 'bootstrap-min-missing' ) );
        }        
        
        /* TAGS */
        wp_register_script('tags', get_template_directory_uri() . '/scripts/tags.js', array(), false, true);
        wp_enqueue_script('tags');

        /* TYPEWRITER */
        wp_register_script('typewriter', get_template_directory_uri() . '/scripts/typewriter.js', array(), false, true);
        wp_enqueue_script('typewriter');

        /* ANIMATED SPIDER */
        wp_register_script('spider', get_template_directory_uri() . '/scripts/spider.js', array(), false, true);
        wp_enqueue_script('spider');     
        
        /* BACKGROUND */
        wp_register_script('background', get_template_directory_uri() . '/scripts/background.js', array(), false, true);
        wp_enqueue_script('background');
        $data = array( 'path' => get_template_directory_uri() );
        wp_localize_script( 'background', 'data', $data );

        /* SCROLL SCRIPT */
        wp_register_script('scroll', get_template_directory_uri() . '/scripts/scroll-script.js', array(), false, true);
        wp_enqueue_script('scroll');
    }
    add_action('wp_enqueue_scripts', 'load_js');

    // BOOTSTRAP NAV WALKER
    function register_navwalker() {
        $navwalker_path = get_template_directory() . '/libs/class-wp-bootstrap-navwalker.php';
        $navwalker_path_dev = get_template_directory() . '/vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
        
        if(file_exists($navwalker_path)) {
            require_once $navwalker_path;
        } else if(file_exists($navwalker_path_dev)) {
            require_once $navwalker_path_dev;
        } else {
            return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
        }
    }
    add_action('after_setup_theme', 'register_navwalker');

    // THEME OPTIONS
    add_theme_support('menus');

    // MENUS
    register_nav_menus(
        array(
            'top-menu' => 'Top Menu Location'
        )
    );

    // ADDING FILTER TO ARCHIVE TITLE
    add_filter('get_the_archive_title', function ($title) {
        return preg_replace('/^\w+: /', '', $title);
    });
?>