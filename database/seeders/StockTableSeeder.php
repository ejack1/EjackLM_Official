<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;
class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { Stock::create([
        'product_name' => 'Twinty Pencil',
        'product_desc' => 'HB 5 Drawing Pencil',
        'product_qty' => 100,
    ]);
    }
}
