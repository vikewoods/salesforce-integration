<?php

/*
 * Class main
 *
 * @since 1.0.0
 * @package Salesforce_Integration
 * @subpackage Salesforce_Integration/includes
 * @author Vik Ewoods <vik.ewoods@gmail.com>
 */

class Salesforce_Integration
{

    /*
     * The plugin loader
     *
     * @since 1.0.0
     * @access protected
     * @var Salesforce_Integration_Loader $loader Register all hooks of plugin
     */
    protected $loader;

    /*
     * Plugin identifier
     *
     * @since 1.0.0
     * @access protected
     * @var string $salesforce_integration The string used to identify plugin
     */
    protected $salesforce_integration;

    /*
     * Plugin version
     *
     * @since 1.0.0
     * @access protected
     * @var string $version The string version of plugin
     */
    protected $version;

    /*
     * Core initialized function
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct()
    {
        $this->salesforce_integration = 'salesforce-integration';
        $this->version = '1.0.0';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    /*
     * Load plugin dependencies
     *
     * @since 1.0.0
     * @access private
     */
    private function load_dependencies()
    {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-salesforce-integration-loader.php';
        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-salesforce-integration-admin.php';
        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-salesforce-integration-public.php';
        $this->loader = new Salesforce_Integration_Loader();
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks()
    {
        $plugin_admin = new Salesforce_Integration_Admin($this->get_salesforce_integration(), $this->get_version());
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
        $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_public_hooks()
    {
        $plugin_public = new Salesforce_Integration_Public($this->get_salesforce_integration(), $this->get_version());
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
        $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_salesforce_integration()
    {
        return $this->salesforce_integration;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     1.0.0
     * @return    Salesforce_Integration_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }

}

?>