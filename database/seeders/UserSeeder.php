<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name' => 'Kepala Dinas',
                'email' => 'kadin@dindik.bna',
                'password' => bcrypt('Kadin@123'),
            ],
            [
                'name' => 'Kepala Bidang',
                'email' => 'kabid@dindik.bna',
                'password' => bcrypt('Kabid@123'),
            ],
            [
                'name' => 'Kepala Seksi',
                'email' => 'kasi@dindik.bna',
                'password' => bcrypt('Kasi@123'),
            ],
            [
                'name' => 'Staff Dinas',
                'email' => 'staff@dindik.bna',
                'password' => bcrypt('Staff@123'),
            ],
            [
                'name' => 'Walidata',
                'email' => 'walidata@dindik.bna',
                'password' => bcrypt('Wali@123'),
            ],
        ];
        DB::table('users')->insert($users);
    }

}
