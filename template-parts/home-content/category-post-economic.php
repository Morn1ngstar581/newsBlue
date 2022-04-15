
    <?php $query = new WP_Query([
        'post_type' => 'post',
        'post_status' => array('publish'),
        'posts_per_page' => 4, // нужное количество постов которое надо вывести
        'category__in'=>5,
        'tax' => array(
            array(
                'category' => 'politika', // передаешь сюда название таксономии постов которые хоч вывести

            )
        ),
    ]);?>
    <?php if ($query->have_posts()):

        ?>
        <div class="post">
            <div class="container">
                <div class="post__grid">

                    <?php
                    while ($query->have_posts()):
                        $query->the_post();
                        ?>
                        <div class="post__item">
                            <div class="post__header">
                                <img src="<?php echo get_the_post_thumbnail('', '', array('class' => 'post__img')); ?>
                                    <span class=" post__badge blue-badge"> <?php echo get_the_terms( get_the_ID(), 'category' )[0]->name; ?></span>
                            </div>
                            <div class="post__body">
                                <a href="<?php echo get_permalink(); ?>" class="post__link">
                                    <h3 class="post__title"><?php the_title();?></h3>
                                </a>
                                <?php echo '<p class="post__content content">'. get_the_excerpt(). '</p>';?>

                                <span class="date"> 2 часа назад </span>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
        </div>
    <?php endif;
    wp_reset_query();?>
