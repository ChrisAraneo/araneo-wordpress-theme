<?php
/*
Template Name: Contact (static) (pl)
*/
?>

<?php get_header(); ?>

<div class="container page animation-opacity">
    <?php get_template_part('includes/component', 'title'); ?>

    <div>

    </div>
    <div>
        <a href="<?php echo base64_encode("mailto:chris.araneo@gmail.com"); ?>" data-encoded target="_blank"><?php echo base64_encode("chris.araneo@gmail.com"); ?></a>
        <a href="<?php echo base64_encode("https://github.com/chrisaraneo"); ?>" data-encoded target="_blank"><?php echo base64_encode("github.com/ChrisAraneo"); ?></a>
    </div>
    <h2 class="left">Tutaj będzie kontakt</h2>
    
</div>

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
        decode();
    }, false);
</script>
<?php get_template_part('includes/component', 'footer'); ?>
<?php get_footer(); ?>