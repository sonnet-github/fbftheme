<?php
/**
 * Navigation Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */  
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
                <div class="header-right">
                    <a href="#!" class="button button-border button-nav">Log In / Register</a>
                </div>
            </div>
            <div class="header-mobile">
                <div class="header-left">
                    <a href="<?=get_site_url()?>"><img src="<?=get_template_directory_uri()?>/assets/images/icon-home.svg" alt="Home"></a>
                </div>
                <div class="header-mid">
                    <?= wp_nav_menu(array(
                        'menu' => 'Mobile Menu'
                    )) ?>
                </div>
                <div class="header-right">
                    <a href="#!" class="mobile-hamburger js-menu-trigger"><img src="<?=get_template_directory_uri()?>/assets/images/icon-menu.svg" alt="Hamburger Menu"></a>
                </div>
            </div>
        </div>
    </div>
</header>