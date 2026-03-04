<?php
    /**
     * Functions.php
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since SDEV WP Theme 2.0
     */
    if(!isset($_SESSION)){
        session_start();
    }
    define('DEV_ENV', 1);

    /* Show errors if DEV_ENV is set to 1 */
    if(DEV_ENV === 1){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
    
    /* remove "Private: " from titles */
    function remove_private_prefix($title) {
        $title = str_replace('Private: ', '', $title);
        return $title;
    }
    add_filter('the_title', 'remove_private_prefix');

    /* remove p tag wrap in images */
    function filter_ptags_on_images($content) {
        $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
        return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
    }
    add_filter('acf_the_content', 'filter_ptags_on_images');
    add_filter('the_content', 'filter_ptags_on_images');

    /* Add theme support for plugin features */
    add_theme_support( 'title-tag' );
    add_theme_support( 'yoast-seo-breadcrumbs' );
    add_theme_support( 'post-thumbnails' );

    /* Register ACF Blocks */
    require_once('src/views/blocks/register.php');

    /* Register theme assets */
   

    /* Enqueue FE assets */
    function front_assets(){
        wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap' );
        wp_register_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
        
        wp_register_style( 'sdev-theme-style', get_template_directory_uri().'/dist/style.css' , array(), rand(111,9999), 'all' );
        wp_register_script( 'sdev-theme-script', get_template_directory_uri().'/dist/bundle.js', array('jquery'), rand(111,9999), true );

        wp_localize_script('sdev-theme-script', 'SDEV', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('custom_register_nonce')
        ]);
        wp_enqueue_script( 'sdev-theme-script' );
        
        wp_enqueue_style( 'sdev-theme-style' );
        wp_enqueue_style( 'google-fonts');
        wp_enqueue_style( 'fontawesome');
    }
    add_action( 'wp_enqueue_scripts', 'front_assets' );

    /* Enqueue admin assets */
    function custom_admin_assets(){
        /* So our FE fonts and styles will reflect in admin acf block editor and there's no need to add stylesheet in each block. */
        wp_enqueue_style( 'google-fonts');
        wp_enqueue_style( 'sdev-theme-style' );
    }
    add_action( 'admin_enqueue_scripts', 'custom_admin_assets' );


   
   
    register_sidebar();

    // Show field in profile
    function add_gender_field_to_profile($user) {
        $gender = get_user_meta($user->ID, 'gender', true);
        $linkedin_url = get_user_meta($user->ID, 'linkedin_url', true);
        $linkedin_followers = get_user_meta($user->ID, 'linkedin_followers', true);
        $country_region = get_user_meta($user->ID, 'country_region', true);
        ?>
        <h3>Additional Information</h3>
        <table class="form-table">
            <tr>
                <th><label for="gender">Gender</label></th>
                <td>
                    <select name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="male" <?php selected($gender, 'male'); ?>>Male</option>
                        <option value="female" <?php selected($gender, 'female'); ?>>Female</option>
                        <option value="other" <?php selected($gender, 'other'); ?>>Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="linkedin_url">LinkedIn Profile URL</label></th>
                <td>
                    <input type="url" name="linkedin_url" id="linkedin_url"
                        value="<?php echo esc_attr($linkedin_url); ?>"
                        class="regular-text" />
                </td>
            </tr>

            <tr>
                <th><label for="linkedin_followers">LinkedIn Followers</label></th>
                <td>
                    <input type="number" name="linkedin_followers" id="linkedin_followers"
                        value="<?php echo esc_attr($linkedin_followers); ?>"
                        class="regular-text" />
                </td>
            </tr>

            <tr>
                <th><label for="country_region">Country / Region</label></th>
                <td>
                    <input type="text" name="country_region" id="country_region"
                        value="<?php echo esc_attr($country_region); ?>"
                        class="regular-text" />
                </td>
            </tr>
        </table>
        <?php
    }
    add_action('show_user_profile', 'add_gender_field_to_profile');
    add_action('edit_user_profile', 'add_gender_field_to_profile');

    // Save field
    function save_gender_field($user_id) {

        if (!current_user_can('edit_user', $user_id)) {
            return false;
        }

        if (isset($_POST['gender'])) {
            update_user_meta($user_id, 'gender', sanitize_text_field($_POST['gender']));
        }

        if (isset($_POST['linkedin_url'])) {
            update_user_meta($user_id, 'linkedin_url', esc_url_raw($_POST['linkedin_url']));
        }

        if (isset($_POST['linkedin_followers'])) {
            update_user_meta($user_id, 'linkedin_followers', intval($_POST['linkedin_followers']));
        }

        if (isset($_POST['country_region'])) {
            update_user_meta($user_id, 'country_region', sanitize_text_field($_POST['country_region']));
        }
    }
    add_action('personal_options_update', 'save_gender_field');
    add_action('edit_user_profile_update', 'save_gender_field');

    // Register AJAX actions
    add_action('wp_ajax_nopriv_custom_register', 'custom_ajax_register');
    add_action('wp_ajax_custom_register', 'custom_ajax_register');

    function custom_ajax_register() {

        check_ajax_referer('custom_register_nonce', 'security');

        $first_name = sanitize_text_field($_POST['first-name']);
        $last_name  = sanitize_text_field($_POST['last-name']);
        $email      = sanitize_email($_POST['email-address']);
        $gender     = strtolower(sanitize_text_field($_POST['gender']));
        $linkedin   = strtolower(esc_url_raw($_POST['linkedin-profile-url']));
        $followers  = intval($_POST['num-of-followers']);
        $country    = sanitize_text_field($_POST['country-region']);

        if (empty($first_name) || empty($last_name) || empty($email)) {
            wp_send_json_error(['message' => 'Required fields are missing.']);
        }

        if (!is_email($email)) {
            wp_send_json_error(['message' => 'Invalid email address.']);
        }

        if (email_exists($email)) {
            wp_send_json_error(['message' => 'Email already registered.']);
        }

        // Generate username automatically from email
        $username = sanitize_user(current(explode('@', $email)));

        if (username_exists($username)) {
            $username = $username . '_' . time();
        }

        // Generate random password
        $password = wp_generate_password();

        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            wp_send_json_error(['message' => 'Registration failed.']);
        }

        // Update core fields
        wp_update_user([
            'ID'         => $user_id,
            'first_name' => $first_name,
            'last_name'  => $last_name,
        ]);

        // Save custom meta
        update_user_meta($user_id, 'gender', $gender);
        update_user_meta($user_id, 'linkedin_url', $linkedin);
        update_user_meta($user_id, 'linkedin_followers', $followers);
        update_user_meta($user_id, 'country_region', $country);

        wp_send_json_success(['message' => 'Registration successful.']);
    }

    // LOGIN Send OTP

    add_action('wp_ajax_nopriv_send_login_code', 'sdev_send_login_code');
    add_action('wp_ajax_send_login_code', 'sdev_send_login_code');

    function sdev_send_login_code() {

        check_ajax_referer('custom_register_nonce', 'security');

        $email = sanitize_email($_POST['email']);

        if (!is_email($email)) {
            wp_send_json_error(['message' => 'Invalid email address.']);
        }

        $user = get_user_by('email', $email);

        // Prevent email enumeration
        // if (!$user) {
        //     wp_send_json_success([
        //         'message' => 'If this email exists, a code has been sent multiple times.'
        //     ]);
        // }

        $code = wp_rand(100000, 999999);
        $expires = time() + (10 * 60); // 10 minutes

        update_user_meta($user->ID, 'login_otp', wp_hash_password($code));
        update_user_meta($user->ID, 'login_otp_expires', $expires);
        update_user_meta($user->ID, 'login_otp_attempts', 0);

        wp_mail(
            $user->user_email,
            'Your Login Code',
            "Your login code is: {$code}\n\nThis code expires in 10 minutes."
        );

        wp_send_json_success([
            'message' => "If this email exists, a code has been sent. $code"
        ]);
    }

    // LOGIN Verify OTP

    add_action('wp_ajax_nopriv_verify_login_code', 'sdev_verify_login_code');
    add_action('wp_ajax_verify_login_code', 'sdev_verify_login_code');

    function sdev_verify_login_code() {

        check_ajax_referer('custom_register_nonce', 'security');

        $email = sanitize_email($_POST['email']);
        $code  = sanitize_text_field($_POST['code']);

        $user = get_user_by('email', $email);

        if (!$user) {
            wp_send_json_error(['message' => 'Invalid or expired code.']);
        }

        $hashed_code = get_user_meta($user->ID, 'login_otp', true);
        $expires     = get_user_meta($user->ID, 'login_otp_expires', true);
        $attempts    = (int) get_user_meta($user->ID, 'login_otp_attempts', true);

        if ($attempts >= 5) {
            wp_send_json_error(['message' => 'Too many attempts. Try again later.']);
        }

        update_user_meta($user->ID, 'login_otp_attempts', $attempts + 1);

        if (
            $hashed_code &&
            wp_check_password($code, $hashed_code) &&
            time() < $expires
        ) {

            delete_user_meta($user->ID, 'login_otp');
            delete_user_meta($user->ID, 'login_otp_expires');
            delete_user_meta($user->ID, 'login_otp_attempts');

            wp_set_auth_cookie($user->ID, true);

            wp_send_json_success([
                'message' => 'Login successful.'
            ]);
        }

        wp_send_json_error(['message' => 'Invalid or expired code.']);
    }

    // Save Post Test A
    add_action('wp_ajax_submit_test_a', 'sdev_submit_test_a');

    function sdev_submit_test_a() {

        check_ajax_referer('custom_register_nonce', 'security');

        if (!is_user_logged_in()) {
            wp_send_json_error(['message' => 'You must be logged in.']);
        }

        $required_fields = [
            'date_of_post',
            'linkedin_test_post_url',
            'no_of_impressions',
            'no_of_members_reached',
            'no_of_reactions',
            'no_of_comments',
            'no_of_reports',
            'no_of_saves',
            'no_of_sends',
            'buddy_linkedin_profile_url',
            'buddy_linkedin_post_url'
        ];

        foreach ($required_fields as $field) {
            if (!isset($_POST[$field]) || $_POST[$field] === '') {
                wp_send_json_error([
                    'message' => 'All fields are required.'
                ]);
            }
        }

        // Validate URLs specifically
        if (!filter_var($_POST['linkedin_test_post_url'], FILTER_VALIDATE_URL) ||
            !filter_var($_POST['buddy_linkedin_profile_url'], FILTER_VALIDATE_URL) ||
            !filter_var($_POST['buddy_linkedin_post_url'], FILTER_VALIDATE_URL)
        ) {
            wp_send_json_error([
                'message' => 'Please enter valid URLs.'
            ]);
        }

        $user_id = get_current_user_id();

        $post_id = wp_insert_post([
            'post_type'   => 'test-a',
            'post_status' => 'publish',
            'post_title'  => 'Test A Submission - ' . current_time('Y-m-d H:i:s'),
            'post_author' => $user_id
        ]);

        if (is_wp_error($post_id)) {
            wp_send_json_error(['message' => 'Failed to create post.']);
        }

        // Save sanitized data
        update_post_meta($post_id, 'date_of_post', sanitize_text_field($_POST['date_of_post']));
        update_post_meta($post_id, 'linkedin_test_post_url', esc_url_raw($_POST['linkedin_test_post_url']));
        update_post_meta($post_id, 'no_of_impressions', intval($_POST['no_of_impressions']));
        update_post_meta($post_id, 'no_of_members_reached', intval($_POST['no_of_members_reached']));
        update_post_meta($post_id, 'no_of_reactions', intval($_POST['no_of_reactions']));
        update_post_meta($post_id, 'no_of_comments', intval($_POST['no_of_comments']));
        update_post_meta($post_id, 'no_of_reports', intval($_POST['no_of_reports']));
        update_post_meta($post_id, 'no_of_saves', intval($_POST['no_of_saves']));
        update_post_meta($post_id, 'no_of_sends', intval($_POST['no_of_sends']));
        update_post_meta($post_id, 'buddy_linkedin_profile_url', esc_url_raw($_POST['buddy_linkedin_profile_url']));
        update_post_meta($post_id, 'buddy_linkedin_post_url', esc_url_raw($_POST['buddy_linkedin_post_url']));
        update_post_meta($post_id, 'user', $user_id);

        wp_send_json_success(['message' => 'Submission saved successfully.']);
    }

    // Save Post type b
    add_action('wp_ajax_submit_test_b', 'sdev_submit_test_b');

    function sdev_submit_test_b() {

        check_ajax_referer('custom_register_nonce', 'security');

        if (!is_user_logged_in()) {
            wp_send_json_error(['message' => 'You must be logged in.']);
        }

        $required = [
            'date_of_post',
            'post_url',
            'chatgpt_analysis'
        ];

        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                wp_send_json_error(['message' => 'All required fields must be filled.']);
            }
        }

        if (empty($_POST['chat_gpt_considers']) || !is_array($_POST['chat_gpt_considers'])) {
            wp_send_json_error(['message' => 'Please select at least one checklist option.']);
        }

        // Validate URLs
        if (!filter_var($_POST['post_url'], FILTER_VALIDATE_URL) ||
            !filter_var($_POST['chatgpt_analysis'], FILTER_VALIDATE_URL)
        ) {
            wp_send_json_error(['message' => 'Please enter valid URLs.']);
        }

        $allowed_checklist = ['breakout', 'sustained growth', 'contained', 'suppressed'];

        $checklist = array_intersect($_POST['chat_gpt_considers'], $allowed_checklist);

        if (empty($checklist)) {
            wp_send_json_error(['message' => 'Invalid checklist selection.']);
        }

        $user_id = get_current_user_id();

        $post_id = wp_insert_post([
            'post_type'   => 'test-b',
            'post_status' => 'publish',
            'post_title'  => 'Test B Submission - ' . current_time('Y-m-d H:i:s'),
            'post_author' => $user_id
        ]);

        if (is_wp_error($post_id)) {
            wp_send_json_error(['message' => 'Failed to create post.']);
        }

        update_post_meta($post_id, 'date_of_post', sanitize_text_field($_POST['date_of_post']));
        update_post_meta($post_id, 'post_url', esc_url_raw($_POST['post_url']));
        update_post_meta($post_id, 'chat_gpt_considers', $checklist);
        update_post_meta($post_id, 'chatgpt_analysis', esc_url_raw($_POST['chatgpt_analysis']));
        update_post_meta($post_id, 'user', $user_id);

        wp_send_json_success(['message' => 'Test B submission saved successfully.']);
    }
?>