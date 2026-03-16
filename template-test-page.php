<?php 
/* Template Name: Test A Page Template
 * Template Post Type: page
 */
/**
 * Test A Page Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
    $current_user = wp_get_current_user();
    
    get_header(); ?>

        <div id="page-content" class="page-blocks" data-tpl="test-page">
        
            <div class="test-page js-tabs">
                <div class="max-wrap margin-auto">
                    <div class="test-page__heading page-heading flex flex-space-between items-center">
                        <h1><?=get_the_title();?></h1>
                        <a href="<?=get_site_url()?>/profile/" class="button button-border"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M6.28125 11.2834L2.998 8.00016L6.28125 4.7169" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/><path d="M13.668 8.00011L3.81821 8.00011" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg> Back to Profile</a>
                    </div>

                    <div class="test-page__tab-heading">
                        <div class="test-page__tab-heading-background js-tab-background"></div>
                        <div class="test-page__tab-heading-wrap flex">
                            <div class="test-page__tab-heading-item js-tab-heading active">
                                <a href="#buddy-up">Buddy Up</a>
                            </div>
                            <div class="test-page__tab-heading-item js-tab-heading">
                                <a href="#submit-results">Submit Results</a>
                            </div>
                        </div>
                    </div>

                    <div class="test-page__tab-content">
                        <div id="buddy-up" class="test-page__tab-item js-tab-content active">
                            <div class="test-page__tab-item-inner">
                                <div class="test-page__description">
                                    <h2>Buddy Options</h2>
                                    <p>Here’s a list of potential buddies from your region who have registered to participate. Reach out on LinkedIn to explore topics for your shared post. Once connected, follow the guidelines for this test <a href="#guidelines">here</a>.</p>
                                </div>

                                <div class="test-page__buddy-wrap flex flex-space-between flex-wrap">
                                    <?php for ($i=0; $i < 12; $i++): ?>
                                        <div class="test-page__buddy-item">
                                            <div class="test-page__buddy-item-wrap flex">
                                                <div class="test-page__buddy-left">
                                                    <div class="test-page__buddy-image">
                                                        <img src="/" alt="Sample Image">
                                                    </div>
                                                </div>
                                                <div class="test-page__buddy-right">
                                                    <div class="test-page__buddy-description">
                                                        <h3>Adam Higginbotham (1,854)</h3>
                                                        <p><a href="#!" class="button button-border">View Profile</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>

                                <div class="test-page__guidelines" id="guidelines">
                                    <h3>Test A: Guidelines</h3>
                                    <ol>
                                        <li>Check your buddy is in the same country/region as you.</li>
                                        <li>Try and pick a buddy with roughly the same number of followers and the same account type (free vs paid).</li>
                                        <li>Try and pick a buddy who’s from a similar or related profession to make it easier to write about a shared interest.</li>
                                        <li>Ensure the man in your experiment is comfortable posting the content written by the woman or non-binary user.</li>
                                        <li>Make sure the words and image are exactly the same as your buddy’s. If you wish to use a selfie as your image then of course that will be different.</li>
                                        <li>Don’t post anything else on LinkedIn 24 hrs either side of your test post.</li>
                                        <li>Publish your test post at the same time as your buddy on the same day.</li>
                                        <li>Make sure you both report your data 48 hrs after your test post goes live.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div id="submit-results" class="test-page__tab-item js-tab-content">
                            <div class="test-page__tab-item-inner">
                                
                                <div class="submit-results js-form-container">
                                    <h2>Your Results</h2>

                                    <div class="submit-results__form">
                                        <div class="form-container">
                                            <form id="test-a-form">
                                                <div class="form-row">
                                                    <div class="form-col">
                                                        <label for="date-of-post">Date of Post</label>
                                                        <input type="date" placeholder="" name="date-of-post" id="date-of-post" class="form-input required-field">
                                                    </div>
                                                    <div class="form-col">
                                                        <label for="linkedin-test-post-url">LinkedIn Test Post URL</label>
                                                        <input type="text" placeholder="LinkedIn Test Post URL" name="linkedin-test-post-url" id="linkedin-test-post-url" class="form-input required-field">
                                                    </div>
                                                    <div class="form-col">
                                                        <label for="no-of-impressions"># of Impressions</label>
                                                        <input type="text" placeholder="# of Impressions" name="no-of-impressions" id="no-of-impressions" class="form-input required-field">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-col">
                                                        <label for="no-of-members-reached"># of Members Reached</label>
                                                        <input type="text" placeholder="# of Members Reached" name="no-of-members-reached" id="no-of-members-reached" class="form-input required-field">
                                                    </div>
                                                    <div class="form-col">
                                                        <label for="no-of-reactions"># of Reactions</label>
                                                        <input type="text" placeholder="# of Reactions" name="no-of-reactions" id="no-of-reactions" class="form-input required-field">
                                                    </div>
                                                    <div class="form-col">
                                                        <label for="no-of-comments"># of Comments</label>
                                                        <input type="text" placeholder="# of Comments" name="no-of-comments" id="no-of-comments" class="form-input required-field">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-col">
                                                        <label for="no-of-reports"># of Reposts</label>
                                                        <input type="text" placeholder="# of Reposts" name="no-of-reports" id="no-of-reports" class="form-input required-field">
                                                    </div>
                                                    <div class="form-col">
                                                        <label for="no-of-saves"># of Saves</label>
                                                        <input type="text" placeholder="# of Saves" name="no-of-saves" id="no-of-saves" class="form-input required-field">
                                                    </div>
                                                    <div class="form-col">
                                                        <label for="no-of-sends"># of Sends</label>
                                                        <input type="text" placeholder="# of Sends" name="no-of-sends" id="no-of-sends" class="form-input required-field">
                                                    </div>
                                                </div>
                                                <div class="form-row form-row--buddy-details-heading">
                                                    <div class="form-col">
                                                        <h3>Your Buddy’s Details</h3>
                                                    </div>
                                                </div>
                                                <div class="form-row form-row--buddy-details">
                                                    <div class="form-col">
                                                        <label for="buddy-linkedin-profile">Buddy’s LinkedIn Profile URL</label>
                                                        <input type="text" placeholder="Buddy’s LinkedIn Profile URL" name="buddy-linkedin-profile" id="buddy-linkedin-profile" class="form-input required-field">
                                                    </div>
                                                    <div class="form-col">
                                                        <label for="buddy-linkedin-post">Buddy’s LinkedIn Post URL</label>
                                                        <input type="text" placeholder="Buddy’s LinkedIn Post URL" name="buddy-linkedin-post" id="buddy-linkedin-post" class="form-input required-field">
                                                    </div>
                                                    <div class="form-col hide-mobile"></div>
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

                                <div class="submit-results--thank-you-message js-thank-you-message hidden">
                                    <h6>Thank you for submitting your results. When your buddy submits theirs, you'll be able to see the results in a graph <a href="<?=get_site_url()?>/past-experiments-full/">here.</a></h6>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    <?php get_footer(); ?>