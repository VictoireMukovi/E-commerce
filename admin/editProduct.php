<?php
    include('includes/header.php');
    //include('../config/dbcon.php');
    include('../functions/myfonctions.php');
    //include('../middleware/adminMiddleware.php');
?>
<link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
<div class="container">

    <div class="row">
        <div class="md-12">
        <?php
                    if (isset($_GET['id'])) {
                       $id=$_GET['id'];
                       $products=getByID("produits",$id);

                       if (mysqli_num_rows($products)>0) {
                           $prod=mysqli_fetch_array($products);
                           ?>
                        <div class="card">
                        <div class="card-header">
                            <h4>Modifier Produits</h4>
                            <a href="products.php" class="btn btn-primary float-end">Back<a>
                        </div>
                        
                                <div class="card-body">
                                    <form action="categorieAction.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                    
                                        <div class="col-md-6">
                                                <input type="hidden" value="<?=$prod['id']?>" name="id_produit"/>
                                                <label class="mb-0">Name</label>
                                                <input value="<?=$prod['name']?>" class="form-control" type="text" name="name" placeholder="Entrez le nom du produit ">
                                        </div> 
                                        <div class="col-md-6">
                                                <label class="mb-0">Selectionner le categories</label>
                                                <select value="<?=$prod['name']?>" class="form-select mb-2" name="id_categorie"> 
                                                    <option selected>Selectionner le categorie</option>
                                                    <?php 
                                                
                                                    $categories=getAll("categories");
                                                        if(mysqli_num_rows($categories)>0){
                                                            foreach ($categories as $item) {
                                                                ?>
                                                                <option value="<?= $item['id'];?>" <?= $prod['categorie_id']==$item['id']?'selected':''?> ><?= $item['name']; ?></option>
                                                                <?php
                                                            }
                                                        }else {
                                                            echo"Non categories";
                                                        }
                                                        
                                                        
                                                    ?>
                                                
                                                </select>
                                        </div>   
                                        <div class="col-md-6">
                                                <label class="mb-0">Slugs</label>
                                                <input class="form-control" type="text" name="slugs" placeholder="Entrez le slug "value="<?=$prod['slug']?>" >                            
                                        </div>
                                        <div class="col-md-12">
                                                <label class="mb-0">Small Description</label>
                                                <textarea row="3" class="form-control mb-2" type="text" name="small_description"  placeholder="Entrez une petite description "> <?=$prod['small_description']?></textarea>                          
                                        </div>
                                        <div class="col-md-12">
                                                <label class="mb-0">Description</label>
                                                <textarea row="3" class="form-control mb-2" type="text" name="description" placeholder="Entrez la description "><?=$prod['description']?> </textarea>                          
                                        </div>
                                        <div class="col-md-6">
                                                <label class="mb-0">Original Price</label>
                                                <input row="3" class="form-control mb-2" type="text" name="original_price" placeholder="Original price"value="<?=$prod['original_price']?>" >                          
                                        </div>
                                        <div class="col-md-6">
                                                <label class="mb-0">Selling Price</label>
                                                <input row="3" class="form-control mb-2" type="text" name="selling_price" placeholder="Selling price "value="<?=$prod['sellings_price']?>" >                           
                                        </div>
                                        <div class="col-md-12">
                                                <label class="mb-0">Image Actuel</label>
                                                <img src="../uploads/<?=$prod['image']?>" height="50px"width="50px"/><br>
                                                <label class="mb-0">Choisir Image</label>
                                                <input class="form-control mb-2" type="file" name="new_image" placeholder="Choisir image">  
                                                <input type="hidden" value="<?=$prod['image']?>" name="old_image" >
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <label class="mb-0">Quantité</label>
                                                    <input class="form-control mb-2" type="text" name="qty" placeholder="Quantité" required="required"value="<?=$prod['quantity']?>" >  
                                            </div>
                                            <div class="col-md-3">
                                                <label class="mb-0">Status</label>
                                                <input  type="checkbox" name="status" <?=$prod['status'] == '0'?'':'checked'?>>
                                            </div>
                                            
                                            <div class="col-md-3"> 
                                                    <label class="mb-0">Trending</label>
                                                    <input  type="checkbox" name="trending" <?=$prod['trending']=='0'?'':'checked'?>>  
                                            </div>
                                            <br>
                                                
                                        
                                        </div>
                                        <div class="col-md-12">
                                                <label class="mb-0">Meta Title</label>
                                                <input class="form-control mb-2" type="text" name="meta_title" placeholder="Entrez meta title"value="<?=$prod['meta_title']?>" >  
                                        </div>
                                        <div class="col-md-12">
                                                <label class="mb-0">Meta Description</label>
                                                <input class="form-control mb-2" type="text" name="meta_description" placeholder="Entrez meta description"value="<?=$prod['meta_description']?>" >  
                                        </div>
                                        <div class="col-md-12">
                                                <label class="mb-0">Meta Keywords</label>
                                                <input class="form-control mb-2" type="text" name="meta_keywords" placeholder="Entrez meta Keywords"value="<?=$prod['meta_keywords']?>" >  
                                        </div>
                                        
                                        <div class="col-md-12">
                                            
                                                <button class="btn btn-primary" type="submit" name="edit_produit" > Ajouter</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                
                
                    </div>

                   <?php
                       }
                       else {
                           echo "Url non valide";
                       }
                       
                        
                    }else {
                        echo"Id du  produit manquant dans l'Url";
                    }
        ?>
           
                
                
            </div>
            </div>
    </div>
</div>

 <?php include('includes/footer.php');?>