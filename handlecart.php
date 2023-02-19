

<?php 

    session_start();
    include('config/dbcon.php');
   
    
    
    if (isset($_SESSION['auth'])) {
       
          
        if (isset($_POST['scope'])) {
            
            $scope=$_POST['scope'];
            switch ($scope) {
                case "add":
                    $prodId=$_POST['prod_id'];
                    $prodQty=$_POST['prod_qty'];
                    
                    
                    $userId=$_SESSION['auth_user']['user_id'];
                    
                    
                    try{
                        $InsertQuery="INSERT INTO carts(user_id,prod_id,prod_qty)VALUES('$userId','$prodId','$prodQty')";
                        $InsertQueryRun=mysqli_query($connexion,$InsertQuery);
                    }
                    catch(PDOException $e){
                        echo 'L erreur est' .$e->getMessage();
                    }
                    
                    if ($InsertQueryRun) {
                        
                        echo 201;
                    }
                    else{
                        echo 500;
                    }

                    break;
                
                default:
                    echo 500;
                    break;
            }
    
        }
    }
    else {
        echo 501;
        
    }
    
?>