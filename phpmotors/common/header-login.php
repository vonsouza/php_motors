<div id="wrapper">
    <header>
        <div id="top-header">
            <img class="logo-image" src="/starter-assets/phpmotors/images/site/logo.png" alt="Logo PHP motors">
            <?php
            // Check if the firstname cookie exists, get its value
            if (isset($_COOKIE['firstname'])) {
                $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                echo "<span class='my-account'></span>" . $cookieFirstname . '<a class="no-decoration" href="/starter-assets/phpmotors/accounts/index.php?action=home" title="Vehicle Management with PHP Motors" id="vehicleManagement"> | Logout xx </a>';
            
            }else{
                echo "<span class='my-account'></span>" . $_SESSION['clientData']['clientFirstname'] . '<a class="no-decoration" href="/starter-assets/phpmotors/accounts/index.php?action=home" title="Vehicle Management with PHP Motors" id="vehicleManagement"> | Logout </a>';
            }
        ?>
        </div>
    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>
</div>