<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use App\Plan;
use App\Plantime;
use App\User;
use App\Habitanalytic;
class SaveTodaysHabits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'habit:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uloží data o splění náviků pro daný den.';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        $user = User::get('id');
        $day_of_week = date('N', strtotime('Monday'));
        $day = date("Y-m-d"); 

        for($i = 0; $i <count($user); $i++){
            $userid = $user[$i]->id;
            $planCount = Plantime::all()->where('user_id', '=', $userid)->where('time', '=', $day_of_week)->count();
            $planCountDone = Plantime::all()->where('user_id', '=', $userid)->where('last', '=', $day)->count();
            
            if($planCount != 0){
                $users = Habitanalytic::create([
                    'user_id' => $userid,
                    'count_habits' => $planCount,
                    'count_done_habits' => $planCountDone,
                    'date' => $day,
                ]);
            }
        }
         $this->info("Uloženo do tabulky habitanalytics");


         



        


    }
}
