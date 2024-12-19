<?php
 
namespace App\Controller;

use Yoop\AbstractController;
use App\Repository\UserRepository;

use RobThree\Auth\TwoFactorAuth;
use RobThree\Auth\Providers\Qr\EndroidQrCodeProvider;

class A2FController extends AbstractController
{
    public function get() 
    {
        return $this->render('web/a2f');
    }

    public function post() 
    {
        if(isset($_POST['stop_2fa'])) {
            $this->redirectToRoute('/disconnect');
        } else {
            $tfa = new TwoFactorAuth(new EndroidQrCodeProvider());
            if($tfa->verifyCode($this->getUser()->getOtpSecret(), $_POST['otp_code'])) {
                $_SESSION['FULL_AUTHENTICATED'] = true;
                $this->flash()->set("Vous êtes maintenant connecté","success");
                $this->redirectToRoute('/');
                return;
            } else {
                $this->flash()->set("Le code n'est pas correct", "error");
            }
        }
        return $this->render('web/a2f');
    }
}