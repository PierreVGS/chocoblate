<?php
    namespace App\Controller;
    use App\Model\Role;
    use App\Utils\Fonctions;
    class RoleController extends Role{

        public function insertRole(){
             // variable pour stocker les message d'erreur:
             $msg = "";

             //logique
 
                 //teste le bouton:
            if(isset($_POST['submit'])){
 
                 //recuperation et nettoyage des entrées des inputs  
                 $nom = Fonctions::cleanInput($_POST['nom_utilisateur']);

                 //teste si les champs sont remplis:
                 if(!empty($nom)){
                    $this = new RoleController();
                    $this->setNomRole($nom);
                    $this->addRole();
                    $msg = "Le role : ".$nom." a été en BDD";

                 }
                 //si c'est vide :
                 else{
                     echo $msg = "Le formulmaire est vide";
                 }
             }
             //importer la vue :
            include './App/Vue/viewAddRole.php';
        }
    }

?>