<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NewsBlue
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) :
        ?>
        <div class="publication__comments">
        <h2 class="comments">
           Комментарии

        </h2>
            <span class="arrow-toggle">
        <span class="arrow-right"></span>
        <span class="arrow-left"></span>
      </span>
        </div>
            <?php the_comments_navigation(); ?>


            <div class="comment-body">
            <?php
            wp_list_comments(array(
                    'style' => 'div',
                    'short_ping' => true,
                    'avatar_size'=> 65,
                    'callback' => 'newsblue_comment',

                ));
            ?>
            </div>

        </div>
        <!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'newsblue'); ?></p>
        <?php
        endif;

    endif; // Check for have_comments().
    ?>

                <?php
                $commenter = wp_get_current_commenter();
                $comments_args = array(
                        'fields' => array(
                            'author' => '<div class="form-group">
		<label class="control-label" for="author">' . esc_html__( 'Имя*' )  . '</label>
		<input id="author" class="form-control"  name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"'.' />
	</div>',
                            'email' => '<div class="form-group">
		<label class="control-label" for="email">' . esc_html__( 'Email*' )  . '</label>
		<input id="email" class="form-control"  name="email" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-describedby="email-notes"'.' />
	</div>',
                            ),
                    'class_submit' => 'btn submit-btn',
                    'submit_field' => '<div class="submit">%1$s %2$s</div>',
                    'class_form' => 'comment-form',
                    'comment_field' => '<div class="form-group"><label for="comment">' . esc_html_x( 'Ваш комментарий', 'noun' ) . '</label> <textarea class="form-control" id="comment" name="comment"  rows="8"></textarea></div>',
                    'class_container' => 'publication__form',

                );
                comment_form($comments_args);
                ?>


<!-- #comments -->
