<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Setting;
use App\Mail\OrderShipped;
use Illuminate\Mail\Mailable;
use Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\periodEnd',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $settings = Setting::find(1);

        $endPeriod1 = explode('-', $settings->endPeriod1);
        $endPeriod2 = explode('-', $settings->endPeriod2);
        $endPeriod3 = explode('-', $settings->endPeriod3);
        $endPeriod4 = explode('-', $settings->endPeriod4);

        $schedule->command('period:end')
                 ->cron('* * ' + $endPeriod1[1] + ' ' + $endPeriod1[0] + ' * *');

        $schedule->command('period:end')
                 ->cron('* * ' + $endPeriod2[1] + ' ' + $endPeriod2[0] + ' * *');

        $schedule->command('period:end')
                 ->cron('* * ' + $endPeriod3[1] + ' ' + $endPeriod3[0] + ' * *');

        $schedule->command('period:end')
                 ->cron('* * ' + $endPeriod4[1] + ' ' + $endPeriod4[0] + ' * *');       
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
