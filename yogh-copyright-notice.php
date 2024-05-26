<?php

/**
 * Plugin Name:     Yogh Copyright Notice
 * Plugin URI:      https://www.yogh.com.br/plugins/yogh-copyright-notice/
 * Description:     Shows a Copyright notice at the end of Blog posts.
 * Author:          Yogh Soluções
 * Author URI:      https://www.yogh.com.br/
 * Text Domain:     yogh-copyright-notice
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Yogh_Copyright_Notice
 */

// If this file is called directly, abort.
if ( ! defined('ABSPATH') ) {
    die('not allowed');
}

require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';

use Yogh\Copyright\Notice;
$notice = new Notice();

// Inserting copyright at the end of the content
add_filter( 'the_content', [$notice, 'display_copyright_notice'], 100 );
