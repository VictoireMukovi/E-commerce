<?php
    include('config/dbcon.php');
  // session_start();
    function redirection($url,$message){
        header('Location:'.$url);
        $_SESSION['message']=$message;
        exit(0);
    }
    function getAll($table){
        global $connexion;
        $query="SELECT * FROM $table";
        return  $query_run=mysqli_query($connexion,$query);
        
    }
    function getByID($table,$id){
        global $connexion;
        $query="SELECT * FROM $table WHERE id='$id'";
        return  $query_run=mysqli_query($connexion,$query);
        
    }
    function getCartItems(){
        global $connexion;
        $id=$_SESSION['auth_user']['user_id'];
        $query="SELECT c.id as cid,c.prod_id,c.prod_qty,p.id as pid,p.name,p.image,p.sellings_price
        FROM carts c, produits p WHERE c.prod_id=p.id AND c.user_id='$id' ORDER BY c.id DES";
        return  $query_run=mysqli_query($connexion,$query);
        
    }
?>