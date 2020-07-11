<?php
/*
 * Template Name: Releases
 */

get_header(); ?>


<main class="main container-releases">
    <div class="container-releases-list">
        <?php if ( have_rows( 'new_release' ) ) : ?>
        <?php while ( have_rows( 'new_release' ) ) : the_row(); ?>
        <div class="container-release-item">
            <p class="release-item title">
                <?php the_sub_field( 'release_title' ); ?>
            </p>

            <p class="release-item artists">
                <?php the_sub_field( 'release_artists' ); ?>
            </p>

            <p class="release-item cat">
                <?php the_sub_field( 'release_cat' ); ?>
            </p>

            <p class="release-item year">
                <?php the_sub_field( 'release_year' ); ?>
            </p>
        </div>
        <?php endwhile; ?>
        <?php else : ?>
            <?php // no rows found ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
