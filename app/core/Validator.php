<?php
namespace App\Core;
class Validator{


    private array $validator=[];
    private static array $errors=[];
    private static  array $message=[
        'obligatoire'=>'le champ est requis',
        'isvalidetel' => 'Le numero est invalide ',
        'isvalidecni'=>'le cni est invalide'
    ];
    private static $regle=[];
    public static function init(){
        if(empty(self::$regle))

        self::$regle=[
            'obligatoire'=>function ($champ){
                return !empty($champ) ? true : self::$message['obligatoire']; 
            },

            'isvalidetel'=>function($numero){
                return !preg_match('/^7[05678][0-9]{7}$/', $numero) ?  true : self::$errors["isvalidetel"] = self::$message['isvalidetel'];
           },
           'isvalidecni'=>function($cni){
                    $effacer = str_replace(' ', '', $cni);

                    return !preg_match('/^[0-9]{13}$/', $effacer) ? true : self::$errors['isvalidecni'] = self::$message['isvalidecni'];

           },
           'fileupload'=>function($file){
                  return !isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK ? true :self::$errors['fileupload'] = self::$message['fileupload'];

           }

        ];

    }
    public static function addErrors($key, $message) {
        self::$errors[$key] = $message;
    }
    public static function isUnique($value, $key, $message, callable $checkFunc) {
    if (!$checkFunc($value)) {
        self::$errors[$key] = $message;
    }
    }
    public static function reset(){
        self::$errors=[];
    }
    
    public static function valider($champ ,$data){
        self::init();
        foreach($champ as $values){
            foreach($values as $val){
                foreach ($data as $key=>$dat) {
                    # code...
                     self::$errors[$key] = self::$regle[$val]($dat);
                }
            }
        }
    }
    public static function getError(){
        return self::$errors;
    }
    public static function isValide(){
        foreach(self::$errors as $key=>$values){
            if (is_string($values)){
                return false;
            }
            return true;
        }
    }
}