<?php 
   // include("config/dbcon.php");
    include('includes/header.php');
    //session_start();

 ?>
 <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                            <?php
                                        if(isset($_SESSION['message'])){
                                            //echo($_SESSION['message']);
                                            ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Eoo ! <?php echo($_SESSION['message']); ?></strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>

                                    <?php
                                        unset($_SESSION['message']);
                                        }
                                    ?>

                        <h1>Hello, world! <i class="fa fa-user"></i></h1>

                        <button class="btn btn-primary">Testing</button>

                </div>
                
                </div>
            
            </div>
        
        </div>
    
    </div>
    
    <?php include('includes/footer.php');
 ?>
   