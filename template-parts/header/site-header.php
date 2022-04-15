<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
$wrapper_classes = 'header';
?>
<header class="<?php echo esc_attr($wrapper_classes); ?>">

    <div class="header__top">
        <div class="container">
             <span class="header__toggler js-toggler ">
             <span class="toggler">
            <span class="toggler__item"></span>
            <span class="toggler__item"></span>
            <span class="toggler__item"></span>
          </span>
             </span>
            <div class="header__burger">
                <div class="menu">
                    <?php get_template_part('template-parts/header/site-navigation'); ?>
                    <?php get_template_part('template-parts/header/mobile-social'); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="header__middle">
        <div class="container">
            <div class="header__main">
                <div class="logo">
                <?php the_custom_logo();?>
                </div>
                <div class="banner header__banner">
                    <a target="_blank" href="<?php the_field('banner-1-link', 'option');?> ">
                        <img class="header__banner" src="<?php the_field('banner-1-img', 'option');?> ">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
        <div class="header__main bg-white">
            <div class="header__date">
        <span class="organize">
          <?php echo date_i18n('j F, l');?>
        </span>
            </div>
        <div class="header__currency">
            <span class="currency">
            <?php echo newsblue_get_icon_svg('ui', 'dollar');?>
                <?php the_field('dollar', 'option');?>

            </span>
            <span class="currency">
            <?php echo newsblue_get_icon_svg('ui', 'euro');?>
                <?php the_field('euro', 'option');?>
            </span>
            <span class="currency">
                <?php echo newsblue_get_icon_svg('ui', 'rus');?>
                <?php the_field('rus', 'option');?>
            </span>
        </div>
            <div class="header__weather">
                <span class="weather">
                    <?php echo newsblue_get_icon_svg('ui', 'sun');?>
                    <?php the_field('sun', 'option');?>
                </span>

            </div>
            <div class="header__covid">
                <span class="virus">
                    <?php echo newsblue_get_icon_svg('ui', 'virus');?>
                    <?php echo  get_field('covid-all-time', 'option');?>
                </span>
                <span class="virus  ">
                <?php echo 'За сутки: '. get_field('covid-by-day', 'option');?>
                </span>
            </div>
            <?php get_template_part('template-parts/header/social-header');?>
        </div>

        </div>
    </div>


</header>
