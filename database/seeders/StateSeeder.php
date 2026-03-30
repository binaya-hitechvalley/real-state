<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Koshi Province', 'code' => 'Province No. 1'],
            ['name' => 'Madhesh Province', 'code' => 'Province No. 2'],
            ['name' => 'Bagmati Province', 'code' => 'Bagmati Province'],
            ['name' => 'Gandaki Province', 'code' => 'Gandaki Province'],
            ['name' => 'Lumbini Province', 'code' => 'Lumbini Province'],
            ['name' => 'Karnali Province', 'code' => 'Karnali Province'],
            ['name' => 'Sudurpashchim Province', 'code' => 'Sudurpashchim Province'],
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
