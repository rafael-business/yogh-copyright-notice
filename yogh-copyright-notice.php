<?php
/**
 * Plugin Name:     Yogh Copyright Notice
 * Plugin URI:      https://www.yogh.com.br/plugins/yogh-copyright-notice/
 * Description:     Shows a Copyright notice at the end of Blog posts.
 * Author:          Yogh Solutions
 * Author URI:      https://www.yogh.com.br/
 * Text Domain:     yogh-copyright-notice
 * Domain Path:     /languages
 * Version:         1.0.0
 * License:         GPL-2.0
 *
 * @package         Yogh_Copyright_Notice
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die( 'not allowed' );
}

// Translating
function translate_plugin() {
    load_plugin_textdomain(
        'yogh-copyright-notice',
        false,
        dirname( plugin_basename( __FILE__ ) ) . '/languages/'
    );
}

add_action( 'init', 'translate_plugin' );

/**
 * Instantiation of Copyright Notice Class and
 * Plugin initialization.
 */
require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';
use Yogh\Copyright\Notice;

function init_yogh_copyright_notice_plugin() {
    $plugin = new Notice();
    $plugin->init();
}
add_action( 'init', 'init_yogh_copyright_notice_plugin' );
