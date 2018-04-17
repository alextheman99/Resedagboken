<?php
include_once '../../config_db/konfig_db_resedagboken.php';

// Vi försöker öppna en anslutningen mot vår databas
$conn = new mysqli($hostname, $user, $password, $database);

// Gick det bra att ansluta eller blev det fel?
if ($conn->connect_error) {
    die("<p>Ett fel inträffade: " . $conn->connect_error . "</p>");
}

// Tar emot data från formulär och rensar bort oönskade taggar eller kod
$anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
$losen = filter_input(INPUT_POST, "losen", FILTER_SANITIZE_STRING);

// Om data finns
if ($anamn && $losen) {

    $sql = "SELECT * FROM anvandare WHERE anamn = '$anamn'";

    // Nu kör vi vår SQL
    $result = $conn->query($sql);

    // Hämtar resultat från databassökningen
    $row = $result->fetch_assoc();

    // Kollar om lösenordet stämmer med password_verify()
    if (password_verify($losen, $row['hash'])) {
        echo "Ja";
        $_SESSION["loggedin"] = true;
    } else {
        echo "Nej";
    }
} else {
    echo "Nej";
}

// Stänger ned anslutningen
$conn->close();
