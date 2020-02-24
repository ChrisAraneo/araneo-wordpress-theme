<?php if(is_category($_GET["cat"])):?>
    <header class="component-title mb-5 mt-5">
        <h1 class="display-4 text-center font-weight-bold">
            <?php echo get_cat_name($_GET["cat"]); ?>
        </h1>
    </header>
<?php else: ?>
    <header class="component-title mb-5 mt-5">
        <h1 class="display-4 text-center font-weight-bold">
            <?php the_title(); ?>
        </h1>
    </header>
<?php endif;?>
    
