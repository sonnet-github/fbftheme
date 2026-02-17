<?php
/**
 * Two Column - Video Text Block Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */

    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="two-column-video-text">
        <div class="max-wrap margin-auto">
            <div class="two-column-video-text__wrap flex-row-reverse flex flex-space-between items-center">
                <div class="two-column-video-text__video">
                    <div class="two-column-video-text__video-inner">
                        <?php if(get_field('video_file')): ?>
                            <video src="<?=get_field('video_file')['url']?>" controls></video>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="two-column-video-text__content">
                    <div class="two-column-video-text__content-wysiwyg">
                        <?=get_field('wysiwyg_content')?>
                    </div>
                    
                    <?php if(get_field('button_1') || get_field('button_2')): ?>
                        <div class="two-column-video-text__content-button">
                            <?php if(get_field('button_1')): ?>
                                <p><a href="<?=get_field('button_1')['url']?>" class="button button-border"><?=get_field('button_1')['title']?></a></p>
                            <?php endif; ?>
                            <?php if(get_field('button_2')): ?>
                                <p><a href="<?=get_field('button_2')['url']?>" class="button button-border"><?=get_field('button_2')['title']?></a></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>