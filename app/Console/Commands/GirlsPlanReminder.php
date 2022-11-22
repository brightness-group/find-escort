<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\GirlsPlanReminderMail;
use Carbon\Carbon;
use Mail;

class GirlsPlanReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'girls:plan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email sent 96h and 48h before the end of the plan';

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
        $this->before96H();
        $this->before48H();
        
        return 0;
    }

    public function before96H(){
        $users = User::whereDate('plan_expiry', Carbon::now()->addDays(4))->get();
        if(count($users) > 0){
            foreach ($users as $key => $userdata) {
                Mail::to($userdata->email)->send(new GirlsPlanReminderMail($userdata));
            }
        }
    }

    public function before48H(){
        $users = User::whereDate('plan_expiry', Carbon::now()->addDays(2))->get();
        if(count($users) > 0){
            foreach ($users as $key => $userdata) {
                Mail::to($userdata->email)->send(new GirlsPlanReminderMail($userdata));
            }
        }
    }
}