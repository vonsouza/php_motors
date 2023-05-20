<?php
/*
    Accounts Controller
*/

// require_once '../library/connections.php';
// require_once '../model/main-model.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/library/connections.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/model/main-model.php';
//Get the accounts model
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/model/accounts-model.php';

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
    case 'registration':
        //add ?action=registration
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/registration.php';
            break;

    case 'registerUser':
        echo 'You are in the register case statement.';

        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
        $clientLastname = filter_input(INPUT_POST, 'clientLastname');
        $clientEmail = filter_input(INPUT_POST, 'clientEmail');
        $clientPassword = filter_input(INPUT_POST, 'clientPassword');

        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit; 
        }

        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

        // Check and report the result
        if($regOutcome === 1){
            $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            include '../view/login.php';
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }

        break;
    default:

        break;
}
