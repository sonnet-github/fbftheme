<?php
/**
 * Privacy Policy & Terms of Use Block Template
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

    <div class="privacy-terms">
        <div class="max-wrap margin-auto">
            <div class="privacy-terms__wrap">
                <?php while(have_rows('privacy_policy_terms_of_use_repeater')): the_row(); ?>
                    <div class="privacy-terms__item">
                        <div class="privacy-terms__heading">
                            <h2><?php echo get_sub_field('heading'); ?></h2>
                            <div class="privacy-terms__heading-wrap">
                                <?php if(get_sub_field('effective_date')): ?>
                                    <div class="privacy-terms__heading-item">
                                        <p><strong>Effective Date: </strong><?=get_sub_field('effective_date')?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_sub_field('operator')): ?>
                                    <div class="privacy-terms__heading-item">
                                        <p><strong>Operator: </strong><?=get_sub_field('operator')?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_sub_field('website')): ?>
                                    <div class="privacy-terms__heading-item">
                                        <p><strong>Website: </strong><?=get_sub_field('website')?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="privacy-terms__content">
                            <?=get_sub_field('wysiwyg_content')?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

<?php endif; ?>