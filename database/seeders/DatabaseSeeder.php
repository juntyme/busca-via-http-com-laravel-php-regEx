<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data =  Carbon::now();

        /** Criar Usuario */
        DB::table('users')->insert([
            'name' => 'Usuário Teste',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'remember_token' => Hash::make('123456789'),
            'email_verified_at' => $data,
            'created_at' => $data,
            'updated_at' => $data,
        ]);
    }
}
