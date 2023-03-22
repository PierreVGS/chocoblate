<?Php
    namespace App\Controller;
    use App\Model\Utilisateur;
    use App\Utils\Fonctions;
    class UserController extends Utilisateur{

        //fonction qui va gerer toute la construction de la page :

        public function insertUser(){

            // variable pour stocker les message d'erreur:
            $msg = "";

            //logique

                //teste le bouton:
            if(isset($_POST['submit'])){

                //recuperation et nettoyage des entrées des inputs utilisateurs : 
                $nom = Fonctions::cleanInput($_POST['nom_utilisateur']);
                $prenom = Fonctions::cleanInput($_POST['prenom_utilisateur']);
                $mail = Fonctions::cleanInput($_POST['mail_utilisateur']);
                $password = Fonctions::cleanInput($_POST['password_utilisateur']);

                //teste si les champs sont remplis:
                if(!empty($nom) AND !empty($prenom) AND !empty($mail) AND !empty($password)){

                    //hashage du mot de passe :
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $user = new UserController();
                    $user->setNomUtilisateur($nom);
                    $user->setPrenomUtilisateur($prenom);
                    $user->setMailUtilisateur($mail);
                    $user->setPasswordUtilisateur($password);
                    $this->addUser();
                    $msg = "Le compte : ".$mail." a été en BDD";
                }
                
                //si c'est vide :
                else{
                    echo $msg = "Veuillez remplir tous les champs du formulaire";
                }
            }

            //importer la vue :
            include './App/Vue/viewAddUser.php';
        }
    }

?>