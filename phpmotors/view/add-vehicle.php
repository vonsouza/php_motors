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

        <p>*Note all Fields are required</p>

        <form method="post" action="/starter-assets/phpmotors/accounts/index.php">
            <select class="custom-select" id="cars" name="cars">
                <option value="0" disabled selected>Choose Car Classification</option>
                <option value="classic">Classic</option>
                <option value="sport">Sport</option>
                <option value="suv">SUV</option>
                <option value="trucks">Trucks</option>
                <option value="used">Used</option>
            </select><br><br>

            <label for="vehicleMake">Make    </label><br>
            <input type="text" name="vehicleMake" id="vehicleMake"><br><br>

            <label for="vehicleModel">Model    </label><br>
            <input type="text" name="vehicleModel" id="vehicleModel"><br><br>

            <label for="vehicleDescription">Description </label ><br>
            <textarea name="vehicleDescription" rows="3" cols="20"> </textarea><br><br>

            <label for="vehicleImagePath">Image Path </label ><br>
            <input type="text" name="vehicleImagePath" id="vehicleImagePath"><br><br>
            
            <label for="vehicleThumbnailPath">Thumbnail Path </label ><br>
            <input type="text" name="vehicleThumbnailPath" id="vehicleThumbnailPath"><br><br>

            <label for="vehiclePrice">Price </label ><br>
            <input type="text" name="vehiclePrice" id="vehiclePrice"><br><br>

            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="registerUser">

            <input type="submit" value="Add Vehicle">

            <br><br>
        </form>

        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/footer.php'; ?>
    </div>
</div>