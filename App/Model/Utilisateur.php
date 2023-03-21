<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Role;

    class Utilisateur{

        //attributs:
        private $id_utilisateur;
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $mail_utilisateur;
        private $password_utilisateur;
        private $image_utilisateur;
        private $statut_utilisateur;
        private $role;

        //constructeur:
        public function __construct(){
            //instancier un objet "role" quand on créé un utilisateur.
            $this->role = new Role('User');
        }

    


    }
?>