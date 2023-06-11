<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Add Classification</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,200;1,100&display=swap" rel="stylesheet">
</head>

<div class="main-card">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/header.php'; ?>

    <div class="internal-card">

        <h1>Add Classification</h1>

        <div class="messageSuccessOrError">
            <?php
                if (isset($message)) {
                echo $message;
                }
            ?>
        </div>

        <form method="post" action="/starter-assets/phpmotors/vehicles/index.php">

            <span class="explan-password">The Classification Name is limited to 30 characters</span><br> 
            <label for="classificationName">Classification Name </label><br>
            <input type="text" name="classificationName" id="classificationName" maxlength="30" required><br><br>
            
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="addClassification">
            <input type="submit" value="Add Classification">

            <br><br>
        </form>

        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/footer.php'; ?>
    </div>
</div>
<script>
    setTimeout(function() {
        var messageDiv = document.querySelector('.messageSuccessOrError');
        messageDiv.style.display = 'none';
    }, 7000); // 7 seconds in milliseconds
</script>