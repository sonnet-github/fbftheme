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
                    $args = [
                        'number' => -1 // get all users
                    ];
                    $male = 0;
                    $female = 0;
                    $maleHeight = 0;
                    $femaleHeight = 0;

                    $user_query = new WP_User_Query($args);

                    if (!empty($user_query->results)) {
                        foreach ($user_query->results as $user) {
                            if (get_field('gender', 'user_' . $user->ID) === 'male') {
                                $male++;
                            } else {
                                $female++;
                            }
                        }
                        if ($male > $female) {
                            $femaleHeight = (($female / $male) * 100);
                            $maleHeight = 100;
                        } else {
                            $maleHeight = (($male / $female) * 100);
                            $femaleHeight = 100;
                        }
                    }
                 ?>
                
                <div class="join-the-experiment__charts flex flex-space-between">
                    <div class="chart chart--1">
                        <div class="chart-content">
                            <div class="chart-heading">
                                <h4>Is there a bias based on gender?</h4>
                            </div>
                            <div class="chart-bars">
                                <div class="chart-bars-inner">
                                    <div class="chart-bar chart-bar--purple" style="height: <?=$maleHeight?>%">
                                        <div class="chart-bar-label">
                                            <label><?=$maleHeight?>%</label>
                                        </div>
                                    </div>
                                    <div class="chart-bar" style="height: <?=$femaleHeight?>%">
                                        <div class="chart-bar-label">
                                            <label><?=$femaleHeight?>%</label>
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
                            <p>Based on 134<br />experiments to date</p>
                        </div>
                        <div class="chart-button">
                            <a href="<?=get_site_url()?>/test-a-the-identical-content-test/" class="button button-border">Test A: “The Identical Content Test”</a>
                        </div>
                    </div>

                    <div class="chart chart--2">
                        <div class="chart-content">
                            <div class="chart-heading">
                                <h4>Is there a bias based on gender?</h4>
                            </div>
                            <div class="chart-bars">
                                <div class="chart-bars-inner">
                                    <div class="chart-bar chart-bar--purple" style="height: calc((30 / 30) * 100%);">
                                        <div class="chart-bar-label">
                                            <label>30%</label>
                                        </div>
                                    </div>
                                    <div class="chart-bar chart-bar--white" style="height: calc((30 / 30) * 100%);">
                                        <div class="chart-bar-label">
                                            <label>30%</label>
                                        </div>
                                    </div>
                                    <div class="chart-bar chart-bar--black" style="height: calc((15 / 30) * 100%);">
                                        <div class="chart-bar-label">
                                            <label>15%</label>
                                        </div>
                                    </div>
                                    <div class="chart-bar chart-bar--bordered" style="height: calc((25 / 30) * 100%);">
                                        <div class="chart-bar-label">
                                            <label>25%</label>
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
                            <p>Based on 15,342<br />experiments to date</p>
                        </div>
                        <div class="chart-button">
                            <a href="<?=get_site_url()?>/test-b-the-7th-tribe-pattern-recognition-test/" class="button button-border">Test B: “The 7th Tribe Pattern Recognition Test”</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>