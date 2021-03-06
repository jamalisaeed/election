<?php
/**
 * Sample Page Handler Class File
 *
 * This file contains Second_Page_Handler class which is used to render a page in your project
 * with a specific route or url.
 *
 * @package    Plugin_Name_Dir\Includes\PageHandlers
 * @author     Your_Name <youremail@nomail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

namespace Plugin_Name_Dir\Includes\PageHandlers;

use Plugin_Name_Dir\Includes\PageHandlers\Contracts\Page_Handler;
use Plugin_Name_Dir\Includes\Functions\Utility;

/**
 * Class Second_Page_Handler.
 * This class  is used to render a page in your project with a specific route or url.
 *
 * @package    \Plugin_Name_Dir\Includes\PageHandlers
 * @author     Your_Name <youremail@nomail.com>
 * @see        \Plugin_Name_Dir\Includes\Functions\Utility
 * @see        \Plugin_Name_Dir\Includes\PageHandlers\Contracts\Page_Handler
 */
class Auth_Handler implements Page_Handler {

	/**
	 * Method render in First_Page_Handler Class
	 *
	 * It calls when you need to render a view in your website.
	 *
	 * @access  public
	 */
	public function render() {
        $dash_assets_url=trailingslashit( PLUGIN_NAME_URL ) . 'assets/dashboard/';
        $dash_assets_url2=trailingslashit( PLUGIN_NAME_URL ) . 'assets/dashboard-login/';
		Utility::load_template( 'auth/auth', compact( array('dash_assets_url','dash_assets_url2') ), 'front' );
		exit;
	}
}
