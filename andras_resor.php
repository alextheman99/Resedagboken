<?php
session_start();
if (!isset($_SESSION["loggedin"]) || isset($_GET["loggaut"])) {
    $_SESSION["loggedin"] = false;
}
?>
    <!DOCTYPE html>
    <html lang="sv">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Resedagboken för dom ressugna</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/modal.css">
    </head>

    <body>
        <div class="kontainer">
            <header>
                <h1><a href="index.php">Resedagboken</a></h1>
                <nav>
                    <ul>
                        <?php
if (!$_SESSION["loggedin"]) {
    echo "<li><a href=\"#myModal\" class=\"trigger-btn\" data-toggle=\"modal\">Logga in</a></li>";
    echo "<li><a href=\"skapa_konto.php\">Skapa konto</a></li>";
} else {
    echo "<li><a class=\"aktuell\" href=\"min_sida.php\">Min sida</a></li>";
}
?>
                            <li><a href="#">Andras resor</a></li>
                            <li>
                                <form>
                                    <input class="form-control" type="text" name="sok" placeholder="Sök">
                                </form>
                            </li>
                    </ul>
                </nav>
            </header>
            <main>
                <div id="map">
                </div>
            </main>
            <footer class="kolumner">
                <div>
                    <h4>Info</h4>
                    <p>...</p>
                </div>
                <div>
                    <h4>Kontakt</h4>
                    <p>...</p>
                </div>
            </footer>
        </div>
        <?php
include "includes/inloggningsruta.php";
include "includes/frameworks.php";
?>
            <script src="js/login.js"></script>
            <script>
                function initMap() {
                    var bounds = new google.maps.LatLngBounds();
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 4,
                        center: {
                            lat: 48.864716,
                            lng: 2.349014
                        }
                    });
                    // Multiple Markers

                    var markers = [
                        ['Paris', 48.864716, 2.349014],
                        ['London Eye, London', 51.503454, -0.119562],
                        ['Vienna', 48.210033, 16.363449]
                    ];


                    // Loop through our array of markers & place each one on the map
                    for (i = 0; i < markers.length; i++) {

                        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                        bounds.extend(position);
                        marker = new google.maps.Marker({
                            position: position,
                            map: map,
                            title: markers[i][0]
                        });
                    }
                }

            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLj0FQepKTy7AsaZdXwDQ2WsW7HF_mFfg&callback=initMap">


            </script>
    </body>

    </html>
