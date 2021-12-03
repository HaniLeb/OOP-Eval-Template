<?php

declare(strict_types=1);

namespace App\Models;

use App\DB;

class Player
{
    protected int $id;
    protected string $email;
    protected string $nickname;

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of nickname
     */ 
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     *
     * @return  self
     */ 
    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    // METHODS

    public function getPlayers(): array
    {
        try {
            $db = (new DB())->getStaticPdo();
            $sql = $db->query('SELECT * FROM player');

            $result = $sql->fetchAll(\PDO::FETCH_CLASS, '\App\Models\Player');

            return $result ?? [];
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function createPlayer(string $email, string $nickname)
    {
        try {
           $db = (new DB())->getStaticPdo();
   
           $sql = 'INSERT INTO player (email, nickname) VALUES (:email, :nickname)';
           $req = $db->prepare($sql);
           $req->bindValue(':email', $email, \PDO::PARAM_STR);
           $req->bindValue(':nickname', $nickname, \PDO::PARAM_STR);
   
           return $req->execute();
       } catch (\PDOException $e) {
           throw new \PDOException($e->getMessage(), (int) $e->getCode());
       }
   }
}