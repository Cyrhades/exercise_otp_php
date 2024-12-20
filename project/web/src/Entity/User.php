<?php

namespace App\Entity;

use Yoop\EntityInterface;

class User implements EntityInterface {

    private int $id;

    private string $username;

    private string $email;

    private string $password;

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