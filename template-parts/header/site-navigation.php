<?php
/** Displays the site navigation */
?>



    <?php
wp_nav_menu(
    array(
        'theme_location'    => 'header__navbar',
        'menu_class'    =>  'header__list',
        'container'     =>  'nav',
        'container_class'   => 'header__navbar',
        'items_wrap'    => '<ul class="%2$s"> %3$s</ul>',
    )
);
?>
