<?php if(is_singular()): ?>
    <header class="component-title-outer background-lines-1-outer" >
        <div class="component-title background-lines-1">
            <h1 class="display-4 text-center font-weight-bold animation-scale m-0">
                <?php the_title(); ?>
            </h1>
        </div>
    </header>
<?php elseif(is_tag()): ?>
    <header class="component-title-outer background-lines-3-outer">
        <div class="component-title background-lines-3">
            <h1 class="display-4 text-center font-weight-bold animation-scale m-0">
                <span class="text-white">Tag </span><?php echo get_the_archive_title(); ?>
            </h1>
        </div>
    </header>
<?php elseif(is_archive()): ?>
    <header class="component-title-outer background-lines-3-outer">
        <div class="component-title background-lines-3">
            <h1 class="display-4 text-center font-weight-bold animation-scale m-0">
                <?php echo get_the_archive_title(); ?>
            </h1>
        </div>
    </header>
<?php endif;?>