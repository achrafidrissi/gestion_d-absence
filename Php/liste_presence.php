<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style_liste_etudiants.css">
    <title>Liste de Présence</title>
</head>

<body>
    <div class="container">
        <?php
        session_start();
        $bdd = new PDO('mysql:host=localhost;dbname=gestion_d\'absence', 'root', "");

        // Assurez-vous que l'identifiant de l'appel est défini et n'est pas vide
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $appel_id = $_GET['id'];

            // Récupérez la liste de présence spécifique depuis la base de données
            $query_liste_presence = $bdd->prepare("SELECT * FROM historique_appel WHERE id = ?");
            $query_liste_presence->execute([$appel_id]);
            $historique_appel = $query_liste_presence->fetch(PDO::FETCH_ASSOC);

            if ($historique_appel) {
                $liste_presence = json_decode($historique_appel['liste_presence'], true);
        ?>
                <h2>Liste de Présence</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Code appogee</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Présence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($liste_presence as $etudiant_id => $presence) {
                            // Récupérez les informations de l'étudiant depuis la base de données
                            $query_etudiant = $bdd->prepare("SELECT * FROM liste_etudiant WHERE id = ?");
                            $query_etudiant->execute([$etudiant_id]);
                            $etudiant = $query_etudiant->fetch(PDO::FETCH_ASSOC);

                            echo '<tr>';
                            echo '<td><img src="' . $etudiant['Photo'] . '" alt="Photo de l\'étudiant"></td>';
                            echo '<td>' . $etudiant['code_appogee'] . '</td>';
                            echo '<td>' . $etudiant['Nom'] . '</td>';
                            echo '<td>' . $etudiant['Prenom'] . '</td>';
                            echo '<td>' . ($presence == 'A' ? 'Absent' : 'Présent') . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
        <?php
            } else {
                echo '<p>Aucune liste de présence trouvée pour cet appel.</p>';
            }
        } else {
            echo '<p>Identifiant de l\'appel non spécifié.</p>';
        }
        ?>
        <a href="historique.php" class="back-button">Retour</a>
    </div>
</body>

</html>

