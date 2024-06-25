<?php 

include_once "db/conn.php";

$_SESSION['error'] = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    $select = mysqli_query($conn,"SELECT * FROM `users` WHERE email='$email' AND password = '$password' ");
    if (mysqli_num_rows($select) === 1) {
        $row = mysqli_fetch_assoc($select);
        if ($row['email'] === $email && $row['password'] === $password) {
            $_SESSION['email'] = $email;
            header('location:admin.php');die();
        }
    } else {
        $_SESSION['error'] = "Mauvais email ou mot de passe";
    }
}

?>
?>


    <link href="css/login.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
  </head>

  <body class="text-center">
    
<main class="form-signin">
  <form method="POST" action="">
    <h1 class="h3 mb-3 fw-normal">AC BRAND</h1>
    <?php if ($_SESSION['error'] != "") : ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error']; ?>
        </div>
    <?php endif; ?>
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Adresse e-mail">
      <label for="floatingInput">Adresse e-mail</label>
    </div>
    <br>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
      <label for="floatingPassword">Mot de passe</label>
    </div>


    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Se connecter</button>

  </form>
</main>


    
  </body>
</html>
