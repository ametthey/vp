<?php get_header(); ?>


<!-- main -->
<main class="main container-home">
    <img class="home-image" src="<?php the_field( 'home_image' ); ?>">
    <p class="home-texte"><?php the_field( 'home_texte' ); ?></p>
</main>

<?php get_footer(); ?>
