<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Like;
use App\Models\User;
use App\Mail\FavouriteProfileBackReminderMail;
use Mail;

class FavouriteProfileBackMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $action;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user = array(), $action = NULL)
    {
        $this->user   = $user;
        $this->action = $action;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $customer_ids = Like::where('escort_id', $this->user->id)->get()->pluck('user_id');
        $customers    = User::find($customer_ids);
        $girl         = User::find($this->user->id);

        if(count($customers) > 0){
            foreach ($customers as $key => $userdata) {
                Mail::to($userdata->email)->send(new FavouriteProfileBackReminderMail($userdata, $girl));
            }
        }

        Log::debug('Job finished.');
    }
}
