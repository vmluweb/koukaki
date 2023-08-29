<?php

get_header();
?>

<main id="primary" class="site-main">
    <section id="banner" class="banner fadeInDown">
        <div class="banner__background fallbackImage">
            <video autoplay muted loop class="banner__video">
                <source src="<?php echo get_theme_file_uri() . '/assets/media/Studio+Koukaki-vidéo+header+sans+son.mp4'; ?>" type="video/mp4">
            </video>
        </div>
        <div class="banner__logo">
            <img class="banner__logo--img" src="<?php echo get_theme_file_uri() . '/assets/images/logo.png'; ?>">
        </div>
    </section>
    <section id="story" class="story fadeInUp">
        <h2 class="title__story slideInUp"><span>L'histoire</span></h2>
        <article class="story__article">
            <p><?php echo get_theme_mod('story'); ?></p>
        </article>

        <?php get_template_part('template-parts/carrousel'); ?>

        <article id="place">

            <div class="placeContent">
                <div class=" cloud-before"></div>
                <h3 class="title__place slideInUp"><span>Le lieu</span></h3>
                <p><?php echo get_theme_mod('place'); ?></p>
                <div class=" cloud-after"></div>
            </div>

        </article>
    </section>

    <section id="studio" class="studio fadeInUp">
        <h2 class="flower slideInUp"><span>Studio </span><span>&nbsp;Koukaki</span></h2>
        <div>
            <p>Acteur majeur de l’animation, Koukaki est un studio intégré fondé en 2012 qui créé, produit et distribue des programmes originaux dans plus de 190 pays pour les enfants et les adultes. Nous avons deux sections en activité : le long métrage et le court métrage. Nous développons des films fantastiques, principalement autour de la culture de notre pays natal, le Japon.</p>
            <p>Avec une créativité et une capacité d’innovation mondialement reconnues, une expertise éditoriale et commerciale à la pointe de son industrie, le Studio Koukaki se positionne comme un acteur incontournable dans un marché en forte croissance. Koukaki construit chaque année de véritables succès et capitalise sur de puissantes marques historiques. Cette année, il vous présente “Fleurs d’oranger et chats errants”.</p>
        </div>
    </section>

    <?php get_template_part('template-parts/oscars'); ?>
</main><!-- #main -->

<?php
get_footer();
