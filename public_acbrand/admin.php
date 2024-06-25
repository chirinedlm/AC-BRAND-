<?php 

include_once "db/conn.php";
$_SESSION['error'] = "";
if(isset($_POST['submit'])){
  if(isset($_POST['product_name'])){
    $product_name = $_POST['product_name'];
  }
  if(isset($_POST['product_prcie'])){
    $product_prcie = $_POST['product_prcie'];
  }

  if(isset($_POST['quantite'])){
    $quantite = $_POST['quantite'];
  }

  

  if (isset($_FILES['file'])) {
    $file = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_error = $_FILES['file']['error'];
    $fileExt = explode(".", $file);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array("jpg", "jpeg", "png", "svg");
    if (in_array($fileActualExt, $allowed)) {
        if ($file_error == 0) {
            if ($file_size < 600000000) {
                $new_name = time() . '.' . $fileActualExt;
                $target = "produits/" . $new_name;
                if (!empty($file)) {
                move_uploaded_file($_FILES['file']['tmp_name'],$target);
                $_SESSION['error'] = "Produit publié";
                $insert = mysqli_query($conn,"INSERT INTO `products`(`product_name`, `product_prcie`, `product_image`,`quantite`) VALUES ('$product_name','$product_prcie','$new_name','$quantite')");
                header('location:admin.php');
                }
            } else {
                $_SESSION['error'] =  "fichier trop gros";
            }
        } else {

            $_SESSION['error'] =  "Erreur dans votre fichier";
        }
    } else {
        $_SESSION['error'] =  "Erreur dans le type de fichier | accept: jpg , jpeg , png , svg";
    }
}


}


?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin - AC BRAND</title>
<link href="assets/dist/css/tooplate-main" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
  </head>
  <body class="bg-light">
    
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">AC BRAND</a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link" href="admin.php">les produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="demandes.php" >les demandes</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="message.php" >Message</a>
        </li>
       


       
      
      </ul>
      <form class="d-flex">
       
        <a href="logout.php"  class="btn btn-sm btn-danger">Déconnexion</a>
      </form>
    </div>
  </div>
</nav>

<div class="nav-scroller bg-body shadow-sm">
  <nav class="nav nav-underline" aria-label="Secondary navigation">
    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
    <a class="nav-link" href="#">
      Friends
      <span class="badge bg-light text-dark rounded-pill align-text-bottom">27</span>
    </a>
    <a class="nav-link" href="#">Explore</a>
    <a class="nav-link" href="#">Suggestions</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
  </nav>
</div>

<main class="container">
 

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Ajouter un produit</h6>
    <br>
    <?php if ($_SESSION['error'] != "") : ?>
        <div id="message" class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; ?>
        </div>
    <?php endif; ?>

    <script> $(function(){setTimeout(function() { $("#message").hide("slow");}, 3000);}); </script>

    <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
  <label for="formFile" class="form-label">Image du produit</label>
  <input class="form-control" name="file" type="file" id="formFile" required>
</div>

    <div class="d-flex text-muted pt-3">

    <input class="form-control" type="text" name="product_name" Placeholder="Nom du produit" required>
    </div>
    <div class="d-flex text-muted pt-3">

    <input class="form-control" type="text" name="product_prcie" Placeholder="Prix ​​du produit" required>
    </div>
    <br>

    <input required class="form-control" type="text" name="quantite" Placeholder="Quantité" required>
    



    <br>

    <button type="submit" name="submit" class="btn btn-primary">Publier le produit</button>
    </form>


  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Tous les produits (
      
      <?php 
        $select = mysqli_query($conn,"SELECT * FROM `products`");

        echo mysqli_num_rows($select);
         ?>
      
      )</h6>
  
    <table class="table table-light">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>Image du produit</th>
          <th>Nom du produit</th>
          <th>Prix ​​du produit</th>
          <th>Quantité</th>
        </tr>
      </thead>
      <tbody>
        <?php 
$i = 0;
$select = mysqli_query($conn,"SELECT * FROM `products` ORDER BY id DESC");
while($row = mysqli_fetch_assoc($select)){
$i++;
?>
        <tr>
          <td><?= $i; ?></td>
          <td><img src="produits/<?= $row['product_image']; ?>" width="50" alt=""></td>
          <td><?= $row['product_name']; ?></td>
          <td><?= $row['product_prcie']; ?> Da</td>
          <td><?= $row['quantite']; ?> </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
   
  
  </div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="offcanvas.js"></script>
  </body>
</html>
