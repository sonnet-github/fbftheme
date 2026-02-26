<?php
/**
 * Footer template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */

?>
    
        <footer id="page-footer" class="">
            <?php 
                get_template_part('src/views/partials/footer'); 
            ?>
        </footer>
    </div> <!-- page main wrapper -->

    <?php get_template_part('src/views/partials/register-login'); ?>
    <div class="non_visual_wrapper opt__step">
        <?php get_template_part('src/views/partials/footer', 'body-end'); ?>
        <?php wp_footer(); ?>
    </div>
</body>
</html>