<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">

    <div class="container">

        <div class="logo">
            <a href="<?php echo esc_url( home_url('/') ); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </div>

        <nav>
            <ul>
                <li><a href="<?php echo esc_url( home_url('/') ); ?>">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Solutions</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>

    </div>

</header>