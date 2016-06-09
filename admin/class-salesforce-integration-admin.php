<?php

/*
 * The admin-specific functionality of the plugin.
 *
 * @package Salesforce_Integration
 * @subpackage Salesforce_Integration/admin
 * @author Vik Ewoods <vik.ewoods@gmail.com>
 *
 */

class Salesforce_Integration_Admin
{
    /*
     * Plugin id
     *
     * @since 1.0.0
     * @access private
     * @var string  $salesforce_integraion  The id of plugin
     */
    private $salesforce_integration;


    /*
     * Plugin version
     *
     * @since 1.0.0
     * @access private
     * @var string $version Plugin version
     */
    private $version;


    /*
     * Initialize class
     *
     * @since 1.0.0
     * @param   string  $salesforce_integration Plugin id
     * @param   string  $version    Plugin version
     */
    public function __construct($salesforce_integration, $version)
    {
        $this->salesforce_integration = $salesforce_integration;
        $this->version = $version;
    }


    /*
     * Register styles for admin
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->salesforce_integration, plugin_dir_url(__FILE__) . 'css/css-salesforce-integration.css', array(), $this->version, 'all' );
    }


    /*
     * Register javascripts for admin
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->salesforce_integration, plugin_dir_url(__FILE__) . 'js/js-salesforce-integration.js', array('jquery'), $this->version, false);
    }


    /*
     * Reqister admin menu
     *
     * @since 1.0.0
     */
    public function add_plugin_admin_menu()
    {
        add_options_page("SalesForce Integration Setting", "SF Integration", "manage_options", $this->salesforce_integration, array($this, 'display_plugin_setup_page'));
    }

    /*
     * Add plugin links
     *
     * @since 1.0.0
     */
    public function add_action_links($links)
    {
        $settings_link = array(
            '<a href="' . admin_url('options-general.php?page=' . $this->salesforce_integration ) . '">' . __('Settings', $this->salesforce_integration) . '</a>',
        );

        array_merge($settings_link, $links);
    }

    /*
     * Render admin view
     */
    public function display_plugin_setup_page()
    {
        include_once ('partials/salesforce-integration-admin-display.php');
    }

    /*
     * Validate admin fields before saving
     */
    public function validate($input)
    {
        // All checkboxes inputs
        $valid = array();
        
        return $valid;
    }

    /*
     * Save settings
     */
    public function options_update() {
        register_setting($this->salesforce_integration, 'sfclientid');
        register_setting($this->salesforce_integration, 'sfclientsecret');
        register_setting($this->salesforce_integration, 'sfmailinglist');
        register_setting($this->salesforce_integration, 'sfmailinglistid');
    }

}

?>