<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;


class AuthorSeeder extends Seeder
{
    public function run()
    {
        Author::create([
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
        ]);
    }
}
