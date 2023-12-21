<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/style_ajout.css">
  <title>Ajouter un Élève</title>
</head>
<body>
  <div class="container">
    <h1>Ajouter un Élève</h1>
    <form action="#" method="post" enctype="multipart/form-data">
      <label for="cne">Code Apogée :</label>
      <input type="text" id="cne" name="cne" required>

      <label for="pseudo">Pseudo :</label>
      <input type="text" id="pseudo" name="pseudo" required>

      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom" name="prenom" required>

      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required>

      <label for="email">Email :</label>
      <input type="email" id="email" name="email" required>

      <label for="dateNaissance">Date de Naissance :</label>
      <input type="date" id="dateNaissance" name="dateNaissance" required>

      <label for="ville">Ville :</label>
      <input type="text" id="ville" name="ville" required>

      <label for="tele">Téléphone :</label>
      <input type="tel" id="tele" name="tele" required>

      <label for="photo">Photo :</label>
      <input type="file" id="photo" name="photo" required>

      <input type="submit" value="Ajouter" name="Ajout">
      <input id="a" type="reset" value="Annuler" name="Annuler">
    </form>
  </div>
</body>
</html>

<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=gestion_d\'absence','root',"");
    if(isset($_POST['Ajout'])){
        $file_name = $_FILES['photo']['name'];
        $file_extension = strrchr($file_name,'.');//Cette ligne utilise la fonction strrchr() pour trouver la dernière occurrence du caractère point (.) dans le nom du fichier
        $file_tmp_name = $_FILES['photo']['tmp_name'];//['tmp_name']: C'est la clé qui permet d'accéder au nom du fichier temporaire sur le serveur. Il est utilisé pour traiter le fichier avant de le déplacer vers son emplacement final.
        $extension_autorise = array('.PNG','.png','.jpeg','.JPEG','.jpg');
        $file_dest = '../files/'.$file_name;
        if(in_array($file_extension,$extension_autorise)){
            if(move_uploaded_file($file_tmp_name,$file_dest)){//La fonction move_uploaded_file en PHP est utilisée pour déplacer un fichier téléchargé vers un emplacement spécifié sur le serveur. Elle prend deux paramètres : le nom du fichier temporaire sur le serveur ($file_tmp_name) et le chemin de destination où tu souhaites stocker le fichier ($file_dest).
            $code = htmlspecialchars($_POST['cne']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $email = htmlspecialchars($_POST['email']);
            $date = htmlspecialchars($_POST['dateNaissance']);
            $ville = htmlspecialchars($_POST['ville']);
            $telephone = htmlspecialchars($_POST['tele']);
            $photo = $file_dest;
            $insert_user = $bdd->prepare('INSERT INTO liste_etudiant(Pseudo,Prenom,Nom,Email,Date,Ville,Telephone,Photo,code_appogee) VALUES(?,?,?,?,?,?,?,?,?)');
            $insert_user->execute(array($pseudo,$prenom,$nom,$email,$date,$ville,$telephone,$photo,$code));
            header('Location: connexion.php');
            }
            else{
                echo "Une erreur est survenu lors de l'envoi de fichier ";
            }
        }
        else{
            echo "L'extension ".$file_extension."n'est pas autorisé";
        }
        
    }
?>







