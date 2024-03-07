<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'is_admin' => '1',
        //     'name' => 'rizky',
        //     'username' => 'adminshop1',
        //     'password' => Hash::make('iniadmin'),
        //     'email' => 'admin@medicshop.com',
        //     'contact' => '084344432',
        // ]);

        DB::table('users')->insert([
            [
                'is_admin' => '1',
                'name' => 'rizky',
                'username' => 'adminshop1',
                'password' => Hash::make('iniadmin'),
                'email' => 'admin@medicshop.com',
                'contact' => '084344432',
            ],
            [
                'is_admin' => '0',
                'name' => 'kiba',
                'username' => 'customer1',
                'password' => Hash::make('inicustomer'),
                'email' => 'customer@gmail.com',
                // 'datebirth' => '2001-08-01',
                // 'gender' => 'Laki-laki',
                // 'address' => 'rungkut madya 02',
                // 'city' => 'surabaya',
                // 'paypal_id' => 'DFHTRRGSDFSEFWEFAS',
                'contact' => '084342784',
            ],
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Perlengkapan Rumah sakit',
                'desc' => 'Peralatan untuk kebutuhan rumah sakit'
            ],
            [
                'name' => 'Alat kesehatan pribadi',
                'desc' => 'Peralatan untuk keperluan pribadi'
            ],
            [
                'name' => 'Alat laboratorium',
                'desc' => 'Peralatan untuk kebutuhan laboratorium'
            ],
            [
                'name' => 'Emergency KIT',
                'desc' => 'Peralatan untuk keperluan P3K'
            ],
        ]);
    }
}
