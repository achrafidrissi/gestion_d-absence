<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style_liste_etudiants.css">
    <!-- Ajoutez le lien vers votre fichier CSS -->
    <title>Historique des Appels Réalisés</title>
</head>

<body>
    <div class="container">
        <h1>Historique des Appels Réalisés</h1>
        <!-- Tableau pour afficher l'historique -->
        <table>
            <thead>
                <tr>
                    <th>Date de l'appel</th>
                    <th>Classe</th>
                    <th>Appel réalisé à</th>
                    <th>Réalisé par</th>
                    <th>Nombre d'élèves présents</th>
                    <th>Nombre d'élèves absents</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=gestion_d\'absence', 'root', "");
                // Récupération de l'historique depuis la base de données
                $query_historique = $bdd->query("SELECT * FROM historique_appel ORDER BY date_appel DESC");
                $historique_appels = $query_historique->fetchAll(PDO::FETCH_ASSOC);

                // Affichage des données de l'historique
                foreach ($historique_appels as $appel) :
                ?>
                    <tr>
                        <td><?php echo $appel['date_appel']; ?></td>
                        <td><?php echo $appel['filiere']; ?></td>
                        <td><?php echo $appel['heure_appel']; ?></td>
                        <td><?php echo $appel['realise_par']; ?></td>
                        <td><?php echo $appel['nbr_present']; ?></td>
                        <td><?php echo $appel['nbr_absent']; ?></td>
                        <td><a href="liste_presence.php?id=<?php echo $appel['id']; ?>">Voir la liste de présence</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="connexion.php" class="back-button">Retour</a>
    </div>
</body>

</html>
