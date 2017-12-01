<?php
/**
 * LU/NE nü back compat functionality
 *
 * Prevents LU/NE nü from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage LUNE_nu
 * @since LU/NE nü 1.0
 */

/**
 * Prevent switching to LU/NE nü on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since LU/NE nü 1.0
 */
function lune_nu_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'lune_nu_upgrade_notice' );
}
add_action( 'after_switch_theme', 'lune_nu_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * LU/NE nü on WordPress versions prior to 4.7.
 *
 * @since LU/NE nü 1.0
 *
 * @global string $wp_version WordPress version.
 */
function lune_nu_upgrade_notice() {
	$message = sprintf( __( 'LU/NE nü requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'lune_nu' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since LU/NE nü 1.0
 *
 * @global string $wp_version WordPress version.
 */
function lune_nu_customize() {
	wp_die( sprintf( __( 'LU/NE nü requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'lune_nu' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'lune_nu_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since LU/NE nü 1.0
 *
 * @global string $wp_version WordPress version.
 */
function lune_nu_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'LU/NE nü requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'lune_nu' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'lune_nu_preview' );
