    <?php
    $query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 1, 'category_name' => 'culture']);
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
									
                                    <span class="category__badge blue-badge"> <?php echo  get_the_terms(get_the_ID(), 'category')[0]->name; ?> </span>
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
                $query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 3,'post__not_in' => array($id), 'category_name' => 'culture']);
                ?>
                <?php if ($query->have_posts()):
                ?>
                <div class="category__item">
                    <div class="category__long">
                        <div class="category__head">
                            <span class="category__name"><?php echo  get_the_terms(get_the_ID(), 'category')[0]->name; ?></span>
                        </div>
                        <div class="category__body">
                            <?php
                            while ($query->have_posts()):
                                $query->the_post();
                                ?>


                                <div class="category__bone">
                                    <span class="date devider"> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?> </span>
                                    <a href="#" class="category__link">
                                        <h3 class="category__title"> <?php the_title(); ?> </h3>
                                    </a>

                                </div>
                            <?php
                            endwhile;
                            ?>
                            <a href="<?php  echo $category_link = get_category_link( 281 );?> " class="more-news position-news"> Больше новостей ></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


<?php endif;
wp_reset_query(); ?>
   
