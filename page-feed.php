<?php
/*
 * Template Name: Feed
 */

get_header(); ?>


<main class="main container-feed">
    <?php $feed_gallery_urls = get_field( 'feed_gallery' ); ?>
    <?php if ( $feed_gallery_urls ) :  ?>
        <?php foreach ( $feed_gallery_urls as $feed_gallery_url ): ?>
            <img class="lazyload" src="<?php echo esc_url( $feed_gallery_url ); ?>" />
        <?php endforeach; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
