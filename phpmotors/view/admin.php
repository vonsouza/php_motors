<?php
$classificationList = '<select name="classificationId" id="classificationList">';
foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId) {
            $classificationList .= ' selected ';
        }
    }
    $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,200;1,100&display=swap" rel="stylesheet">
</head>

<div class="main-card">
    <?php 
    // include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/header-login.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/header.php';
    ?>

    <div class="internal-card">

        <h1>
            <?php
            echo $_SESSION ['clientData']['clientFirstname'] . ' ';
            echo $_SESSION ['clientData']['clientLastname'] ;
            ?>
        </h1>

        <span> You are logged in. </span>

        <ul>
            <li>First name: 
                <?php
                echo $_SESSION ['clientData']['clientFirstname'];
                ?>
            </li>
            <li>Last name: 
                <?php
                echo $_SESSION ['clientData']['clientLastname'] ;
                ?>
            </li>
            <li>Email: 
                <?php
                echo $_SESSION ['clientData']['clientEmail'] ;
                ?>
            </li>
            <li>clientLevel: 
                <?php
                echo $_SESSION ['clientData']['clientLevel'] ;
                ?>
            </li>
        </ul> 

        <?php 
        if($_SESSION ['clientData']['clientLevel'] == 2 || $_SESSION ['clientData']['clientLevel'] == 3 ){
            echo '<h2> Inventory Management </h2>' ;
            echo '<span> Use this link to manage the inventory. </span> <br><br>' ;
            echo '<a href="/starter-assets/phpmotors/vehicles/index.php?action=vehicleManagement" title="Vehicle Management with PHP Motors" id="vehicleManagement">Vehicle Management </a>' ;
        }
        ?>

        <!-- if level more than 1 -->
        <!-- <h2> Inventory Management </h2>

        <span> Use this link to manage the inventory. </span> <br><br>

        <a href="/starter-assets/phpmotors/vehicles/index.php?action=vehicleManagement" title="Vehicle Management with PHP Motors" id="vehicleManagement">Vehicle Management </a> -->

        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/footer.php'; ?>
    </div>
</div>