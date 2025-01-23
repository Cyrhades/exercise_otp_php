<?php
 
namespace App\Controller;

use Yoop\AbstractController;
use App\Repository\UserRepository;

class SignUpController extends AbstractController
{
    public function get() 
    {
        return $this->render('web/signup');
    }

    public function post() 
    {
        $error = null;
        // todo control
        if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            if($this->controlData($_POST["username"], $_POST["email"], $_POST["password"])) {
                $repo = new UserRepository();
                $repo->getPDO()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                try {
                    $query = $repo->getPDO()->prepare("INSERT INTO `user` (`username`, `email`, `password`) VALUES (?,?,?)");
                    $hash = password_hash($_POST["password"], PASSWORD_BCRYPT, ['cost' => 12]);
                    $result = $query->execute([
                        $_POST["username"],
                        $_POST["email"],
                        $hash
                    ]);
                    if($result) {
                        $this->flash()->set("Vous êtes maintenant inscris","success");
                        $this->redirectToRoute('/');
                        return;
                    }
                } catch (\PDOException $e) {
                    // Vérification de l'erreur de type "duplicate entry"
                    if ($e->getCode() === '23000') { 
                        $error = 'Cet utilisateur existe déjà';
                    } else {
                        $error = 'Une erreur est survenue';
                    }
                }
            } else {
                $error = "Au moins un des champs n'est pas correct";
            }
        } else {
            $error = "Vous devez remplir tout les champs!";
        }
        return $this->render('web/signup', [ "error" => $error ]);
    }

    private function controlData($username, $email, $password):array|bool{    
        // Validation des champs
        if (!isset($username) || strlen($username) < 3 || strlen($username) > 40) {
            return ['valid' => false, 'message' => 'Invalid username. It must contain between 3 and 40 characters.'];
        }
    
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['valid' => false, 'message' => 'Invalid email.'];
        }
    
        if (!isset($password) || strlen($password) < 6) {
            return ['valid' => false, 'message' => 'Invalid password. It must contain at least 6 characters.'];
        }
    
        return true;
    }
}