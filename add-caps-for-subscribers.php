<?php

/*
Plugin Name: Add Capabilities for Subscribers
Description: Enables subscriber users to edit their own posts on activation.  This capability is removed on deactivation.
Version: 0.1
Author: The team at PIE
Author URI: http://pie.co.de
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

/* PIE\AddCapsForSubscribers is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version.

PIE\AddCapsForSubscribers is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with PIE\AddCapsForSubscribers. If not, see https://www.gnu.org/licenses/gpl-3.0.en.html */

namespace PIE\AddCapsForSubscribers;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\\add_user_media_caps' );
register_deactivation_hook( __FILE__, __NAMESPACE__ . '\\remove_user_media_caps' );

/**
 * Add capability for subscribers to edit their own posts
 */
function add_user_media_caps() {
    $role = get_role( 'subscriber' );
    $role->add_cap( 'edit_posts' );
}

/**
 * Remove capability for subscribers to edit their own posts
 */
function remove_user_media_caps() {
    $role = get_role( 'subscriber' );
    $role->remove_cap( 'edit_posts' );
}
