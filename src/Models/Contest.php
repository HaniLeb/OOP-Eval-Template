<?php

declare(strict_types=1);

namespace App\Models;

use App\DB;

class Contest
{
    protected int $id;
    protected $start_date;
    protected int $winner;
    protected int $game;

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
     * Get the value of start_date
     */ 
    public function getStart_date()
    {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     *
     * @return  self
     */ 
    public function setStart_date($start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Get the value of winner
     */ 
    public function getWinner(): int
    {
        return $this->winner;
    }

    /**
     * Set the value of winner
     *
     * @return  self
     */ 
    public function setWinner(int $winner): self
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get the value of game
     */ 
    public function getGame(): int
    {
        return $this->game;
    }

    /**
     * Set the value of game
     *
     * @return  self
     */ 

    // METHODS

     public function getContests(): array
     {
         try {
             $db = (new DB())->getStaticPdo();
             $sql = $db->query('SELECT * FROM contest');

             $result = $sql->fetchAll(\PDO::FETCH_CLASS, '\App\Models\Contest');

             return $result ?? [];
         } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int) $e->getCode());
         }
     }

     public function createContest($start_date, int $game_id)
     {
         try {
            $db = (new DB())->getStaticPdo();

            $sql = 'INSERT INTO contest (start_date, game_id) VALUES (:start_date, :game_id)';
            $req = $db->prepare($sql);
            $req->bindValue(':start_date', $start_date);
            $req->bindValue(':game_id', $game_id, \PDO::PARAM_INT);
    
            return $req->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }
}