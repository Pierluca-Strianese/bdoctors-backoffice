<?php

namespace Database\Seeders;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = config('messages');

        foreach ($messages as $arrMessages){
            
            Message::create($arrMessages);
            
        }
    }
}
