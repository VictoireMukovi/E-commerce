<?php 
   include("config/dbcon.php");
   include('includes/header.php');
   include('authenticate.php');
   

 ?>
 <div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
           <a href="index.php"class="text-white"> Acceuil/ 
            </a>

            <a href="cart.php"class="text-white"> Carts</a>
        <h6>
    </div>
 </div>
 <!-- <?php 
    // if ($_SESSION['auth']==true) {
    //     # code...
    
 ?> -->
 <div class="py-5">
        <div class="container">
            <div class="card card-body shadow">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="row align-items-center">
                                        <div class="col-md-5">
                                            <h6>Produits</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6>Prix</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <h6>Quantité</h6>
                                        </div>
                                        <div class="col-md-2">
                                            <h6>Remove</h6>
                                        </div>
                                        
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btnP">
                                <i class="fa fa-trash me-2"></i>Remove</button>
                        </div>
                        <?php 
                            $id=$_SESSION['auth_user']['user_id'];
                            
                            $query="SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.sellings_price
                            FROM carts c, produits p WHERE c.prod_id=p.id AND c.user_id='$id' ORDER BY c.id DESC";
                            
                        
                            $query_run=mysqli_query($connexion,$query);
                            
                            foreach ( $query_run as $citems) {
                                ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citems['image'] ?>"alt="Image" width="80px"/>
                                            </div>
                                            <div class="col-md-3">
                                                <h5><?= $citems['name'] ?></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>RS<?= $citems['sellings_price'] ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group mb-3" style="width:130px">
                                                    <button class="input-group-text decrement_btn">-</button>
                                                    <input type="text" class="form-control text-center input_qty bg-white"  value="<?= $citems['prod_qty'] ?>" disabled>
                                                    <button class="input-group-text increment_btn">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash me-2"></i>Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            
                            }

                        ?>

                    </div>
                    
                    </div>
                
                </div>
            </div>
        
        </div>
    
    </div>
    
    <?php
    // }
    // else {
    //     header('Location:login.php');
    //    // $_SESSION['message']=="Connectez-vous pour continuer";
    //    echo 201;
    // }
    include('includes/footer.php');
 ?>