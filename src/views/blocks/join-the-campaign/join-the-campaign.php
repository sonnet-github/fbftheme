<?php
/**
 * Join the campaign Block Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */

    // fields
    $campaigns = get_field('campaigns_block');

    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="join-the-campaign">
        <div class="max-wrap margin-auto">
            <div class="join-the-campaign__inner">
                <div class="join-the-campaign__wysiwyg">
                    <?=get_field('wysiwyg')?>
                </div>

                <?php if($campaigns): ?>
                    <div class="join-the-campaign__videos flex flex-space-between items-center">
                        <?php foreach($campaigns as $post): ?>
                            <div class="join-the-campaign__video">
                                <div class="join-the-campaign__video-item">
                                    <a href="<?=get_the_permalink($post->ID)?>">
                                        <img src="<?=get_the_post_thumbnail_url($post->ID)?>" alt="<?=get_the_title($post->ID);?>">
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                    </div>

                    <div class="join-the-campaign__button">
                        <a href="/campaign/" class="button button-border">Pick your post</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>