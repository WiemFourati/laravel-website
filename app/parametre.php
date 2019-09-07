<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parametre extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parametres';

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
    protected $fillable = array('email','localisation','tel','fax','horaire');

    
}
