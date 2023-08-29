<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du fichier style.css du thème parent foce
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Chargement du fichier style.css du thème enfant foce-child
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/style/sass/style.css', array('parent-style'), '1.0.0');

    // Chargement des librairies JS via CDN : simple-parallax, swiper, GSAP + plugin scrollTrigger
    wp_enqueue_script('parallax-script', 'https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js', array(), '1.0.0', true);

    wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@10.1.0/swiper-bundle.min.js', array(), '1.0.0', true);

    wp_enqueue_script('gsap-script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '1.0.0', true);

    wp_enqueue_script('scrollTrigger-script', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array(), '1.0.0', true);

    // Chargement du fichier script.js
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/scripts/script.js', array('jquery'), '1.0.0', true);
}

// Get customizer options form parent theme
if (get_stylesheet() !== get_template()) {
    add_filter('pre_update_option_theme_mods_' . get_stylesheet(), function ($value, $old_value) {
        update_option('theme_mods_' . get_template(), $value);
        return $old_value; // prevent update to child theme mods
    }, 10, 2);
    add_filter('pre_option_theme_mods_' . get_stylesheet(), function ($default) {
        return get_option('theme_mods_' . get_template(), $default);
    });
}
