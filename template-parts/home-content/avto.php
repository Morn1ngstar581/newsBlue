    <?php
    $query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 1, 'category_name' => 'auto' ]);
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
                                    <span class="category__badge blue-badge"> <?php echo get_the_terms(get_the_ID(), 'category')[0]->name; ?> </span>
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


                <div class="category__item">
                    <a href="<?php the_field('banner-7-link', 'option');?> " class="banner__link">
                        <img class="categroy__banner" src="<?php the_field('banner-8-img', 'option');?> ">
                    </a>
                </div>

            </div>

        </div>
    </div>
    <?php $query = new WP_Query(['post_type' => 'post', 'post_status' => array('publish'), 'posts_per_page' => 4, 'post__not_in' => array($id), 'category_name' => 'auto',]); ?>
    <?php if ($query->have_posts()):

        ?>
        <div class="post">
            <div class="container">
                <div class="post__grid">

                    <?php
                    while ($query->have_posts()):
                        $query->the_post();
                        ?>
                        <div class="post__item" >
                            <div class="post__main" >
                                <div class="post__header" >
                                    <?php echo get_the_post_thumbnail('', '', array('class' => 'post__img')); ?>
                                    <span class="post__badge
                                         blue-badge"> <?php echo get_the_terms(get_the_ID(), 'category')[0]->name; ?>
                                    </span>
                                </div>
                                <div class="post__body" style="flex-grow: 1">
                                    <a href="<?php echo get_permalink(); ?>" class="post__link">
                                        <h3 class="post__title"><?php the_title(); ?></h3>
                                    </a>
                                    <span class="date"> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?> </span>
                                </div>
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
<?php
endif;?>