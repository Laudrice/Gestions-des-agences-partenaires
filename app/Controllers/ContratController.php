<?php

namespace App\Controllers;

use App\Models\ContratModel;
use App\Models\TerroirModel;
use App\Models\PrevisionModel;
use App\Models\InterventionModel;
use App\Controllers\BaseController;

class ContratController extends BaseController
{

    /////////////////////////CONTRATS
    public function index()
    {
        $contrat = new ContratModel();

        $data['contrats'] = $contrat->findAll();

        return view('contrats/index.php', $data);
    }

    public function viewContrat($num_contrat)
    {
        $db = \Config\Database::connect();

        // Récupérer les informations du contrat
        $contrat = $db->table('contrat')->getWhere(['num_contrat' => $num_contrat])->getRow();

        if (!$contrat) {
            //404 not found
            return redirect()->to(base_url('erreur'));
        }

        // Récupérer tous les terroirs associés au contrat
        $terroirs = $db->table('terroir')->getWhere(['num_contrat' => $num_contrat])->getResult();

        // Récupérer toutes les interventions associées à chaque terroir
        foreach ($terroirs as &$terroir) {
            $interventions = $db->table('intervention')->getWhere(['code_terroir' => $terroir->code_terroir])->getResult();
            $terroir->interventions = $interventions;
        }

        $data['contrat'] = $contrat;
        $data['terroirs'] = $terroirs;
        return view('contrats/viewContrat.php', $data);
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

        // Parcourir du
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

            // insertion
            $terroir_data = [
                'code_terroir' => $codeTerroir,
                'num_contrat' => $num_contrat,
                'nom_terroir' => $nom,
                'salaire_prevu_terroir' => $salaire_prevu_terroir,
            ];

            $terroirs->insert($terroir_data);

            $interventions = new InterventionModel();

            for ($j = 1; $j <= $nb_intervention; $j++) {


                $con = mysqli_connect('localhost', 'root', '', 'gestion_fid');

                $query = "SELECT MAX(CAST(SUBSTRING(code_itv, 4) AS UNSIGNED)) AS max_code_itv FROM intervention";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);
                $maxCodeItv = $row['max_code_itv'];

                if (empty($maxCodeItv)) {
                    $codeItv = "ITV001";
                } else {
                    $nxt = intval($maxCodeItv) + 1;
                    $codeItv = "ITV" . sprintf("%03d", $nxt);
                }

                mysqli_close($con);


                // Générer la valeur de code_itv
                $num_itv = 'Intervention_' . $j;

                //insertion
                $interventionData = [
                    'code_terroir' => $codeTerroir,
                    'code_itv' => $codeItv,
                    'num_itv' => $num_itv
                ];
                $interventions->insert($interventionData);
            }
        }

        // Récupérer le contrat existant
        $id_contrat = $this->request->getPost('id_contrat');
        $contrat = $contrats->find($id_contrat);
        return redirect('contrats')->with('Status', 'Mise à jour réussie');
    }


    ///////////////////////AGEC
    public function agcView()
    {
        $contrat = new ContratModel();

        $data['contrats'] = $contrat->findAll();

        return view('contrats/agc.php', $data);
    }


    public function editAgc($num_contrat)
    {
        $contrat = new ContratModel();

        $db = \Config\Database::connect();

        $contrats = $db->table('contrat')->getWhere(['num_contrat' => $num_contrat])->getResult();
        $data['contrats'] = $contrats;
        return view('contrats/editAgc.php', $data);
    }




    ///////////////////////////Terroir
    public function listIntervention($code_terroir)
    {
        $terroirModel = new TerroirModel();
        $interventionModel = new InterventionModel();

        $db = \Config\Database::connect();

        $terroirs = $db->table('terroir')->getWhere(['code_terroir' => $code_terroir])->getResult();
        $interventions = $db->table('intervention')->getWhere(['code_terroir' => $code_terroir])->getResult();

        $data = [
            'terroirs' => $terroirs,
            'interventions' => $interventions
        ];

        return view('contrats/terroirs/listIntervention.php', $data);
    }

    public function terroirOperation($code_terroir)
    {
        $terroirModel = new TerroirModel();
        $interventionModel = new InterventionModel();

        $db = \Config\Database::connect();

        $terroirs = $db->table('terroir')->getWhere(['code_terroir' => $code_terroir])->getResult();
        $interventions = $db->table('intervention')->getWhere(['code_terroir' => $code_terroir])->getResult();

        $data = [
            'terroirs' => $terroirs,
            'interventions' => $interventions
        ];

        return view('contrats/terroirs/terroirOperation.php', $data);
    }

}
