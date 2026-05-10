<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voornaam = trim($_POST['voornaam']);
    $tussenvoegsel = trim($_POST['tussenvoegsel']);
    $achternaam = trim($_POST['achternaam']);
    $geboortedatum = $_POST['geboortedatum'];
    $straatnaam_nummer = trim($_POST['straatnaam_nummer']);
    $postcode = trim($_POST['postcode']);
    $woonplaats = trim($_POST['woonplaats']);
    $akkoord = isset($_POST['akkoord']) ? 1 : 0;

    if (
        empty($voornaam) ||
        empty($achternaam) ||
        empty($geboortedatum) ||
        empty($straatnaam_nummer) ||
        empty($postcode) ||
        empty($woonplaats) ||
        $akkoord != 1
    ) {
        die("Vul alle verplichte velden correct in.");
    }

    $stmt = $conn->prepare("INSERT INTO nieuwsbrief_aanvragen 
        (voornaam, tussenvoegsel, achternaam, geboortedatum, straatnaam_nummer, postcode, woonplaats, akkoord)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "sssssssi",
        $voornaam,
        $tussenvoegsel,
        $achternaam,
        $geboortedatum,
        $straatnaam_nummer,
        $postcode,
        $woonplaats,
        $akkoord
    );

    if ($stmt->execute()) {
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "Fout bij opslaan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>