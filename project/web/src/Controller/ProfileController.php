<?php
 
namespace App\Controller;

use Yoop\AbstractController;
use App\Repository\UserRepository;

class ProfileController extends AbstractController
{
    public function get() 
    {
        return $this->render('web/profile');
    }
}