<?php

    namespace App\Model;
    use App\Utils\BddConnect;
    class Role extends BddConnect{
        
        private $id_role;
        private $nom_role;


        public function __construct(){
        
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

        // fonction pour ajouter un role en bdd:
        public function addRole():void{
            try{
                $nom = $this->nom_role;

                $req = $this->connexion()->prepare('INSERT INTO role(nom_role) VALUES(?)');

                $req->bindParam(1, $nom, \PDO::PARAM_STR);

                $req->execute();
            }
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
            
        }
    }
?>