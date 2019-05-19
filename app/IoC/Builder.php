<?php

namespace App\Ioc;

class Builder {

    private static $pathService = 'App\\Services\\';
    private static $pathServiceInterface = 'App\\Services\\Interfaces\\';

    private static $pathRepo = 'App\\Repositories\\';
    private static $pathRepoInterface = 'App\\Repositories\\Interfaces\\';

    public static function registerService($app) {
       
        $pathSerScan = \dirname(__DIR__).'\\Services';
        $files = array_diff(\scandir($pathSerScan ), array('.', '..', 'Interfaces'));
        foreach ($files as $key => $value) {
            $nameService = pathinfo($value)['filename'];
            $service = self::$pathService.$nameService;
            $interface = self::$pathServiceInterface.'I'.$nameService;
            $app->bind($interface, $service);
        }
    }

    public static function registerRepo($app) {
        
        $pathRepoScan = \dirname(__DIR__).'\\Repositories';
        $files = array_diff(\scandir($pathRepoScan), array('.', '..', 'Interfaces', 'Infrastructures'));
        foreach ($files as $key => $value) {
            $nameRepo = pathinfo($value)['filename'];
            $repo = self::$pathRepo.$nameRepo;
            $interface = self::$pathRepoInterface.'I'.$nameRepo;
            $app->bind($interface, $repo);
        }
    }
}