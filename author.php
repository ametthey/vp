<?php
/*
 * Template Name: Author
 * @link: https://codex.wordpress.org/Author_Templates
 */

get_header(); ?>

<?php get_header(); ?>


<!--
<?php
// Define user ID
// Replace NULL with ID of user to be queried
$user_id = 3;

// Example: Get ID of current user
// $user_id = get_current_user_id();

// Define prefixed user ID
$user_acf_prefix = 'user_';
$user_id_prefixed = $user_acf_prefix . $user_id;
?>
-->
<p><?php the_field( 'csp', 'user_3' ); ?></p>
<p><?php the_field( 'langue_maternelle', 'user_3' ); ?></p>
<p><?php the_field( 'age', 'user_3' ); ?></p>



<?php get_footer(); ?>
