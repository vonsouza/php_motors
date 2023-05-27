<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Vehicle</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,200;1,100&display=swap" rel="stylesheet">
</head>

<div class="main-card">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/header.php'; ?>

    <div class="internal-card">

        <h1>Add Vehicle</h1>

        <?php
            if (isset($message)) {
            echo $message;
            }
        ?>

        <p>*Note all Fields are required</p>

        <form method="post" action="/starter-assets/phpmotors/vehicles/index.php">
            <select class="custom-select" id="classificationId" name="classificationId">
                <option value="#" disabled selected>Choose Car Classification</option>
                <option value="2">Classic</option>
                <option value="3">Sport</option>
                <option value="1">SUV</option>
                <option value="4">Trucks</option>
                <option value="5">Used</option>
            </select><br><br>
    
            <label for="invMake">Make </label><br>
            <input type="text" name="invMake" id="invMake"><br><br>

            <label for="invModel">Model </label><br>
            <input type="text" name="invModel" id="invModel"><br><br>

            <label for="invDescription">Description </label><br>
            <textarea name="invDescription" id="invDescription" rows="3" cols="20"> </textarea><br><br>

            <label for="invImage">Image Path </label><br>
            <input type="text" name="invImage" id="invImage"><br><br>

            <label for="invThumbnail">Thumbnail Path </label><br>
            <input type="text" name="invThumbnail" id="invThumbnail"><br><br>

            <label for="invPrice">Price </label><br>
            <input type="text" name="invPrice" id="invPrice"><br><br>

            <label for="invStock">Stock </label><br>
            <input type="text" name="invStock" id="invStock"><br><br>

            <label for="invColor">Color </label><br>
            <input type="text" name="invColor" id="invColor"><br><br>

            <!-- <label for="classificationId">Classification Id </label ><br>
            <input type="text" name="classificationId" id="classificationId"><br><br> -->

            <!-- Add the action name - value pair -->
            

            <input type="submit" name="submit" value="Add Vehicle">

            <input type="hidden" name="action" value="registerVehicle">

            <br><br>
        </form>

        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/footer.php'; ?>
    </div>
</div>