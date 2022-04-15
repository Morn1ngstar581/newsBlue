<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NewsBlue
 */

?>

            <div class="publication__top">
                <span class="blue-badge">
                     <?php echo get_the_terms(get_the_ID(), 'category')[0]->name; ?>
                </span>
                <div class="publication__info">

                    <div class="publication__views">
                        <?php echo newsblue_get_icon_svg('ui', 'views'); ?>
                         <?php echo get_post_meta($post->ID, 'views', true); ?>
                    </div>
                    <span class="timestamp"> <?php echo get_the_date();?> </span>
                </div>
            </div>
            <h1 class="publication__title">
                <?php echo get_the_title();?>
            </h1>
                <?php echo get_the_post_thumbnail('', 'full', array('class' => 'publication__img')); ?>
            <div class="publication__grid">
                <div class="publication__item">
                    <div class="publication__body">
                        <div class="publication__content">
                            <?php the_content();?>
                        </div>
                        <div class="publication__bottom">
                            <div class="share">
                                <span class="share__span">Поделиться: </span>
                            <?php get_template_part('template-parts/shared');?>
                            </div>
                           <?php the_author_posts_link();?>
                        </div>
                    </div>
                </div>
            </div>




