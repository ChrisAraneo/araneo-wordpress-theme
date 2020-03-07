<?php get_header(); ?>

<div class="container page">
    <header class="mb-5 mt-5 background-lines-3-outer">
        <div class="component-title background-lines-3">
            <h1 class="display-5 text-center font-weight-bold">
                <span class="text-white">404</span>
            </h1>
            <h1 class="display-4 text-center font-weight-bold">
                <span class="text-white">Nie znaleziono treści</span>
            </h1>
        </div>
    </header>
    <section class="d-flex flex-row justify-content-center mb-2">
        <a type="button" class="btn btn-primary" href="#" onClick="window.history.back();">Wróć</a>
    <section>
</div>

<?php get_template_part('includes/component', 'footer'); ?>
<?php get_footer(); ?>