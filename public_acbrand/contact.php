<?php


include_once "db/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
  }
  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  }
  if (isset($_POST['sujette'])) {
    $sujette = $_POST['sujette'];
  }
  if (isset($_POST['message'])) {
    $message = $_POST['message'];
  }

  $update = mysqli_query($conn,"INSERT INTO `contacte`( `nom`, `email`, `sujette`, `message`) VALUES ('$nom','$email','$sujette','$message')");
  $_SESSION['error'] = " message a été envoyé. Merci Nous vous répondrons dans les plus brefs délais.";
  header('location:contact.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">


  <title>AC BRAND</title>


  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



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
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contactez-nous</a>
            <span class="sr-only">(current)</span>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="contact-page">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h1>Contactez-nous</h1>
          </div>

        </div>
        <div class="col-md-6">
          <?php if ($_SESSION['error'] != "") : ?>
            <div class="alert alert-danger" role="alert">
              <?= $_SESSION['error']; ?>
            </div>
          <?php endif; ?>
          <div id="map">


            <iframe src="https://www.google.com/maps/embed/v1/place?q=annaba&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-content">
            <div class="container">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-md-6">
                    <fieldset>
                      <input name="nom" type="text" class="form-control" id="nom" placeholder="Votre nom..." required="">
                    </fieldset>
                  </div>
                  <div class="col-md-6">
                    <fieldset>
                      <input name="email" type="email" class="form-control" id="email" placeholder="Votre email..." required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input name="sujette" type="text" class="form-control" id="sujette" placeholder="sujet..." required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Votre message..." required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <button type="submit" name="submit" id="form-submit" class="button">Envoyer le message</button>
                    </fieldset>
                  </div>
                  <div class="col-md-12">

                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>







  <div class="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            <p>Copyright &copy; 2024 AC BRAND


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





</body>

</html>