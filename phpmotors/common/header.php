<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Home | PHP Motors</title>
    <link href="CSS/styles.css" type="text/css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width-device.width, initial-scale=1.0">
</head>

<body>
<div id="wrapper">
    <header>
        <div id="top-header">
            <img class="logo-image" src="/starter-assets/phpmotors/images/site/logo.png" alt="Logo PHP motors">
            <a class="my-account" href="/starter-assets/phpmotors/accounts/index.php?action=login" title="Login or Register with PHP Motors" id="acc">My Account </a>
        </div>
    </header>
    <nav>
        <!-- include $SERVER['DOCUMENT_ROOT'].'/phpmotors/common/nav.php';  -->
        <!--  include $SERVER['DOCUMENT_ROOT'].'/starter-assets/phpmotors/common/nav.php'; ?> -->
        <?php echo $navList; ?>
    </nav>
    <main>