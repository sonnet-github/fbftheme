<div class="popup-container register-login" id="register-login">
    <div class="popup-container__inner register-login__inner flex">
        <div class="margin-auto max-wrap flex">
            <div class="popup-container__wrap register-login__wrap flex">
                <a href="#!" class="popup-close js-close-popup"><img src="<?=get_template_directory_uri()?>/assets/images/icon-close.svg" alt=""></a>
                <div class="form-container">
                    <form id="form-register">
                        <h2>Register</h2>
                        
                        <div class="form-message js-form-message"></div>

                        <div class="form-row">
                            <div class="form-col">
                                <label for="first-name">First Name</label>
                                <input type="text" placeholder="First Name" name="first-name" id="first-name" class="required-field form-input">
                            </div>
                            <div class="form-col">
                                <label for="last-name">Last Name</label>
                                <input type="text" class="required-field" placeholder="Last Name" name="last-name" id="last-name" class="required-field form-input">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label for="email-address">Email Address</label>
                                <input type="email" class="required-field form-input" placeholder="Email Address" name="email-address" id="email-address">
                            </div>
                            <div class="form-col">
                                <label for="gender">Gender</label>
                                <select name="gender" class="required-field" id="gender">
                                    <option value="">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row form-row--gap">
                            <div class="form-col">
                                <label for="linkedin-profile-url">LinkedIn Profile URL</label>
                                <input type="text" class="required-field form-input" placeholder="LinkedIn Profile URL" name="linkedin-profile-url" id="linkedin-profile-url">
                            </div>
                        </div>

                        <div class="form-row form-row--gap">
                            <div class="form-col">
                                <label for="num-of-followers"># of Followers</label>
                                <input type="number" class="required-field form-input" placeholder="# of Followers" id="num-of-followers" name="num-of-followers">
                            </div>
                            <div class="form-col">
                                <label for="country-region">Country/Region</label>
                                <select name="country-region" class="required-field" id="country-region">
                                    <?php get_template_part('src/views/partials/country-choices'); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row form-row--gap">
                            <div class="form-col input-checkbox">
                                <input type="checkbox" id="read-privacy-policy" name="read-privacy-policy">
                                <label for="read-privacy-policy">I have read and understand the <a href="/privacy-policy/">Privacy Policy</a>.</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col form-col--button flex">
                                <input type="submit" class="button button-border" value="Submit">
                                <span>Have an account? <a href="#login-form" class="js-popup js-popup-login">Log in</a>.</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="popup-container login" id="login-form">
    <div class="popup-container__inner login__inner flex">
        <div class="margin-auto max-wrap flex">
            <div class="popup-container__wrap login__wrap flex">
                <a href="#!" class="popup-close js-close-popup"><img src="<?=get_template_directory_uri()?>/assets/images/icon-close.svg" alt=""></a>

                <div class="form-container">
                    <h2>Log In</h2>

                    <form id="login-via-mail">
                        <div class="login-via-mail__content js-login-tab-1 active">
                            <div class="form-row">
                                <div class="form-col">
                                    <label for="email-address-login">Email Address</label>
                                    <input type="email" class="form-input required-field" placeholder="Email Address" name="email-address-login" id="email-address-login">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-col form-col--button">
                                    <a href="#!" class="button button-border js-continue-login">Continue</a>
                                </div>
                            </div>
                        </div>

                        <div class="login-via-mail__content js-login-tab-2">
                            <div class="form-row">
                                <div class="form-col">
                                    <p>A Log In code has been sent to the following email address.</p>
                                    <p style="font-size: .8em;">Please check your spam folder.</p>
                                    <p class="js-login-email"></p>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-col">
                                    <input type="text" class="form-input required-field" placeholder="Enter Your Code" name="login-code" id="login-code">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-col form-col--button">
                                    <a href="#!" class="button button-border js-btn-login">Log In</a>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup-container contact" id="contact-us">
    <div class="popup-container__inner contact__inner flex">
        <div class="margin-auto max-wrap flex">
            <div class="popup-container__wrap contact__wrap flex">
                <div class="form-container">
                    <a href="#!" class="popup-close js-close-popup"><img src="<?=get_template_directory_uri()?>/assets/images/icon-close.svg" alt=""></a>
                    <h2>Contact us.</h2>
                    <?php echo do_shortcode('[forminator_form id="226"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup-container delete-account" id="delete-account">
    <div class="popup-container__inner delete-account__inner flex">
        <div class="margin-auto max-wrap flex">
            <div class="popup-container__wrap delete-account__wrap flex">
                <div class="form-container">
                    <a href="#!" class="popup-close js-close-popup"><img src="<?=get_template_directory_uri()?>/assets/images/icon-close.svg" alt=""></a>
                    <h3>Are you sure you want to delete?</h3>
                    <p>Please note, even if you delete your account, any previously submitted results data will remain anonymously included in the reported findings.</p>
                    <div class="delete-account__buttons flex align-center">
                        <a href="#!" class="js-delete-confirm button button-border button-red">Delete Profile</a> <a href="#!" class="js-close-popup">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $current_user = wp_get_current_user();
    $email = $current_user->user_email;
    $current_user_id = get_current_user_id();
    $current_country = get_user_meta($current_user_id, 'country_region', true);
    $gender = get_user_meta($current_user_id, 'gender', true);
    $linkedinUrl = get_user_meta($current_user_id, 'linkedin_url', true);
    $linkedinFollowers = get_user_meta($current_user_id, 'linkedin_followers', true);
?>

<div class="popup-container update-profile" id="update-profile">
    <div class="popup-container__inner update-profile__inner flex">
        <div class="margin-auto max-wrap flex">
            <div class="popup-container__wrap update-profile__wrap flex">
                <div class="form-container">
                    <a href="#!" class="popup-close js-close-popup"><img src="<?=get_template_directory_uri()?>/assets/images/icon-close.svg" alt=""></a>
                    <h2>Update Profile</h2>
                    <div class="form-container">
                        <form id="profile-form">
                            <div class="form-message js-form-message"></div>

                            <div class="form-row">
                                <div class="form-col">
                                    <label for="first_name">First Name</label>
                                    <input type="text" value="<?php echo esc_attr(get_user_meta($current_user_id, 'first_name', true)); ?>" placeholder="First Name" name="first_name" id="first_name" class="form-input required-field">
                                </div>
                                <div class="form-col">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" value="<?php echo esc_attr(get_user_meta($current_user_id, 'last_name', true)); ?>" placeholder="Last Name" name="last_name" id="last_name" class="form-input required-field">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-col">
                                    <label for="email-address">Email Address</label>
                                    <input type="email" value="<?php echo $email; ?>" disabled class="form-input" placeholder="Email Address <?php echo $email; ?>" name="email-address" id="email-address">
                                </div>
                                <div class="form-col">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="required-field" id="gender">
                                        <option value="">Gender</option>
                                        <option <?php selected($gender, "male") ?>value="male">Male</option>
                                        <option <?php selected($gender, "female") ?>value="female">Female</option>
                                        <option <?php selected($gender, "other") ?>value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row form-row--gap">
                                <div class="form-col">
                                    <label for="linkedin_url">LinkedIn Profile URL</label>
                                    <input type="text" class="form-input required-field" value="<?=$linkedinUrl?>" placeholder="LinkedIn Profile URL" name="linkedin_url" id="linkedin_url">
                                </div>
                            </div>

                            <div class="form-row form-row--gap">
                                <div class="form-col">
                                    <label for="linkedin_followers"># of Followers</label>
                                    <input type="number" class="form-input required-field" value="<?=$linkedinFollowers?>" placeholder="# of Followers" id="linkedin_followers" name="linkedin_followers">
                                </div>
                                <div class="form-col">
                                    <label for="country_region">Country/Region</label>
                                    <select name="country_region" class="required-field" id="country_region">
                                        <?php get_template_part('src/views/partials/country-choices'); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-col form-col--button flex">
                                    <input type="submit" class="button button-border" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>