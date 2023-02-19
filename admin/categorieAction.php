<?php
//include("../config/dbcon.php");
include("../functions/myfonctions.php");
session_start();
    if(isset($_POST['btn_save'])){

        $nom=$_POST['name'];
        $slugs=$_POST['slugs'];
        $description=$_POST['description'];
        $meta_title=$_POST['meta_title'];
        $meta_description=$_POST['meta_description'];
        $meta_key_words=$_POST['meta_keywords'];
        $status=isset($_POST['status'])?'1':'0';
        $popular=isset($_POST['popular'])?'1':'0';
       /*
        $status=$_POST['status'];
        $popular=$_POST['popular'];*/

        $image=$_FILES['image']['name'];

        $paths="../uploads";
        $image_ext=pathinfo($image,PATHINFO_EXTENSION);
        $filename=time().'.'.$image_ext;
        //$test="Bjr";

        $insert_query="INSERT INTO categories(name,slug,description,status,popular,image,meta_title,meta_description,meta_keywords)
        VALUES('$nom','$slugs','$description','$status','$popular','$filename','$meta_title','$meta_description','$meta_key_words')";

        $insert_query_run= mysqli_query($connexion,$insert_query);
       // $categoriequeryRun=mysqli_query($connexion, $categoriequery) ;

        if($insert_query_run){
            move_uploaded_file($_FILES['image']['tmp_name'],$paths.'/'.$filename);
           /* header('Location:categories.php');
            $_SESSION['message']="Categorie ajouter avec succès";*/
            redirection("categories.php","Categorie ajouter avec succès");
        }else{
            header('Location:categories.php');
            $_SESSION['message']="Quelques choses s'est mal passeé";
        }
    }
    elseif (isset($_POST['btn_update_categorie'])) {
        $IdCategorie=$_POST['id_categorie'];
        $nom=$_POST['nameM'];
        $slugs=$_POST['slugsM'];
        $description=$_POST['descriptionM'];
        $meta_title=$_POST['meta_titleM'];
        $meta_description=$_POST['meta_descriptionM'];
        $meta_key_words=$_POST['meta_keywordsM'];
        $status=isset($_POST['statusM'])?'1':'0';
        $popular=isset($_POST['popularM'])?'1':'0';
       /*
        $status=$_POST['status'];
        $popular=$_POST['popular'];*/

        $Newimage=$_FILES['image']['name'];
        $oldImage=$_POST['old_image'];

        if($Newimage != ""){
            $updateFileName=$Newimage;
        }
        else{
            $updateFileName=$oldImage;
        }

        $updateCategorieQuery=" UPDATE categories SET name='$nom',slug='$slugs',description='$description',status='$status',popular='$popular',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_key_words',image='$updateFileName' WHERE id='$IdCategorie'";
        $updateRun=mysqli_query($connexion,$updateCategorieQuery);
      

        if ($updateRun) {
            $paths="../uploads";
            if ($_FILES['image']['name'] !="") {

                move_uploaded_file($_FILES['image']['tmp_name'],$paths.'/'.$Newimage);
                if (file_exists("../uploads/".$oldImage)) {
                   unlink("../uploads/".$oldImage);
                }
               /* header("Location: categories.php?id=$IdCategorie" );
                $_SESSION['message']="Categorie mis en jour avec succès";*/
                redirection("categories.php?id=$IdCategorie","Categorie mis en jour avec succès");
            }
           /* header("Location: categories.php?id=$IdCategorie" );
                $_SESSION['message']="Categorie mis en jour avec succès";*/
                redirection("categories.php?id=$IdCategorie","Categorie mis en jour avec succès");

        }
    }elseif (isset($_POST['btn_delete'])) {
       $categorieID=mysqli_real_escape_string($connexion,$_POST['IdCat']);
       $categoriequery="SELECT * FROM categories WHERE id='$categorieID'";
       $categorieRunQuery=mysqli_query($connexion,$categoriequery);
       $categorieData=mysqli_fetch_array($categorieRunQuery);
       $image=$categorieData['image'];

       if (file_exists("../uploads/".$image)) {
        unlink("../uploads/".$image);
     }
       $deleteQuery="DELETE FROM  categories WHERE id='$categorieID'";
       $deleteQueryRun=mysqli_query($connexion,$deleteQuery);

       if($deleteQueryRun){
       /* header('Location:categories.php');
        $_SESSION['message']="Categorie supprimmer avec succès";*/
        redirection("categories.php","Categorie supprimmer avec succès");
       }else {
       /* header('Location:categories.php');
        $_SESSION['message']="Quelques choses s'est mal passé";*/
        redirection("categories.php","Quelques choses s'est mal passé");

       }
    }
    elseif (isset($_POST['ajt_produit'])) {
       // $IdCategorie=$_POST['id_categorie'];
        $nom=$_POST['name'];
        $slugs=$_POST['slugs'];
        $description=$_POST['description'];
        $id_categorie=$_POST['id_categorie'];
        $small_description=$_POST['small_description'];
        $original_price=$_POST['original_price'];
        $selling_price=$_POST['selling_price'];
        $meta_title=$_POST['meta_title'];
        $meta_description=$_POST['meta_description'];
        $meta_key_words=$_POST['meta_keywords'];
        $quantite=$_POST['qty'];
        $status=isset($_POST['status'])?'1':'0';
        $trending=isset($_POST['trending'])?'1':'0';

        $image=$_FILES['image']['name'];
        $paths="../uploads";
        $image_ext=pathinfo($image,PATHINFO_EXTENSION);
        $filename=time().'.'.$image_ext;
        if ($nom !=""&& $description !="" && $small_description !="") {
            try{
                $insert_product_query="INSERT INTO produits(categorie_id,name,slug,small_description,description,original_price,sellings_price,image,quantity,status,trending,meta_title,meta_keywords,meta_description) VALUES('$id_categorie','$nom','$slugs','$small_description','$description','$original_price','$selling_price','$filename','$quantite','$status','$trending','$meta_title','$meta_key_words','$meta_description')";
                $insert_product_query_run=mysqli_query($connexion,$insert_product_query);

            }catch(Exception $e){
                echo 'Probleme rencontre' .$e->getMessage();
            }
            
    
            if ($insert_product_query_run) {
                move_uploaded_file($_FILES['image']['tmp_name'],$paths.'/'.$filename);
                $_SESSION['message']="Produit enregistré avec succes";
                header('Location:Addproducts.php');
            }else {
                $_SESSION['message']="Quelques choses s est mal passé";
                header('Location:Addproducts.php');
            }
        }
        else {
            $_SESSION['message']="Completer touts les champs d\'abord";
        }
       
        
    }
    elseif (isset($_POST['edit_produit'])) {
         $IdProduit=$_POST['id_produit'];
         $nom=$_POST['name'];
         $slugs=$_POST['slugs'];
         $description=$_POST['description'];
         $id_categorie=$_POST['id_categorie'];
         $small_description=$_POST['small_description'];
         $original_price=$_POST['original_price'];
         $selling_price=$_POST['selling_price'];
         $meta_title=$_POST['meta_title'];
         $meta_description=$_POST['meta_description'];
         $meta_key_words=$_POST['meta_keywords'];
         $quantite=$_POST['qty'];
         $status=isset($_POST['status'])?'1':'0';
         $trending=isset($_POST['trending'])?'1':'0';
 
         $Newimage=$_FILES['new_image']['name'];
         $oldImage=$_POST['old_image'];
 
         if($Newimage != ""){
             $updateFileName=$Newimage;
         }
         else{
             $updateFileName=$oldImage;
         }
 
         $updateCategorieQuery=" UPDATE produits SET name='$nom',slug='$slugs',small_description='$small_description',original_price='$original_price',description='$description',sellings_price='$selling_price',quantity='$quantite',status='$status',trending='$trending',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_key_words',image='$updateFileName' WHERE id='$IdProduit'";
         $updateRun=mysqli_query($connexion,$updateCategorieQuery);
       
         if ($updateRun) {
            $paths="../uploads";
            if ($_FILES['new_image']['name'] !="") {

                move_uploaded_file($_FILES['new_image']['tmp_name'],$paths.'/'.$Newimage);
                if (file_exists("../uploads/".$oldImage)) {
                   unlink("../uploads/".$oldImage);
                }
                header("Location: editProduct.php?id=$IdProduit" );
                $_SESSION['message']="Produit mis en jour avec succès";
            }
            header("Location: editProduct.php?id=$IdProduit" );
                $_SESSION['message']="Produit mis en jour avec succès";
        }
        
         
     }elseif (isset($_POST['delete_product_btn'])) {
        $categorieID=mysqli_real_escape_string($connexion,$_POST['product_id']);
        $categoriequery="SELECT * FROM produits WHERE id='$categorieID'";
        $categorieRunQuery=mysqli_query($connexion,$categoriequery);
        $categorieData=mysqli_fetch_array($categorieRunQuery);
        $image=$categorieData['image'];
 
        
        $deleteQuery="DELETE FROM  produits WHERE id='$categorieID'";
        $deleteQueryRun=mysqli_query($connexion,$deleteQuery);
 
        if($deleteQueryRun){
        /* header('Location:products.php');
         $_SESSION['message']="Produit supprimmer avec succès";*/
        // redirection("products.php","Produit supprimmer avec succès");
        if (file_exists("../uploads/".$image)) {
            unlink("../uploads/".$image);
         }
         echo 200;
        }else {
         /*header('Location:products.php');
         $_SESSION['message']="Quelques choses s'est mal passé";*/
        // redirection("products.php","Quelques choses s'est mal passé");
         echo 500;
        }
     }
    
?>