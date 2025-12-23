<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Romance',
            'Ficção Científica',
            'Fantasia',
            'Terror',
            'Suspense',
            'História',
            'Biografia',
            'Autoajuda',
            'Negócios',
            'Aventura',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
