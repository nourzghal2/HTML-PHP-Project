<html lang="en">
<head>
</head>
<body>
<a href="inscrit.php ">Back to connection </a>
<style>
    a{
        align="center";
    color:rgb(60, 52, 39);
    background-color:rgb(245, 240, 244);
    border:1px solid white;
text-decoration:none;
padding-bottom:5px;
padding-top: 5px;
padding-left: 10px;
padding-right: 10px;
font-size: 17px;

}
a:hover{
    color:black;
    background-color:rgb(154, 113, 161);
}

     </style>
</body>
<?php 
    include "../config.php";


    $bdd = config::getConnexion();
        if(!empty($_POST['password']) && !empty($_POST['password_repeat']) && !empty($_POST['token'])){
            $password = htmlspecialchars($_POST['password']);
            $password_repeat = htmlspecialchars($_POST['password_repeat']);
            $token = htmlspecialchars($_POST['token']);

            $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
            $check->execute(array($token));
            $row = $check->rowCount();

            if($row){
                if($password === $password_repeat){
                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                    $update = $bdd->prepare('UPDATE utilisateurs SET password = ? WHERE token = ?');
                    $update->execute(array($password, $token));
                    
                    $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
                    $delete->execute(array($token));

                    echo "Le mot de passe a bien été modifie";
                }else{
                    echo "Les mots de passes ne sont pas identiques";
                }
            }else{
                echo "Compte non existant";
            }
        }else{
            echo "Merci de renseigner un mot de passe";
        }
      