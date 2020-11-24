<?php

use Illuminate\Database\Seeder;

class ActivityUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $data = [
            [
                'user_id' => '5',
                'activity_id' => '1',
                'status' => true
            ],
            [
                'user_id' => '6',
                'activity_id' => '1',
                'status' => false
            ],
            [
                'user_id' => '7',
                'activity_id' => '1',
                'status' => false
            ],
            [
                'user_id' => '8',
                'activity_id' => '1',
                'status' => false
            ],
            [
                'user_id' => '9',
                'activity_id' => '1',
                'status' => false
            ],
        ];
        DB::table('activity_user')->insert($data);
    }
}
