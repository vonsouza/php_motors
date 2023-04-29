<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,200;1,100&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-card">
        <header>
            <img class="logo-image" src="images/site/logo.png" alt="Logo">
            <p class="my-account">My Account</p>
            <p></p>
            <nav>
                <a href="#">Home</a>
                <a href="#">Classic</a>
                <a href="#">Sports</a>
                <a href="#">SUV</a>
                <a href="#">Trucks</a>
                <a href="#">Used</a>
            </nav>
        </header>

        <div class="internal-card">
            <h1>Welcome to PHP Home Page</h1>
            <p>Group 6: Chima, Von and Karrass</p>

            <div class="container-img">
                <img class="delorean-img" src="images/delorean.jpg" alt="Imagem">
                <div class="text-0">DMC Delorean </div>
                <div class="text-1">3 Cup holders </div>
                <div class="text-2">Superman doors </div>
                <div class="text-3">Fuzzy dice </div>

                <img class="img-own_today" src="images/site/own_today.png" alt="own today">
            </div>

            <img class="big-img-own_today" src="images/site/own_today.png" alt="own today">

            <div class="container" id="container">
                <div class="child-container" id="child-container-1">
                    <h2 class="reviews-title">DCM Delaron Reviews </h2>
                    <ul>
                        <li> "So fast its almost like traveling in time." (4/5) </li>
                        <li> "Coolest ride on the road." (4/5) </li>
                        <li> "I'm feeling Marty McFly!"." (5/5) </li>
                        <li> "The most futuristic ride of our day." (4.5/5) </li>
                        <li> "80's living and I love it!" (5/5) </li>
                    </ul>
                </div>
                <div class="child-container" id="child-container-2">
                    <!-- cards  -->
                    <h2>Delaron Upgrades </h2>
                    <div class="cards">
                        <div class="card-external">
                            <div class="card">
                                <img src="images/upgrades/flux-cap.png" alt="flux cap">
                            </div>
                            <a href="#">Flux Capacitor</a>
                        </div>
                        <div class="card-external">
                            <div class="card">
                                <img src="images/upgrades/flame.jpg" alt="flame">
                            </div>
                            <a href="#">Flame Decals</a>
                        </div>
                        <div class="card-external">
                            <div class="card">
                                <img src="images/upgrades/bumper_sticker.jpg" alt="bumper sticker">
                            </div>
                            <a href="#">Bumper Sticker</a>
                        </div>
                        <div class="card-external">
                            <div class="card">
                                <img src="images/upgrades/hub-cap.jpg" alt="hub cap">
                            </div>
                            <a href="#">Hub Caps</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer>
                <div class="footer_motors">
                    <hr>
                    <p>&copy; PHP Motors. All Rights Reserved.</p>
                    <p>All images used are believed to be in "Fair Use". Please notify the author if any are not and they will be removed. </p>
                    <p class="last-update"> last Update: 30 Marc, 2018</p>
                </div>
            </footer>
        </div>
    </div>
</body>