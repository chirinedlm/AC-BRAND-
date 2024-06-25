<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande réussie</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container mt-5">
        <center>
            <div class="alert alert-success" role="alert">
                <h1>Votre demande a été envoyée</h1>
                <p>Vous serez contacté pour confirmer les informations</p>
            </div>
            <div>
                <form action="" method="POST">
                    <input class="form-control w-25" type="text" readonly required value="<?php echo $_SESSION['nom'] ?? ''; ?>" name="nom" placeholder="Nom et Prénom">
                    <br>
                    <input class="form-control w-25" type="number" readonly required value="<?php echo $_SESSION['numero'] ?? ''; ?>" name="phone" placeholder="Numéro de téléphone">
                    <br>
                    <input class="form-control w-25" type="text" readonly value="<?php echo $_SESSION['adresse'] ?? ''; ?>" required name="adresse" placeholder="L'adresse">
                    <br>
                    <div>
                        <select disabled readonly name="taille" required class="form-control w-25" aria-label="Default select example">
                            <option value="" disabled selected>Taille</option>
                            <option <?php echo (isset($_SESSION['taille']) && $_SESSION['taille'] == 'S') ? "selected" : ""; ?> value="S">S</option>
                            <option <?php echo (isset($_SESSION['taille']) && $_SESSION['taille'] == 'M') ? "selected" : ""; ?> value="M">M</option>
                            <option <?php echo (isset($_SESSION['taille']) && $_SESSION['taille'] == 'L') ? "selected" : ""; ?> value="L">L</option>
                            <option <?php echo (isset($_SESSION['taille']) && $_SESSION['taille'] == 'XL') ? "selected" : ""; ?> value="XL">XL</option>
                            <option <?php echo (isset($_SESSION['taille']) && $_SESSION['taille'] == '2XL') ? "selected" : ""; ?> value="2XL">2XL</option>
                            <option <?php echo (isset($_SESSION['taille']) && $_SESSION['taille'] == '3XL') ? "selected" : ""; ?> value="3XL">3XL</option>
                        </select>
                    </div>
                    <br>
                    <input class="form-control w-25" type="text" readonly value="<?php echo $_SESSION['quantity'] ?? ''; ?>" required name="quantity" placeholder="Quantité">
                    <br>
                </form>
            </div>
            <a class="btn btn-dark" href="index.php">Retour</a>
        </center>
    </div>
</body>

</html>
