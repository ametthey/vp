<?php acf_form_head(); ?>
<?php
/*
 * Template Name : Register Form
 */

get_header(); ?>

<p>Nom</p>
<?php the_field( 'nom'  ); ?>
<p>Prénom</p>
<?php the_field( 'prenom'  ); ?>
<p>Adresse email</p>
<?php the_field( 'adresse_email'  ); ?>
<p>CSP</p>
<?php the_field( 'csp'  ); ?>
<p>Langue maternelle</p>
<?php the_field( 'langue_maternelle'  ); ?>
<p>Age</p>
<?php the_field( 'age'  ); ?>





<?php get_footer(); ?>
