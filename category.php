<?php
get_header(); ?>


    <main id="primary">
        <section class="category-post">
            <div class="container">

                <?php if (have_posts()) : ?>


                <h1 class="category-post__h1"> <?php single_cat_title(); ?> </h1>
                <div class="category-post__content">
                    <div class="grid">


                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part('template-parts/content-category', get_post_type());

                        endwhile;


                        else :

                            get_template_part('template-parts/content-page', 'none');

                        endif;
                        ?>
                    </div>

                </div>
                <?php the_posts_pagination(array(
                    'show_all' => false,
                        'prev_next' => false,
                        'type' => 'list',
                        'class' => 'pagination',
                        'end_size' => 3,
                        'mid_size' => 1,

                )); ?>
            </div>
        </section>
    </main><!-- #main -->


<?php get_footer(); ?>