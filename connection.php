<?php
  SESSION_start();
  $bdd = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8;','root'); 
  if(isset($_POST['connection']))
  {
      if(!empty($_POST['email']) AND !empty($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);

        $recupUser = $bdd->prepare("SELECT * FROM connecter where email=? AND password=?");
       $recupUser->execute(array($email, $password));
       if($recupUser->rowCount() > 0)
      {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo"<a href=\"con et inscp.php\"><br><br> <h1>suivant</h1></a> ";
      }else
        {
          echo"veuilles verifier votre password ou email ou les deux";
        }
    } else
          {
            echo" tu dois remplir tout les champs";
                 
          }       
  }

    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
           <title> le page de connection </title>
           <meta charset="utf-8">
           <link rel="stylesheet" href="index2.css">
    </head>
    <body>
        <form method="post" action="" align="center">
            <label for="email">connecter avec votre email</label>
            <input type="email" name="email" id="email" step="any" placeholder="entrer votre email">
            <label for="password">entrer votre mot de passe</label>
            <input type="password" name="password" id="password" step="any" placeholder="mot de passe">
            <input type="submit" name="connection" value="connecter">
        </form>
    </body>
</html>