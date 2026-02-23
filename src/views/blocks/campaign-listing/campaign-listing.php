<?php
/**
 * Campaign Listing Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */  

    // query
    $args = array(
            'post_type' => 'campaign',
            'posts_per_page' => 28
        );
    $query = new WP_Query($args);

    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>
    <div class="campaign-listing">
        <div class="max-wrap margin-auto">
            <?php if(get_field('intro_block')): ?>
                <div class="campaign-listing__intro">
                    <?=get_field('intro_block')?>
                </div>
            <?php endif; ?>

            <?php if($query->have_posts()): ?>
                <div class="campaign-listing__wrap flex flex-wrap">
                    <?php while($query->have_posts()): $query->the_post(); ?>
                        <div class="campaign-listing__item">
                            <div class="campaign-listing__item-inner">
                                <a href="<?=get_the_permalink();?>"><img src="<?=get_the_post_thumbnail_url()?>" alt="<?=get_the_title()?>"></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>