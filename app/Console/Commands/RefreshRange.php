<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class RefreshRange extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refreshrange:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh range of players';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $players = Http::get('http://localhost/example-app/public/api/v1/jugadores')->json();
        //$valApiPlayer = Http::get('https://api.henrikdev.xyz/valorant/v2/mmr/eu/ZK%20Scripted/ZK10')->json();




        foreach($players as $player) {
            print_r($player);
        } 

        return 0;
    }
}
