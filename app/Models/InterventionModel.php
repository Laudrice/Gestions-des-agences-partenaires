<?php

namespace App\Models;

use CodeIgniter\Model;

class InterventionModel extends Model
{
    protected $table = 'intervention';
    protected $primaryKey = 'code_itv';
    protected $allowedFields = [
        'code_itv',
        'code_terroir',
        'num_itv',
        'etat_itv',
        'date_os',
        'date_prevu_pec',
        'date_pec',
        'jour_ferrier',
        'debut_travaux',
        'date_rapport_intermediaire',
        'date_rapport_execution',
        'salaire_prevu',
        'salaire_paye',
        'salaire_paye_pourcent',
        'penalite_retard',
        'prevision_itv',
        'facture_itv',
        'fichier_pec',
        'fichier_rapport_intermediaire',
        'fichier_rapport_execution'
    ];
}
