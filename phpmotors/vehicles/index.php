<?php
/*
    Vehicles Controller
*/

// require_once '../library/connections.php';
// require_once '../model/main-model.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/library/connections.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/model/main-model.php';
//Get the accounts model
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/model/vehicles-model.php';

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

    case 'addClassification':
        // echo 'You are in the addClassification case statement.';

        // Filter and store the data
        $classificationName = filter_input(INPUT_POST, 'classificationName');
        // $clientLastname = filter_input(INPUT_POST, 'clientLastname');
        // $clientEmail = filter_input(INPUT_POST, 'clientEmail');
        // $clientPassword = filter_input(INPUT_POST, 'clientPassword');

        // Check for missing data
        if (empty($classificationName)) {
            $message = '<p>Please provide information for the empty form field.</p>';
            include '../view/add-classification.php';
            exit;
        }

        // Send the data to the model
        $regOutcome = regClassification($classificationName);

        // Check and report the result
        if ($regOutcome === 1) {
            $message = "<p>Thanks for registering $classificationName.</p>";
            include '../view/add-classification.php';
            exit;
        } else {
            $message = "<p>Sorry $classificationName, but the registration failed. Please try again.</p>";
            include '../view/add-classification.php';
            exit;
        }

        break;

    case 'registerVehicle':
        //echo 'You are in the registerVehicle case statement.';

        // Filter and store the data
        $invMake = filter_input(INPUT_POST, 'invMake');
        $invModel = filter_input(INPUT_POST, 'invModel');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice = filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invColor = filter_input(INPUT_POST, 'invColor');
        $classificationId = filter_input(INPUT_POST, 'classificationId');

        // Check for missing data
        if (
            empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) ||
            empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) ||
            empty($classificationId)
        ) {
            echo 'empty -----------------------------------------------------------------------';
            $message = '<p>Please provide information for the empty form field.</p>';
            include '../view/add-vehicle.php';
            exit;
        }

        // Send the data to the model
        $regOutcome = regVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

        // Check and report the result
        if ($regOutcome === 1) {
            echo 'regOutcome === 1 <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<';
            $message = "<p>Thanks for registering $invMake.</p>";
            include '../view/add-vehicle.php';
            exit;
        } else {
            echo 'No else >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>';
            $message = "<p>Sorry!! the registration for $invMake failed. Please try again.</p>";
            include '../view/add-vehicle.php';
            exit;
        }
        break;

    case 'vehicleManagement':
        //add ?action=vehicleManagement
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/vehicle-man.php';
        break;

    case 'add-classification':
        //add ?action=add-classification
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/add-classification.php';
        break;
    case 'add-vehicle':
        //add ?action=add-vehicle
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/add-vehicle.php';
        break;
    default:

        break;
}
