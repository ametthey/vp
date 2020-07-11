<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
        <!-- in the empty href, upload in media the path for the svg -->
        <link rel="icon" type="image/png" href="" />
    </head>
    <body <?php body_class() ?> >

        <header>
            <h2 class="header-title"><a href="<?php echo get_home_url(); ?>">Vox Populi Records</a></h2>

            <!-- Menu -->
            <?php echo wp_nav_menu(
                array(
                    'theme_location' => 'header-menu',
                    'container'      => 'div',
                    'container_class'=> 'header__menu'
                )
            );?>
        </header>
