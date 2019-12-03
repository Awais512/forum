<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Laravel 6',
            'slug' => str_slug('Laravel 6')
        ]);

        Channel::create([
            'name' => 'Vue js 3',
            'slug' => str_slug('Vue js 3')
        ]);

        Channel::create([
            'name' => 'React Js',
            'slug' => str_slug('React Js')
        ]);
    }
}
