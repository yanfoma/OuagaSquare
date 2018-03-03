<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projet';

    protected $fillable = ['resume_titre', 'full_titre', 'categorie_id', 'cout', 'responsable_id', 'executeur_id', 'contenu', 'phase_id', 'date_debut', 'date_fin', 'avatar', 'fichier_joint', 'vue'];

}
