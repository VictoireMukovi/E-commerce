<?php
    include('includes/header.php');
    //include('../config/dbcon.php');
    include('../functions/myfonctions.php');
   // include('../middleware/adminMiddleware.php');
?>
<link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
<div class="container">
    <div class="row">
        <div class="md-12">
        
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter Produits</h4>
                </div>
                
                        <div class="card-body">
                            <form action="categorieAction.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                            
                                <div class="col-md-6">
                                        <label class="mb-0">Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Entrez le nom du produit ">
                                </div> 
                                <div class="col-md-6">
                                        <label class="mb-0">Selectionner le categories</label>
                                        <select class="form-select mb-2" name="id_categorie"> 
                                            <option selected>Selectionner le categorie</option>
                                            <?php 
                                           
                                            $categories=getAll("categories");
                                                if(mysqli_num_rows($categories)>0){
                                                    foreach ($categories as $item) {
                                                        ?>
                                                        <option value="<?= $item['id'];?>"><?= $item['name']; ?></option>
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
                                        <input class="form-control" type="text" name="slugs" placeholder="Entrez le slug ">                            
                                </div>
                                <div class="col-md-12">
                                        <label class="mb-0">Small Description</label>
                                        <textarea row="3" class="form-control mb-2" type="text" name="small_description" placeholder="Entrez une petite description "> </textarea>                          
                                </div>
                                <div class="col-md-12">
                                        <label class="mb-0">Description</label>
                                        <textarea row="3" class="form-control mb-2" type="text" name="description" placeholder="Entrez le slug "> </textarea>                          
                                </div>
                                <div class="col-md-6">
                                        <label class="mb-0">Original Price</label>
                                        <input row="3" class="form-control mb-2" type="text" name="original_price" placeholder="Original price">                          
                                </div>
                                <div class="col-md-6">
                                        <label class="mb-0">Selling Price</label>
                                        <input row="3" class="form-control mb-2" type="text" name="selling_price" placeholder="Selling price ">                           
                                </div>
                                <div class="col-md-12">
                                        <label class="mb-0">Choisir Image</label>
                                        <input class="form-control mb-2" type="file" name="image" placeholder="Choisir image">  
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="mb-0">Quantité</label>
                                            <input class="form-control mb-2" type="text" name="qty" placeholder="Quantité" required="required">  
                                    </div>
                                    <div class="col-md-3">
                                        <label class="mb-0">Status</label>
                                        <input  type="checkbox" name="status">  
                                    </div>
                                    <br>
                                    <div class="col-md-3">
                                            <label class="mb-0">Trending</label>
                                            <input  type="checkbox" name="trending">  
                                    </div>
                                    <br>
                                        
                                
                                </div>
                                <div class="col-md-12">
                                        <label class="mb-0">Meta Title</label>
                                        <input class="form-control mb-2" type="text" name="meta_title" placeholder="Entrez meta title">  
                                </div>
                                <div class="col-md-12">
                                        <label class="mb-0">Meta Description</label>
                                        <input class="form-control mb-2" type="text" name="meta_description" placeholder="Entrez meta description">  
                                </div>
                                <div class="col-md-12">
                                        <label class="mb-0">Meta Keywords</label>
                                        <input class="form-control mb-2" type="text" name="meta_keywords" placeholder="Entrez meta Keywords">  
                                </div>
                                
                                <div class="col-md-12">
                                    
                                        <button class="btn btn-primary" type="submit" name="ajt_produit" > Ajouter</button>
                                </div>
                            </div>
                            </form>
                        </div>
                
                
            </div>
        </div>
        </div>
    </div>
</div>

 <?php include('includes/footer.php');?>