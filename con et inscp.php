<?php
SESSION_start();
echo $_SESSION['email'];
$bdd = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8;', 'root');
if(isset($_POST['bouton2']))
{
    if(!empty($_POST['image']))
    {
    $image=($_POST['image']);
    $insertUser = $bdd->prepare("INSERT INTO image (image) VALUES(?)");
    $insertUser->execute(array($image));
    $recupUser = $bdd->prepare("SELECT * FROM image where image=?");
    $recupUser->execute(array($image));
    if($recupUser->rowCount() > 0)
    {
        $_SESSION['image'] = $image;
    }
    echo $_SESSION['image'];
    }else {
        echo"vueille inserer une image";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="con et inscp.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page acueil</title>
</head>
<body>
    <div class="profile">
      <form action="" id="form" enctype="multipart/form-data" method="post">
        <label> profile </label>
        <input type="file" name="image" id="image" accept=".jpeg, .jpg, .png"> 
        <input type="submit" name="bouton2" value="ok">
      </form>
    </div>
    <header>
        <h1>ART BEN PRODUCTION</h1>
        <div class="a0">
            <a href="index.html">decconection</a>
        </div>
        </header>
        <nav>
            <div class="table">
                <ul>
                    <li class="a1">
                        <a href="index2.html"> Acceuil </a>
                    </li>
                    <li class="a2">
                        <a href="index3.html"> mon class</a>
                    </li>
                    <li class="a3">
                        <a href="index6.html">description</a>
                    </li>
                    <li class="a4">
                        <a href="index7.html">voir mon livre</a>
                     </li>
                </ul>
            </div>    
        </nav>
        <footer>
                  <P>copyright 2023 Art Ben Production toute reproduction interdite</P> 
        </footer>
    </body>
</html>
</body>
</html>