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

        /* TAGS */
        wp_register_script('tags', get_template_directory_uri() . '/scripts/tags.js', array(), false, false);
        wp_enqueue_script('tags');

        /* TYPEWRITER */
        wp_register_script('typewriter', get_template_directory_uri() . '/scripts/typewriter.js', array(), false, false);
        wp_enqueue_script('typewriter');

        /* ANIMATED SPIDER */
        wp_register_script('spider', get_template_directory_uri() . '/scripts/spider.js', array(), false, false);
        wp_enqueue_script('spider');     
        
        /* LAZY IMAGE LOADING */
        wp_register_script('lazyimages', get_template_directory_uri() . '/scripts/lazy-images.js', array(), false, false);
        wp_enqueue_script('lazyimages');
        $data = array( 'path' => get_template_directory_uri() );
        wp_localize_script( 'lazyimages', 'data', $data );

        /* SCROLL SCRIPT */
        wp_register_script('scroll', get_template_directory_uri() . '/scripts/scroll-script.js', array(), false, false);
        wp_enqueue_script('scroll');
        
        wp_register_script('bootstrapjs', get_template_directory_uri() . '/libs/bootstrap.min.js', 'jquery', false, false);
        wp_enqueue_script('bootstrapjs');

        /* BOOTSTRAP JS */
        $bootstrapjs_path = '';
        if(file_exists(get_template_directory_uri() . '/libs/bootstrap.min.js')) {
            $bootstrapjs_path = get_template_directory_uri() . '/libs/bootstrap.min.js';
        } else if(get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/js/bootstrap.min.js') {
            $bootstrapjs_path = get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/js/bootstrap.min.js';
        } else {
            return new WP_Error( 'bootstrap-min-missing', __( 'It appears the bootstrap.min.js file may be missing.', 'bootstrap-min-missing' ) );
        }
        wp_register_script('bootstrapjs', $bootstrapjs_path, 'jquery', false, false);
        wp_enqueue_script('bootstrapjs');   
    }
    add_action('wp_enqueue_scripts', 'load_js');

    // BOOTSTRAP NAV WALKER
    function register_navwalker() {
        if(file_exists(get_template_directory() . '/libs/class-wp-bootstrap-navwalker.php')) {
            require_once get_template_directory() . '/libs/class-wp-bootstrap-navwalker.php';
        } else if(file_exists(get_template_directory() . '/vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php')) {
            require_once get_template_directory() . '/vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
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