<?php
    namespace App\Utils;
    class Fonctions{

        //netoyage des entrées de formulaire:
        public static function cleanInput($value){
            return htmlspecialchars(strip_tags(trim($value)));
        }
    }


?>