<?php if(is_singular()): ?>
    <header class="component-title-outer mb-5 mt-5 background-lines-1-outer">
        <div class="component-title background-lines-1">
            <h1 class="display-4 text-center font-weight-bold">
                <?php the_title(); ?>
            </h1>
        </div>
    </header>
<?php elseif(is_tag()): ?>
    <header class="component-title-outer mb-5 mt-5 background-lines-3-outer">
        <div class="component-title background-lines-3">
            <h1 class="display-4 text-center font-weight-bold">
                <span class="text-white">Tag: </span><?php echo get_the_archive_title(); ?>
            </h1>
        </div>
    </header>
<?php elseif(is_archive()): ?>
    <header class="component-title-outer mb-5 mt-5 background-lines-3-outer">
        <div class="component-title background-lines-3">
            <h1 class="display-4 text-center font-weight-bold">
                <?php echo get_the_archive_title(); ?>
            </h1>
        </div>
    </header>
<?php endif;?>