<?php
/*
Template Name: Homepage
*/
get_header();
?>
    <main>
        <section class="featured-post">
        <?php get_template_part('template-parts/featured/featured-last'); ?>
        </section>
        <div class="container">
            <div class="banner mb">
                <a href="<?php the_field('banner-2-link','option');?> " class="banner__link">
                    <img class="banner" src="<?php echo the_field('banner-2-img', 'option');?>">
                </a>
            </div>
        </div>
        <?php get_template_part('template-parts/home-content/category-news-society');?>
        <?php get_template_part('template-parts/home-content/category-news-economic');?>
        <section class="politic">
            <?php get_template_part('template-parts/home-content/category-large-politic');?>
        </section>
        <div class="container">
            <div class="banner mb">
                <a href="<?php the_field('banner-5-link','option');?> " class="banner__link">
                    <img class="banner" src="<?php the_field('banner-5-img', 'option');?>">
                </a>
            </div>
        </div>
        <section class="sosedi">
            <?php get_template_part('template-parts/home-content/category-news-sosedi');?>
        </section>

        <section class="v-mire">
            <?php get_template_part('template-parts/home-content/v-mire');?>
        </section>
        <div class="container">
            <div class="banner mb">
                <a href="<?php the_field('banner-7-link','option');?> " class="banner__link">
                    <img class="banner" src="<?php the_field('banner-7-img', 'option');?>">
                </a>
            </div>
        </div>
        <section class="avto">
            <?php get_template_part('template-parts/home-content/avto');?>
        </section>
        <section class="sport">
            <?php get_template_part('template-parts/home-content/category-news-sport');?>
        </section>
        <section class="turizm">
            <?php get_template_part('template-parts/home-content/category-large-turizm');?>
        </section>
        <div class="container">
            <div class="banner mb">
                <a href="<?php the_field('banner-10-link','option');?> " class="banner__link">
                    <img class="banner" src="<?php the_field('banner-10-img', 'option');?>">
                </a>
            </div>
        </div>
        <section class="belarus ">
            <?php get_template_part('template-parts/home-content/news-belarus');?>
        </section>
        <section class="chp">
            <?php get_template_part('template-parts/home-content/category-news-chp');?>
        </section>
        <section class="nedvizhimost">
            <?php get_template_part('template-parts/home-content/category-news-nedvizh');?>
        </section>
        <section class="afisha">
            <?php get_template_part('template-parts/home-content/category-large-afisha');?>
        </section>
        <section class="technology">
        <?php get_template_part('template-parts/home-content/category-news-technology');?>
        </section>
        <section class="culture">
            <?php get_template_part('template-parts/home-content/category-news-culture');?>
        </section>
        <section class="goroskop">
        <?php get_template_part('template-parts/home-content/category-news-goroskop');?>
        </section>
    </main>

<?php
get_footer(); ?>