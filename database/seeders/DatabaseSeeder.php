<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        \App\Models\User::factory()->create([
            'name' => 'Loan Admin',
            'email' => 'admin@fnb.loan.co.zm',
            'password' => bcrypt('password'),
            'job_type' => 'full time',
            'base_salary' => 20000
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Loan Staff',
            'email' => 'staff@fnb.loan.co.zm',
            'password' => bcrypt('password'),
            'job_type' => 'full time',
            'base_salary' => 20000
        ]);

        Role::factory()->create([
            'name' => 'admin'
        ]);
        Role::factory()->create([
            'name' => 'staff'
        ]);
    }
}
