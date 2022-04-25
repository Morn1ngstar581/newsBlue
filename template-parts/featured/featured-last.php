<?php

$query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 1,]);
if ($query->have_posts()):
    global $post;
    $id = $post->ID;
?>
        <div class="extra">
            <div class="container">
                <div class="extra__grid">
                    <?php
                    while ($query->have_posts()):
                        $query->the_post();
                        ?>
                        <div class="extra__item">
                            <a href="<?php  echo the_permalink();?>" class="extra__link">
                                <h2 class="extra__title"><?php the_title();?></h2>

                            </a>
                            <span class="date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?></span>

                        </div>
                        <div class="extra__item">
                           <?php echo get_the_post_thumbnail('', 'full', array('class' => 'extra__img')); ?>
                        </div>
                    <?php
                    endwhile;
                    ?>

                </div>
            </div>
        </div>
        <?php endif;?>
<?php
        $query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 4, 'post__not_in' => array($id),]);
        ?>
        <?php if ($query->have_posts()):
        ?>
        <div class="news">
        <div class="container">
            <div class="news__body">
                <div class="news__grid">
                <?php
                    while ($query->have_posts()):
                        $query->the_post();
                        ?>
                        <div class="news__item">
                        <div class="news__head">
                           <?php echo get_the_post_thumbnail('', array(364, 193), array('class' => 'large__img', 'class'    =>  'news__img')); ?>
                           <?php
                           $categories = get_the_category();
                           if (!empty($categories)) {
                               echo '<a  href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="news__badge blue-badge" >' . esc_html($categories[0]->name) . '</a>';
                           } ?>


                        </div>
                        <div class="news__main">
                            <a class="news__link" href="<?php echo get_permalink(); ?>">
                                <h3 class="news__title"><?php echo get_the_title(); ?></h3>
                            </a>
                            <?php echo '<p class="content">'. get_the_excerpt(). '</p>';?>
                        </div>
                        <div class="news__footer">
                            <span class="news__date"> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?></span>
                                <?php the_author_posts_link();?>
                        </div>
                    </div>
                    <?php
                    endwhile;
                    ?>

                </div>
            </div>
        </div>

<?php endif;
wp_reset_query(); ?>