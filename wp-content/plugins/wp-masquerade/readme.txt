=== WP Masquerade ===
Contributors: swingline0
Plugin URI: https://github.com/Swingline0/wp-masquerade
Author URI: http://eran.sh
Tags: admin login, login as user, masquerade as user, user login, admin login as user
Requires at least: 2.8
Tested up to: 4.1
Stable tag: 1.1.0
License: General Public License version 2

== Description ==

Allow WordPress administrators to masquerade as other users on their site. Adds a dropdown select box to the admin bar as well as individual links in the dashboard's user view. WP Masquerade also allows the user to revert back to their previous session for easy return to the admin user.

Thanks to JR King (castle-creative.com) for the initial development of the plugin was forked from.

== Installation ==

1. Download the plugin and extract the files
2. Upload `masquerade` directory to your WordPress Plugin directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Goto the 'Users' menu in Wordpress to see Masquerade Link.

== Frequently Asked Questions ==
Q: Why doesn't the Masquerade as User" link appear in the user list?
A: For security reasons, the link only appears to users that have the 'delete_users' capability.

== Change Log ==

= 1.1.0 =
* Big refactor, add admin bar user selection

= 1.0.1 =
* Added nonce security check to POST request

= 1.0 =
* First stable release

== Upgrade Notice ==
None

== Screenshots ==

1. Showing the Masquerade Link in the User List
