<?php

/************
    Accounts Controller
 ***********/

// Create or access a Session
session_start();

// require_once '../library/connections.php';
// require_once '../model/main-model.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/library/connections.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/model/main-model.php';
//Get the accounts model
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/model/accounts-model.php';
// Get the functions library
require_once $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/library/functions.php';

// Get the array of classifications
$classifications = getClassifications();
// var_dump($classifications);
// 	exit;

// Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';
$navList = buildNavigationBar($classifications);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'home':
        $_SESSION['loggedin'] = FALSE;
        setcookie('firstname',  '', time() - 3600);
        unset($_COOKIE['firstname']);
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/home.php';
        break;
    case 'login':
        setcookie('firstname',  '', time() - 3600);
        unset($_COOKIE['firstname']);
        $_SESSION['loggedin'] = FALSE;
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/login.php';
        break;
    case 'registration':
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/registration.php';
        break;

    case 'registerUser':
        //echo 'You are in the register case statement.';

        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        $existingEmail = checkExistingEmail($clientEmail);

        // Deal with existing email during registration
        if ($existingEmail) {
            $message = "<p>The email address already exists. Do you want to login instead?</p>";
            include '../view/login.php';
            exit;
        }

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)) {
            $message = "<p>Please provide information for all empty form fields.</p>";
            include '../view/registration.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');

            //$message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";

            header('Location: /starter-assets/phpmotors/accounts/?action=login');
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }

        break;

    case 'loginUser':
        //echo 'You are in the loginUser case statement.';
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        // Check for missing data
        if (empty($clientEmail) || empty($checkPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;

        if(isset($_SESSION['loggedin'])){
            setcookie('firstname', $_SESSION ['clientData']['clientFirstname'], strtotime('+1 year'), '/');
        }
        

        // Send them to the admin view
        include '../view/admin.php';
        exit;
        break;

    default:
        include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/view/home.php';
        break;
}
