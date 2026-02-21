<?php
/**
 * WYSIWYG Block Template
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

    <div class="wysiwyg">
        <div class="max-wrap margin-auto">
            <div class="wysiwyg__wrap">
                <?=get_field('wysiwyg_field')?>
            </div>
        </div>
    </div>

<?php endif; ?>