<?php

include_once "db/conn.php";

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
            <a class="nav-link active" href="products.php">Des produits
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">À propos de nous</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="contact.php">Contactez-nous</a>
            <span class="sr-only">(current)</span>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="featured-page">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h1>Articles en vedette</h1>
          </div>
        </div>
        <div class="col-md-8 col-sm-12">

        </div>
      </div>
    </div>
  </div>

  <div class="featured container no-gutter">

    <div class="row posts">
      <?php 
      
      if(isset($_GET['id'])){
        $select = mysqli_query($conn, "SELECT * FROM `products` WHERE promo != ''");
      }else{
        $select = mysqli_query($conn, "SELECT * FROM `products`");
      }
      

      while ($row = mysqli_fetch_assoc($select)) :
      ?>
        <div id="1" class="item new col-md-4">

          <a href="single-product.php?id=<?= $row['id'] ?>">
            <div class="featured-item">
              <img height="450" src="produits/<?= $row['product_image']; ?>" alt="Item 1">
              <div class="card-footer">
             
      <small class="text-muted"><?= $row['product_prcie'];?> </small>


  

      <div class="float-right">
      <?php if($row['promo'] != null){?>
                <p style="text-decoration: line-through;"><?= $row['product_prcie']+$row['promo'];?> Da</p>
                <?php } ?>

      </div>

      <center>
      <a href="single-product.php?id=<?=  $row['id'];?>" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
</svg> Ajouter au panier</a>
      </center>
     
    </div>

  

      
            </div>
          </a>
        </div>
      <?php endwhile; ?>


    </div>
  </div>

  <div class="page-navigation">
    <div class="container">
      <div class="row">

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

  <style>
    img {
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }

    img:hover{
      -webkit-filter: grayscale(0%);
      filter: grayscale(0%);
    }
  </style>




  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/isotope.js"></script>





</body>

</html>