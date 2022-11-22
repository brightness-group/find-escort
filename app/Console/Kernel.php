<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\GirlsPlanReminder::class,
        Commands\UpdateBoostRanking::class,
        Commands\NewGirlsAlert::class,
        Commands\RealGirlFriendExperienceAlert::class,
        Commands\SiteMapUpdate::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('girls:plan')->daily();
        $schedule->command('update:ranking')->everyThirtyMinutes();
        $schedule->command('alert:newgirls')->daily();
        $schedule->command('alert:rge')->daily();
        $schedule->command('sitemap:update')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
