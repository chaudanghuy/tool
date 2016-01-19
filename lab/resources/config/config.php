<?php 
	
	/*
	 * Define database
	*/
	define('HOST', 'local.lab.dev');
	define('DB', 'chunyin');
	define('USERNAME', 'root');
	define('PASS', '');

	/*
	* Path
	*/
	define('FULL_PATH', realpath($_SERVER['DOCUMENT_ROOT']));

	define('CLASS_PATH', FULL_PATH . '/classes');

	define('LIBRARY_PATH', FULL_PATH . '/resources/library');