<?php

namespace Database\Seeders;

use App\Models\Facultet;
use App\Models\Grux;
use App\Models\Kurs;
use App\Models\Manzil;
use App\Models\Talaba;
use App\Models\Universitet;
use App\Models\User;
use App\Models\Yunalish;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        for ($i=1; $i <=7; $i++) { 
            Kurs::create(['name'=>'Kurs'.$i]);
        }
        for ($i=1; $i <=12; $i++) { 
            Manzil::create(['name'=>'Manzil'.$i]);
        }
        for ($i=1; $i <=10; $i++) { 
            Universitet::create(['name'=>'Universitet'.$i]);
        }
        for ($i=1; $i <=30 ; $i++) { 
            Facultet::create(['name'=>'Facultet'.$i,'universitet_id'=>rand(1,10)]);
        }
        for ($i=1; $i <=100; $i++) { 
            Yunalish::create(['name'=>'Yunalish'.$i,'facultet_id'=>rand(1,30)]);
        }
        for ($i=1; $i <=1000; $i++) { 
            Grux::create(['name'=>rand(1,1000),'kurs_id'=>rand(1,7),'yunalish_id'=>rand(1,30)]);
        }
        for ($i=1; $i <=15000; $i++) { 
            Talaba::create(['name'=>fake()->name(),'tel'=>'+998991234'.$i,'grux_id'=>rand(1,1000),'manzil_id'=>rand(1,12)]);
        }
    }
}
