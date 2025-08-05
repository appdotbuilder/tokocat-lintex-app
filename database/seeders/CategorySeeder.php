<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cat Tembok',
                'description' => 'Cat untuk dinding interior dan eksterior',
            ],
            [
                'name' => 'Cat Kayu',
                'description' => 'Cat khusus untuk permukaan kayu',
            ],
            [
                'name' => 'Cat Besi',
                'description' => 'Cat anti karat untuk logam dan besi',
            ],
            [
                'name' => 'Cat Lantai',
                'description' => 'Cat khusus untuk lantai dan epoxy',
            ],
            [
                'name' => 'Primer',
                'description' => 'Cat dasar sebelum pengecatan utama',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}