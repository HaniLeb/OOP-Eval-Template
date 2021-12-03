<?php

declare(strict_types=1);

namespace App\Models;

use App\DB;

class Game
{
    protected int $id;
    protected string $title;
    protected int $min_players;
    protected int $max_players;

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
     * Get the value of title
     */ 
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of min_players
     */ 
    public function getMin_players(): int
    {
        return $this->min_players;
    }

    /**
     * Set the value of min_players
     *
     * @return  self
     */ 
    public function setMin_players(int $min_players): self
    {
        $this->min_players = $min_players;

        return $this;
    }

    /**
     * Get the value of max_players
     */ 
    public function getMax_players(): int
    {
        return $this->max_players;
    }

    /**
     * Set the value of max_players
     *
     * @return  self
     */ 
    public function setMax_players(int $max_players): self
    {
        $this->max_players = $max_players;

        return $this;
    }

    // METHODS

    public function getGames(): array
    {
        try {
            $db = (new DB())->getStaticPdo();
            $sql = $db->query('SELECT * FROM game');

            $result = $sql->fetchAll(\PDO::FETCH_CLASS, '\App\Models\Game');

            return $result ?? [];
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function createGame(string $title, int $min_players, int $max_players)
    {
        try {
           $db = (new DB())->getStaticPdo();
   
           $sql = 'INSERT INTO game (title, min_players, max_players) VALUES (:title, :min_players, :max_players)';
           $req = $db->prepare($sql);
           $req->bindValue(':title', $title, \PDO::PARAM_STR);
           $req->bindValue(':min_players', $min_players, \PDO::PARAM_INT);
           $req->bindValue(':max_players', $max_players, \PDO::PARAM_INT);
   
           return $req->execute();
       } catch (\PDOException $e) {
           throw new \PDOException($e->getMessage(), (int) $e->getCode());
       }
   }
}