<?php

namespace App\Models;

use CodeIgniter\Model;

class PrevisionModel extends Model
{
    protected $table = 'prevision';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'code_itv',
        'libelle',
        'prix_unitaire',
        'quantite',
    ];
}
