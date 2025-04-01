<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <?php
    require_once("block/header.php");
    ?>
    <main>
        <div class="container">
            <form method="POST" action="index.php?action=register" class="form">
                <div class="title">Bienvenue,<br><span>inscrivez-vous pour continuer...</span></div>
                <input type="text" name="username" placeholder="Nom d'utilisateur" class="input">

                <?php if (isset($errors["username"])) { ?>
                    <p class="text-danger">
                        <?= $errors["username"] ?>
                    </p>
                <?php } ?>
                <input type="password"  name="password" placeholder="Mot de passe"class="input">
                <?php if (isset($errors["password"])) { ?>
                    <p class="text-danger">
                        <?= $errors["password"] ?>
                    </p>
                <?php } ?>
                <div class="login-with">
                </div>
                <button class="button-confirm">Inscription→</button>
                <?php if (isset($errors["login"])) { ?>
                    <p class="text-danger">
                        <?= $errors["login"] ?>
                    </p>
                <?php } ?>
                <p>Vous avez un compte? <br><a href="login.php" class="a2">Connectez-vous!</a></p>
            </form>
        </div>
    </main>
</body>

</html>