<?php

namespace App\Controllers;

use App\Models\ContratModel;
use App\Models\TerroirModel;
use App\Models\PrevisionModel;
use App\Models\InterventionModel;
use App\Controllers\BaseController;

class ContratController extends BaseController
{
    public function index()
    {
        $contrat = new ContratModel();

        $data['contrats'] = $contrat->findAll();

        return view('contrats/index.php', $data);
    }

    public function create()
    {
        return view('contrats/create');
    }

    public function store()
    {
        $contrats = new ContratModel();

        // Récupérer les données du formulaire
        $nb_terroir = $this->request->getPost('nb_terroir');
        $nb_intervention = $this->request->getPost('nb_intervention');
        $num_contrat = $this->request->getPost('num_contrat');
        $date_contrat = $this->request->getPost('date_contrat');
        $nom_agc = $this->request->getPost('nom_agc');
        $adresse_agc = $this->request->getPost('adresse_agc');
        $tel_agc = $this->request->getPost('tel_agc');
        $mail_agc = $this->request->getPost('mail_agc');

        // Préparez les données à insérer dans la base de données
        $data = [
            'num_contrat' => $num_contrat,
            'date_contrat' => $date_contrat,
            'nom_agc' => $nom_agc,
            'adresse_agc' => $adresse_agc,
            'tel_agc' => $tel_agc,
            'mail_agc' => $mail_agc,
            'nombre_terroir' => $nb_terroir,
            'nombre_intervention_par_terroir' => $nb_intervention
        ];

        // Insérer les données dans la base de données
        $contrats->save($data);

        $terroirs = new TerroirModel();

        // Récupérer les données du formulaire Terroir
        $code_terroir = $this->request->getPost('code_terroir');
        $nom_terroir = $this->request->getPost('nom_terroir');
        $salaire_prevu_terroir_values = $this->request->getPost('salaire_prevu_terroir');

        // Parcourir les tableaux pour obtenir les valeurs individuelles
        $somme_salaires = 0;
        for ($i = 0; $i < count($code_terroir); $i++) {
            $con = mysqli_connect('localhost', 'root', '', 'gestion_fid');

            $query = "SELECT MAX(CAST(SUBSTRING(code_terroir, 4) AS UNSIGNED)) AS max_code_terriur FROM terroir";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            $maxCodeTerroir = $row['max_code_terriur'];

            if (empty($maxCodeTerroir)) {
                $codeTerroir = "TER001";
            } else {
                $nxt = intval($maxCodeTerroir) + 1;
                $codeTerroir = "TER" . sprintf("%03d", $nxt);
            }

            mysqli_close($con);


            $nom = $nom_terroir[$i];
            $salaire_prevu_terroir = $salaire_prevu_terroir_values[$i];
            $somme_salaires += $salaire_prevu_terroir;

            // Par exemple, les insérer dans la base de données
            $terroir_data = [
                'code_terroir' => $codeTerroir,
                'num_contrat' => $num_contrat,
                'nom_terroir' => $nom,
                'salaire_prevu_terroir' => $salaire_prevu_terroir,
            ];

            // Insérer les données du terroir dans la base de données
            $terroirs->insert($terroir_data);

            $interventions = new InterventionModel();

            // Boucle pour insérer les données d'intervention et de prévision
            for ($j = 1; $j <= $nb_intervention; $j++) {
                // Générer la valeur de code_itv
                $code_itv = 'Intervention_' . $j;

                // Insérer les données d'intervention dans la table correspondante en utilisant le modèle InterventionModel
                $interventionData = [
                    'code_terroir' => $codeTerroir,
                    'code_itv' => $code_itv
                ];
                $interventions->insert($interventionData);
            }
        }

        // Récupérer le contrat existant
        $id_contrat = $this->request->getPost('id_contrat');
        $contrat = $contrats->find($id_contrat);

        // // Ajouter la somme des salaires au tableau de données
        // $data['somme_salaires_terroirs'] = $somme_salaires;

        // // Mettre à jour le contrat existant
        // $contrat->update($data);

        // Rediriger l'utilisateur vers une page de confirmation ou afficher un message de succès
        return redirect('contrats')->with('Status', 'Mise à jour réussie');
    }
}
