<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("posts")->insert(
            [
                'name' => 'International Exhibition',
                'link' => 'http://itie-ups.com/iief/?page=1',
                'filename' => 'IIEF.jpg'
            ]
        );
    }
}
