<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style_liste_etudiants.css">
    <title>Liste des Étudiants</title>
</head>

<body>
    <div class="container">
        <h1>Liste des Étudiants</h1>
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Code Apogée</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Ville de Naissance</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connexion à la base de données
                    $bdd = new PDO('mysql:host=localhost;dbname=gestion_d\'absence', 'root', '');

                    // Récupération des données des étudiants depuis la base de données
                    $query = $bdd->query('SELECT * FROM liste_etudiant');
                    while ($etudiant = $query->fetch()) {
                        echo '<tr>';
                        echo '<td><img src="' . $etudiant['Photo'] . '" alt="Photo de l\'étudiant"></td>';
                        echo '<td>' . $etudiant['code_appogee'] . '</td>';
                        echo '<td>' . $etudiant['Prenom'] . '</td>';
                        echo '<td>' . $etudiant['Nom'] . '</td>';
                        echo '<td>' . $etudiant['Ville'] . '</td>';
                        echo '<td>' . $etudiant['Email'] . '</td>';
                        echo '<td>' . $etudiant['Telephone'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
        <a href="connexion.php" class="back-button">Retour</a>
        <a href="ajout.php" class="back-button">Ajouter un étudiant</a>
    </div>
</body>

</html>
