<?php
/**
 * Navigation Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */  
?>

<?php
    $isLoggedIn = false;
    if (is_user_logged_in()) {
        $isLoggedIn = true;
        $current_user = wp_get_current_user();
        $first_name = $current_user->first_name;
        $last_name  = $current_user->last_name;
        $last_initial = !empty($last_name) ? strtoupper(substr($last_name, 0, 1)) . '.' : '';
    }
 ?>

<header>
    <div class="max-wrap margin-auto">
        <div class="">
            <div class="header-desktop flex flex-space-between items-center">
                <div class="header-left">
                    <a href="<?=get_site_url()?>"><img src="<?=get_template_directory_uri()?>/assets/images/icon-home.svg" alt="Home"></a>
                </div>
                <div class="header-mid">
                    <?= wp_nav_menu(array(
                        'menu' => 'Desktop Menu',
                        'menu_class' => 'flex flex-space-between items-center navigation'
                    )) ?>
                </div>

                <?php if($isLoggedIn): ?>
                    <div class="header-right header-right--logged-in">
                        <a href="" class="button button-border button-nav js-logged-in-nav button-nav--logged-in"><?=$first_name . ' ' . $last_initial; ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M12 6L8 10L4 6" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg></a>

                        <div class="header-right__content">
                            <div class="header-right__content-inner">
                                <ul>
                                    <li><a href="<?=get_site_url()?>/profile/">View Profile</a></li>
                                    <li><a href="<?=wp_logout_url(home_url())?>">Log out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="header-right">
                        <a href="#register-login" class="button button-border button-nav js-popup">Log In / Register</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="header-mobile">
                <div class="header-left">
                    <a href="<?=get_site_url()?>"><img src="<?=get_template_directory_uri()?>/assets/images/icon-home.svg" alt="Home"></a>
                </div>
                <div class="header-mid">
                    <?php if($isLoggedIn): ?>
                        <div class="header-right header-right--logged-in">
                            <a href="" class="button button-border button-nav js-logged-in-nav button-nav--logged-in"><?=$first_name . ' ' . $last_initial; ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M12 6L8 10L4 6" stroke="#6700D6" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/></svg></a>

                            <div class="header-right__content">
                                <div class="header-right__content-inner">
                                    <ul>
                                        <li><a href="<?=get_site_url()?>/profile/">View Profile</a></li>
                                        <li><a href="<?=wp_logout_url(home_url())?>">Log out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="#register-login" class="button button-border button-nav js-popup">Log In / Register</a>
                    <?php endif; ?>
                </div>
                <div class="header-right">
                    <a href="#!" class="mobile-hamburger js-menu-trigger"><img src="<?=get_template_directory_uri()?>/assets/images/icon-menu.svg" alt="Hamburger Menu"></a>

                    <div class="header-mobile__navigation">
                        <div class="header-mobile__navigation-header">
                            <a href="#!" class="js-close-navigation"><img src="<?=get_template_directory_uri()?>/assets/images/icon-close.svg" alt=""></a>
                        </div>
                        <div class="header-mobile__navigation-content">
                            <?= wp_nav_menu(array(
                                'menu' => 'Mobile Menu'
                            )) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>