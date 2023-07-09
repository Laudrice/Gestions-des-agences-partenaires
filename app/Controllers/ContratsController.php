<?php
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire principal
    $numContrat = $_POST['num_contrat'];
    $dateContrat = $_POST['date_contrat'];
    $agc = $_POST['agc'];
    $adresseAgc = $_POST['adresse_agc'];
    $telAgc = $_POST['tel_agc'];
    $mailAgc = $_POST['mail_agc'];

    // Récupérer les données du tableau "terroir"
    $codeTerroir = $_POST['code_terroir'];
    $nomTerroir = $_POST['nom_terroir'];
    $salaireAgcParTerroir = $_POST['salaire_agc_par_terroir'];

    // Récupérer les données du tableau "intervention" et "prévision"
    $codeIntervention = $_POST['code_itv'];
    $libellePrevision = $_POST['libelle'];
    $prixUnitairePrevision = $_POST['prixUnitaire'];
    $quantitePrevision = $_POST['quantite'];

    // Connexion à la base de données (remplacez les valeurs par vos propres informations de connexion)
    $conn = new mysqli('localhost', 'root', '', 'gestion_fid');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die('Erreur de connexion à la base de données : ' . $conn->connect_error);
    }

    // Insérer les données du formulaire principal dans la table "contrat"
    $insertContratQuery = "INSERT INTO contrat (num_contrat, date_contrat, nom_agc, adresse_agc, tel_agc, mail_agc) VALUES ('$numContrat', '$dateContrat', '$agc', '$adresseAgc', '$telAgc', '$mailAgc')";
    $conn->query($insertContratQuery);

    // Récupérer l'ID du contrat inséré
    $contratId = $numContrat;

    // Calculer le total des prévisions par intervention
    $totalPrevisionsParIntervention = array();
    for ($i = 0; $i < count($codeIntervention); $i++) {
        $codeItv = $codeIntervention[$i];
        $libelle = $libellePrevision[$i];
        $prixUnitaire = $prixUnitairePrevision[$i];
        $quantite = $quantitePrevision[$i];
        $totalPrevision = $prixUnitaire * $quantite;
        $totalPrevisionsParIntervention[$codeItv][] = $totalPrevision;
    }

    // Insérer les données du tableau "terroir" et effectuer les calculs
    for ($i = 0; $i < count($codeTerroir); $i++) {
        $code = $codeTerroir[$i];
        $nom = $nomTerroir[$i];
        $salaire = $salaireAgcParTerroir[$i];

        // Insérer les données du tableau "terroir" dans la table correspondante
        $insertTerroirQuery = "INSERT INTO terroir (code_terroir, nom_terroir, salaire_agc) VALUES ('$code', '$nom', $salaire)";
        $conn->query($insertTerroirQuery);

        // Récupérer l'ID du terroir inséré
        $terroirId = $code;

        // Calculer le total des prévisions par terroir
        $totalPrevisionsParTerroir = 0;
        if (isset($totalPrevisionsParIntervention[$terroirId])) {
            $totalPrevisionsParTerroir = array_sum($totalPrevisionsParIntervention[$terroirId]);
        }

        // Mettre à jour le total des prévisions par terroir dans la table "terroir"
        $updateTerroirQuery = "UPDATE terroir SET total_prevision = $totalPrevisionsParTerroir WHERE code_terroir = '$terroirId'";
        $conn->query($updateTerroirQuery);

        // Insérer les données du tableau "intervention" et "prévision" dans la table correspondante
        for ($j = 0; $j < count($codeIntervention); $j++) {
            $codeItv = $codeIntervention[$j];
            $libelle = $libellePrevision[$j];
            $prixUnitaire = $prixUnitairePrevision[$j];
            $quantite = $quantitePrevision[$j];
            $totalPrevision = $prixUnitaire * $quantite;

            $insertInterventionQuery = "INSERT INTO intervention (code_terroir, code_itv, libelle) VALUES ('$terroirId', '$codeItv', '$libelle')";
            $conn->query($insertInterventionQuery);

            $interventionId = $codeItv;

            $insertPrevisionQuery = "INSERT INTO prevision (code_itv, prix_unitaire, quantite, total_prevision) VALUES ('$codeItv', $prixUnitaire, $quantite, $totalPrevision)";
            $conn->query($insertPrevisionQuery);
        }
    }

    // Calculer le total des salaires par contrat
    $totalSalairesParContrat = array_sum($salaireAgcParTerroir);

    // Mettre à jour le total des salaires par contrat dans la table "contrat"
    $updateContratQuery = "UPDATE contrat SET total_salaire = $totalSalairesParContrat WHERE num_contrat = '$contratId'";
    $conn->query($updateContratQuery);

    // Fermer la connexion à la base de données
    $conn->close();

    // Rediriger l'utilisateur vers une page de confirmation ou afficher un message de succès
    header('Location: confirmation.php');
    exit();
}
