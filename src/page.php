<?php get_header(); ?>

<?php get_template_part('includes/component', 'title'); ?>

<div class="background-page">
    <div class="container page">    
        <?php get_template_part('includes/section', 'content'); ?>
    </div>
    <?php get_template_part('includes/component', 'footer'); ?>
</div>

<?php get_footer(); ?>