<?php 
/* Template Name: Profile Template
 * Template Post Type: page
 */
/**
 * Profile Template
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

        <div id="page-content" class="page-blocks" data-tpl="profile">

            <?php 
                
                the_content();

            ?>
            
            <div class="profile-container">
                <div class="max-wrap margin-auto">
                    <div class="profile-container__wrap flex flex-space-between">
                        <div class="profile-container__left">
                            <h1>Welcome, <?=$first_name?> <?=$last_initial?></h1>
                            <div class="profile-container__test-1">
                                <p>Test A: “The Identical Content Test”</p>
                                <p><a href="<?=get_site_url()?>/test-a-the-identical-content-test/" class="button button-primary">Participate or Log Results <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M10.0517 11.2832L13.335 7.99999L10.0517 4.71674M2.66499 7.99994L12.5147 7.99994" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg></a></p>
                            </div>
                            
                            <div class="profile-container__test-2">
                                <p>Test B: “The 7th Tribe Pattern Recognition Test”</p>
                                <p><a href="<?=get_site_url();?>/test-b-the-7th-tribe-pattern-recognition-test/" class="button button-primary">Participate or Log Results <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M10.0517 11.2832L13.335 7.99999L10.0517 4.71674M2.66499 7.99994L12.5147 7.99994" stroke="white" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg></a></p>
                            </div>
                            <div class="profile-container__left-footer">
                                <a href="<?=get_site_url()?>/past-experiments-full/">Past Experiments (6)</a>
                            </div>
                        </div>
                        <div class="profile-container__right">
                            <table>
                                <tr>
                                    <td>Name</td>
                                    <td style="text-transform: capitalize;"><?=$first_name?> <?=$last_name?></td>
                                </tr>
                                <tr>
                                    <td>Email Address</td>
                                    <td><?=$email?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td style="text-transform: capitalize;"><?=$gender?></td>
                                </tr>
                                <tr>
                                    <td>LinkedIn Profile URL</td>
                                    <td><?=$linkedin_url?></td>
                                </tr>
                                <tr>
                                    <td># of Followers</td>
                                    <td><?=$linkedin_followers?></td>
                                </tr>
                                <tr>
                                    <td>Country/Region</td>
                                    <td style="text-transform: capitalize;"><?=$country_region?></td>
                                </tr>
                            </table>

                            <div class="profile-container__right-footer">
                                <a href="#update-profile" class="button button-border js-popup"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none"><path d="M9.41522 12.0833C11.2562 12.0833 12.7486 10.5909 12.7486 8.75C12.7486 6.90905 11.2562 5.41667 9.41522 5.41667C7.57428 5.41667 6.08189 6.90905 6.08189 8.75C6.08189 10.5909 7.57428 12.0833 9.41522 12.0833Z" stroke="#5900FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.58606 15.2592C9.47439 15.2592 9.36189 15.2592 9.25272 15.2592L6.58189 16.75C5.54216 16.4003 4.57778 15.8574 3.73939 15.15L3.72939 12.15C3.67022 12.0567 3.61439 11.9625 3.56272 11.8658L0.906891 10.3533C0.697703 9.29524 0.697703 8.20643 0.906891 7.14833L3.56022 5.64C3.61439 5.54417 3.67022 5.44917 3.72689 5.35583L3.74022 2.35583C4.57786 1.64637 5.54199 1.10154 6.58189 0.75L9.24856 2.24083C9.36022 2.24083 9.47272 2.24083 9.58189 2.24083L12.2486 0.75C13.2883 1.09974 14.2527 1.64257 15.0911 2.35L15.1011 5.35C15.1602 5.44333 15.2161 5.5375 15.2677 5.63417L17.9219 7.14583C18.1311 8.20393 18.1311 9.29274 17.9219 10.3508L15.2686 11.8592C15.2144 11.955 15.1586 12.05 15.1019 12.1433L15.0886 15.1433C14.2515 15.8529 13.2879 16.398 12.2486 16.75L9.58606 15.2592Z" stroke="#5900FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>Update Profile</a>
                                <a href="#delete-account" class="js-popup">Delete Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>

    <?php get_footer(); ?>