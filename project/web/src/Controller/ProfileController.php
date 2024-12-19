<?php
 
namespace App\Controller;

use Yoop\AbstractController;
use App\Repository\UserRepository;

use RobThree\Auth\TwoFactorAuth;
use RobThree\Auth\Providers\Qr\EndroidQrCodeProvider;

class  ProfileController extends AbstractController
{
    public function __construct() {        
        parent::__construct();
        if(!isset($_SESSION['FULL_AUTHENTICATED']) || $_SESSION['FULL_AUTHENTICATED'] != true) {
            $user = $this->getUser();
            if(isset($user) && $user->getOtpEnable() != '1') {
                $this->redirectToRoute('/');
            } else {
                $this->redirectToRoute('/a2f');
            }
        }
    }

    public function get() 
    {
        // Si la double authentification n'est pas encore active
        if($this->getUser()->getOtpEnable() != '1') {
            $tfa = new TwoFactorAuth(new EndroidQrCodeProvider(), 'DevSocialNetwork');
            $username = $this->getUser()->getUsername();
            $key = $this->getUser()->getOtpSecret();
            // Si l'utilisateur n'a pas encore de secret pour son otp
            if(empty($key)) {
                // On crée la clé
                $key = $tfa->createSecret();
                $this->getUser()->setOtpSecret($key);
                // on sauvegarde en BDD
                $repo = new UserRepository();
                $repo->setOtpSecret($this->getUser(), $key);
            }

            return $this->render('web/profile', [
                'account'   => $username,
                'key'       => $key,
                'qrcode'    => $tfa->getQRCodeImageAsDataUri($username, $key)
            ]);
        } 

        return $this->render('web/profile');
    }

    public function post() 
    {
        // todo : charger le secret de l'utilisateur
        $tfa = new TwoFactorAuth(new EndroidQrCodeProvider());
        if($tfa->verifyCode($this->getUser()->getOtpSecret(), $_POST['otp_code'])) {
            $repo = new UserRepository();
            $repo->enableOtp($this->getUser());
            $this->getUser()->setOtpEnable(1);

            $this->flash()->set("La double authentification a bien été activé sur votre compte !");
            $this->redirectToRoute('/profile');
            return;
        } else {
            $this->flash()->set("Le code n'est pas correct, nous n'avons pas activé la double authentification !", "error");
            $this->redirectToRoute('/profile');
            return;
        }
    }
}