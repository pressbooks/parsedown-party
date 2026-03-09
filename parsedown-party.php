<?php

/*
Plugin Name: Parsedown Party
Plugin URI: https://github.com/pressbooks/parsedown-party/
Description: Markdown editing for WordPress.
Author: Pressbooks (Book Oven Inc.)
Author URI: https://pressbooks.org/
License: GPL v3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
<!-- x-release-please-start-version -->
Version: 1.2.2
<!-- x-release-please-end -->
Requires PHP: 8.3
Requires at least: 6.8
Tested up to: 6.9.1
Text Domain: parsedown-party
Domain Path: /languages/
*/

require_once(__DIR__ . '/vendor/autoload.php');

if (! class_exists('\ParsedownExtra')) {
    $title = __('Dependencies Missing', 'parsedown-party');
    $body = __('Please run <code>composer install</code> from the root of the Parsedown Party plugin directory.', 'parsedown-party');
    $message = "<h1>{$title}</h1><p>{$body}</p>";
    wp_die(wp_kses_post($message), esc_html($title));
}

add_action('init', function () {
    load_plugin_textdomain('parsedown-party', false, dirname(plugin_basename(__FILE__)) . '/languages/');
});

add_action('init', [ '\ParsedownParty\Plugin', 'init' ]);
