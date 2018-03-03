<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'commentaire';

    protected $fillable = [ 'nom', 'avatar', 'projet_id', 'contenu'];

}
