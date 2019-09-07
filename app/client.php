<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'client';

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
    protected $fillable = array('nom','nomsociete','image_manager','url_logo','categorie','message','phone_number','email') ;

    
}
