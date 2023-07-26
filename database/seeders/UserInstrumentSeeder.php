<?php

namespace Database\Seeders;

use App\Models\Instrument;
use App\Models\User;
use App\Models\UserInstrument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserInstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $instrument = Instrument::first();
        foreach($users as $user){
            $data[] = ['user_id' => $user->id, 'instrument_id' => $instrument->id];
        }

        \DB::table('users_instruments')->insert($data);
    }
}
