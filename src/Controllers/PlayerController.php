<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Player;

class PlayerController{

    public function player(): string
    {
        $playerManager = new Player();
    
        $players = $playerManager->getPlayers();
    
        return (new \App\View('player/index', ['player' => $players]))->render();
    }
    
    public function create(): string
    {
        $playerManager = new Player();

        $player_form = [
            'email' => htmlspecialchars(trim($_POST['email'])),
            'nickname' => htmlspecialchars(trim($_POST['nickname'])),
        ];

        $result = $playerManager->createPlayer(...$player_form);

        return (new \App\View('player/create', ['result' => $result]))->render();
    }
}
