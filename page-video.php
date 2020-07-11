<?php
/*
 * Template Name: Video
 */

get_header(); ?>


<main class="main container-videos">
    <?php if ( have_rows( 'video_a_ajouter' ) ) : ?>
        <?php while ( have_rows( 'video_a_ajouter' ) ) : the_row(); ?>
        <div class="embed-container">
            <?php the_sub_field( 'video' ); ?>
        </div>
        <?php endwhile; ?>
    <?php else : ?>
        <?php // no rows found ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
