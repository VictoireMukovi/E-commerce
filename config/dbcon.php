<?php
    //include("bd.php");
    //Creation de lq chaine de connexion
    $host="localhost";
    $username="root";
    $password="";
    $database="ecombd";



    
    $connexion= mysqli_connect($host,$username,$password,$database);

    if(!$connexion){
        die("Conexion échoué".mysqli_connect_error());
    }
    else{
       // echo("Connexion réussi avec succès");
    }

    
//Debut création table

?>
