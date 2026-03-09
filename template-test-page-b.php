<?php 
/* Template Name: Test B Page Template
 * Template Post Type: page
 */
/**
 * Test B Page Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
    $current_user = wp_get_current_user();
    
    get_header(); ?>

        <div id="page-content" class="page-blocks" data-tpl="test-page-b">
        
            <div class="test-page-b">
                <div class="max-wrap margin-auto">
                    <div class="page-heading flex flex-space-between items-center">
                        <h1><?=get_the_title();?></h1>
                        <a href="<?=get_site_url()?>/profile/" class="button button-border"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6.28125 11.2834L2.998 8.00016L6.28125 4.7169" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/><path d="M13.668 8.00011L3.81821 8.00011" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg> Back to Profile</a>
                    </div>

                    <div class="test-page-b__inner js-form-container">
                        <div class="test-page-b__description">
                            <h2>Submit Test B results.</h2>
                            <p>Please ensure you followed the <a href="#!">guidelines</a> for running this experiment including the prompt to analyse your post’s results. Check the <a href="#!">FAQs</a> if you need help.</p>
                        </div>

                        <div class="test-page-b__form ">
                            <div class="form-container">
                                <form id="test-b-form">
                                    
                                    <div class="form-row">
                                        <div class="form-col">
                                            <div class="form-row form-row--width-384">
                                                <div class="form-col">
                                                    <label for="date-of-post">Date of Post</label>
                                                    <input type="text" placeholder="(DD/MM/YYYY)" name="date-of-post" id="date-of-post" class="form-input">
                                                </div>
                                            </div>
                                            <div class="form-row form-row--width-384">
                                                <div class="form-col">
                                                    <label for="post-url">Post URL</label>
                                                    <input type="text" placeholder="Post URL" name="post-url" id="post-url" class="form-input">
                                                </div>
                                            </div>
                                            <div class="form-row form-row--checklist">
                                                <div class="form-col">
                                                    <p>Did ChatGPT consider your post to be:</p>
                                                    <div class="checklist-wrap flex">
                                                        <div class="checklist-item">
                                                            <input type="checkbox" value="breakout" id="breakout" name="chat_gpt_considers">
                                                            <label for="breakout">Breakout</label>
                                                        </div>
                                                        <div class="checklist-item">
                                                            <input type="checkbox" value="sustained growth" id="sustained-growth" name="chat_gpt_considers">
                                                            <label for="sustained-growth">Sustained Growth</label>
                                                        </div>
                                                        <div class="checklist-item">
                                                            <input type="checkbox" value="contained" id="contained" name="chat_gpt_considers">
                                                            <label for="contained">Contained</label>
                                                        </div>
                                                        <div class="checklist-item">
                                                            <input type="checkbox" value="suppressed" id="suppressed" name="chat_gpt_considers">
                                                            <label for="suppressed">Suppressed</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-col form-col--width-486">
                                            <div class="form-row form-row--textarea">
                                                <div class="form-col">
                                                    <label for="chat-gpt-url">Paste the ChatGPT analysis of your post in the box below:</label>
                                                    <textarea name="chat-gpt-url" id="chat-gpt-url"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-col form-col--button">
                                            <input type="submit" value="Submit" class="button button-border">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="test-page-b__thank-you js-thank-you-container">
                        <h3>Thank you for submitting your results.<br /> 
                        View this experiment on your <a href="<?=get_site_url()?>/past-experiments-full/">Past Experiments</a> page.</h3>
                    </div>
                </div>
            </div>

        </div>

    <?php get_footer(); ?>