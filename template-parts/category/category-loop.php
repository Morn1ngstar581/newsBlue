
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

                        the_posts_navigation();

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;
                        ?>
                    </div>


                </div>
        </section>
    </main><!-- #main -->
