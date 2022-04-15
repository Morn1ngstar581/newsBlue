<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NewsBlue
 */
?>


<section>
    <?php
    $query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 10,]);
    if ($query->have_posts()): ?>
        <div class="category-post">
            <div class="container">
                <h1 class="category-post__h1">Новости общества</h1>
                <div class="category-post__content">
                    <div class="grid">
                        <?php while ($query->have_posts()): $query->the_post(); ?>
                            <?php get_template_part('template-parts/home-content/featured-large'); ?>
                            <div class="grid__item">
                                <div class="grid__head">
                                    <img src="img/category.png" alt="" class="grid__img">
                                </div>
                                <div class="grid__body">
                                    <a href="" class="grid__link">
                                        <h2 class="grid__h2">В Индии два судна столкнулись и затонули: есть погибшие </h2>

                                    </a>
                                    <p class="grid__post">
                                        В Индии два судна столкнулись и затонули: есть погибшие В Индии два судна столкнулись и затонули: есть погибшие В Индии два судна столкнулись и затонули: есть погибшие В Индии два судна столкнулись и затонулиВ Индии два судна столкнулись и затонули: есть погибшие В Индии два судна столкнулись и затонули: есть погибшие В Индии два судна столкнулись и затонули: есть погибшие В Индии два судна столкнулись и затонули В Индии два судна столкнулись и затонули: есть погибшие В Индии два судна столкнулись и затонули: есть погибшие В Индии два судна столкнулись и затонули: есть погибшие В Индии два судна столкнулись и затонули
                                    </p>
                                    <div class="grid__footer">
                                        <span class="date grid__date">2 часа назад</span>
                                        <a href="" class=" author grid__author "> Ковалёнок Алексей</a>
                                    </div>
                                </div>

                            </div>

                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>


</section>

