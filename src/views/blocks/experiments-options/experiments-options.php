<?php
/**
 * Experiment Options Template
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

    <?php if(have_rows('experiment_option_tabs')): ?>
        <div class="experiment-options js-tabs">
            <div class="experiment-options__tab">
                <div class="experiment-options__tab-wrap">
                    <div class="max-wrap margin-auto">
                        <div class="experiment-options__tab-heading flex">
                            <?php $x = 1; ?>
                            <?php while(have_rows('experiment_option_tabs')): the_row(); ?>
                                <?php 
                                    $desktopHeading = get_sub_field('tab_heading_desktop'); 
                                    $urlHeading = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $desktopHeading));
                                    $urlHeading = trim($urlHeading, "-");
                                    ?>

                                <div class="experiment-options__tab-heading-item<?=($x == 1) ? ' active' : '';?> js-tab-heading">
                                    <a href="#<?=$urlHeading?>"><span class="hide-mobile"><?=$desktopHeading?></span><span class="hide-desktop show-mobile"><?=get_sub_field('tab_heading_mobile')?></span></a>
                                </div>

                                <?php $x++; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-wrap margin-auto">
                <div class="experiment-options__tab">
                    <div class="experiment-options__tab-content">
                        <?php $x = 1; ?>
                        <?php while(have_rows('experiment_option_tabs')): the_row(); ?>
                            <?php 
                                $desktopHeading = get_sub_field('tab_heading_desktop'); 
                                $urlHeading = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $desktopHeading));
                                $urlHeading = trim($urlHeading, "-");
                             ?>
                            <div class="experiment-options__tab-items<?=($x == 1) ? ' active' : '';?> js-tab-content" id="<?=$urlHeading?>">
                                <div class="experiment-options__tab-items-inner">
                                    <div class="experiment-options__tab-description">
                                        <?=get_sub_field('tab_description');?>
                                    </div>

                                    <div class="experiment-options__how-it-works">
                                        <?php if(get_sub_field('steps_heading')): ?>
                                            <h2><?=get_sub_field('steps_heading')?></h2>
                                        <?php endif; ?>

                                        <?php if(have_rows('step_boxes')): ?>
                                            <div class="experiment-options__how-it-works-steps flex flex-space-between">
                                                <?php while(have_rows('step_boxes')): the_row(); ?>
                                                    <div class="experiment-options__how-it-works-step">
                                                        <h3><?=get_sub_field('heading')?></h3>
                                                        <p><?=get_sub_field('content')?></p>
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php if(get_sub_field('guidelines')): ?>
                                        <div class="experiment-options__guidelines">
                                            <?=get_sub_field('guidelines')?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(get_sub_field('faqs_heading')): ?>
                                        <div class="experiment-options__faq js-accordions">
                                            <div class="experiment-options__faq-heading">
                                                <h2><?=get_sub_field('faqs_heading')?></h2>
                                            </div>

                                            <div class="experiment-options__faq-content">
                                                <?php while(have_rows('faqs_content')): the_row(); ?>
                                                    <div class="experiment-options__faq-item js-accordion-item">
                                                        <div class="experiment-options__faq-item-heading js-accordion-heading">
                                                            <h3><?=get_sub_field('heading')?></h3>
                                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M4 10L8 6L12 10" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg></span>
                                                        </div>

                                                        <div class="experiment-options__faq-item-content">
                                                            <div class="experiment-options__faq-item-content-inner">
                                                                <?=get_sub_field('content')?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(get_sub_field('footer_tab')): ?>
                                        <div class="experiment-options__footer">
                                            <?=get_sub_field('footer_tab')?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php $x++; ?>
                        <?php endwhile ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>