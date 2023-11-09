<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aaron Luciano - Photography</title>
    <meta name="author" content="Aaron Luciano">
    <meta name="description" content="Photography created by Aaron Luciano">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" media="(max-width: 810px)" href="css/custom-tablet.css?version=<?php print time(); ?>"
        type="text/css">
    <link rel="stylesheet" media="(max-width: 600px)" href="css/custom-phone.css?version=<?php print time(); ?>"
        type="text/css">
        
</head>

<div class="home-grid-container">
    <main class='item1'>
        <!--<h1><b>Aaron Luciano</b></h1>-->
        <figure>
            <img id='homeImage' alt="maggie" src="images/homeFigure.webp">
            <figcaption>Original Work - Aaron Luciano</figcaption>
        </figure>
    </main>

    <div class="item2">
        <?php
        include 'nav-home.php'
        ?>
    </div>
</div>

<?php
include 'footer.php';
?>