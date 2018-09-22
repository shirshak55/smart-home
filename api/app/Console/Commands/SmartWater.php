<?php

namespace App\Console\Commands;

use App\Smartpower;
use App\Smartwater as SmartwaterModel;
use Illuminate\Console\Command;

class SmartWater extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smart:water';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Smart Water Command';

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
        $smart_water = SmartwaterModel::first();
        $smart_water_data = $smart_water->data;
        $motor = Smartpower::where('pin_number', $smart_water_data['motor_pin_number'])->first();

        $current_water_level = $smart_water->getCurrentWaterLevel();

        if($current_water_level == 'unknown'){
            $this->info('No water level found');
            return;
        }

        // Turn on Motor
        if($current_water_level <= $smart_water_data['minimum_level']){
            $this->info('Turning on Motor');
            $motor->forceFill(['pin_status'=>true])->update();
        }

        if($current_water_level >= $smart_water_data['maximum_level']){
            $this->info('Turning off motor');
            $motor->forceFill(['pin_status'=>false])->update();
        }
    }
}
