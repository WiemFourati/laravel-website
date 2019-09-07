<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inbox extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inbox';

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
    protected $fillable =array('name','email','subject','categorie','url_file','message','phone_number','quantity') ;

    
}
