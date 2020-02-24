<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <?php get_template_part('includes/component', 'post'); ?>
<?php endwhile; else: endif; ?>