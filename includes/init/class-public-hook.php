<?php
/**
 * Public_Hook Class File
 *
 * This file contains hooks that you need in public
 * (like enqueue styles or scripts in front end)
 *
 * @package    Plugin_Name_Dir\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Dir\Includes\Init;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Name_Dir\Includes\Init
 * @author     Your_Name <youremail@nomail.com>
 */
class Public_Hook {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @access   public
	 *
	 * @param      string $plugin_name The name of the plugin.
	 * @param      string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

//		wp_enqueue_style(
//			$this->plugin_name . '_public_style',
//			PLUGIN_NAME_CSS . 'plugin-name-public.css',
//			array(),
//			$this->version,
//			'all'
//		);

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 * @access   public
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


        $actual_link = ( 'on' == isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] ? 'https' : 'http' )
            . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $site_url    = get_site_url();
        $temp_url    = str_replace( $site_url, '', $actual_link );
        if (strtok( $temp_url, '?' ) == '/auth')
        {

            wp_register_script( 'ELECTION_auth_script', PLUGIN_NAME_JS . 'auth.js' );

            $translation_array = array(
                'ajax_url' => admin_url('admin-ajax.php') ,
            );
            wp_localize_script( 'ELECTION_auth_script', 'myData', $translation_array );

            wp_enqueue_script( 'ELECTION_auth_script' );
        }


	}


    public function template_redirect_callback() {

        if(is_front_page())
        {
            wp_redirect(home_url('auth'), 301) ;
        }

        if(is_404())
        {
            wp_redirect(home_url('not_found'), 301) ;
        }
    }


}

