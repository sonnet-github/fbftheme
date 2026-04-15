<?php
/**
 * Join the campaign Block Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */

    // fields
    $campaigns = get_field('campaigns_block');

    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="join-the-experiment">
        <div class="max-wrap margin-auto">
            <div class="join-the-experiment__inner">
                <div class="join-the-experiment__wysiwyg">
                    <?=get_field('wysiwyg')?>

                    <?php if(get_field('button_1')): ?>
                        <p><a href="<?=get_field('button_1')['url']?>" class="button button-border"><?=get_field('button_1')['title']?></a></p>
                    <?php endif; ?>
                </div>

                <?php
                    $argsTestA = array(
                        "post_type"      => "test-a",
                        "post_status"    => "publish",
                        "posts_per_page" => -1
                    );

                    $queryTestA = new WP_Query($argsTestA);

                    $total_user = 0;
                    
                    $male = 0;
                    $female = 0;

                    $malePercent = 0;
                    $femalePercent = 0;

                    $maleHeight = 0;
                    $femaleHeight = 0;

                    $dataTestA = [];
                    
                    if ($queryTestA->have_posts()) {
                    // if (false) {
                        while($queryTestA->have_posts()): $queryTestA->the_post();
                            $postID = get_the_id();
                            $userID = get_field('user', $postID);
                            $gender = get_field('gender', 'user_' . $userID);
                            $followerCount = get_field('linkedin_followers', 'user_' . $userID);
                            $numReached = get_field('no_of_members_reached', $postID) ?: 0;

                            $currentTotal = ($numReached / $followerCount) * 100;
                            $currentTotal = number_format($currentTotal, 2);

                            $total_user++;

                            if ($gender == 'male') {
                                $male++;
                                $malePercent += $currentTotal;
                            } else {
                                $female++;
                                $femalePercent += $currentTotal;
                            }
                            
                            // Testing purpose
                            // $dataTestA[] = [
                            //     "num_of_reached" => $numReached,
                            //     "userID" => $userID,
                            //     "gender" => $gender,
                            //     "followerCount" => $followerCount,
                            //     "currentTotal" => $currentTotal,
                            //     "male_percent" => $malePercent,
                            //     "female_percent" => $femalePercent 
                            // ];
                        endwhile;

                        $malePercent = number_format(($malePercent / $male), 2);
                        $femalePercent = number_format(($femalePercent / $female), 2);

                        // echo "<pre>";
                        // var_dump($dataTestA);
                        // echo "</pre>";
                        
                        wp_reset_postdata();
                    } else {

                    }

                    $maleHeight = $malePercent;
                    $femaleHeight = $femalePercent;
                 ?>
                
                <div class="join-the-experiment__charts flex flex-space-between">
                    <div class="chart chart--1">
                        <div class="chart-content">
                            <div class="chart-heading">
                                <h4>Is there a bias based on subject matter?</h4>
                            </div>
                            <div class="chart-bars">
                                <div class="chart-bars-inner">
                                    <div class="chart-bar chart-bar--purple" style="height: <?=$maleHeight?>%; <?=($maleHeight == 0 ? "min-height: 0; padding: 0;" : "")?>">
                                        <div class="chart-bar-label">
                                            <label style="<?=($maleHeight == 0 ? "display: none;" : "")?>"><?=ceil($maleHeight)?>%</label>
                                        </div>
                                    </div>
                                    <div class="chart-bar" style="height: <?=$femaleHeight?>%; <?=($femaleHeight == 0 ? "min-height: 0; padding: 0;" : "")?>">
                                        <div class="chart-bar-label">
                                            <label style="<?=($maleHeight == 0 ? "display: none;" : "")?>"><?=ceil($femaleHeight)?>%</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chart-footer">
                                <div class="chart-footer-wrap">
                                    <div class="chart-label">
                                        % of members reached<br />
                                        (Men)
                                    </div>
                                    <div class="chart-label">
                                        % of members reached<br />
                                        (Women & Non-Binary)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chart-description">
                            <p>Based on <?=number_format($total_user)?><br />experiments to date</p>
                        </div>
                        <div class="chart-button">
                            <?php if(is_user_logged_in()): ?>
                                <a href="<?=get_site_url()?>/experiments/" class="button button-border">Test A: “The Identical Content Test”</a>
                            <?php else: ?>
                                <a href="#register-login" class="button button-border js-popup">Test A: “The Identical Content Test”</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php 
                        $allItems = [];
                        $itemSum = 0;
                        $submissions = 0;
                        $args = array(
                            'post_type' => 'test-b',
                            'posts_per_page' => -1
                        );
                        $query = new WP_Query($args);

                        if ($query->have_posts()) {

                            while($query->have_posts()): $query->the_post();
                                $theArray = get_field('chat_gpt_considers', get_the_ID());
                                $submissions++;

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
                        
                        ?>

                    <div class="chart chart--2">
                        <div class="chart-content">
                            <div class="chart-heading">
                                <h4>Is there a bias based on subject matter?</h4>
                            </div>
                            <div class="chart-bars">
                                <div class="chart-bars-inner">
                                    <div class="chart-bar chart-bar--purple" style="height: calc((<?=$counts['breakout']?> / <?=$counts[$maxNum]?>) * 100%);">
                                        <div class="chart-bar-label">
                                            <label><?=ceil(($counts['breakout']/$itemSum) * 100)?>%</label>
                                        </div>
                                    </div>
                                    <div class="chart-bar chart-bar--white" style="height: calc((<?=$counts['sustained growth']?> / <?=$counts[$maxNum]?>) * 100%);">
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
                                        Sustained<br />
                                        Growth
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
                            <p>Based on <?=number_format($submissions)?><br />experiments to date</p>
                        </div>
                        <div class="chart-button">
                            <?php if(is_user_logged_in()): ?>
                                <a href="<?=get_site_url()?>/experiments/" class="button button-border">Test B: “The 7th Tribe Pattern Recognition Test”</a>
                            <?php else: ?>
                                <a href="#register-login" class="button button-border js-popup">Test B: “The 7th Tribe Pattern Recognition Test”</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>