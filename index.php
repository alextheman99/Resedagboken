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
                           echo "<li><a class=\"aktuell\" href=\"#\">Min sida</a></li>";
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
            <main class="kolumner">
                <img src="images/mathew-schwartz-354703-unsplash.jpg" alt="Exempel på resa">
                <div>
                    <h2>På besök i ett tempel</h2>
                    <p>Lorem ipsum dolor amet literally flannel coloring book kickstarter 3 wolf moon pok pok. Polaroid iceland drinking vinegar salvia keytar heirloom gentrify health goth hell of adaptogen edison bulb pour-over echo park gluten-free master cleanse. Church-key prism irony authentic pitchfork kinfolk. Portland cardigan single-origin coffee keytar coloring book, listicle bicycle rights kogi. Forage jianbing photo booth everyday carry ugh, readymade bushwick bicycle rights selvage sriracha kinfolk hashtag slow-carb ennui. Direct trade chillwave vexillologist chicharrones gluten-free.</p>
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
    </body>

    </html>
