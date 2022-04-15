<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NewsBlue
 */

get_header();
?>

    <section class="publication">
    <div class="container">

		<?php
		while ( have_posts() ) :
			the_post();


			get_template_part( 'template-parts/content', get_post_type() );



			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

        <?php
        if (is_active_sidebar( 'sidebar-5' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar-5' ); //уникальный id виджета ?>
        <?php endif; ?>
    </div>
    </section>
<?php

get_footer();
