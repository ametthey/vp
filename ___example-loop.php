<?php get_header(); ?>

<!-- Basic Loop -->
<?php if ( have_posts()  ) : while ( have_posts() ) : the_post(); ?>
    <?php the_content() ?>
<?php endwhile; endif; ?>


<!-- Basic Loop with WP_Query -->
<?php
    $args = array(
        'post_type' => 'project',
    );

    $loop = new WP_Query( $args );
?>

    <?php if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); ?>
        <?php the_content() ?>
    <?php endwhile; endif; ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
