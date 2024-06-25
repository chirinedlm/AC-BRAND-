<?php 
session_start();
$_SESSION['error'] = "";


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


    
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">

  </head>

  <body>


    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
      <a class="navbar-brand text-dark" href="login.php"><h3>AC brand</h3></a>
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
            <li class="nav-item active">
              <a class="nav-link " href="about.php">À propos de nous</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="contact.php">Contactez-nous</a>
              <span class="sr-only">(current)</span>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    
    
    <div class="about-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>À propos de nous

              </h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-image">
              <img src="assets/images/banner-bg.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4>AC BRAND</h4>
              <p><a href="">AC BRAND</a>
              Ac brand, une entreprise émergente vendant des vêtements pour femmes modernes, se distingue par ses designs innovants et ses matières de haute qualité. Fondée sur la passion de la mode et le désir de proposer des articles à la fois tendance et durables, la marque a rapidement gagné en popularité auprès des jeunes femmes à la recherche de pièces uniques. Chaque collection est soigneusement conçue pour offrir un mélange parfait de style et de confort, permettant à chaque cliente de se sentir élégante et à l'aise dans toutes les situations. De plus, Ac brand s'engage à adopter des pratiques éthiques et durables dans la production de ses vêtements, reflétant ainsi une conscience sociale et environnementale forte.   </p> 
              <br>
            

            </div>
          </div>
        </div>
      </div>
    </div>



    
    
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="assets/images/header-logo.png" alt="">
            </div>
          </div>
          <div class="col-md-12">
           
          </div>
          <div class="col-md-12">
            <div class="social-icons">
             
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


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
