<?php 

	error_reporting(E_ALL);

	require_once '../resources/config/config.php';

	require_once '../classes/database.php';

	require_once '../classes/news.php';

	// Set connection
	$dbObj = new Database();
	
	// Get connection from db
	$newsObj = new News();
	$newsObj->conn = $dbObj->init();

	// HTML Content
	require_once 'header.php';

	echo '<div><body><div id="wrapper">';
	
	// Menu Left
	require_once 'menu.php';

	// Data
	$newsObj->listUrls();

	echo '</div>';

	require_once 'footer.php';





