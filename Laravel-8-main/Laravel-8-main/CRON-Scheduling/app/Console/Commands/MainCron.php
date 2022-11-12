<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mail;

class MainCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */ 
    protected $signature = 'main:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
        $da = array('data'=>'Cron Testing');
        Mail::send('mail', $da, function($message){
            $message->to('hasanaunoy204@gmail.com')->subject('Every minutes mail cron testing');
        });
    }
}
