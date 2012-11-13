<?php
    require_once('photobooth.inc.php');
    require_once('SimpleImage.class.php');

    killPTPCamera();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">


	<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.print.js"></script>
	<script src="js/nivo-slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
	<link rel="stylesheet" href="js/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
	<script type="text/javascript" src="js/script.js"></script>

	<link type="text/css" rel="stylesheet" media="all" href="css/style.css">

	<title>Webcam test</title>
</head>
<body class="">

	<div class="slider-wrapper">
        <div id="slider" class="nivoSlider">
            <?php
                // find all the images in the image folder
                if ($handle = opendir('images-small')) {
                    $images = array();
                    /* This is the correct way to loop over the directory. */
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != ".." && $entry != ".DS_Store") {
                            print "<img src='images-small/$entry' />";
                        }
                    }
                    closedir($handle);
                }
            ?>
        </div>
	</div>

    <div id="information" class="controller" >
        <div class="content">Druk op de groene knop om een foto te maken.</div>
        <div id="take-picture"><a href="#" class="green">Neem een foto!</a></div>
    </div>

    <div id="box">
        <div id="overlay-wrapper"></div>
        <div id="overlay">
            <div id="overlay-content">
                <div class="content">test met een overlay</div>
                <div class="close"><a href="#" id="close-overlay" class="red">close</a></div>
                <div class="accept"><a href="#" id="accept" class="green">accept</a></div>
            </div>
        </div>
    </div>

</body>
</html>
