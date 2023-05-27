<!DOCTYPE html>
<html lang="en">
    
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,200;1,100&display=swap" rel="stylesheet">
</head>

<div class="main-card">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/header.php'; ?>

    <div class="internal-card">
        <div class="login-card">

            <h1>Sign In</h1>

            <?php
                if (isset($message)) {
                echo $message;
                }
            ?>

            <form method="post" action="signin.php">
                <label for="clientEmail">Email:    </label>
                <input type="email" id="clientEmail" name="clientEmail" required><br><br>

                <label for="clientPassword">Password:</label>
                <input type="password" id="clientPassword" name="clientPassword" required><br><br>

                <input type="submit" value="Sign In"><br><br>
            </form>

            <p>Not a member yet? <a href="/starter-assets/phpmotors/accounts/index.php?action=registration">Sign up here</a></p>

        </div>
        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/footer.php'; ?>
    </div>
</div>