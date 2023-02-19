
<?php 
   include("config/dbcon.php");
    include("includes/header.php");
    //session_start();

   /* $categories_slug=$_GET['category'];
    $categories="SELECT * FROM categories WHERE status='0' AND slug='$categories_slug' LIMIT 1";
    $categoriesRun=mysqli_query($connexion,$categories); 
    $categoriesC=mysqli_fetch_array($categoriesRun);*/
    if ($_GET['product']) {
        
    
    $prodId=$_GET['product'];
    $getProduct="SELECT * FROM produits WHERE id='$prodId'";
    $getProductRunQuery=mysqli_query($connexion,$getProduct);
    $productRun=mysqli_fetch_array($getProductRunQuery);

    if ($productRun) {

        ?>
            <div class="py-3 bg-primary">
                <div class="container">
                        <h6 class="center-white">
                            <a class="text-white" href="categories.php">Acceuil/</a>
                            <a class="text-white" href="categories.php"> Collections</a>
                            <?=$productRun['name']?></h6>
                </div>
            </div>
            <div class="bg-light py-4">
                <div class="container product_data mt-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="shadow">                             
                               <img src="uploads/<?= $productRun['image'] ?>" alt="Product image"  class="w-100"/>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <h4 class="fw-bold"><?= $productRun['name'] ?>
                                <span class="float-end"><?php if ($productRun['trending']) {
                                    echo "Trending";
                                }  ?></span>
                            </h4>
                            <hr>
                            <p><?= $productRun['small_description'] ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Rs <span class="text-success"><?= $productRun['sellings_price'] ?></span></h5>
                                
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-danger">Rs <s><?= $productRun['original_price'] ?></s></h5>
                                
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    
                                    <div class="input-group mb-3" style="width:130px">
                                        <button class="input-group-text decrement_btn">-</button>
                                        <input type="text" class="form-control text-center input_qty bg-white"  value="1" disabled>
                                        <button class="input-group-text increment_btn">+</button>
                                    </div>
                                
                                </div>
                                
                                
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button class="btn btn-primary px-4 addToCartBtn" value="<?= $productRun['id'] ?>"><i class="fa fa-shopping-cart me-2"></i> Ajouter à la carte</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger px-4 addToFavoris"><i class="fa fa-heart me-2"></i> Ajouter aux favoris</button>
                                </div>
                            </div>
                            <hr>
                            <h6>Description du produit</h6>
                            <p><?= $productRun['description'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
           
        <?php
    }
    else {
        echo "Produit non valide";
    }
 ?>



     <?php include("includes/footer.php");
    }else {
        echo "L'Id du produit est introuvable";
    }
   // include('admin/includes/footer.php');
 ?>

