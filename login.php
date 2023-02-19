<?php 
include("includes/header.php");
    if(isset($_SESSION['auth'])){
        $_SESSION['message']="Vous etes toujours connectées";
        header('Location: index.php');
    }



?>

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
                        <h1>Connexion</h1>
                    </div>
                    <div class="card-boy">
                         <form action="functions/authcode.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label"></label>
                                <input type="email"name="maill" class="form-control"  placeholder="Entrez votre adresse mail">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"></label>
                                <input type="password" name="passwordd" class="form-control"  placeholder="Mot de passe">
                            </div>
                            <button type="submit" name="btn_connecter" class="btn btn-primary">Se Connecter
                            </button>
                        </form>
                    </div>
                </div>
                
                </div>
            
            </div>
        
        </div>
    
    </div>
    
</body>
</html>