<?php
    include('includes/header.php');
    //include('../middleware/adminMiddleware.php');
    
?>
<link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
<div class="container">
    <div class="row">
        <div class="md-12">
        
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter Categories</h4>
                </div>
                
                        <div class="card-body">
                            <form action="categorieAction.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                        <label for="">Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Entrez le nom du categorie ">
                                </div>   
                                <div class="col-md-6">
                                        <label for="">Slugs</label>
                                        <input class="form-control" type="text" name="slugs" placeholder="Entrez le slug ">                            
                                </div>
                                <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea row="3" class="form-control" type="text" name="description" placeholder="Entrez le slug "> </textarea>                          
                                </div>
                                <div class="col-md-12">
                                        <label for="">Choisir Image</label>
                                        <input class="form-control" type="file" name="image" placeholder="Choisir image">  
                                </div>
                                <div class="col-md-12">
                                        <label for="">Meta Title</label>
                                        <input class="form-control" type="text" name="meta_title" placeholder="Entrez meta title">  
                                </div>
                                <div class="col-md-12">
                                        <label for="">Meta Description</label>
                                        <input class="form-control" type="text" name="meta_description" placeholder="Entrez meta description">  
                                </div>
                                <div class="col-md-12">
                                        <label for="">Meta Keywords</label>
                                        <input class="form-control" type="text" name="meta_keywords" placeholder="Entrez meta Keywords">  
                                </div>
                                <div class="col-md-6">
                                        <label for="">Status</label>
                                        <input  type="checkbox" name="status" placeholder="Entrez meta Keywords">  
                                </div>
                                <div class="col-md-6">
                                        <label for="">Populars</label>
                                        <input  type="checkbox" name="popular" placeholder="Entrez meta Keywords">  
                                </div>
                                <div class="col-md-12">
                                    
                                        <button class="btn btn-primary" type="submit" name="btn_save" > Ajouter</button>
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