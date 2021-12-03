<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Game;

class GameController{

    public function game(): string
    {
        $gameManager = new Game();
    
        $games = $gameManager->getGames();
    
        return (new \App\View('game/index', ['game' => $games]))->render();
    }
    
    public function create(): string
    {
        $gameManager = new Game();

        $game_form = [
            'title' => htmlspecialchars(trim($_POST['title'])),
            'min_players' => htmlspecialchars(trim($_POST['min_players'])),
            'max_players' => htmlspecialchars(trim($_POST['max_players'])),
        ];

        $result = $gameManager->createGame(...$game_form);

        return (new \App\View('game/create', ['result' => $result]))->render();
    }

    public function store(): string
    {
        $gameManager = new Game();

        $game_form = [
            'title' => htmlspecialchars(trim($_POST['title'])),
            'min_players' => htmlspecialchars(trim($_POST['min_players'])),
            'max_players' => htmlspecialchars(trim($_POST['max_players'])),
        ];

        $result = $gameManager->createGame(...$game_form);

        return (new \App\View('game/store', ['result' => $result]))->render();
    }
}
