<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestOne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testOne:ok';// 命令名称

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '测试命令';// 命令描述，没什么用

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // 初始化代码写到这里，也没什么用
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //功能代码写到这里
	    DB::table('student')->insert([
            ['name'=>'test','age'=>20],
        ]);
    }
}
