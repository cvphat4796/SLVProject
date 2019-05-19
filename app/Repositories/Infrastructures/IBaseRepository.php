<?php

namespace App\Repositories\Infrastructures;

interface IBaseRepository
{
   function beginTransaction();

   function rollback();

   function commit();
    
}