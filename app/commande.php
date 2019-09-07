<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'command';

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
    protected $fillable = array('nomclient','idproduit','quantity','prixtotal','numero','email','message','location','datelimite') ;

    
}
