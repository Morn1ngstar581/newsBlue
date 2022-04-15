<div class="shared">
    <li class="shared-link">
        <a href="https://telegram.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow">
            <?php echo newsblue_get_icon_svg('social', 'telegram');?>
        </a>
    </li>
    <li class="shared-link">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow">
        <?php echo newsblue_get_icon_svg('social', 'facebook');?>
        </a>
    </li>
    <li class="shared-link">
        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow">
            <?php echo newsblue_get_icon_svg('social', 'twitter');?>
        </a>
    </li>
    <li class="shared-link">
        <a href="http://vkontakte.ru/share.php?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow">
            <?php echo newsblue_get_icon_svg('social', 'vk');?>
        </a>
    </li>

</div>