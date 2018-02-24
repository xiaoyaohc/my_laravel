<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         //Commands\Inspire::class,
        //将新生成的类进行注册
         Commands\TestOne::class,
    ];

    /**
     * Define the application's command schedule.
     * 定义命令调度
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        /*$schedule->call(function () {
            DB::table('student')->insert([
                ['name'=>'test','age'=>20],
            ]);
        })->everyMinute();*/
        //编写调用逻辑
        $schedule->command('testOne:ok')
            ->timezone('Asia/Shanghai')
            ->everyMinute();
    }
}
