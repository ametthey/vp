    <!-- Footer Menu -->
    <footer>
        <?php echo wp_nav_menu(
            array(
                'theme_location' => 'footer-menu',
                'container'      => 'div',
                'container_class'=> 'footer__menu'
            )
        );?>
    </footer>
	<?php wp_footer(); ?>
	</body>
</html>
