<?php
/**
 * Plugin Name: Post GPT
 * Plugin URI:  https://github.com/chigozieorunta/post-gpt
 * Description: A simple plugin to help generate post titles and content using AI.
 * Version:     1.0.0
 * Author:      Chigozie Orunta
 * Author URI:  https://chigozieorunta.com
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: post-gpt
 * Domain Path: /languages
 *
 * @package PostGPT
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

// Require Autoloader.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// Instantiate and run plugin.
( \PostGPT\PostGPT::get_instance() )->run();