<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Department;
class Employee extends Model
{
    use HasRoles;

    protected $table = 'employees';

    public function department(){
        return $this->belongsTo('App\Department');
    }

   public function role(){
        return $this->belongsTo('Spatie\Permission\Models\Role');
   }
}
