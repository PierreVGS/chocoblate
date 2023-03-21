<?php

    namespace App\Model;
    use App\Utils\BddConnect;
    class Role extends BddConnect{
        private $id_role;
        private $nom_role;


        public function __construct($name){
            $this->nom_role = $name;
        }


        public function getIdRole():?int{
            return $this->id_role;
        }

        public function getNomRole():?string{
            return $this->nom_role;
        }

        public function setIdRole($name):void{
            $this->id_role = $name;
        }


    }
?>