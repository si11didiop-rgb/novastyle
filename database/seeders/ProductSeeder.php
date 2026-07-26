<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Hoodie Oversize Noir', 'category' => 'Hoodies', 'price' => 49.99, 'stock' => 25],
            ['name' => 'Hoodie Gris Chiné', 'category' => 'Hoodies', 'price' => 44.99, 'stock' => 18],
            ['name' => 'Hoodie Rouge Flame', 'category' => 'Hoodies', 'price' => 54.99, 'stock' => 3],
            ['name' => 'T-shirt Logo Blanc', 'category' => 'T-shirts', 'price' => 24.99, 'stock' => 40],
            ['name' => 'T-shirt Oversize Noir', 'category' => 'T-shirts', 'price' => 22.99, 'stock' => 35],
            ['name' => 'T-shirt Graphic Print', 'category' => 'T-shirts', 'price' => 27.99, 'stock' => 2],
            ['name' => 'Cargo Pant Noir', 'category' => 'Pantalons', 'price' => 64.99, 'stock' => 15],
            ['name' => 'Jogger Technique Gris', 'category' => 'Pantalons', 'price' => 59.99, 'stock' => 20],
            ['name' => 'Veste Bomber Noire', 'category' => 'Vestes', 'price' => 89.99, 'stock' => 10],
            ['name' => 'Coupe-vent Rouge', 'category' => 'Vestes', 'price' => 79.99, 'stock' => 0],
            ['name' => 'Casquette NovaStyle', 'category' => 'Accessoires', 'price' => 19.99, 'stock' => 50],
            ['name' => 'Sac Banane Noir', 'category' => 'Accessoires', 'price' => 29.99, 'stock' => 12],
        ];

        foreach ($products as $data) {
            $category = Category::where('name', $data['category'])->first();

            Product::firstOrCreate(
                ['slug' => Str::slug($data['name'])],
                [
                    'category_id' => $category->id,
                    'name' => $data['name'],
                    'description' => 'Pièce streetwear NovaStyle, coupe moderne et matière premium. Idéale pour un look urbain affirmé.',
                    'price' => $data['price'],
                    'stock' => $data['stock'],
                ]
            );
        }
    }
}