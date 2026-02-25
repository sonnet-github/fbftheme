<?php
/**
 * Homepage Intro Block Template
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

    <div class="homepage-intro">
        <div class="max-wrap margin-auto">
            <?php if(get_field('image')): ?>
                <div class="homepage-intro__header">
                    <img src="<?=get_field('image')['url']?>" alt="<?=get_field('image')['alt']?>">
                </div>
            <?php endif; ?>

            <div class="homepage-intro__wrap flex flex-space-between">
                <div class="homepage-intro__left">
                    <h1><?=get_field('left_heading')?></h1>
                    <?php if(get_field('button_1')): ?>
                        <p class="hide-mobile"><a href="<?=get_field('button_1')['url']?>" class="button button-border"><?=get_field('button_1')['title']?></a></p>
                    <?php endif; ?>
                    <?php if(get_field('button_2')): ?>
                        <p class="hide-mobile"><a href="<?=get_field('button_2')['url']?>" class="button button-border"><?=get_field('button_2')['title']?></a></p>
                    <?php endif; ?>
                </div>
                <div class="homepage-intro__right">
                    <?=get_field('wysiwyg_content')?>
                </div>
                <div class="hide-desktop">
                    <?php if(get_field('button_1')): ?>
                        <p><a href="<?=get_field('button_1')['url']?>" class="button button-border"><?=get_field('button_1')['title']?></a></p>
                    <?php endif; ?>
                    <?php if(get_field('button_2')): ?>
                        <p><a href="<?=get_field('button_2')['url']?>" class="button button-border"><?=get_field('button_2')['title']?></a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>