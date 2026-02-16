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
    <div class="flex flex-space-between items-center width-100">
        <div class="footer-left">
            <ul class="flex flex-space-between items-center">
                <li>&copy; <?=date('Y');?> All Rights Reserved.</li>
                <li><a href="#!">Policies & Disclaimers</a></li>
                <li><a href="#!">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-right">
            <a href="#!"><img src="<?=get_template_directory_uri()?>/assets/images/logo-linkedin.svg" alt="LinkedIn Logo"></a>
        </div>
    </div>
</div>