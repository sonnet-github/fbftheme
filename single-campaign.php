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
                        <div class="page-heading__left">
                            <div style="display: none;"><h1><?=get_the_title();?></h1></div>
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