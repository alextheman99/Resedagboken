<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
    header("Location: index.php");
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
    </head>
    <?php
    include '../../config_db/konfig_db_resedagboken.php';

    /* Ta emot data från skapa_konto.php och lagra i databasen */
    /* Ta emot inloggningsuppgifter och kolla om korrekt */
    /* Visa medlemssidan */

    // Vi försöker öppna en anslutningen mot vår databas
    $conn = new mysqli($hostname, $user, $password, $database);

    // Gick det bra att ansluta eller blev det fel?
    if ($conn->connect_error) {
        die("<p>Ett fel inträffade: " . $conn->connect_error . "</p>");
    }

    if (isset($_POST["registrera"])) {

        // Tar emot data från formulär och rensar bort oönskade taggar eller kod
        $fnamn = filter_input(INPUT_POST, "fnamn", FILTER_SANITIZE_STRING);
        $enamn = filter_input(INPUT_POST, "enamn", FILTER_SANITIZE_STRING);
        $adress = filter_input(INPUT_POST, "adress", FILTER_SANITIZE_STRING);
        $epost = filter_input(INPUT_POST, "epost", FILTER_SANITIZE_STRING);
        $mobil = filter_input(INPUT_POST, "mobil", FILTER_SANITIZE_STRING);
        $kon = filter_input(INPUT_POST, "kon", FILTER_SANITIZE_STRING);
        $anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
        $losen = filter_input(INPUT_POST, "losen", FILTER_SANITIZE_STRING);

        // Om data finns skjut i databasen
        if ($fnamn && $enamn && $epost && $anamn && $losen) {

            $hash = password_hash($losen, PASSWORD_DEFAULT);

            // Registrera en ny användare
            $sql = "INSERT INTO anvandare
                    (fnamn, enamn, adress, epost, mobil, kon, anamn, hash) VALUES
                    ('$fnamn', '$enamn', '$adress', '$epost', '$mobil', '$kon', '$anamn', '$hash')";

            // Nu kör vi vår SQL
            $result = $conn->query($sql);

            // Gick det bra att köra SQL-kommandot?
            if (!$result) {
                die("<p>Det blev något fel i databasfrågan</p>");
            } else {
                /*echo "<p>Användaren är registrerad!</p>";*/
                $_SESSION["loggedin"] = true;
                $_SESSION["anamn"] = $anamn;
            }

            // Stänger ned anslutningen
            $conn->close();
        }
    }
?>

        <body>
            <div class="kontainer">
                <header>
                    <h1><a href="index.php">Resedagboken</a></h1>
                    <nav>
                        <ul>
                            <li><a class="aktuell" href="#">Min sida</a></li>
                            <li><a href="index.php?loggaut=1">Logga ut</a></li>
                            <li><a href="andras_resor.php">Andras resor</a></li>
                            <li>
                                <form>
                                    <input class="form-control" type="text" name="sok" placeholder="Sök">
                                </form>
                            </li>
                        </ul>
                    </nav>
                </header>
                <main class="kolumner_minsida">
                    <nav>
                        <h3><?php echo $_SESSION["anamn"] ?></h3>
                        <ul>
                            <li>
                                <a class="aktuell" href="">Mina resor</a>
                            </li>
                            <li>
                                <a href="">Skapa resa</a>
                            </li>
                            <li>
                                <a href="">Mina inlägg</a>
                            </li>
                            <li>
                                <a href="">Fotoalbum</a>
                            </li>
                            <li>
                                <a href="">Ladda upp</a>
                            </li>
                        </ul>
                    </nav>
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
