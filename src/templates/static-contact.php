<?php
/*
Template Name: Contact (static) (pl)
*/
?>

<?php get_header(); ?>

<div class="container page animation-opacity">
    <?php get_template_part('includes/component', 'title'); ?>
    <div class="d-flex flex-row justify-content-center">
        <div class="d-inline-block mr-4">
            <p class="text-right">E-mail:</p>
            <p class="text-right">Git:</p>
        </div>
        <div class="d-inline-block">
            <p><a href="<?php echo base64_encode("mailto:chris.araneo@gmail.com"); ?>" data-encoded target="_blank"><?php echo base64_encode("chris.araneo@gmail.com"); ?></a></p>
            <p><a href="<?php echo base64_encode("https://github.com/chrisaraneo"); ?>" data-encoded target="_blank"><?php echo base64_encode("github.com/ChrisAraneo"); ?></a></p>
        </div>
    </div>
</div>

<?php get_template_part('includes/component', 'footer'); ?>

<script>
    function decode() {
        const encoded = document.querySelectorAll("[data-encoded]");
        if(encoded) {
            for(let i=0; i<encoded.length; ++i) {
                const element = encoded[i];
                element.innerHTML = atob(element.innerHTML);
                if(element.hasAttribute("href")) {
                    const d = atob(element.getAttribute("href"));
                    element.setAttribute("href", d);
                }
            }
        } 
    }
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(() => decode(), 0);
    }, false);
</script>


<?php get_footer(); ?>