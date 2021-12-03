<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Contest;
use App\Models\Game;

class ContestController{

    public function contest(): string
    {
        $contestManager = new Contest();
    
        $contests = $contestManager->getContests();
    
        return (new \App\View('contest/index', ['contest' => $contests]))->render();
    }
    
    public function create(): string
    {
        $gameManager = new Game();

        $games = $gameManager->getGames();

        return (new \App\View('contest/create', ['games' => $games]))->render();
    }
    
    public function store()
    {
        $contestManager = new Contest();
        
        $contest_form = [
            'start_date' => $_POST['start_date'],
            'game_id' => intval($_POST['game_id']),
        ];
        
        $result = $contestManager->createContest(...$contest_form);
        
        return (new \App\View('contest/store', ['result' => $result]))->render();
    }
}
