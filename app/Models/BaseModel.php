<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as EloquentModel;

abstract class BaseModel extends EloquentModel
{
    protected $connection = 'mongodb';
}