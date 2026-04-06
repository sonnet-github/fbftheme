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

    <style>
        .single-post .body-unload {
            padding-top: 115px;
        }

        .blog-post-thumbnail {
            margin-bottom: 25px;
        }

        .blog-post-thumbnail img {
            vertical-align: top;
        }

        @media (max-width: 767px) {
            .single-post .body-unload {
                padding-top: 71px;
            }
        }
    </style>

        <div id="page-content" class="post-blocks" data-tpl="single">
            <?php while(have_posts()): the_post(); ?>
                <?php 
                    $author_id = get_post_field('post_author', get_the_ID());   
                    $fname = get_the_author_meta('first_name');
                    $lname = get_the_author_meta('last_name');
                 ?>

                 
                <div class="max-wrap margin-auto">

                    <?php if(has_post_thumbnail()): ?>
                        <div class="blog-post-thumbnail">
                            <img src="<?=get_the_post_thumbnail_url()?>" alt="<?=get_the_title();?>">
                        </div>
                    <?php endif; ?>

                    <div class="page-heading flex flex-space-between">
                        <div class="page-heading__left">
                            <h1><?=get_the_title();?></h1>

                            <div class="single-author">
                                <h3>By <?=$fname?> <?=$lname?></h3>
                                <h4>Date of Post: <?=get_the_date('d/m/Y')?></h4>
                            </div>
                        </div>

                        <div class="page-heading__right">
                            <a href="<?=get_home_url()?>/blog/" class="button button-border"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6.28125 11.2834L2.998 8.00016L6.28125 4.7169" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/><path d="M13.668 8.00011L3.81821 8.00011" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg> Back to All Blog Posts</a>
                        </div>
                    </div>
                </div>
                <div class="max-wrap margin-auto wysiwyg">
                    <?php 
                        
                        the_content();

                    ?>
                </div>
            <?php endwhile; ?>
        
        </div>

    <?php get_footer(); ?>