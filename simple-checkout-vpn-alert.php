<?php
/**
 * Plugin Name: Simple Checkout VPN Alert
 * Description: Display a VPN alert on the checkout page.
 * Author:      Rasoul Mousavian
 * Author URI:  https://seramo.ir
 * Version:     1.2.0
 * License:     GPLv2
 */

defined( 'ABSPATH' ) || exit;

/**
 * Define Constants
 */
define( 'SCVA_VER', '1.2.0' );
define( 'SCVA_URI', plugin_dir_url( __FILE__ ) );
define( 'SCVA_ASSETS', trailingslashit( SCVA_URI . 'assets' ) );

/**
 * Initialize
 */
add_action( 'plugins_loaded', array( 'SimpleCheckoutVpnAlert', 'init' ) );

/**
 * Main Class
 */
class SimpleCheckoutVpnAlert
{
    public static function init()
    {
        if ( ! class_exists( 'WooCommerce' ) ) {
            return;
        }

        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
    }

    public static function enqueue_sweetalert_script()
    {
        if ( ! is_checkout() || is_order_received_page() ) {
            return;
        }

        wp_enqueue_script( 'sweetalert2', SCVA_ASSETS . 'js/sweetalert2.min.js', array( 'jquery' ), '11.4.8', true );
        wp_enqueue_script( 'scva-main', SCVA_ASSETS . 'js/main.js', array( 'sweetalert2' ), SCVA_VER, true );
    }
}