<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = 'role';

    protected $primaryKey  = 'RoleId';
    
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'roleId',
        'roleName'
     ];
}
