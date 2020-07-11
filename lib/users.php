<?php

/*
 * Register a new user role type
 */

add_action('after_setup_theme', function() {
    /*
     * Ajout d'un nouveau profil d'utilisateur
     * reveur = nom
     * Rêveur = nom sur le front du back office (ce qui va apparaître dans le site)
     * $reveur_cap = les capabilités du nouveau profil d'utilisateur
     */

    /*
     * On donne au nouveau profil d'utilisateur le rôle d'administrateur
     */
    $reveur_cap = get_role('administrator') ->capabilities;

    // echo '<pre>';
    // print_r($reveur_cap);
    // echo '</pre>';
    // die();

    /*
     * On enlève certaines permissions au nouveau profil Rêveur
     */

    $unwanted_caps = [
        'activate_plugins'  => 1,
        'delete_plugins'    => 1,
        'install_plugins'   => 1,
        'update_plugins'    => 1,
        'edit_themes'       => 1,

    ];

    $reveur_cap = array_diff_key($reveur_cap, $unwanted_caps);

    add_role('reveur', 'Rêveur', $reveur_cap);

});

?>
