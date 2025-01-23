<?php
 
namespace App\Controller;

use Yoop\AbstractController;
use App\Repository\UserRepository;

class DisconnectController extends AbstractController
{
    public function get() 
    {
        unset($_SESSION['user']);        
        $this->flash()->set("Vous êtes maintenant déconnecté","success");
        $this->redirectToRoute('/');
    }
}