<?php
$query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 1, 'category_name' => 'neighbors']);
if ($query->have_posts()):
global $post;
$id = $post->ID;
?>
<div class="category">
    <div class="container">
        <div class="category__grid">


            <?php
            while ($query->have_posts()):
                $query->the_post();
                ?>
                <div class="category__item">
                    <div class="category__big">
                        <div class="category__content">
                            <div class="category__header">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo '<a  href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="category__badge blue-badge" >' . esc_html($categories[0]->name) . '</a>';
                                }
                                ?>
                                <span class="category__views">
                    <?php echo newsblue_get_icon_svg('ui', 'views'); ?>
                    <?php echo get_post_meta($post->ID, 'views', true); ?>
            </span>
                            </div>
                            <a href="<?php echo get_permalink(); ?>" class="category__link">
                                <h2 class="category__heading">
                                    <?php echo get_the_title(); ?>                              </h2>
                            </a>
                            <span class="date category__date">     <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?></span>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>

            <?php endif; //wp_reset_query(); ?>

            <?php
            $query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 3,  'post__not_in' => array($id), 'category_name' => 'neighbors']);
            ?>
            <?php if ($query->have_posts()):
            ?>
            <div class="category__item">
                <div class="category__long">
                    <div class="category__head category__head-pr">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo '<a  href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="category__name" >' . esc_html($categories[0]->name) . '</a>';
                        }
                        ?>

                    </div>
                    <div class="category__body">
                        <?php
                        while ($query->have_posts()):
                            $query->the_post();
                            ?>


                            <div class="category__bone">
                                <span class="date devider"> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?> </span>
                                <a href="<?php echo the_permalink();?>" class="category__link">
                                    <h3 class="category__title"> <?php the_title(); ?> </h3>
                                </a>

                            </div>
                        <?php
                        endwhile;
                        ?>
                        <a href="<?php echo $category_link = get_category_link(40); ?> " class="more-news position-news">
                            Больше новостей ></a>
                    </div>
                </div>
            </div>
            <div class="category__item">
                <a href="<?php the_field('banner-6-link', 'option'); ?> " class="banner__link">
                    <img src="<?php the_field('banner-6-img', 'option'); ?> ">
                </a>
            </div>
        </div>

    </div>
</div>


<?php endif;
wp_reset_query(); ?>
