<?php

//creation d'une bd
$serveur="localhost";
$login="root";
$pass="";
try{
$connexion= new PDO("mysql:host=localhost",$login,$pass);
//$connexion-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$connexion->exec("CREATE DATABASE IF NOT EXISTS ecombd");
echo'base des donnees creer';}
catch(PDOException $e){
	echo 'echec de la connection:' .$e->getMessage();
}
//Fin creation d'une bd

?>