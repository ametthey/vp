<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <?php if ( have_posts()  ) : while ( have_posts() ) : the_post(); ?>

            <p>The author: <a href="<?php get_the_author(); ?>"><?php the_author(); ?></a></p>

            <p>Written by: <?php the_author_posts_link(); ?></p>

            <?php the_content(); ?>

             <?php endwhile; endif; ?>

        </main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
