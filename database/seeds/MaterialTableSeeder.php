<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $material = [
            [
                'name' => '大帐篷',
                'describe'=>'一个很大的帐篷'
            ],
            [
                'name' => 'BT纸',
                'describe'=>'BT纸'
            ],
            [
                'name' => '剪刀',
                'describe'=>'剪刀'
            ],
            [
                'name' => '桌子',
                'describe'=>'桌子'
            ],
            [
                'name' => '红胶凳',
                'describe'=>'红胶凳'
            ],
            [
                'name' => '小推车',
                'describe'=>'小推车'
            ],
            [
                'name' => '气球',
                'describe'=>'气球'
            ]
        ];

        $lease = [
            [
                'user_id' => 4,
                'activity_id'=>1,
                'material_id'=>1,
                'num'=> 1
            ],
            [
                'user_id' => 4,
                'activity_id'=>1,
                'material_id'=>2,
                'num'=> 4
            ],
            [
                'user_id' => 4,
                'activity_id'=>1,
                'material_id'=>3,
                'num'=> 1
            ],
            [
                'user_id' => 4,
                'activity_id'=>1,
                'material_id'=>4,
                'num'=> 1
            ],
            [
                'user_id' => 4,
                'activity_id'=>1,
                'material_id'=>5,
                'num'=> 1
            ],
            [
                'user_id' => 4,
                'activity_id'=>1,
                'material_id'=>6,
                'num'=> 1
            ],
            [
                'user_id' => 4,
                'activity_id'=>1,
                'material_id'=>7,
                'num'=> 10
            ]
        ];
        DB::table('material')->insert($material);
        DB::table('activity_material')->insert($lease);
    }
}
