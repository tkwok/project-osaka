<?php
/**
 * Functions
 *
 * Main footer file for the theme.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Theme_Name_Here
 * @author     Your Name <yourname@example.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://yoursite.com
 * @since      1.0.0
 */

/**
 * Initialization
 */
require 'inc/init.php';
require 'inc/options.php';
require 'inc/externals.php';
require 'inc/acf-options.php';

/**
* Additional methods for use globally
*/
require 'inc/methods.php';

/**
 * Custom Post Types
 */
require 'inc/post-types/all.php';
