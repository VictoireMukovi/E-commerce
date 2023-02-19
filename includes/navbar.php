<?php //session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
          <div class="container">
            <a class="navbar-brand" href="index.php">E_Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="categories.php">Collections</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <?php 
                    if(isset($_SESSION['auth'])){
                      ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <?= $_SESSION['auth_user']['name'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><a class="dropdown-item" href="logout.php">Deconnexion</a></li>
                            </ul>
                         </li>
                    <?php 
                    }
                    else{
                      ?>
                           <li class="nav-item">
                           <a class="nav-link" href="registre.php">Inscription</a>
                           </li>
                           <li class="nav-item">
                            <a class="nav-link" href="login.php">Connexion</a>
                          </li>
                      <?php 
                    }
                ?>
                
                
              </ul>
            </div>
          </div>
        </nav>
  
</body>
</html>
