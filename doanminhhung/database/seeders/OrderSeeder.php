<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    private $faker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->faker=Faker::create();
 
        for($i=1;$i<=10;$i++){
            Order::insert([
                'user_id' => 06,
                'name' =>  'order',
                'email' =>  $this->faker->unique()->email,
                'phone' => '0866190841',
                'address' => 'phuoclongb',
                'note' => 'cẩn thận',
                'created_by' => 1,
                'updated_by' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
