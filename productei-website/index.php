<?php
$melding = "";

if (isset($_GET['success']) && $_GET['success'] == 1) {
    $melding = "Uw gegevens zijn opgeslagen!";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanvraag nieuwsbrief</title>
    <link rel="stylesheet" href="style/index.css">
</head>

<body>

<main class="container">

    <h1>Aanvraag nieuwsbrief</h1>

    <?php if ($melding): ?>
        <p class="success"><?php echo $melding; ?></p>
    <?php endif; ?>

    <form action="verwerken.php" method="POST">

        <section class="row">
            <input type="text" name="voornaam" placeholder="Wat is uw voornaam?" required>

            <input type="text" name="tussenvoegsel" placeholder="Heeft u een tussenvoegsel?">

            <input type="text" name="achternaam" placeholder="Wat is uw achternaam?" required>
        </section>

        <section class="row">
            <input type="date" name="geboortedatum" required>
        </section>

        <section class="row">
            <input type="text" name="straatnaam_nummer"
                   placeholder="Wat is uw straatnaam en nummer?" required>
        </section>

        <section class="row">
            <input type="text" name="postcode"
                   placeholder="Wat is uw postcode?"
                   required
                   pattern="[1-9][0-9]{3}\s?[A-Za-z]{2}">

            <input type="text" name="woonplaats"
                   placeholder="Wat is uw woonplaats?" required>
        </section>

        <section class="checkbox-row">
            <label>
                <input type="checkbox" name="akkoord" required>

                Ik ga akkoord met de voorwaarden zoals vermeld op de website!
            </label>
        </section>

        <button type="submit">Verzenden</button>

    </form>

</main>

</body>
</html>