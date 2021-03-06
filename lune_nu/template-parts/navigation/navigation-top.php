<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage LUNE_nu
 * @since 1.0
 * @version 1.2
 */

?>
<div class="site-navigation-wrapper">
	<div class="site-navigation-logo">
		<?php the_custom_logo(); ?>
	</div>
	<div class="site-navigation-menu">
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'lune_nu' ); ?>">
			<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
				<?php
				echo lune_nu_get_svg( array( 'icon' => 'bars' ) );
				echo lune_nu_get_svg( array( 'icon' => 'close' ) );
				_e( 'Menu', 'lune_nu' );
				?>
			</button>

			<?php wp_nav_menu( array(
				'theme_location' => 'top',
			'menu_id'        => 'top-menu',
			) ); ?>

			<?php if ( ( lune_nu_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
				<a href="#content" class="menu-scroll-down"><?php echo lune_nu_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'lune_nu' ); ?></span></a>
			<?php endif; ?>
		</nav><!-- #site-navigation -->
	<div><!-- .site-navigation-menu -->
</div><!-- .site-navigation-wrapper -->
