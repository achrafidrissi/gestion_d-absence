<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style_absence.css">
    <title>Gestion des Absences</title>
</head>

<body>
    <div class="container">
        <h1>Gestion des Absences</h1>
        <form action="#" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Code apogée</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Présence</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $bdd = new PDO('mysql:host=localhost;dbname=gestion_d\'absence', 'root', '');

                    $query = $bdd->query('SELECT * FROM liste_etudiant');
                    while ($etudiant = $query->fetch()) {
                        echo '<tr>';
                        echo '<td><img src="' . $etudiant['Photo'] . '" alt="Photo de l\'étudiant"></td>';
                        echo '<td>' . $etudiant['code_appogee'] . '</td>';
                        echo '<td>' . $etudiant['Prenom'] . '</td>';
                        echo '<td>' . $etudiant['Nom'] . '</td>';
                        echo '<td>
                                  <label><input type="checkbox" name="presence[' . $etudiant['id'] . ']" value="A"> A</label>
                                  <label><input type="checkbox" name="presence[' . $etudiant['id'] . ']" value="P"> P</label>
                        </td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <input type="submit" value="Enregistrer les Absences" class="submit-button" name="submit">
        </form>
        <a href="connexion.php" class="back-button">Retour</a>
    </div>
</body>

</html>


<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=gestion_d\'absence', 'root', "");

if (isset($_POST['submit'])) {
    //récupérer les valeurs des cases à cocher (checkboxes) du formulaire HTML qui ont le nom "presence".
    $absences = $_POST['presence'];
    // Enregistrez l'historique de l'appel
    $date_appel = date("Y-m-d");
    $classe = "GINF1"; // Remplacez par la classe réelle
    $heure_appel = date("H:i:s");
    $realise_par = "Elaidi idrissi achraf"; // Remplacez par l'utilisateur réel
    $nb_eleves_present = count(array_filter($absences, function($absence) { return $absence == 'P'; }));
    $nb_eleves_absents = count(array_filter($absences, function($absence) { return $absence == 'A'; }));
    $liste_presence = json_encode($absences);

    $query = $bdd->prepare("INSERT INTO historique_appel (date_appel, filiere, heure_appel, realise_par, nbr_present, nbr_absent, liste_presence) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$date_appel, $classe, $heure_appel, $realise_par, $nb_eleves_present, $nb_eleves_absents, $liste_presence]);
    header('Location: connexion.php');
}
?>
