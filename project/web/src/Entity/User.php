<?php

namespace App\Entity;

use Yoop\EntityInterface;

class User implements EntityInterface {

    private int $id;

    private string $username;

    private string $email;

    private string $password;

    private array $roles;

    private int $activated;

    private ?string $otp_secret;

    private int $otp_enable;

    private string $created_at;

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Get the value of username
     *
     * @return string
     */
    public function getUsername(): string {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @param string $username
     *
     * @return self
     */
    public function setUsername(string $username): self {
        $this->username = $username;
        return $this;
    }
    
    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param string $password
     *
     * @return self
     */
    public function setPassword(string $password): self {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of roles
     *
     * @return array
     */
    public function getRoles(): array {
        return $this->roles;
    }

    /**
     * Set the value of roles
     *
     * @param array $roles
     *
     * @return self
     */
    public function setRoles(array $roles): self {
        $this->roles = $roles;
        return $this;
    }

    /**
     * Get the value of activated
     *
     * @return int
     */
    public function getActivated(): int {
        return $this->activated;
    }

    /**
     * Set the value of activated
     *
     * @param int $activated
     *
     * @return self
     */
    public function setActivated(int $activated): self {
        $this->activated = $activated;
        return $this;
    }

    /**
     * Get the value of secretOtp
     *
     * @return string
     */
    public function getOtpSecret(): ?string {
        return $this->otp_secret;
    }

    /**
     * Set the value of secretOtp
     *
     * @param string $secretOtp
     *
     * @return self
     */
    public function setOtpSecret(string $otp_secret): self {
        $this->otp_secret = $otp_secret;
        return $this;
    }

    /**
     * Get the value of otp_enable
     *
     * @return int
     */
    public function getOtpEnable(): int {
        return $this->otp_enable;
    }

    /**
     * Set the value of otp_enable
     *
     * @param int $otp_enable
     *
     * @return self
     */
    public function setOtpEnable(int $otp_enable): self {
        $this->otp_enable = $otp_enable;
        return $this;
    }

    /**
     * Get the value of created_at
     *
     * @return int
     */
    public function getCreatedAt(): int {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @param int $created_at
     *
     * @return self
     */
    public function setCreatedAt(int $created_at): self {
        $this->created_at = $created_at;
        return $this;
    }

}