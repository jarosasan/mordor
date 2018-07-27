<?php
	/**
	 *  µFrame is a basic PHP MVC framework
	 *  Created by Ignas Galuškinas 2017
	 */
	
	require "vendor/autoload.php";
	
	$whoops = new \Whoops\Run;
	$whoops -> pushHandler( new \Whoops\Handler\PrettyPageHandler );
	$whoops -> register();
	
	// Show all PHP errors
	ini_set( 'display_errors', 1 );
	ini_set( 'display_startup_errors', 1 );
	error_reporting( E_ALL );
	
	
	if ( phpversion() < 7 ) {
		die( "<pre>Your server is using PHP version " . phpversion() . ".<br/>Please upgrade to PHP v7.0.25 or higher." );
	}
	
	// Autoload all Core classes
	//spl_autoload_register(function ($class_name) {
	//    include $class_name . ".php";
	//
	//});
	
	
	include "uFrame/Log.php";
	include "uFrame/Database.php";
	include "uFrame/App.php";
	include "uFrame/Controller.php";
	include "uFrame/Menu.php";
	
	
	// Including configuration variables
	require_once "config.php";
	
	// Starting the app
	require_once "start.php";
