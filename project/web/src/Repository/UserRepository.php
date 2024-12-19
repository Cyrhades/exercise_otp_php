<?php

namespace App\Repository;

use App\Entity\User;
use Yoop\AbstractRepositoryMySql;

class UserRepository extends AbstractRepositoryMySql {

    public function setOtpSecret(User $user, string $secret) 
    {
        $this->getPDO()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        try {
            $query = $this->getPDO()->prepare("UPDATE `user` SET `otp_secret`=? WHERE `username`=?");
            $query->execute([$secret, $user->getUsername()]);
        } catch (\PDOException $e) {}
    }

    public function enableOtp(User $user) 
    {
        $this->getPDO()->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        try {
            $query = $this->getPDO()->prepare("UPDATE `user` SET `otp_enable`=1 WHERE `username`=?");
            $query->execute([$user->getUsername()]);
        } catch (\PDOException $e) {}
    }
}