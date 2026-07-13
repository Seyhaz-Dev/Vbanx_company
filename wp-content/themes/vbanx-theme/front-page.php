<?php
/**
 * Front Page Template
 *
 * @package VBANX_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php get_template_part('template-parts/hero'); ?>

    <?php get_template_part('template-parts/about'); ?>

    <?php get_template_part('template-parts/services'); ?>

    <?php get_template_part('template-parts/products'); ?>

    <?php get_template_part('template-parts/technologies'); ?>

    <?php get_template_part('template-parts/partners'); ?>

    <?php get_template_part('template-parts/testimonials'); ?>

    <?php get_template_part('template-parts/contact'); ?>

    <?php get_template_part('template-parts/cta'); ?>

</main>

<?php
get_footer();