<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Fifteenth
 * @since Fifteenth 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'fifteenth' ); ?></a>
	
	<div class="site-branding">
		<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif;

			$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; ?></p>
				<?php endif;
		?>
		
		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="social-navigation" class="social-navigation" role="navigation">
				<?php
					// Social links navigation menu.
					wp_nav_menu( array(
						'theme_location' => 'social',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>',
					) );
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>
		
		<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'fifteenth' ); ?></button>
	</div><!-- .site-branding -->
	
	<header id="masthead" class="site-header" role="banner"></header><!-- .site-header -->	
	<?php if ( !is_page_template( 'full-width.php' ) || !class_exists( 'bbPress' ) ){ ?>
	<div id="sidebar" class="sidebar">	
	    <?php get_sidebar(); ?>
	</div><!-- .sidebar -->
	<?php } ?>
    <?php if ( is_page_template( 'full-width.php' ) || class_exists( 'bbPress' ) && is_bbpress() ){ ?>
	    <div id="content" class="full-width site-content">
	<?php } else { ?>
	    <div id="content" class="site-content">
	<?php } ?>