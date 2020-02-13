<?php
/*
Plugin Name: MC4WP: Mailchimp Top Bar Modified for HolotropicPoland.pl
Plugin URI: https://www.mc4wp.com/#utm_source=wp-plugin&utm_medium=mailchimp-top-bar&utm_campaign=plugins-page
Description: Adds a Mailchimp opt-in bar to the top of your site. Modified for HP.pl. Source code: https://github.com/kovsky0/mailchimp-top-bar
Version: 1.5.1
Author: ibericode, kovsky0
Author URI: https://ibericode.com/
Text Domain: mailchimp-top-bar
Domain Path: /languages
License: GPL v3
Requires PHP: 5.3

Mailchimp Top Bar
Copyright (C) 2015-2020, Danny van Kooten, hi@dannyvankooten.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}


/**
 * Loads the Mailchimp Top Bar plugin
 *
 * @ignore
 * @access private
 */
function _load_mailchimp_top_bar() {
	// check deps
	$ready = include __DIR__ . '/dependencies.php';
	if( ! $ready ) {
		return;
	}

	define('MAILCHIMP_TOP_BAR_FILE', __FILE__);
	define('MAILCHIMP_TOP_BAR_DIR', __DIR__);
	define('MAILCHIMP_TOP_BAR_VERSION', '1.5.1');

	// create instance
	require_once __DIR__ . '/bootstrap.php';
}

if( version_compare( PHP_VERSION, '5.3', '<' ) ) {
	require_once dirname( __FILE__ ) . '/php-backwards-compatibility.php';
} else {
	add_action( 'plugins_loaded', '_load_mailchimp_top_bar', 30 );
}
