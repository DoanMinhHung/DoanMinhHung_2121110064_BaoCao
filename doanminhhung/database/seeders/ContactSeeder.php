<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=10;$i++){
            Contact::insert([
                'user_id'=>10,
                'name' =>  'brand '.$i,
                'email' =>  'hung@'.$i,
                'phone' => '0866190841',
                'title' => 'title',
                'content' => 'dep',
                'replay_id' => 1,
                'created_by' => 1,
                'updated_by' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
