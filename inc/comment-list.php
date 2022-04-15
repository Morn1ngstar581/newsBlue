
<?php
function newsblue_comment( $comment, $args, $depth ) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }

   ?>
        <div class="publication__feed">
    <div class="comment-head">
        <div class="comment-user">
        <?php
        if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, $args['avatar_size'], '','',array('class'=>'user-img') );
        }
        printf(
            __( '<cite class="user-name">%s</cite>' ),
            get_comment_author_link()
        );
        ?>

        </div>
        <span class="comment-date news__date">
        <?php
            printf(
                __( '%1$s at %2$s' ),
                get_comment_date(),
                get_comment_time()
            ); ?>
            </span>
    </div>

    <?php if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation">
            <?php _e( 'Your comment is awaiting moderation.' ); ?>
        </em><br/>
    <?php } ?>

    <p class="comment-text">
        <?php echo get_comment_text();?>
    </p>
    <div class="reply">
        <?php
        comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth']
                )
            )
        ); ?>
    </div>

    <?php if ( 'div' != $args['style'] ) { ?>
        </div>
    <?php }
}