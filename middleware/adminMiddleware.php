<?php
//include("../functions/myfonctions.php");
//session_start();
    if(isset($_SESSION['auth'])){

        if($_SESSION['role_as']!= 1){
           // redirection('../index.php',"Vous n'etes pas autorisées d'acceder à cette page");
           header('Location:../index.php');
            $_SESSION['message']="Vous n'etes pas autorisées d'acceder à cette page";
        }

    }else{
       // redirection('../login.php',"Connectez-vous d'abord pour continuer");

        $_SESSION['message']="Connectez-vous d'abord pour continuer";
        header('Location:../login.php');
    }
?>