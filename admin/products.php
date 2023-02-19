<?php
include('includes/header.php');
include('../config/dbcon.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Touts les produits</h4>
                </div>
                <div class="card-body" id="product_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $selectCat="SELECT * FROM produits";
                            $selectCatRunQuery=mysqli_query($connexion,$selectCat);

                            if(mysqli_num_rows($selectCatRunQuery) >0){

                                foreach($selectCatRunQuery as $item){
                                    ?>
                                    <tr>
                                        <td><?=$item['id']; ?></td>
                                        <td><?=$item['name']; ?></td>
                                        <td><img src="../uploads/<?=$item['image']; ?>" width="50px" height="50pd" alt="<?=$item['name']; ?>" /></td>
                                        <td><?=$item['status']=='0'?"Visible":"Cacher" ?></td>
                                        <td>

                                            <a href="editProduct.php?id=<?=$item['id']; ?>" class="btn btn-primary">Modifier</a>
                                           <!-- <form method="POST" action="categorieAction.php">
                                                <input type="hidden" name="IdProd" value="//$item['id']; ?>"/>
                                                <button class="btn btn-danger" name="btn_delete_product">Delete</button>
                                            </form>
                                            </td>-->
                                            <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?=$item['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else{
                                echo"Il n'y a rien comme categorie pour l'instant";
                            }
                        ?>
                        
                        </tbody>

                    </table>
                </div>
            
            </div>
        </div>
        </div>
    </div>
</div>

 <?php include('includes/footer.php');?>