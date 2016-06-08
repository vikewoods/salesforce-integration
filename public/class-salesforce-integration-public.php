<?php

/*
 * Public side of plugin
 *
 * @since 1.0.0
 * @package Salesforce_Integration
 * @subpackage Salesforce_Integration/includes
 * @author Vik Ewoods <vik.ewoods@gmail.com>
 */

class Salesforce_Integration_Public
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
}

?>