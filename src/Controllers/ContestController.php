<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Contest;

class ContestController{

    public function contest(): string
    {
        $contestManager = new Contest();
    
        $contests = $contestManager->getContests();
    
        return (new \App\View('contest/index', ['contest' => $contests]))->render();
    }
    
    public function create(): string
    {
        $contestManager = new Contest();

        $contest_form = [
            'start_date' => htmlspecialchars(trim($_POST['start_date'])),
            'winner_id' => htmlspecialchars(trim($_POST['winner_id'])),
            'game_id' => htmlspecialchars(trim($_POST['game_id'])),
        ];

        $result = $contestManager->createContest(...$contest_form);

        return (new \App\View('contest/create', ['result' => $result]))->render();
    }
}
