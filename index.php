<?php 
/* Template Name: Default Template
 * Template Post Type: post, page
 */
/**
 * Default template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
    get_header(); 
    global $wp_query;

    $paged       = max(1, get_query_var('paged'));
    $total_pages = $wp_query->max_num_pages;
    ?>

        <div id="page-content" class="page-blocks" data-tpl="index">

            <div class="blog-listing max-wrap margin-auto">
                <div class="blog-listing__wrap flex flex-wrap">
                    <?php while(have_posts()): the_post(); ?>
                        <div class="blog-listing__item">
                            <h2><a href="<?=get_the_permalink();?>"><?php echo get_the_title(); ?></a></h2>
                            <h3>Date of Post: <?=get_the_date('d/m/Y')?></h3>
                            <p><a href="<?=get_the_permalink();?>" class="button button-border">Read More</a></p>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="blog-listing__pagination">
                    <?php
                        $paged = max(1, get_query_var('paged'));
                        $links = paginate_links([
                            'total'      => $total_pages,
                            'current'    => $paged,
                            'type'       => 'array',
                        ]);
                        echo '<div class="pagination">';

                        /* PREV */
                        if ($paged > 1) {
                            echo '<a class="pagination-icon pagination-icon--prev" href="' . get_pagenum_link($paged - 1) . '"><span></span></a>';
                        } else {
                            echo '<span class="pagination-icon pagination-icon--prev disabled"><span></span></span>';
                        }

                        /* PAGE NUMBERS */
                        if (!empty($links)) {
                            foreach ($links as $link) {
                                // Remove default prev/next from array
                                if (strpos($link, 'prev') === false && strpos($link, 'next') === false) {
                                    echo $link;
                                }
                            }
                        }

                        /* NEXT */
                        if ($paged < $total_pages) {
                            echo '<a class="pagination-icon pagination-icon--next" href="' . get_pagenum_link($paged + 1) . '"><span></span></a>';
                        } else {
                            echo '<span class="pagination-icon pagination-icon--next disabled"><span></span></span>';
                        }

                        echo '</div>';
                        ?>
                </div>
            </div>
        
        </div>

    <?php get_footer(); ?>