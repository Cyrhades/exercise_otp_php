<?php
 
namespace App\Controller;

use Yoop\AbstractController;
use App\Repository\UserRepository;

class SignInController extends AbstractController
{
    public function get() 
    {
        return $this->render('web/signin');
    }

    public function post() 
    {
        $error = null;
        // todo control
        if(!empty($_POST["username"]) && !empty($_POST["password"])) {
            $repo = new UserRepository();
            try {
                $user = $repo->findOneBy(['username' => $_POST["username"]]);
                if($user) {
                    if (password_verify($_POST["password"], $user->getPassword())) {
                        $this->connectUser($user);
                        $this->flash()->set("Vous êtes maintenant connecté","success");
                        $this->redirectToRoute('/');
                        return;
                    } else {
                        $error = "L'identification a échouée";
                    }
                } else {
                    $error = "L'identification a échouée";
                }
            } catch (\PDOException $e) {
                $error = 'Une erreur est survenue';
            }
        } else {
            $error = "Vous devez remplir tout les champs!";
        }
        return $this->render('web/signin', [ "error" => $error ]);
    }
}