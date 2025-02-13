<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            ['Baju Kemeja Pria', 1, 150000, 10, 'baju-kemeja.jpg'],
            ['Gaun Wanita Elegan', 2, 250000, 5, 'gaun-wanita.jpg'],
            ['Baju Anak Laki-laki', 3, 100000, 15, 'baju-anak.jpg']
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product[0],
                'categories_id'=> $product[1],
                'slug' => Str::slug($product[0]),
                'description' => 'Deskripsi produk ' . $product[0],
                'price' => $product[2],
                'stock' => $product[3],
                'image' => $product[4],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
