<?php
namespace App\Repositories\Infrastructures;

use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository as RepositoryBase;
abstract class BaseRepository extends RepositoryBase implements IBaseRepository
{

    public function beginTransaction(){
        DB::beginTransaction();
    }

    public function rollback(){
        DB::rollback();
    }

    public function commit(){
        DB::commit(); 
    }

}