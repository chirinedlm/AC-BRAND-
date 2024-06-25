<?php 
include_once "db/conn.php";

$_SESSION['error'] = "";
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <title>AC BRAND </title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      * {
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
      }
    
    </style>
  

   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand text-dark" href="login.php"><h3>AC brand</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
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
            <li class="nav-item ">
              <a class="nav-link" href="contact.php">Contactez-nous</a>
              <span class="sr-only">(current)</span>
            </li>
          </ul>
        </div>
      </div>
    </nav>

   
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="caption">
              <h2>Bienvenue au Magasin de AC BRAND</h2>
              <div class="line-dec"></div>
              <p>En présentant notre dernière collection, nous sommes fiers de présenter une gamme de vêtements pour femmes élégants et tendance.</p>
              <div class="main-button">
                <a href="products.php?id=99">Produits en promotion</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    


  <div class="card-group">
 <?php 
 $seelct = mysqli_query($conn,"SELECT * FROM `products` LIMIT 4");
 while($row = mysqli_fetch_assoc($seelct)):?>
 <a href="single-product.php?id=<?=  $row['id'];?>">
  <div class="card">
    <img src="produits/<?= $row['product_image'];?>" width="100%" height="550" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?= $row['product_name'];?></h5>
    </div>
    </a>
    <div class="card-footer">
      <small class="text-muted"><?= $row['product_prcie'];?> Da</small>

      <div class="float-right">
        
   
      </div>

      <center>
      <a href="single-product.php?id=<?=  $row['id'];?>" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
</svg> Ajouter au panier</a>
      </center>
     
    </div>
  </div>
  <?php endwhile; ?>
</div>

    
    <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Achetez avec nous et profitez d'offres et de réductions</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>Chaque jour, nous avons des réductions. Ne manquez pas l'opportunité</p>
              <div class="container">
                <form id="subscribe" action="" method="get">
                  <div class="row">
                    <div class="col-md-7">
            
                    </div>
                    <div class="col-md-5">
                      
                    </div>
                  </div>
                </form>
              </div>
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
              <p>Copyright &copy; 2024 AC BRANCD
                
              
            </div>
          </div>
        </div>
      </div>
    </div>
    


    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>





  </body>

</html>
