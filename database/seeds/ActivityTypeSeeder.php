<?php

use Illuminate\Database\Seeder;

class ActivityTypeSeeder extends Seeder
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
                'name' => '体育类',
                'ActivityCode' => '100',
            ],
            [
                'name' => '文化类',
                'ActivityCode' => '200',
            ],
            [
                'name' => '创业类',
                'ActivityCode' => '300',
            ],
            [
                'name' => '学术类',
                'ActivityCode' => '400',
            ],
            [
                'name' => '科技类',
                'ActivityCode' => '500',
            ]
        ];
        DB::table('activity_type')->insert($data);
    }
}
