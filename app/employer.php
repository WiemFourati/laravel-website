<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employer';

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
    protected $fillable = array('nomemployer','email','categorie','url_photo','message') ;

    
}
