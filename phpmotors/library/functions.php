<?php

//validate email
function checkEmail($clientEmail)
{
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword)
{
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
    return preg_match($pattern, $clientPassword);
}

// Build the navigation bar and store it to a variable for use in views
function buildNavigationBar($classifications)
{
    $navList = '<ul>';
    $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
    foreach ($classifications as $classification) {
        $navList .= "<li><a href='/phpmotors/vehicles?action=classification&classificationName="
            . urlencode($classification['classificationName']) .
            "' title='View our " . $classification['classificationName'] . " lineup of vehicles'>"
            . $classification['classificationName'] . "</a></li>";
    }
    $navList .= '</ul>';

    return $navList;
}