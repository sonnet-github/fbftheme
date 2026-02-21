<?php
/**
 * Testimonial Listing block
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
    // Fields

    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>
    <?php if(have_rows('testimonial')): ?>
        <div class="testimonial">
            <div class="max-wrap margin-auto">
                <div class="testimonial__wrap flex flex-wrap flex-space-between">
                    <?php while(have_rows('testimonial')): the_row(); ?>
                        <div class="testimonial__item">
                            <div class="testimonial__item-wrap flex flex-space-between items-center">
                                <div class="testimonial__image">
                                    <?php if(get_sub_field('image')): ?>
                                        <img src="<?=get_sub_field('image')['url']?>" alt="<?=get_sub_field('image')['alt']?>">
                                    <?php endif; ?>
                                </div>
                                <div class="testimonial__content">
                                    <?php if(get_sub_field('heading')): ?>
                                        <h4><?=get_sub_field('heading')?></h4>
                                    <?php endif; ?>
                                    <?php if(get_sub_field('sub_heading')): ?>
                                        <h5><?=get_sub_field('sub_heading')?></h5>
                                    <?php endif; ?>
                                    <?php if(get_sub_field('description')): ?>
                                        <p><?=get_sub_field('description')?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>