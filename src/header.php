<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <div id="layer-loading" style="position: absolute; top: 0; left: 0; width: 100%; height: 100vh; z-index: 1000; background-color: #000e0f; display: flex; flex-direction: column; justify-content: center;"></div>
<?php get_template_part('includes/component', 'top-menu'); ?>