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
        
        wp_enqueue_style( 'sdev-theme-style' );
        wp_enqueue_script( 'sdev-theme-script' );
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
?>