<?php

/*
 * @link http://riseproject.com/
 * @since 1.0.0
 * @package Salesforce_Integration
 *
 * @wordpress-plugin
 * Plugin Name: SalesForce Integration
 * Plugin URI: http://riseproject.com
 * Description: This is <b>SalesForce</b> integration plugin for <b>RiseProject</b> applications.
 * Version: 1.0.0
 * Author: Vik Ewoods
 * Author URI: http://github.com/vikewoods
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/*
 * Plugin activation
 */
function activate_salesforce_integration()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-salesforce-integration-activator.php';
    Salesforce_Integration_Activator::activate();
}

/*
 * Plugin de-activator
 */
function deactivate_salesforce_integration()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-salesforce-integration-deactivator.php';
    Salesforce_Integration_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_salesforce_integration');
register_deactivation_hook(__FILE__, 'deactivate_salesforce_integration');

/*
 * Initialize main admin plugin
 */
require plugin_dir_path(__FILE__) . 'includes/class-salesforce-integration.php';

/*
 * Begin exec plugin
 */
function run_salesforce_integration()
{
    $plugin = new Salesforce_Integration();
    $plugin->run();
}

run_salesforce_integration();

?>