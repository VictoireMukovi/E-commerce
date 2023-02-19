<?php 
   include("config/dbcon.php");
    include('includes/header.php');
    //session_start();

 ?>
 <div class="py-3 bg-primary">
    <div class="container"><h6 class="center-white">Acceuil/ Collections<h6></div>
 </div>
 <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                            
                        <h1>Our Collections</h1>
                        <hr>
                    <div class="row">

                        <?php
                            $categories="SELECT * FROM categories WHERE status='0'";
                            $categoriesRun=mysqli_query($connexion,$categories); 

                            if (mysqli_num_rows($categoriesRun) > 0) {
                                foreach ($categoriesRun as $item) {
                                    ?>
                                        <div class="col-md-3 md-2">
                                            <a href="products.php?category=<?=$item['id']?>">
                                                <div class="card shadow">
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <img src="uploads/<?=$item['image']?>" alt="Categories Image" class="w-100">
                                                            <h1 class="text-center"><?=$item['name']?></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php
                                }
                            }else{
                                echo "Il n'y a aucun categories";
                            }
                        ?>
                    
                    </div>

                        

                </div>
                
                </div>
            
            </div>
        
        </div>
    
    </div>
    
    <?php include('includes/footer.php');
 ?>
   