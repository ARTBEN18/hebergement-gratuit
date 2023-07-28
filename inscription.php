<?php
SESSION_start();
$bdd = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8;', 'root');
if(isset($_POST["s'inscrire"]))
{
    if(!empty($_POST["nom"]) AND !empty($_POST["prenom"]) AND !empty($_POST["email"]) AND
    !empty($_POST["numero"]) AND !empty($_POST["password"]) AND !empty($_POST["password2"])
    AND !empty($_POST["text"]))
    {
    if($_POST['password'] == $_POST['password2'])
  
    {
        $nom=htmlspecialchars($_POST['nom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        $email=htmlspecialchars($_POST['email']);
        $numero=htmlspecialchars($_POST['numero']);
        $password=sha1($_POST['password']);
        $password2=sha1($_POST['password2']);
        $text=htmlspecialchars($_POST['text']);
         $insertUser = $bdd->prepare("INSERT INTO etudiant (nom, prenom, email, numero, password, password2, text)VALUES(?, ?, ?, ?, ?, ?, ?)");
        $insertUser->execute(array($nom, $prenom, $email, $numero, $password, $password2, $text));
       $insertUser = $bdd->prepare("INSERT INTO connecter(email, password)VALUES(?, ?)") ;
       $insertUser->execute(array($email, $password));
       $recupUser = $bdd->prepare("SELECT * FROM connecter where email=? AND password=?");
       $recupUser->execute(array($email, $password));
       if($recupUser->rowCount() > 0)
        {
           $_SESSION['email'] = $email;
           $_SESSION['password'] = $password;
        }
        echo"<a href=\"connection.php\"><br><br> <h1>suivant</h1></a> ";
       
    }else 
    {
       echo"confirmer votre password";
    }
  }else{
    echo "vueille completer tout les champs.....";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" href="inscription.css">
    </head>
<body>
<div class="formulaire">
    <div class="tet">
        <form action="" method="post">
        <label for="nom">Quel est votre nom</label><br><br>
        <input name="nom" id="nom" type="varchar" placeholder="entrer ton nom"><br><br>
        <label for="nom">Quel est votre prenom</label><br><br>
        <input name="prenom" type="varchar" id="prenom" placeholder="entrer ton prenom"><br><br>
        <label for="nom"> Entrer un email</label><br><br>
        <input name="email" type="email" id="email" placeholder="entrer ton email"><br><br>
    </div>
    <div class="corps">
         <label for="nom">Entrer un numero de telephone</label><br><br>
        <input name="numero" type="varchar" id="number phone" placeholder="entrer ton numero de tel"><br><br>
        <label for="nom">creer un mot de passe</label><br><br>
        <input name="password" type="password" id="password" placeholder="creer un password"><br><br>
        <label for="nom">confirmer votre mot de passe</label><br><br>
        <input name="password2" type="password" id="password" placeholder="confirmer le password"><br><br>
        <label for="nom">dit ce que vous pensez a propos de ce site .</label><br><br>
        <input name="text" type="text" id="text" placeholder="entrer votre text"><br><br>
    </div>
    <div class="pied">
         <br><br><br><input name="s'inscrire" type="submit" value="s'inscrire">
    </div>
</div>
  </form>
</body>
</html>