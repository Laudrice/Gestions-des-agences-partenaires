<?php

namespace App\Models;

use CodeIgniter\Model;

class TerroirModel extends Model
{
    protected $table = 'terroir';
    protected $primaryKey = 'code_terroir';
    protected $allowedFields = [
        'code_terroir',
        'num_contrat',
        'nom_terroir',
        'nombre_intervention_du_terroir',
        'nombre_intervention_terminer',
        'date_os_collecte_donnee',
        'date_prevu_rapport_collecte_donnee',
        'date_rapport_collecte_donnee',
        'salaire_prevu_terroir',
        'salaire_paye',
        'salaire_paye_pourcent',
        'prevision',
        'facture',
        'resultat_categorie_2',
        'date_rapport_demarrage',
        'date_rapport_final',
        'fichier_rapport_demarrage',
        'fichier_rapport_collecte',
        'fichier_rapport_final',

    ];
}
