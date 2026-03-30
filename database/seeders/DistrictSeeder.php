<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            // Koshi Province (Province No. 1)
            ['state_id' => 1, 'name' => 'Bhojpur'],
            ['state_id' => 1, 'name' => 'Dhankuta'],
            ['state_id' => 1, 'name' => 'Ilam'],
            ['state_id' => 1, 'name' => 'Jhapa'],
            ['state_id' => 1, 'name' => 'Khotang'],
            ['state_id' => 1, 'name' => 'Morang'],
            ['state_id' => 1, 'name' => 'Okhaldhunga'],
            ['state_id' => 1, 'name' => 'Panchthar'],
            ['state_id' => 1, 'name' => 'Sankhuwasabha'],
            ['state_id' => 1, 'name' => 'Solukhumbu'],
            ['state_id' => 1, 'name' => 'Sunsari'],
            ['state_id' => 1, 'name' => 'Taplejung'],
            ['state_id' => 1, 'name' => 'Terhathum'],
            ['state_id' => 1, 'name' => 'Udayapur'],

            // Madhesh Province (Province No. 2)
            ['state_id' => 2, 'name' => 'Bara'],
            ['state_id' => 2, 'name' => 'Dhanusha'],
            ['state_id' => 2, 'name' => 'Mahottari'],
            ['state_id' => 2, 'name' => 'Parsa'],
            ['state_id' => 2, 'name' => 'Rautahat'],
            ['state_id' => 2, 'name' => 'Saptari'],
            ['state_id' => 2, 'name' => 'Sarlahi'],
            ['state_id' => 2, 'name' => 'Siraha'],

            // Bagmati Province
            ['state_id' => 3, 'name' => 'Bhaktapur'],
            ['state_id' => 3, 'name' => 'Chitwan'],
            ['state_id' => 3, 'name' => 'Dhading'],
            ['state_id' => 3, 'name' => 'Dolakha'],
            ['state_id' => 3, 'name' => 'Kathmandu'],
            ['state_id' => 3, 'name' => 'Kavrepalanchok'],
            ['state_id' => 3, 'name' => 'Lalitpur'],
            ['state_id' => 3, 'name' => 'Makwanpur'],
            ['state_id' => 3, 'name' => 'Nuwakot'],
            ['state_id' => 3, 'name' => 'Rasuwa'],
            ['state_id' => 3, 'name' => 'Ramechhap'],
            ['state_id' => 3, 'name' => 'Sindhuli'],
            ['state_id' => 3, 'name' => 'Sindhupalchok'],

            // Gandaki Province
            ['state_id' => 4, 'name' => 'Baglung'],
            ['state_id' => 4, 'name' => 'Gorkha'],
            ['state_id' => 4, 'name' => 'Kaski'],
            ['state_id' => 4, 'name' => 'Lamjung'],
            ['state_id' => 4, 'name' => 'Manang'],
            ['state_id' => 4, 'name' => 'Mustang'],
            ['state_id' => 4, 'name' => 'Myagdi'],
            ['state_id' => 4, 'name' => 'Nawalpur'],
            ['state_id' => 4, 'name' => 'Parbat'],
            ['state_id' => 4, 'name' => 'Syangja'],
            ['state_id' => 4, 'name' => 'Tanahu'],

            // Lumbini Province
            ['state_id' => 5, 'name' => 'Arghakhanchi'],
            ['state_id' => 5, 'name' => 'Banke'],
            ['state_id' => 5, 'name' => 'Bardiya'],
            ['state_id' => 5, 'name' => 'Dang'],
            ['state_id' => 5, 'name' => 'Gulmi'],
            ['state_id' => 5, 'name' => 'Kapilvastu'],
            ['state_id' => 5, 'name' => 'Nawalparasi East'],
            ['state_id' => 5, 'name' => 'Palpa'],
            ['state_id' => 5, 'name' => 'Pyuthan'],
            ['state_id' => 5, 'name' => 'Rolpa'],
            ['state_id' => 5, 'name' => 'Rukum East'],
            ['state_id' => 5, 'name' => 'Rupandehi'],

            // Karnali Province
            ['state_id' => 6, 'name' => 'Dailekh'],
            ['state_id' => 6, 'name' => 'Dolpa'],
            ['state_id' => 6, 'name' => 'Humla'],
            ['state_id' => 6, 'name' => 'Jajarkot'],
            ['state_id' => 6, 'name' => 'Jumla'],
            ['state_id' => 6, 'name' => 'Kalikot'],
            ['state_id' => 6, 'name' => 'Mugu'],
            ['state_id' => 6, 'name' => 'Rukum West'],
            ['state_id' => 6, 'name' => 'Salyan'],
            ['state_id' => 6, 'name' => 'Surkhet'],

            // Sudurpashchim Province
            ['state_id' => 7, 'name' => 'Achham'],
            ['state_id' => 7, 'name' => 'Baitadi'],
            ['state_id' => 7, 'name' => 'Bajhang'],
            ['state_id' => 7, 'name' => 'Bajura'],
            ['state_id' => 7, 'name' => 'Dadeldhura'],
            ['state_id' => 7, 'name' => 'Kanchanpur'],
            ['state_id' => 7, 'name' => 'Kailali'],
            ['state_id' => 7, 'name' => 'Doti'],
            ['state_id' => 7, 'name' => 'Darchula'],
        ];

        foreach ($districts as $district) {
            District::create($district);
        }
    }
}
