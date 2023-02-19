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
<?php
    //session_start();
        
        if(isset($_SESSION['auth'])){
            $_SESSION['message']="Vous etes toujours connectées";
            header('Location: index.php');
            exit();
        }
    
    include("includes/header.php");
 ?>
    <div class="py-5">
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <?php
                                        if(isset($_SESSION['message'])){
                                            //echo($_SESSION['message']);
                                            ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Eoo ! <?php echo($_SESSION['message']); ?></strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>

                                    <?php
                                        unset($_SESSION['message']);
                                        }
                                    ?>
                                <div class="card">
                                <div class="card header">
                                    <h1>Inscription   </h1>
                                </div>
                                <div class="card-boy">
                                    <form action="functions/authcode.php" method="POST">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"></label>
                                            <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label"></label>
                                            <input type="phone" class="form-control" name="phone" placeholder="Numero télphone">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label"></label>
                                            <input type="email" class="form-control" name="mail" placeholder="Entrez votre email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label"></label>
                                            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label"></label>
                                            <input type="password" class="form-control" name="cpassword" placeholder="Confirmer Mot de passe">
                                        </div>
                                        <button type="submit" class="btn btn-primary"name="btn_inscription">S'inscrire
                                        </button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
    </div>
        
  
    
   
    
    <!--
    <form action="functions/authcode.php" method="POST">
        
        <input type="text" placeholder="Nom" name="nom"><br>
        <input type="text" placeholder="Email" name="mail"><br>
        <input type="phone" placeholder="Tel" name="phone"><br>
        <input type="password" placeholder="Password" name="password"><br>
        <input type="password" placeholder="Confirm Password" name="cpassword"><br>
        <button type="submit" name="btn_inscription">Sign Up</button>
    </form> -->
</body>
</html>