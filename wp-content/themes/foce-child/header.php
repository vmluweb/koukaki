<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fleurs_d\'oranger_&_Chats_errants
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"> -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'foce'); ?></a>

        <header id="masthead" class="site-header">
            <nav id="site-navigation" class="main-navigation">
                <div class="site-title">

                    <!-- Titre du site -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>

                </div>
                <div class="burgerMenu">

                    <!-- Icones menu burger -->
                    <div id="icons"></div>

                </div>
                <div class="menu-navigation">
                    <div class="menu-navigation--header flower"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/assets/images/logo.png'; ?> " alt="logo Fleurs d'oranger & chats errants"></a></div>
                    <ul>
                        <li class="menu-navigation--story cat"><a href="#story">Histoire</a></li>
                        <li class="menu-navigation--characters flower"><a href="#characters">Personnages</a></li>
                        <li class="menu-navigation--place cat"><a href="#place">Lieu</a></li>
                        <li class="menu-navigation--studio cat"><a href="#studio">Studio Koukaki</a></li>
                    </ul>
                    <div class="menu-navigation--footer flower">
                        <a href="#">Studio Koukaki</a>
                    </div>
                </div>
            </nav> <!-- #site-navigation -->
        </header><!-- #masthead -->