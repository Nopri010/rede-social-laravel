<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crio um usuário com os meus dados para eu testar a aplicação
        User::create([
            'name' => 'Tiago Rios da Rocha',
            'email' => 'tiago.rios@ibiruba.ifrs.edu.br',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        /////////////////////////////////////////////////
        //Crie aqui um usuário para cada membro do grupo/
        /////////////////////////////////////////////////

        User::create([
            'name' => 'Amanda Everling Viégas',
             'email' => 'amandaeverling@gmail.com',
            'email_verified_at' => now(),
           'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
         ]);

         User::create([
            'name' => 'João Vitor Benedetti',
             'email' => 'jvbenedetti1423@gmail.com',
            'email_verified_at' => now(),
           'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
         ]);

         User::create([
            'name' => 'Guilhermi Pedroso Texeira',
             'email' => 'guilhermipedroso@gmail.com',
            'email_verified_at' => now(),
           'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
         ]);
    }
}
