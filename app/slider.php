<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'slider';

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
    protected $fillable = array('title','text','url_button','url_image') ;
}
