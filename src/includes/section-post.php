<?php if(have_posts()): while(have_posts()): the_post(); ?>

<article>
    <?php the_content(); ?>
</article>

<footer class="mt-5">
<div class="row mt-5">
    <div class="col-md-8">
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
    </div>
    <div class="col-md-4">
        <p class="text-right">
            <span class="mr-3"><?php the_author_posts_link(); ?></span>
            <span class="text-muted"><?php echo get_the_date('d/m/Y'); ?></span>
        </p>
    </div>
</div>

</footer>