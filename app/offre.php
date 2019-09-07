<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offre extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offre';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = array('nomoffre','description','categorie');

    
}
