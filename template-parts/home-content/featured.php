<?php
$query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 1,]);
if ($query->have_posts()):
global $post;
$id = $post->ID;
?>
<div class="large">
    <div class="container">

        <?php
        while ($query->have_posts()):
            $query->the_post();
            ?>
            <a href="<?php echo get_permalink(); ?>" class="large__link">

                <img src="<?php echo get_the_post_thumbnail('', 'full', array('class' => 'large__img')); ?> ">
                    <h2 class=" large__heading">
                <?php echo get_the_title(); ?>
                </h2>
                <span class="large__date">
                   <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?>
                </span>
            </a>
        <?php
        endwhile;
        ?>

        <?php endif; //wp_reset_query(); ?>

        <?php
        $query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 4, 'post__not_in' => array($id),]);
        ?>
        <?php if ($query->have_posts()):
        ?>
        <div class="large__body">
            <div class="large__grid">
                <?php
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <div class="large__item">
                        <span class="date devider"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?> </span>
                        <a class="large__sublink" href="<?php echo get_permalink(); ?>">
                            <h3 class="large__title"><?php echo get_the_title(); ?></h3>
                        </a>
                    </div>
                <?php
                endwhile;
                ?>
                <div class="large__item large__item-link">
                    <a class="more-news" href="#"> Больше новостей ></a>
                </div>
            </div>

        </div>
    </div>

</div>

<?php endif;
wp_reset_query(); ?>

