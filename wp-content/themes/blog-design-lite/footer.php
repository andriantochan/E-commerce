<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog Design Lite
 * @since 1.0
 */

$social_header  		= blog_design_lite_get_theme_mod( 'header_social' );
$social_footer  		= blog_design_lite_get_theme_mod( 'footer_social' );
$show_search 			= blog_design_lite_get_theme_mod( 'show_search' );
?>

	</div><!-- #content -->
</div><!-- #site-content-wrap -->	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if (is_active_sidebar( 'blog-design-lite-intsgram-feed' ) ) { ?>
			<div class="blog-design-lite-intsgram-area">
				<?php dynamic_sidebar( 'blog-design-lite-intsgram-feed' ); ?>
			</div>
		<?php } ?>		
		<?php if (is_active_sidebar( 'footer' ) ) { ?>
		<div class="footer-middle-widget-area clearfix">
			<div class="container">					
			<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</div>
		<?php } ?>
		<?php if(!empty($social_footer) ) { ?>
			<div class="footer-social-icon clearfix">	
				<div class="container">			
						<div class="blog-design-lite-sn blog-design-lite-sn-footer">
							<?php blog_design_lite_get_footer_social_icon(); ?>	
						</div>
									
				</div><!-- .site-info -->
			</div>
		<?php } ?>		
		<div class="site-info">
			<div class="container">					
			<div class="site-copyright clearfix"> 				
				<?php if( has_nav_menu('footer-menu') ){ ?>
				<div class="blog-design-lite-col-12 blog-design-lite-columns">
					<?php  
							wp_nav_menu( array(  
										'theme_location' => 'footer-menu',
										'menu_id' => 'footer-menu',
										'depth'   => 1,
										)); 
							?>					
				</div>
				<?php } ?>	
				<div class="blog-design-lite-col-12 blog-design-lite-columns copyright"><?php	echo blog_design_lite_footer_copyright(); ?></div>	
			</div>				
		</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav class="mobile-navigation mobile-menu" role="navigation">
	
	<div class="mobile_close_icons"><i class="fa fa-close"></i></div>
   <?php
	if( has_nav_menu( 'main-menu' ) ){
		wp_nav_menu( array(
			'container_class' => 'mobile-menu-container',
			'menu_class'      => 'mobile-menu clearfix',
			'theme_location'  => 'main-menu',
			'items_wrap'      => '<ul>%3$s</ul>',
		) );
	} ?>
	<div class="mobile-menu-social-icon"><?php if( !empty($social_header) ) { blog_design_lite_get_header_social_icon(); } ?></div>
</nav>
<a href="#" class="scroll-to-top hidden"><i class="fa fa-angle-up"></i></a>

<?php wp_footer(); ?>
</body>
</html>
