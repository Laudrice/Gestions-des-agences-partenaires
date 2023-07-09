<?php

namespace App\Models;

use CodeIgniter\Model;

class ContratModel extends Model
{
    protected $table = 'contrat';
    protected $primary = 'num_contrat';
    protected $allowedFields = [
        'num_contrat',
        'date_contrat',
        'code_agc',
        'nom_agc',
        'adresse_agc',
        'tel_agc',
        'mail_agc',
        'nombre_terroir',
        'nombre_intervention_par_terroir',
        'total_prevision',
        'total_facture',
        'salaire_prevu',
        'salare_recu',
        'fichier_contrat'
    ];
}
