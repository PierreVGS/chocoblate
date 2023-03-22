<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Role;

    class Utilisateur extends BddConnect{

        //attributs:
        private ?int $id_utilisateur;
        private ?string $nom_utilisateur;
        private ?string $prenom_utilisateur;
        private ?string $mail_utilisateur;
        private ?string $password_utilisateur;
        private ?string $image_utilisateur;
        private ?bool $statut_utilisateur;
        private ?Role $role;

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
            $this->id_utilisateur = $firstName;
        }

        public function setMailUtilisateur($mail):void{
            $this->mail_utilisateur = $mail;
        }
        public function setPasswordUtilisateur($password):void{
            $this->password_utilisateur = $password;
        }

        //methode pour ajouter un utilisateur à la Bdd:
        public function addUser(){
            try{
                $nom = $this->nom_utilisateur;
                $prenom = $this->prenom_utilisateur;
                $mail = $this->mail_utilisateur;
                $password = $this->password_utilisateur;

                $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur) VALUES(?,?,?,?)');

                $req->bindParam(1, $nom, \PDO::PARAM_STR);
                $req->bindParam(1, $prenom, \PDO::PARAM_STR);
                $req->bindParam(1, $maill, \PDO::PARAM_STR);
                $req->bindParam(1, $password, \PDO::PARAM_STR);

                $req->execute();

            }
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage())
            }
            
        }

        
    }
?>