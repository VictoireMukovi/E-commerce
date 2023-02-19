<?php
    include('includes/header.php');
    include('../middleware/adminMiddleware.php');
    include('../config/dbcon.php');
?>
<link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
<div class="container">
    <div class="row">
        <div class="md-12">
            
            <?php 
                if(isset($_GET['id'])) {
                    $id=$_GET['id'];

                    $query="SELECT * FROM categories WHERE id='$id'";
                    $queryRun=mysqli_query($connexion,$query);
                    if (mysqli_num_rows($queryRun)>0) {
                        $data=mysqli_fetch_array($queryRun);
                        ?>
             <div class="card">
                <div class="card-header">
                    <h4>Modifier Categories</h4>
                    <a href="categories.php" class="btn btn-primary float-end">Back<a>
                </div>
                
                        <div class="card-body">
                            <form action="categorieAction.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                        <input type="hidden" value="<?=$data['id']?>" name="id_categorie"/>
                                        <label for="">Name</label>
                                        <input value="<?=$data['name']?>" class="form-control" type="text" name="nameM" placeholder="Entrez le nom du categorie ">
                                </div>   
                                <div class="col-md-6">
                                        <label for="">Slugs</label>
                                        <input value="<?=$data['slug']?>" class="form-control" type="text" name="slugsM" placeholder="Entrez le slug ">                            
                                </div>
                                <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea row="3"  class="form-control" type="text" name="descriptionM" placeholder="Entrez le slug "> <?=$data['description']?> </textarea>                          
                                </div>
                                <div class="col-md-12">
                                        <label for="">Choisir Image</label>
                                        <input value="<?=$data['image']?>" class="form-control" type="file" name="image" placeholder="Choisir image">  
                                        <label for="">Image Actuel</label>
                                        <input  type="hiden"name="old_image" value="<?=$data['image']?>"/>
                                        <img src="../uploads/<?=$data['image']?>" height="50px"width="50px"/>
                                </div>
                                <div class="col-md-12">
                                        <label for="">Meta Title</label>
                                        <input value="<?=$data['meta_title']?>"class="form-control" type="text" name="meta_titleM" placeholder="Entrez meta title">  
                                </div>
                                <div class="col-md-12">
                                        <label for="">Meta Description</label>
                                        <input value="<?=$data['meta_description']?> "class="form-control" type="text" name="meta_descriptionM" placeholder="Entrez meta description">  
                                </div>
                                <div class="col-md-12">
                                        <label for="">Meta Keywords</label>
                                        <input value="<?=$data['meta_keywords']?>"class="form-control" type="text" name="meta_keywordsM" placeholder="Entrez meta Keywords">  
                                </div>
                                <div class="col-md-6">
                                        <label for="">Status</label>
                                        <input  type="checkbox" <?= $data['status']? "checked":"" ?> name="statusM" >  
                                </div>
                                <div class="col-md-6">
                                        <label for="">Populars</label>
                                        <input  type="checkbox" <?= $data['popular']? "checked":"" ?> name="popularM" >  
                                </div>
                                <div class="col-md-12">                                    
                                        <button class="btn btn-primary" type="submit" name="btn_update_categorie" >Modifier</button>
                                </div>
                            </div>
                            </form>
                        </div>
                
                
              </div>
                        

                        <?php 
                    }else{
                        echo"Aucun element trouvé";
                    }

                    

                    ?>
              
                <?php   
                }
                else{
                    //$_SESSION['message']="Quelques choses s'est mal passée";
                    echo("L'Id est manquant dans l'url");
                }
            ?>
            
        </div>
        </div>
    </div>
</div>

 <?php include('includes/footer.php');?>