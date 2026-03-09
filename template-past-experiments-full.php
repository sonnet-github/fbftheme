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

            <?php 
                
                the_content();

            ?>
            
            <div class="past-experiments-full">
                <div class="max-wrap margin-auto">
                    <div class="past-experiments-full__heading page-heading flex flex-space-between items-center">
                        <h1>Past Experiments</h1>
                        <a href="<?=get_site_url()?>/profile/" class="button button-border"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6.28125 11.2834L2.998 8.00016L6.28125 4.7169" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/><path d="M13.668 8.00011L3.81821 8.00011" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg> Back to Profile</a>
                    </div>
                    <div class="past-experiments-full__items">
                        <div class="past-experiments-full__item">
                            <div class="past-experiments-full__wrap flex flex-space-between">
                                <div class="past-experiments-full__left">
                                    <h4>Test A (0003)</h4>
                                    <h5>Martin P · 08/11/2025</h5>
                                    <table>
                                        <tr>
                                            <th></th>
                                            <th>Jane D.</th>
                                            <th>Martin P.</th>
                                        </tr>
                                        <tr>
                                            <td>Date of Post</td>
                                            <td>04/11/2025</td>
                                            <td>04/11/2025</td>
                                        </tr>
                                        <tr>
                                            <td>Post URL</td>
                                            <td><a href="#!">View Post</a></td>
                                            <td><a href="#!">View Post</a></td>
                                        </tr>
                                        <tr>
                                            <td># of Members Reached</td>
                                            <td>25</td>
                                            <td>41</td>
                                        </tr>
                                        <tr>
                                            <td># of Reactions</td>
                                            <td>154</td>
                                            <td>167</td>
                                        </tr>
                                        <tr>
                                            <td># of Comments</td>
                                            <td>2</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td># of Members Reached</td>
                                            <td>1</td>
                                            <td>2,113</td>
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
                                                    <div class="chart-bar chart-bar--purple" style="height: 55%">
                                                        <div class="chart-bar-label">
                                                            <label>55%</label>
                                                        </div>
                                                    </div>
                                                    <div class="chart-bar" style="height: 100%">
                                                        <div class="chart-bar-label">
                                                            <label>100%</label>
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

                            // display
                            foreach ($counts as $label => $total) {
                                echo $label . ': ' . $total . '<br>';
                            }
                         ?>

                        <p><?=$itemSum?></p>
                        <p>Max Num: <?=$counts[$maxNum]?></p>

                        <p>Breakout: <?=$counts['breakout']?></p>
                        <p>Sustained Growth: <?=$counts['sustained growth']?></p>
                        <p>Contained: <?=$counts['contained']?></p>
                        <p>Suppressed: <?=$counts['suppressed']?></p>

                        <div class="past-experiments-full__item past-experiments-full__item--post-analysis">
                            <div class="past-experiments-full__wrap flex flex-space-between">
                                <div class="past-experiments-full__left">
                                    <h4>Test A (0003)</h4>
                                    <h5>Martin P · 08/11/2025</h5>
                                    <div class="past-experiments-full__analysis">
                                        <h4>Your post analysis was <a href="#!" class="button button-primary button-large">Breakout</a></h4>
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
                    </div>
                </div>
            </div>
        
        </div>

    <?php get_footer(); ?>