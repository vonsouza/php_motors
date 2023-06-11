<?php
// Check if the user is not authenticated
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== TRUE) {
    header('Location: /starter-assets/phpmotors/accounts/index.php?action=home');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Vehicle Management</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,200;1,100&display=swap" rel="stylesheet">
</head>

<div class="main-card">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/header.php'; ?>

    <div class="internal-card">

        <h1>Vehicle Management</h1>

        <ul>
            <li>
                <a href="/starter-assets/phpmotors/vehicles/index.php?action=add-classification" title="Add Classification with PHP Motors">Add Classification </a>
            </li>
            <li> 
                <a href="/starter-assets/phpmotors/vehicles/index.php?action=add-vehicle" title="Add Vehicle with PHP Motors">Add Vehicle </a>
            </li>
        </ul>

        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/footer.php'; ?>
    </div>
</div>