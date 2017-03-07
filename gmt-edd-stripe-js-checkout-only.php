<?php

/**
 * Plugin Name: GMT EDD Stripe JS on Checkout Only
 * Plugin URI: https://github.com/cferdinandi/gmt-edd-stripe-js-checkout-only/
 * GitHub Plugin URI: https://github.com/cferdinandi/gmt-edd-stripe-js-checkout-only/
 * Description: Only load JS for EDD Stripe on Checkout.
 * Version: 1.0.0
 * Author: Chris Ferdinandi
 * Author URI: http://gomakethings.com
 * License: GPLv3
 */


function gmt_edd_stripe_js_checkout_only( $override = false ) {
	wp_dequeue_script( 'stripe-js' );
	if ( ( function_exists( 'edd_is_checkout' ) && edd_is_checkout() ) || $override ) {
		wp_enqueue_script( 'stripe-js', 'https://js.stripe.com/v2/', array( 'jquery' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'gmt_edd_stripe_js_checkout_only', 100 );