<?php
/**
 * @package Redirect to a concrete page if the users is not logged in
 * @version 1.0
 */
/*
Plugin Name:   Redirect to a concrete page if the users is not logged in
Plugin URI:    http://wordpress.org/plugins/redirect-to-page-if-not-logged-in/
Description:   Redirects to a concrete page if the user is not logged in.
Author:        Rafa Poveda
Version:       1.0
Author URI:    http://raven.es/
License:       GPL-3.0 or later
License URI:   http://www.gnu.org/licenses/gpl-3.0.txt
 */

add_action( 'template_redirect', 'bi0_redirect_page' );

function bi0_redirect_page() {

    if ( is_user_logged_in() ) {
        return;
    }

    // TODO add the allowed pages via admin menu
    $allowed_pages = array( 7966 );
// 7966 is login page

    if ( !in_array( get_queried_object_id(), $allowed_pages ) ) {
        // TODO add the site url via admin menu
        wp_redirect( site_url( '/login/' ) );
        exit();
    }

}
