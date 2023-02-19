<?php
session_start();
include("../config/dbcon.php");
    if(isset($_POST['btn_inscription'])){
        
        
        $name= mysqli_real_escape_string($connexion,$_POST['nom']);
        $phone= mysqli_real_escape_string($connexion,$_POST['phone']);
        $mail= mysqli_real_escape_string($connexion,$_POST['mail']);
        $password= mysqli_real_escape_string($connexion,$_POST['password']);
        $cpassword= mysqli_real_escape_string($connexion,$_POST['cpassword']);

        //Vérification si l'email existe

        $selectmail="SELECT * FROM users WHERE email='$mail'";
        $selectmailqueryrun= mysqli_query($selectmail);

        if(mysqli_num_rows($selectmailqueryrun<0)){
            if($password == $cpassword){
         
                //Insertions des infos des utilisateurs
                $insert_query="INSERT INTO users (name,email,phone,passwordd) VALUES('$name','$mail','$phone','$password')";
                $insert_query_run= mysqli_query($connexion,$insert_query);
    
                if($insert_query_run){
                    $_SESSION['message']="Compte crée avec succes";
                    header('Location : login.php ');
                }else{
                    $_SESSION['message']="Quelques choses s'est mal passé. Prière de réesayer";
                    header('Location : ../registre.php ');
                }
    
            
            }
            else{
                header('Location:../registre.php ');
                $_SESSION['message']="Choissisez un même mot de passe !";
    
            }
        }
        else{
            header('Location:../registre.php ');
             $_SESSION['message']="Impossible d'enregistrer cette utilisateur,car il existe déjà !";
        }
        


    }
    else if(isset($_POST['btn_connecter'])){
        
        $mail= mysqli_real_escape_string($connexion, $_POST['maill']);
        $password= mysqli_real_escape_string($connexion, $_POST['passwordd']);

        $loginquery="SELECT * FROM users WHERE email='$mail' AND passwordd='$password' ";
        $loginrunquery= mysqli_query($connexion,$loginquery);
        

        if(mysqli_num_rows($loginrunquery) > 0){
            
           
            $_SESSION['auth']=true;
            $user_data= mysqli_fetch_array($loginrunquery);

            $userId=$user_data['id'];
            $username=$user_data['name'];
            $usermail=$user_data['email'];
            $role_as=$user_data['role_as'];

            $_SESSION['auth_user']=[
                'user_id'=>$userId,
                'name'=>$username,
                'email'=>$usermail
            ];
            $_SESSION['role_as']=$role_as;
            $_SESSION['message']="Connecté avec Succès";
            

            //Pour differencier les administrateurs des autres clients
            if($role_as ==1){
                $_SESSION['message']="Bienvenue Mr l'Admin";
                header('Location:../admin/index.php'); 
            }
            else{
                $_SESSION['message']="Connecté avec Succès";
                header('Location:../index.php'); 
            }

            

        }
        else{
            $_SESSION['message']="Identités invalides";
            echo("Non trouvé");
            header('Location: ../login.php');
        }
    }
?>