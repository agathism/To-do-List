<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <main>
        <div class="login-box">
            <p>Inscrivez-Vous!</p>
            <form>
                <div class="user-box">
                    <input type="text" name="username">
                    <label>Nom d'utilisateur</label>
                    <?php if (isset($errors["username"])) { ?>
                        <p class="text-danger">
                            <?= $errors["username"] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="user-box">
                    <input type="text" name="password">
                    <label>Mot de passe</label>
                    <?php if (isset($errors["password"])) { ?>
                        <p class="text-danger">
                            <?= $errors["password"] ?>
                        </p>
                    <?php } ?>
                </div>
                <button>
                    Inscription
                </button>
            </form>
            <p>Vous avez un compte? <a href="login.php" class="a2">Se connecter!</a></p>
        </div>
    </main>
</body>

</html>