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

        $endPeriod1 = preg_split("/[\s,-]+/", $settings->endPeriod1);
        $endPeriod2 = preg_split("/[\s,-]+/", $settings->endPeriod2);
        $endPeriod3 = preg_split("/[\s,-]+/", $settings->endPeriod3);
        $endPeriod4 = preg_split("/[\s,-]+/", $settings->endPeriod4);

        $cronPeriod1 = '59 23 '.$endPeriod1[2].' '.$endPeriod1[1].' *';

        $cronPeriod2 = '59 23 '.$endPeriod2[2].' '.$endPeriod1[1].' *';

        $cronPeriod3 = '59 23 '.$endPeriod3[2].' '.$endPeriod1[1].' *';

        $cronPeriod4 = '59 23 '.$endPeriod4[2].' '.$endPeriod1[1].' *';

        $schedule->command('period:end')
                 ->cron($cronPeriod1);

        $schedule->command('period:end')
                 ->cron($cronPeriod2);

        $schedule->command('period:end')
                 ->cron($cronPeriod3);

        $schedule->command('period:end')
                 ->cron($cronPeriod4);       
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
