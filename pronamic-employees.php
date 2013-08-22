<?php

/*
 * Plugin Name: Pronamic Employees
 * Plugin URI: http://pronamic.nl
 * Description: A simple plugin for a users listing.
 * Version: 1.0.0
 * Author: Pronamic
 * Author URI: http://pronamic.nl
 * License: GPLv2
 * Domain: pronamic_employees
 */

/*
  Copyright (C) 2013 Pronamic

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

/**
 * Pronamic Employees Plugin File
 */
class Pronamic_Employees {

	/**
	 * Holds the Plugin class for Pronamic Employees
	 * @var Pronamic_Employees_Plugin
	 */
	public $plugin;
	
	/**
	 * Automatically registers the autoloader, loads the text domain
	 * and prepares the modules.
	 */
	public function __construct() {
		// Register the autoloader
		spl_autoload_register( array( $this, 'autoload' ) );

		// Plugin textdomain 
		load_plugin_textdomain( 
			'pronamic_employees', 
			false, 
			dirname( plugin_basename( $this->plugin_file() ) ) . '/languages/' 
		);
		
		// Load modules
		$this->plugin = new Pronamic_Employees_Plugin();
	}

	/**
	 * Autoloader. Loads the classes as per the PEAR autoloader and naming
	 * convention. No namespaces.
	 * 
	 * @access public
	 * @param string $class_name
	 */
	public function autoload( $class_name ) {
		$name = str_replace( array( '\\', '_' ), DIRECTORY_SEPARATOR, $class_name );

		$file = $this->plugin_directory() . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $name . '.php';

		if ( is_readable( $file ) )
			require_once $file;
	}
	
	public function plugin_directory() {
		return dirname( __FILE__ );
	}
	
	public function plugin_file() {
		return __FILE__;
	}

}

global $pronamic_employees;
$pronamic_employees = new Pronamic_Employees;