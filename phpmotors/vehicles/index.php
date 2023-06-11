<?php
/***********
    Vehicles Controller
**********/

require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/library/connections.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/model/main-model.php';
//Get the accounts model
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/model/vehicles-model.php';
// Get the functions library
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/library/functions.php';

// Get the array of classifications
$classifications = getClassifications();
$navList = buildNavigationBar($classifications);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

    case 'addClassification':
        // echo 'You are in the addClassification case statement.';

        // Filter and store the data
        $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

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
            $message = "<p>Sorry the registration for $classificationName failed. Please try again.</p>";
            include '../view/add-classification.php';
            exit;
        }

        break;

    case 'registerVehicle':

        // Filter and store the data
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));

        // Check for missing data
        if (
            empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) ||
            empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) ||
            empty($classificationId)
        ) {
            $message = '<p>Please provide information for the empty form field.</p>';
            include '../view/add-vehicle.php';
            exit;
        }

        // Send the data to the model
        $regOutcome = regVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);

        // Check and report the result
        if ($regOutcome === 1) {
            $message = "<p>Thanks for registering $invMake.</p>";
            include '../view/add-vehicle.php';
            exit;
        } else {
            $message = "<p>Sorry!! the registration for $invMake failed. Please try again.</p>";
            include '../view/add-vehicle.php';
            exit;
        }
        break;

    case 'vehicleManagement':
        //add ?action=vehicleManagement
        $_SESSION['loggedin'] = TRUE;
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
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/vehicle-man.php';

        break;
}
