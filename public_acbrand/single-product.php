<?php
session_start();
include_once "db/conn.php";

$_SESSION['link'] = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$id' LIMIT 1");
}

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'] ?? '';
    $numero = $_POST['phone'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $quantity = $_POST['quantity'] ?? 1;
    $taille = $_POST['taille'] ?? '';

    while ($data = mysqli_fetch_assoc($select)) {
        $product_name = $data['product_name'];
        $product_prcie = $data['product_prcie'] * $quantity;
        $product_image = $data['product_image'];
        $q = $data['quantite'] - $quantity;

        if ($quantity > $data['quantite']) {
            $_SESSION['error'] = "La quantité dépasse le stock";
            header('location:single-product.php?id=' . $id);
            die();
        } else {
            $update = mysqli_query($conn, "UPDATE `products` SET `quantite`='$q' WHERE id = '$id'");
            
            // Construction de la requête SQL
            $insert_query = "INSERT INTO `orders` (`product_name`, `product_prcie`, `product_image`, `nom`, `numero`, `adresse`, `quantity`, `taille`) VALUES ('$product_name', '$product_prcie', '$product_image', '$nom', '$numero', '$adresse', '$quantity', '$taille')";
            
            // Affichage de la requête pour débogage
            echo $insert_query;
            
            $insert = mysqli_query($conn, $insert_query);
            
            if (!$insert) {
                die('Erreur SQL : ' . mysqli_error($conn));
            }

            // Stocker les données du formulaire dans des variables de session
            $_SESSION['nom'] = $nom;
            $_SESSION['numero'] = $numero;
            $_SESSION['adresse'] = $adresse;
            $_SESSION['quantity'] = $quantity;
            $_SESSION['taille'] = $taille;

            header('location:success.php');
            die();
        }
    }
}
?>




<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

  <title>AC BRAND</title>


  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <script src="assets/js/jquery.js"></script>


  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/tooplate-main.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/flex-slider.css">

</head>

<body>






  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand text-dark" href="login.php">
        <h3>AC brand</h3>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Des produits
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">À propos de nous</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contactez-nous</a>
            <span class="sr-only">(current)</span>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php if ($_SESSION['error'] != "") : ?>
    <div id="message" class="alert alert-danger" role="alert">
      <?= $_SESSION['error']; ?>
    </div>
  <?php endif; ?>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alerte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          La quantité de produit a expiré
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>

        </div>
      </div>
    </div>
  </div>



  <?php while ($row = mysqli_fetch_assoc($select)) : ?>

    <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1><?= $row['product_name']; ?></h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                  <li>
                    <img src="produits/<?= $row['product_image']; ?>" />
                  </li>


                </ul>
              </div>

            </div>
          </div>
          <div class="col-md-6">


            <div class="right-content">
              <h4><?= $row['product_name']; ?></h4>
              <h6><?= $row['product_prcie']; ?> Da</h6>
              <input type="hidden" name="product_prcie" id="product_prcie" value="<?= $row['product_prcie']; ?>">
              <p></p>

              <form action="single-product.php?id=<?= $id ?>" method="POST">
    <input class="form-control" type="text" required name="nom" placeholder="Nom et Prénom">
    <br>
    <input class="form-control" type="number" required name="phone" placeholder="Numéro de téléphone">
    <br>
    <input class="form-control" type="text" required name="adresse" placeholder="L'adresse">
    <br>
    <div>
        <select name="taille" required class="form-control" aria-label="Default select example">
            <option value="" disabled selected>Taille</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="2XL">2XL</option>
            <option value="3XL">3XL</option>
        </select>
    </div>
    <br>
    <h5 id="total"></h5>
    <div class="input-group w-25 mt-5">
        <input type="number" value="1" id="quantity" name="quantity" class="form-control" min="1" max="100">
    </div>
    <br>
    <hr>
    <?php if ($row['quantite'] == 0) {
        echo '<input class="button" value="Commandez maintenant!" data-toggle="modal" data-target="#exampleModal">';
    } else { ?>
        <input type="submit" name="submit" class="button" value="Commandez maintenant!">
    <?php } ?>
</form>

              <div class="down-content">





              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile;  ?>



















  <div class="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            <p> Copyright &copy; 2024 AC BRAND </p>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/isotope.js"></script>
  <script src="assets/js/flex-slider.js"></script>


  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>


</body>

</html>