<?php
/**
 * Plugin Name: Simple Checkout VPN Alert
 * Description: Display a VPN alert on the checkout page.
 * Author:      Rasoul Mousavian
 * Author URI:  https://seramo.ir
 * Version:     1.1.0
 * License:     GPLv2
 */

defined( 'ABSPATH' ) || exit;

/**
 * Define Constants
 */
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

        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_sweetalert_script' ) );
        add_action( 'wp_footer', array( __CLASS__, 'display_vpn_message' ) );
    }

    public static function enqueue_sweetalert_script()
    {
        if ( ! is_checkout() || is_order_received_page() ) {
            return;
        }
        wp_enqueue_script( 'sweetalert2', SCVA_ASSETS . 'js/sweetalert2.min.js', array( 'jquery' ), '11.14.4', true );
    }

    public static function display_vpn_message()
    {
        if ( ! is_checkout() || is_order_received_page() ) {
            return;
        }
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                fetch('https://www.cloudflare.com/cdn-cgi/trace')
                    .then(response => response.text())
                    .then(data => {
                        const locRegex = /loc=(.+)/;
                        const warpRegex = /warp=(.+)/;
                        const locMatch = data.match(locRegex);
                        const warpMatch = data.match(warpRegex);
                        if (locMatch && locMatch[1] && warpMatch && warpMatch[1]) {
                            const userCountry = locMatch[1].trim();
                            const warpStatus = warpMatch[1].trim();
                            if (userCountry !== "IR" || warpStatus !== "off") {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'توجه!',
                                    html: '<span>لطفاً برای جلوگیری از بروز هرگونه مشکل در فرآیند پرداخت، پیش از ورود به درگاه بانکی، VPN خود را غیرفعال نمایید.</span>',
                                    confirmButtonText: 'تایید',
                                    allowOutsideClick: false
                                });
                            }
                        }
                    });
            });
        </script>
        <?php
    }
}