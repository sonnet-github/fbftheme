<?php 
/* Template Name: Past Experiments - Full Template
 * Template Post Type: page
 */
/**
 * Past Experiments - Full Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
    $current_user = wp_get_current_user();
    $first_name = $current_user->first_name;
    $last_name  = $current_user->last_name;
    $email = $current_user->user_email;
    $user_id = get_current_user_id();
    $gender = get_user_meta($user_id, 'gender', true);
    $linkedin_url = get_user_meta($user_id, 'linkedin_url', true);
    $linkedin_followers = get_user_meta($user_id, 'linkedin_followers', true);
    $country_region = get_user_meta($user_id, 'country_region', true);
    $last_initial = !empty($last_name) ? strtoupper(substr($last_name, 0, 1)) . '.' : '';


    get_header(); ?>

        <div id="page-content" class="page-blocks" data-tpl="past-experiments-full">

            <?php the_content(); ?>

            <?php
                $argsTestA = array(
                    'post_type' => 'test-a',
                    'posts_per_page' => 1,
                    'meta_query' => array(
                        array(
                            'key'   => 'user',
                            'value' => $user_id,
                            'compare' => '='
                        )
                    )
                );
                $queryTestA = new WP_Query($argsTestA);
             ?>
            
            <div class="past-experiments-full">
                <div class="max-wrap margin-auto">
                    <div class="past-experiments-full__heading page-heading flex flex-space-between items-center">
                        <h1>Past Experiments</h1>
                        <a href="<?=get_site_url()?>/profile/" class="button button-border"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6.28125 11.2834L2.998 8.00016L6.28125 4.7169" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/><path d="M13.668 8.00011L3.81821 8.00011" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg> Back to Profile</a>
                    </div>
                    <div class="past-experiments-full__items">
                        <?php
                        if ($queryTestA->have_posts()): ?>
                            <?php while($queryTestA->have_posts()): $queryTestA->the_post() ?>
                                <?php
                                    $date_of_post = get_field('date_of_post');
                                    $linkedin_test_post_url = get_field('linkedin_test_post_url');
                                    $no_of_impressions = get_field('no_of_impressions');
                                    $no_of_members_reached = get_field('no_of_members_reached');
                                    $no_of_comments = get_field('no_of_comments');
                                    $no_of_reports = get_field('no_of_reports');
                                    $no_of_reactions = get_field('no_of_reactions');
                                    $no_of_saves = get_field('no_of_saves');
                                    $no_of_sends = get_field('no_of_sends');
                                    $buddy_linkedin_profile_url = get_field('buddy_linkedin_profile_url');
                                    $buddy_linkedin_post_url = get_field('buddy_linkedin_post_url');
                                    $user = get_field('user');

                                    $graphMax = $no_of_members_reached;

                                    $buddy_user_id = 0;

                                    $argsTestA2 = array(
                                        'post_type' => 'test-a',
                                        'posts_per_page' => 1,
                                        'meta_query' => array(
                                            array(
                                                'key'   => 'linkedin_test_post_url',
                                                'value' => $buddy_linkedin_post_url,
                                                'compare' => '='
                                            )
                                        )
                                    );
                                    
                                    $queryTestA2 = new WP_Query($argsTestA2);

                                    if ($queryTestA2->have_posts()) {
                                        while($queryTestA2->have_posts()) {
                                            $queryTestA2->the_post();
                                            
                                            // Buddy Test detail
                                            
                                            $buddy_date_of_post = get_field('date_of_post');
                                            $buddy_linkedin_test_post_url = get_field('linkedin_test_post_url');
                                            $buddy_no_of_impressions = get_field('no_of_impressions');
                                            $buddy_no_of_members_reached = get_field('no_of_members_reached');
                                            $buddy_no_of_comments = get_field('no_of_comments');
                                            $buddy_no_of_reports = get_field('no_of_reports');
                                            $buddy_no_of_reactions = get_field('no_of_reactions');
                                            $buddy_no_of_saves = get_field('no_of_saves');
                                            $buddy_no_of_sends = get_field('no_of_sends');
                                            $buddy_buddy_linkedin_profile_url = get_field('buddy_linkedin_profile_url');
                                            $buddy_buddy_linkedin_post_url = get_field('buddy_linkedin_post_url');
                                            $buddy_user = get_field('user');
                                            $buddy_user_id = get_field('user');

                                            if ($buddy_no_of_members_reached > $graphMax) {
                                                $graphMax = $buddy_no_of_members_reached;
                                            }
                                        }
                                    }

                                    // Buddy User detail based on $buddy_user_id from the post

                                    $buddy_user = get_user_by('ID', $buddy_user_id);
                                    $buddy_first_name = $buddy_user->first_name;
                                    $buddy_last_name = $buddy_user->last_name;
                                    $buddy_last_initial = !empty($buddy_last_name) ? strtoupper(substr($buddy_last_name, 0, 1)) . '.' : '';
                                ?>

                                <div class="past-experiments-full__item">
                                    <div class="past-experiments-full__wrap flex flex-space-between">
                                        <div class="past-experiments-full__left">
                                            <h4>Test A (0003)</h4>
                                            <h5><?=$first_name?> <?=$last_initial?> <?=$date_of_post?></h5>
                                            <table>
                                                <tr>
                                                    <th></th>
                                                    <th><?=$first_name?> <?=$last_initial?></th>
                                                    <th><?=$buddy_first_name?> <?=$buddy_last_initial?></th>
                                                </tr>
                                                <tr>
                                                    <td>Date of Post</td>
                                                    <td><?=$date_of_post?></td>
                                                    <td><?=$buddy_date_of_post?></td>
                                                </tr>
                                                <tr>
                                                    <td>Post URL</td>
                                                    <td><a href="<?=$linkedin_test_post_url?>" target="_blank">View Post</a></td>
                                                    <td><a href="<?=$buddy_linkedin_test_post_url?>" target="_blank">View Post</a></td>
                                                </tr>
                                                <tr>
                                                    <td># of Members Reached</td>
                                                    <td><?=$no_of_members_reached?></td>
                                                    <td><?=$buddy_no_of_members_reached?></td>
                                                </tr>
                                                <tr>
                                                    <td># of Reactions</td>
                                                    <td><?=$no_of_reactions?></td>
                                                    <td><?=$buddy_no_of_reactions?></td>
                                                </tr>
                                                <tr>
                                                    <td># of Comments</td>
                                                    <td><?=$no_of_comments?></td>
                                                    <td><?=$buddy_no_of_comments?></td>
                                                </tr>
                                                <tr>
                                                    <td># of Members Reached</td>
                                                    <td><?=$no_of_members_reached?></td>
                                                    <td><?=$buddy_no_of_members_reached?></td>
                                                </tr>
                                            </table>
                                            <div class="past-experiments-full__left-footer">
                                                <a href="#!" class="button button-border">Share These Results on LinkedIn</a>
                                            </div>
                                        </div>
                                        <div class="past-experiments-full__right">
                                            <div class="chart chart--3">
                                                <div class="chart-content">
                                                    <div class="chart-bars">
                                                        <div class="chart-bars-inner">
                                                            <div class="chart-bar chart-bar--purple" style="height: <?=ceil(($no_of_members_reached/$graphMax)*100)?>%">
                                                                <div class="chart-bar-label">
                                                                    <label><?=ceil(($no_of_members_reached/$graphMax)*100)?>%</label>
                                                                </div>
                                                            </div>
                                                            <div class="chart-bar" style="height: <?=ceil(($buddy_no_of_members_reached/$graphMax)*100)?>%">
                                                                <div class="chart-bar-label">
                                                                    <label><?=ceil(($buddy_no_of_members_reached/$graphMax)*100)?>%</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="chart-footer">
                                                        <div class="chart-footer-wrap">
                                                            <div class="chart-label">
                                                                % of members reached<br />(Jane D.)
                                                            </div>
                                                            <div class="chart-label">
                                                                % of members reached<br />(Martin P.)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php
                        endif; ?>
                        
                        <?php 
                            $allItems = [];
                            $itemSum = 0;
                            $args = array(
                                'post_type' => 'test-b',
                                'posts_per_page' => -1
                            );
                            $query = new WP_Query($args);

                            if ($query->have_posts()) {

                                while($query->have_posts()): $query->the_post();
                                    $theArray = get_field('chat_gpt_considers', get_the_ID());

                                    if ($theArray) {
                                        foreach ($theArray as $item) {
                                            $itemSum++;
                                            $allItems[] = $item; // collect everything
                                        }
                                    }
                                endwhile;
                            }

                            // count occurrences
                            $counts = array_count_values($allItems);
                            $maxNum = max($allItems);
                            $maxVal = 0;

                            $argsTestB = array(
                                'post_type' => 'test-b',
                                'posts_per_page' => -1,
                                'meta_query' => array(
                                    array(
                                        'key'   => 'user',
                                        'value' => $user_id,
                                        'compare' => '='
                                    )
                                )
                            );

                            $queryTestB = new WP_Query($argsTestB);
                            
                         ?>

                        <?php while($queryTestB->have_posts()): $queryTestB->the_post(); ?>

                            <div class="past-experiments-full__item past-experiments-full__item--post-analysis">
                                <div class="past-experiments-full__wrap flex flex-space-between">
                                    <div class="past-experiments-full__left">
                                        <h4>Test A (0003)</h4>
                                        <h5><?=$first_name?> <?=$last_initial?> <?=get_field('date_of_post')?></h5>
                                        <div class="past-experiments-full__analysis">
                                            <h4>Your post analysis was <a href="#!" class="button button-primary button-large button--<?=str_replace(' ', '-',get_field('chat_gpt_considers')[0])?>"><?=get_field('chat_gpt_considers')[0]?></a></h4>
                                        </div>
                                        <div class="past-experiments-full__left-footer">
                                            <a href="#!" class="button button-border">Share These Results on LinkedIn</a>
                                        </div>
                                    </div>
                                    <div class="past-experiments-full__right">
                                        <div class="chart chart--4">
                                            <div class="chart-content">
                                                <div class="chart-bars">
                                                    <div class="chart-bars-inner">
                                                        <div class="chart-bar chart-bar--purple" style="height: calc((<?=$counts['breakout']?> / <?=$counts[$maxNum]?>) * 100%);">
                                                            <div class="chart-bar-label">
                                                                <label><?=ceil(($counts['breakout']/$itemSum) * 100)?>%</label>
                                                            </div>
                                                        </div>
                                                        <div class="chart-bar" style="height: calc((<?=$counts['sustained growth']?> / <?=$counts[$maxNum]?>) * 100%);">
                                                            <div class="chart-bar-label">
                                                                <label><?=ceil(($counts['sustained growth']/$itemSum) * 100)?>%</label>
                                                            </div>
                                                        </div>
                                                        <div class="chart-bar chart-bar--black" style="height: calc((<?=$counts['contained']?> / <?=$counts[$maxNum]?>) * 100%);">
                                                            <div class="chart-bar-label">
                                                                <label><?=ceil(($counts['contained']/$itemSum) * 100)?>%</label>
                                                            </div>
                                                        </div>
                                                        <div class="chart-bar chart-bar--bordered" style="height: calc((<?=$counts['suppressed']?> / <?=$counts[$maxNum]?>) * 100%);">
                                                            <div class="chart-bar-label">
                                                                <label><?=ceil(($counts['suppressed']/$itemSum) * 100)?>%</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chart-footer">
                                                    <div class="chart-footer-wrap">
                                                        <div class="chart-label">
                                                            Breakout
                                                        </div>
                                                        <div class="chart-label">
                                                            Sustained Growth
                                                        </div>
                                                        <div class="chart-label">
                                                            Contained
                                                        </div>
                                                        <div class="chart-label">
                                                            Suppressed
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chart-description">
                                                <p>Total experiment results across <?=$itemSum?> participants as of <?=date('d/m/Y')?>.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        
        </div>

    <?php get_footer(); ?>