<?php
/**
 * Display Welcome page Getting started section.
 *
 * @package Blog Design Lite
 * @since 1.0
 * 
 */ 

?>
<div id="getting-started" class="gt-tab-pane gt-is-active">
    <div class="feature-section two-col">
        <div class="col">
                <h3><?php esc_html_e( 'Customize The Theme', 'blog-design-lite' ); ?></h3>
                <p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'blog-design-lite' ); ?></p>
                <p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'blog-design-lite' ); ?></a>
				<a href="<?php echo esc_url( 'http://demo.wponlinesupport.com/themes/blog-design-lite/' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'View Demo', 'blog-design-lite' ); ?></a> </p>
				
        </div>

        <div class="col">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg" alt="<?php esc_attr_e( 'screenshot', 'blog-design-lite' ); ?>">
        </div>
    </div>
</div>