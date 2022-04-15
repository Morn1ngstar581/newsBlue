<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package NewsBlue
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
            <div class="container">
                <div class="not-found__body">
                    <div class="not-found__item">
				<h1 class="not-found__title"><?php esc_html_e( '404', 'newsblue' ); ?></h1>

                    </div>
                    <div class="not-found__item">
				    <span class="not-found__oops"><?php esc_html_e( ' Упс, страница не найдена!', 'newsblue' ); ?></span>
                        <a href="<?php  echo home_url();?> " class="not-found__home"> На главную</a>
					</div><!-- .widget -->
                </div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
