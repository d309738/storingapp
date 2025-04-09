<?php require_once __DIR__ . '../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__ . '/resources/views/components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__ . '/resources/views/components/header.php'; ?>

    <div class="container">
        <?php if (isset($_GET['msg'])) {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>
        <form action="/app/Http/Controllers/registerController.php" method="POST">

            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="password_check">Wachtwoord (controle):</label>
                <input type="password" name="password_check" id="password_check">
            </div>

            <input type="submit" value="Registreren">
        </form>

    </div>

</body>

</html>