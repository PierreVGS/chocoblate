<?Php
    namespace App\Controller;
    use App\Model\Utilisateur;
    class UserController extends Utilisateur{

        //fonction qui va gerer toute la construction de la page :

        public function insertUser(){

            include './App/Vue/viewAddUser.php';
        }
    }

?>