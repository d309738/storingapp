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
        <form action="/app/Http/Controllers/loginController.php" method="POST">

            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" id="username">
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password">
            </div>

            <input type="submit" value="Login">
        </form>

    </div>

</body>

</html>