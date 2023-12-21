<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style.css">
    <title>Acceuil</title>
</head>

<body>
    <form class="form" method="post">
        <div class="form__box">
            <div class="form__left">
                <div class="form__padding">
                    <img src="https://i.pinimg.com/originals/8b/44/51/8b4451665d6b2139e29f29b51ffb1829.png"
                        alt="Form Image" class="form__image">
                </div>
            </div>
            <div class="form__right">
                <div class="form__padding-right">
                    <form>
                        <h1 class="form__title">Login</h1>
                        <input type="text" placeholder="Username" class="form__email" name="username" required>
                        <input type="password" placeholder="Password" class="form__password" name="mdp" required>
                        <input type="submit" value="Login" name="submit" class="form__submit-btn">
                    </form>
</body>

</html>


<?php
    if(isset($_POST['submit'])){
        $bdd = new PDO('mysql:host=localhost;dbname=gestion_d\'absence','root',"");

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['mdp']);
        $request = $bdd->prepare('SELECT * FROM espace_prof WHERE username=? ');
        $request->execute([$username]);
        $user = $request->fetch();//Cette ligne récupère la première ligne du jeu de résultats sous la forme d'un tableau associatif. Chaque colonne de la ligne est un élément du tableau, avec les noms de colonnes comme clés. Si aucune ligne n'est trouvée, fetch() retournera false.
        if($user){
            if($password==$user['password']){
                header('Location: Php/connexion.php');
            }
            else{
                echo "Mot de passe incorrect";
            }
        }
        else{
            echo "Username incorrect";
        }
    }

?>