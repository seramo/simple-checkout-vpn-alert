=== Simple Checkout VPN Alert ===
Contributors: seramo
Donate link: https://seramo.ir
Tags: checkout, vpn, alert, woocommerce, ecommerce
Requires at least: 4.5
Tested up to: 6.6
Stable tag: 1.2.0
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A simple plugin to display a VPN alert on the WooCommerce checkout page.

== Description ==

Simple Checkout VPN Alert enhances the checkout experience by alerting customers to disable their VPNs during the checkout process on WooCommerce.

== Features ==

1. VPN Detection: Detects if a customer is using a VPN at the checkout.
2. Alert Display: Shows a SweetAlert popup warning to disable the VPN if detected.
3. Compatibility: Fully compatible with the latest versions of WooCommerce.

== Installation ==

= From WordPress Dashboard =

1. Navigate to 'Plugins' -> 'Add New'.
2. Search for 'Simple Checkout VPN Alert'.
3. Click 'Install Now' and then 'Activate' the plugin.

= Manual Installation =

1. Upload the 'simple-checkout-vpn-alert' folder to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= What does this plugin do? =

This plugin detects if a customer is using a VPN at the WooCommerce checkout and displays a warning message.

= Is this plugin free? =

Yes, the Simple Checkout VPN Alert plugin is completely free to use.

== Changelog ==

= 1.2 =
* Refactor: moved vpn alert to external js and downgraded sweet alert

= 1.1 =
* Added: warp check to alert conditions
* Fixed: exclude order received page from vpn alert script loading

= 1.0 =
* Initial Release