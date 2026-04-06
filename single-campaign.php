<?php 
/* Template Name: Default Post Template
 * Template Post Type: post
 */
/**
 * Default Post template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
    get_header(); ?>

        <div id="page-content" class="post-blocks single-campaign" data-tpl="single">
            <?php while(have_posts()): the_post(); ?>

                 
                <div class="max-wrap margin-auto">
                    <div class="page-heading flex flex-space-between">
                        <div class="page-heading__left flex items-center">
                            <div style="display: none;"><h1><?=get_the_title();?></h1></div>
                            <a href="<?=get_the_post_thumbnail_url()?>" download><svg viewBox="0 0 24 24" fill="#6700D6" width="24" height="24"><path d="M4.9937,15.9971 L4.9937,18.4971 C4.9937,18.7721 5.2177,18.9971 5.4937,18.9971 L5.4937,18.9971 L17.4937,18.9971 C17.7697,18.9971 17.9937,18.7721 17.9937,18.4971 L17.9937,18.4971 L17.9937,15.9971 L18.9937,15.9971 L18.9937,18.4971 C18.9937,19.3241 18.3207,19.9971 17.4937,19.9971 L17.4937,19.9971 L5.4937,19.9971 C4.6657,19.9971 3.9937,19.3241 3.9937,18.4971 L3.9937,18.4971 L3.9937,15.9971 L4.9937,15.9971 Z M11.9933,4 L11.9933,14.078 L15.0293,11.043 L15.7363,11.75 L11.4933,15.992 L7.2513,11.75 L7.9583,11.043 L10.9933,14.078 L10.9933,4 L11.9933,4 Z" fill-rule="evenodd"></path></svg></a>
                            <?php echo do_shortcode('[addtoany]'); ?>
                        </div>

                        <div class="page-heading__right">
                            <a href="<?=get_home_url()?>/campaign/" class="button button-border"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6.28125 11.2834L2.998 8.00016L6.28125 4.7169" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/><path d="M13.668 8.00011L3.81821 8.00011" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg> Back to all campaign assets</a>
                        </div>
                    </div>
                </div>
                <div class="max-wrap margin-auto single-campaign-wrap">
                    <div class="single-campaign-wrap__image">
                        <?php if(has_post_thumbnail()): ?>
                            <img src="<?=get_the_post_thumbnail_url()?>" alt="<?=get_the_title()?>">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        
        </div>

    <?php get_footer(); ?>