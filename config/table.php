<?php
include("dbcon.php");
try{
    $users="CREATE TABLE IF NOT EXISTS `ecombd`.`users` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY , `name` VARCHAR(50) NOT NULL , `email` VARCHAR(25) NOT NULL , `phone` VARCHAR(15) NOT NULL , `password` VARCHAR(50) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP  ) ENGINE = InnoDB;  ";
    $categories="CREATE TABLE `ecombd`.`categories` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `name` VARCHAR(191) NOT NULL , `slug` VARCHAR(191) NOT NULL , `description` MEDIUMTEXT NOT NULL , `status` TINYINT NOT NULL DEFAULT '0' , `popular` TINYINT NOT NULL DEFAULT '0' , `image` VARCHAR(80) NOT NULL , `meta_title` VARCHAR(191) NOT NULL , `meta_description` MEDIUMTEXT NOT NULL , `meta_keywords` MEDIUMTEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB;  ";
    $produits ="CREATE TABLE `ecombd`.`produits` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `categorie_id` INT(11) NOT NULL , `name` INT(191) NOT NULL , `slug` INT(191) NOT NULL , `small_description` MEDIUMTEXT NOT NULL , `description` MEDIUMTEXT NOT NULL , `original_price` INT(11) NOT NULL , `sellings_price` INT(11) NOT NULL , `image` VARCHAR(191) NOT NULL , `quantity` INT(11) NOT NULL , `status` TINYINT(4) NOT NULL , `trending` TINYINT(4) NOT NULL , `meta_title` VARCHAR(191) NOT NULL , `meta_keywords` MEDIUMTEXT NOT NULL , `meta_description` MEDIUMTEXT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB; ";
    $cart="CREATE TABLE `ecombd`.`carts` ( `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `user_id` INT(11) NOT NULL , `prod_id` INT(11) NOT NULL , `prod_qty` INT(11) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB; ";
    
    $connexion->query($cart);
    $connexion->query($users);
    $connexion->query($categories);
    $connexion->query($produits);
    
    
    }
    catch(PDOException $e){
        echo 'echec de la connection:' .$e->getMessage();
    }
?>