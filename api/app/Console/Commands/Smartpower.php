<?php

namespace App\Console\Commands;

use DateTime;
use DateTimeZone;
use Illuminate\Console\Command;

class Smartpower extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smart:power';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Smart Power Management';

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
     * @return mixed
     */
    public function handle()
    {
        $smart_power_tools = \App\Smartpower::all();

        foreach($smart_power_tools as $tool)
        {
            $conditons = $tool->conditions;

            if(!is_array($conditons)){
                continue;
            }

            foreach($conditons as $conditon){
                if($conditon['active'] != 'True')
                {
                    $this->info('This condition is Inactive');
                    continue;
                }

                $dateTime = new DateTime('now', new DateTimeZone('Asia/Kathmandu'));
                $current_date_time = $dateTime->format("h:i A");

                $this->info('Current Time is '.$current_date_time);

                if($power_on_time = $conditon['power_on'])
                {
                    if ($power_on_time == $current_date_time) {
                        $this->info('Powering on the pin '. $tool->pin_number);
                        $tool->setPin();
                    }
                }

                if($power_off_time = $conditon['power_off'])
                {

                    if ($power_on_time == $current_date_time) {
                        $this->info('Powering off the pin '. $tool->pin_number);
                        $tool->setPin();
                    }
                }
            }
        }
    }
}
