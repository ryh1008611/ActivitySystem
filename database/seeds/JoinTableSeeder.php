<?php

use Illuminate\Database\Seeder;

class JoinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'user_id' => '5',
                'activity_id' => '1',
                'status' => '0'
            ],
            [
                'user_id' => '6',
                'activity_id' => '1',
                'status' => '0'
            ],
            [
                'user_id' => '7',
                'activity_id' => '1',
                'status' => '0'
            ],
            [
                'user_id' => '8',
                'activity_id' => '1',
                'status' => '0'
            ],
            [
                'user_id' => '9',
                'activity_id' => '1',
                'status' => '0'
            ],
        ];
        DB::table('activity_users')->insert($data);
    }
}
