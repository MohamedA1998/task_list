<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if( $this->command->confirm('Do You Wont To Refresh DataBase') ){
            $this->command->call('migrate:refresh');
            $this->command->info('DataBase Was Refreshed');
        }

        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(1)->unverified()->StaticUser()->create();
        \App\Models\Task::factory(50)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}