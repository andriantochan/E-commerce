<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog Design Lite
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
<?php
	// Get some variable 
	$header_social  = blog_design_lite_get_theme_mod( 'header_social' );
	$show_search  	= blog_design_lite_get_theme_mod( 'show_search' );
?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blog-design-lite' ); ?></a>	
<header id="masthead" class="site-header" role="banner">
		<?php if(!empty($header_social) || !empty($show_search) || has_nav_menu( 'top-menu' )) { ?>
		<div class="header-top hide-for-small-only">
			<div class="header-content__container container">
				<?php if(!empty($header_social)) { ?>
					<div class="blog-design-lite-social-networks blog-design-lite-social-networks-header blog-design-lite-col-5 blog-design-lite-column">
						<?php blog_design_lite_get_header_social_icon(); ?>
					</div>
				<?php } if(empty($header_social)) { ?>
					<div class="blog-design-lite-col-12 blog-design-lite-column">
				<?php } else { ?>
					<div class="blog-design-lite-col-6 blog-design-lite-column">
				<?php } ?>
						<div class="top-header-menu hide-for-small-only">
	                         <nav id="site-navigation-top" class="main-navigation" role="navigation">
	                        <?php    if( has_nav_menu( 'top-menu' ) ){
	                                    wp_nav_menu( array(
	                                            'theme_location' => 'top-menu',
	                                            'menu_id' => 'top-menu',
	                                    ) ); 
	                                } ?>
	                        </nav>      
	                    </div> 
		            </div>
		            <div class="blog-design-lite-col-1 blog-design-lite-column floatright">
		            	<?php if(!empty($show_search)){ ?>
		                    <?php  get_template_part( "template-header/header-search"); ?>       
		            	<?php } ?>
		            </div>
			</div>
		</div>
		<?php } ?>	
		<div class="site-branding container clearfix">
			<div class="blog-design-lite-columns-row">
				<div class="header-logo blog-design-lite-col-12 blog-design-lite-col-sm-12 blog-design-lite-columns">
					<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>
					<?php    $image = wp_get_attachment_image_src( blog_design_lite_get_theme_mod( 'custom_logo' ) , 'full' ); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php  echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
					</a>
					<?php } else { ?>
						<div class="site-title-wrap">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
					<?php } ?>
				</div>			  
			</div><!-- .Row -->
		</div><!-- .logo -->
		<div class="header-content">        
			<div class="header-content__container container">
					<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'blog-design-lite' ); ?></button>
							<div class="mobile-logo">
							<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
								$image = wp_get_attachment_image_src( blog_design_lite_get_theme_mod( 'custom_logo' ) , 'full' ); ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php  echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
								</a>
								<?php } else { ?>
									<div class="site-title-wrap">
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
									</div>
							<?php } ?>
							</div>
							<?php                    
								wp_nav_menu( array(
										'theme_location' => 'main-menu',
										'menu_id' => 'primary-menu',
								) );                     
							 ?>
					</nav><!-- #site-navigation -->           
			</div>
		</div><!-- .header-content -->			
</header><!-- #masthead -->	
<?php 
$dispable_slider = blog_design_lite_get_theme_mod( 'dispable_slider' );
if(is_home() && !$dispable_slider ) { ?>
	<div class="blog-design-latest-post clearfix">
		<div class="container">
			<?php get_template_part( 'template-parts/content-latest-post'); ?>
		</div>
	</div>
<?php } ?>
<div class="site-content-wrap clearfix">	
	<div id="content" class="site-content container">