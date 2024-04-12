<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DhillonFrieghtServices</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar">
        <div class="flex-vc flex-sb h-100p">
            <div class="nav-brand-image cursor-pointer flex-vc flex-hc">
                <img src="main-truck-logo.png" alt="" class="navbar-image">
            </div>
            <div class="nav-tabs">
                <ul class="flex-vc">
                    <li class="cursor-pointer">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="cursor-pointer">
                        <a href="career.php">Career</a>
                    </li>
                    <li class="cursor-pointer">
                        <a href="about.php">
                            About us
                        </a>
                    </li>
                    <li class="cursor-pointer">
                        <a href="Workasdriver.php">
                            Work as driver
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>


    <div class="h-100 three ourtrucks " id="trucks">
        <div class="videoSection">
            <iframe width="1600" height="315" src="https://www.youtube.com/embed/Ze23b-ZDac0?si=rlypP5yxZMhqdPcx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        <h1 class="text-center">Our Trucks</h1>
        <div class="box-section  flex-wrap">
            <img src="truck1.png.jpg" alt="" class="ourTrucks object-cover">
            <img src="truck2.png.jpg" alt="" class="ourTrucks object-cover">
            <img src="truck3.png.jpg" alt="" class="ourTrucks object-cover">
            <img src="truck4.png.png" alt="" class="ourTrucks object-cover">
            <img src="truck5.png.webp" alt="" class="ourTrucks object-cover">
            
        </div>
    </div>
</body>

</html>