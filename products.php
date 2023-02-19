<?php 
   include("config/dbcon.php");
    include('includes/header.php');
    //session_start();

   /* $categories_slug=$_GET['category'];
    $categories="SELECT * FROM categories WHERE status='0' AND slug='$categories_slug' LIMIT 1";
    $categoriesRun=mysqli_query($connexion,$categories); 
    $categoriesC=mysqli_fetch_array($categoriesRun);*/
    if ($_GET['category']) {
        
    
    $catId=$_GET['category'];
    $getProductByCategorie="SELECT * FROM produits WHERE categorie_id='$catId'AND status='0'";
    $getProductByCategorieRunQuery=mysqli_query($connexion,$getProductByCategorie);
    $icategoriesRun=mysqli_fetch_array($getProductByCategorieRunQuery);
 ?>
 <div class="py-3 bg-primary">
        <div class="container">
                <h6 class="center-white">
                    <a class="text-white" href="categories.php">Acceuil/</a>
                    <a class="text-white" href="categories.php"> Collections</a>
                     <?=$icategoriesRun['name']?></h6>
        </div>
 </div>
 <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                            
                        <h1><?=$icategoriesRun['name']?></h1>
                        <hr>
                    <div class="row">

                        <?php
                           /* $cproduits="SELECT * FROM produits WHERE status='0'";
                            $produitsRun=mysqli_query($connexion,$produits); */

                            if (mysqli_num_rows($getProductByCategorieRunQuery) > 0) {
                                foreach ($getProductByCategorieRunQuery as $item) {
                                    ?>
                                        <div class="col-md-3 md-2">
                                            <a href="products-view.php?product=<?=$item['id']?>">
                                                <div class="card shadow">
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <img src="uploads/<?=$item['image']?>" alt="Produits Image" class="w-100">
                                                            <h1 class="text-center"><?=$item['name']?></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php
                                }
                            }else{
                                echo "Il n'y a aucun produit pour cette categorie";
                            }
                        ?>
                    
                    </div>

                        

                </div>
                
                </div>
            
            </div>
        
        </div>
    
    </div>
    
    <?php include('includes/footer.php');
    }else {
        echo "L'Id categorie est introuvable";
    }
 ?>
   