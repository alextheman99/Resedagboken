<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
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
                        <li><a href="#myModal" class="trigger-btn" data-toggle="modal">Logga in</a></li>
                        <li><a class="aktuell" href="skapa_konto.php">Skapa konto</a></li>
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
                <form action="min_sida.php" class="kolumner" method="post">
                    <div>
                        <label>Förnamn</label>
                        <input class="form-control" type="text" name="fnamn" required>
                        <label>Efternamn</label>
                        <input class="form-control" type="text" name="enamn" required>
                        <label>Adress</label>
                        <input class="form-control" type="text" name="adress">
                        <label>Epost</label>
                        <input class="form-control" type="email" name="epost" required>
                        <label>Mobil</label>
                        <input class="form-control" type="text" name="mobil">
                        <button class="btn btn-primary login-btn" name="registrera">Registrera</button>
                    </div>
                    <div>
                        <label>Kön</label>
                        <select class="form-control" name="kon">
                            <option value="1">Man</option>
                            <option value="2">Kvinna</option>
                            <option value="3">Annat</option>
                        </select>
                        <label>Användarnamn</label>
                        <input class="form-control" type="text" name="anamn" required>
                        <label>Lösenord</label>
                        <input id="losen" class="form-control" type="password" name="losen" required>
                        <label>Upprepa lösenord</label>
                        <input id="ulosen" class="form-control" type="password" name="ulosen" required>
                    </div>
                </form>
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
        <script src="js/confirm.js"></script>
    </body>

    </html>
