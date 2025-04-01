<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php
    require_once("block/header.php");
    ?>
    <main>
        <div class="container">
            <form method="POST" action="index.php?action=login" class="form">
                <div class="title">Bienvenue,<br><span>connectez-vous pour continuer...</span></div>
                <input class="input" name="username" placeholder="Nom d'utilisateur" type="text">

                <?php if (isset($errors["username"])) { ?>
                    <p class="text-danger">
                        <?= $errors["username"] ?>
                    </p>
                <?php } ?>
                <input class="input" name="password" placeholder="Mot de passe" type="text">
                <?php if (isset($errors["password"])) { ?>
                    <p class="text-danger">
                        <?= $errors["password"] ?>
                    </p>
                <?php } ?>
                <div class="login-with">
                </div>
                <button type="submit" class="button-confirm">Connexion→</button>
                <?php if (isset($errors["login"])) { ?>
                    <p class="text-danger">
                        <?= $errors["login"] ?>
                    </p>
                <?php } ?>
                <p>Vous n'avez pas de compte? <a href="register.php" class="a2">S'inscrire!</a></p>
            </form>
        </div>
    </main>
</body>

</html>