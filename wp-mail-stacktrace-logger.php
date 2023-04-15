<?php
/*
Plugin Name: WP Mail Stack Trace Logger
Description: Logs a stack trace for every call to the wp_mail function
Version: 1.0
Author: Bing
*/

add_filter( 'wp_mail', 'log_wp_mail_stack_trace' );

function log_wp_mail_stack_trace( $args ) {
    // Get the stack trace
    $stack_trace = wp_debug_backtrace_summary();

    // Log the stack trace
    error_log( 'wp_mail called from: ' . $stack_trace );

    // Return the original arguments to continue sending the email
    return $args;
}
