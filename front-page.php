<?php get_header(); ?>

<div class="container">
    <h1><?php the_title(); ?></h1>
    <?php get_template_part('includes/section', 'content'); ?>
</div>

<aside>FRONTPAGE</aside>
<?php the_author_posts_link(); ?>

<?php get_footer(); ?>