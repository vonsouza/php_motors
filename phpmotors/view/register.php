<head>
    <title>Register Page</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,200;1,100&display=swap" rel="stylesheet">
</head>

<div class="main-card">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/header.php'; ?>

    <div class="internal-card">
        <div class="login-card">

            <h1>Register In</h1>

            <form method="post" action="signin.php">
                <label for="clientFirstname">First Name:    </label>
                <input type="text" id="clientFirstname" name="clientFirstname" required><br><br>

                <label for="clientLastname">Last Name:    </label>
                <input type="text" id="clientLastname" name="clientLastname" required><br><br>

                <label for="clientEmailRegister">Email:    </label>
                <input type="email" id="clientEmailRegister" name="clientEmail" required><br><br>

                <p class="explan-password">The password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special caracter</p>
                <label for="clientPasswordRegister">Password: </label >
                <input type="password" id="clientPasswordRegister" name="clientPassword" required><br><br>

                <input type="button" class="btn-show-password" value="Show Password"><br><br>
                <input type="submit" value="Register"><br><br>
            </form>

        </div>
        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/starter-assets/phpmotors/common/footer.php'; ?>
    </div>
</div>