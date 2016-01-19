<?php 

	error_reporting(E_ALL);

	define(REAL_PATH, realpath($_SERVER['DOCUMENT_ROOT']));

    require_once '../../resources/config/config.php';

    require_once '../../classes/database.php';

    require_once '../../classes/news.php';

    // Set connection
    $dbObj = new Database();
    
    // Get connection from db
    $newsObj = new News();
    $newsObj->conn = $dbObj->init();    

	require_once '../header.php';

	echo '<div><body><div id="wrapper">';
	
	// Menu Left
	require_once '../menu.php';

	// Data
	$newsObj->editNew(1);

	echo '</div>';

	require_once '../footer.php';
