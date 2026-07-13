<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">

    <div class="container">

        <!-- Logo -->
        <div class="logo">

            <a href="<?php echo home_url(); ?>">

                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg"
                    alt="VBANX">

            </a>

        </div>

        <!-- Navigation -->
        <nav class="navigation">

            <?php

            wp_nav_menu(array(

                'theme_location' => 'primary',

                'container' => false,

                'menu_class' => 'nav-menu'

            ));

            ?>

        </nav>

        <!-- CTA -->

        <a href="#" class="btn-demo">

            Request Demo

        </a>

    </div>

</header>