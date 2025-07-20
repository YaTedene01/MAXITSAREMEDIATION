<?php
namespace App\core;
use App\controller\SecurityController;
use App\core\Database;
use App\core\Router;
use App\repository\UserRepository;
use App\service\UserService;
use App\core\Session;
use App\repository\CompteRepository;
use App\repository\TransactionRepository;
use App\service\CompteService;
use App\service\TransactionService;

class App{
    private static Array  $dependencies=[];
    public static function init(){

        self::registerDependance('router' , (new Router()));
        self::registerDependance('database' , Database::getInstance());
        self::registerDependance('userrepository' , UserRepository::getInstance());

        self::registerDependance('userservice' , UserService::getInstance());
        self::registerDependance('session',Session::getInstance());
        self::registerDependance('transactionrepository',TransactionRepository::getInstance());
        self::registerDependance('transactionservice',TransactionService::getInstance());
        self::registerDependance('compterepository',CompteRepository::getInstance());
        self::registerDependance('compteservice',CompteService::getInstance());





    }
    public static function getDependencie($key){

        // var_dump(self::$dependencies); die;
        if(array_key_exists($key,self::$dependencies)){
            return self::$dependencies[$key];
        }
        throw new \Error('Dependance non trouvée...');      
    }

    public static function registerDependance($key , $dependence){
        if (!array_key_exists($key , self::$dependencies)) {
            # code...
            self::$dependencies[$key] = $dependence;
        }else{
            return null;
        }
    }

}