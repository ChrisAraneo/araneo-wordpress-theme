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
        wp_enqueue_script('jquery');

        wp_register_script('bootstrapjs', get_template_directory_uri() . '/vendor/twbs/bootstrap/dist/js/bootstrap.min.js', 'jquery', false, true);
        wp_enqueue_script('bootstrapjs');
    }
    add_action('wp_enqueue_scripts', 'load_js');

    // BOOTSTRAP NAV WALKER
    function register_navwalker() {
        if (!file_exists(get_template_directory() . '/vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php')) {
            return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
        } else {
            require_once get_template_directory() . '/vendor/wp-bootstrap/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
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
?>