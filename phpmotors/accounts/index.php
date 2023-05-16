<?php
/*
    Accounts Controller
*/

// require_once '../library/connections.php';
// require_once '../model/main-model.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/library/connections.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/model/main-model.php';

// Get the array of classifications
$classifications = getClassifications();
// var_dump($classifications);
// 	exit;

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    // case '':

    //     break;
    case 'login':
        //add ?action=login
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/login.php';
            break;
    case 'register':
        //add ?action=register
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/register.php';
            break;
    default:

        break;
}
