<?php
/*
Template Name: custom-page
*/
get_header();
?>

<main>
    <section class="custom-page">
        <div class="container">
            <h1 class="custom-page__title">
                <?php echo get_the_title();?>
            </h1>
            <div class="custom-page__main">

                <p class="custom-page__content">
                    <?php the_content();?>
                </p>


            </div>
        </div>
    </section>
</main>





<?php
get_footer();