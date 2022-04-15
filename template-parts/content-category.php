<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NewsBlue
 */

?>

<div class="grid__item">


    <div class="grid__head">
             <?php echo get_the_post_thumbnail('','full', array('class' => 'grid__img') ); ?>
         </div>
        <div class=" grid__body">
        <a href="<?php echo get_permalink(); ?>" class="grid__link">
            <h2 class="grid__h2"><?php echo get_the_title(); ?></h2>

        </a>
        <p class="grid__post">
              <?php echo '<p class="grid__post">'. get_the_excerpt(). '</p>' ;?>
        </p>
        <div class="grid__footer">
            <span class="date grid__date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?></span>

            <?php the_author_posts_link();?>

        </div>
    </div>


</div>


