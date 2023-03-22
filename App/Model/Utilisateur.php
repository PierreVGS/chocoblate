<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Roles;

    class Utilisateur extends BddConnect{

        //attributs:
        private  $id_utilisateur;
        private  $nom_utilisateur;
        private  $prenom_utilisateur;
        private  $mail_utilisateur;
        private  $password_utilisateur;
        private  $image_utilisateur;
        private  $statut_utilisateur;
        private  $role;

        //constructeur:
        public function __construct(){
            //instancier un objet "role" quand on créé un utilisateur.
            //$this->role = new Role('User');
        }

        // getter et setter:
            
        
        public function getIdUtilisateur():?int{
            return $this->id_utilisateur;
        }
        
        public function getNomUtilisateur():?string{
            return $this->nom_utilisateur;
        }

        public function getPrenomUtilisateur():?string{
            return $this->prenom_utilisateur;
        }

        public function getMailUtilisateur():?string{
            return $this->mail_utilisateur;
        }

        public function getPasswordUtilisateur():?string{
            return $this->password_utilisateur;
        }

        public function setNomUtilisateur($name):void{
            $this->nom_utilisateur = $name;
        }
        public function setPrenomUtilisateur($firstName):void{
            $this->prenom_utilisateur = $firstName;
        }

        public function setMailUtilisateur($mail):void{
            $this->mail_utilisateur = $mail;
        }
        public function setPasswordUtilisateur($password):void{
            $this->password_utilisateur = $password;
        }

        //methode pour ajouter un utilisateur à la Bdd:
        public function addUser():void{
            try{
                $nom = $this->nom_utilisateur;
                $prenom = $this->prenom_utilisateur;
                $mail = $this->mail_utilisateur;
                $password = $this->password_utilisateur;

                $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur) VALUES(?,?,?,?)');

                $req->bindParam(1, $nom, \PDO::PARAM_STR);
                $req->bindParam(2, $prenom, \PDO::PARAM_STR);
                $req->bindParam(3, $mail, \PDO::PARAM_STR);
                $req->bindParam(4, $password, \PDO::PARAM_STR);

                $req->execute();

            }
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
            
        }

        
    }
?>