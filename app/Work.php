<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Work extends Model
{
    use HasRoles;
    protected $table = 'works';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function role(){
       return $this->belongsTo('Spatie\Permission\Models\Role');
    }

    public function department(){
        return $this->belongsTo('App\Department');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }

}
