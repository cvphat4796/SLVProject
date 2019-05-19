<?php

namespace App\Utils;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
class Helper {

    public static function convertModelResponse($model){
        $result = null;
        if($model instanceof Collection) 
        {
            $result = [];
            foreach ($model as $value) {
                $current = null;
                foreach($value->getAttributes() as $k => $v){

                    $current[self::convertFieldName($k)] = $v;
                }
                array_push($result, $current);
            }
        }
        else if($model instanceof Model)
        {
            $current = null;
            foreach($model->getAttributes() as $k => $v){

                $current[self::convertFieldName($k)] = $v;
            }
            $result = $current;
        }
        else
        {
            $result = $model;
        }

        return $result;
    }

    public static function convertFieldName($field) {
        $field = lcfirst($field);
        $arr = explode ('_', $field);
        $field = $arr[0];
        for ($i = 1; $i < sizeof($arr); $i++) { 
            $field .= ucfirst($arr[$i]);
        }
        return $field;
    }
}