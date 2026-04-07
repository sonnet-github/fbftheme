<?php
/**
 * Footer Upper Template (Footer Block)
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */  
?>

<div class="footer-content max-wrap margin-auto">
    <ul class="flex flex-space-between items-center">
        <li>&copy; <?=date('Y');?> All Rights Reserved.</li>
        <li><a href="<?=get_site_url()?>/privacy-policy-terms-of-use/">Policies & Disclaimers</a></li>
        <li><a href="#contact-us" class="js-popup">Contact Us</a></li>
        <li><a href="https://www.linkedin.com/groups/19210004/" target="_blank"><img src="<?=get_template_directory_uri()?>/assets/images/logo-linkedin.svg" alt="LinkedIn Logo"></a></li>
    </ul>
</div>