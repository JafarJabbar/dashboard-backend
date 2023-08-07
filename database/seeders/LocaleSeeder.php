<?php

namespace Database\Seeders;

use App\Models\User\User;
use App\Models\Website\Languages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user=new Languages();
        $user->name='Jafar Jabbarli';
        $user->password=bcrypt('Aa1234567@!');
        $user->email="management@admin.com";
        $user->save();
    }
}
