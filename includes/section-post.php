<?php if(have_posts()): while(have_posts()): the_post(); ?>

<p class="text-center mb-4">
    <span class="mr-3"><?php the_author_posts_link(); ?></span>
    <span><?php echo get_the_date('d/m/Y'); ?></span>
</p>

<?php the_content(); ?>

<footer>
<?php
    $tags = get_the_tags();
    if(!empty($tags)):
        foreach($tags as &$tag):?> 
        <a href="<?php echo get_tag_link($tag->term_id);?>">
            <?php echo $tag->name; ?>
        </a>
        <?php endforeach;?>
    <?php endif;?>
<?php endwhile; else: endif; ?>
</footer>