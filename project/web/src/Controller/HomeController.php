<?php
 
namespace App\Controller;

use Yoop\AbstractController;

class HomeController extends AbstractController
{
    public function __construct() {
        parent::__construct();
        if(!isset($_SESSION['FULL_AUTHENTICATED']) || $_SESSION['FULL_AUTHENTICATED'] != true) {
            $user = $this->getUser();
            if(!empty($user) && $user!=null && $user->getOtpEnable() == '1') {
                $this->redirectToRoute('/a2f');
            }
        }
    }
    
    public function get() 
    {
        return $this->render('web/home');
    }
}
