<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::table('products')->insert([

                [
                    'name' => 'product one',
                    'description' => 'description one',
                    'price' => '2000.55',
                    'quantity'=>'5',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'product two',
                    'description' => 'description two',
                    'price' => '18000',
                    'quantity'=>'15',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'product three',
                    'description' => 'description three',
                    'price' => '3000.83',
                    'quantity'=>'10',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'product Four',
                    'description' => 'description Four',
                    'price' => '4350.83',
                    'quantity'=>'6',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'product Five',
                    'description' => 'description Five',
                    'price' => '1000.71',
                    'quantity'=>'4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
    
            ]);
        } catch (\Exception  $e) {
            \Log::error($e->getMessage());
        }
    
    }
}
