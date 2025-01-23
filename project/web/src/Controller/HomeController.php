<?php
 
namespace App\Controller;

use Yoop\AbstractController;

class HomeController extends AbstractController
{    
    public function get() 
    {
        return $this->render('web/home');
    }
}
