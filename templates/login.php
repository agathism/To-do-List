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
        <div class="login-box">
            <p>Connectez-Vous!</p>
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
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Connexion
                </button>
            </form>
            <p>Vous n'avez pas de compte? <a href="register.php" class="a2">S'inscrire</a></p>
        </div>
    </main>
</body>

</html>