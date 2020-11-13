<?php

use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
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
                'user_id' => '4',
                'content' => '开展“安全用药 健康齐鲁”培训活动，邀请省、市药品监管部门和行业专家对相关政策和知识进行普及，提升我市药品零售企业企业负责人、质量负责人的药品质量管理知识，全面提高药品质量安全水平。',
                'adress' => '活动中心',
                'start' => '2020-11-12 00:00:00',
                'end' => '2020-11-22 00:00:00'
            ]
        ];
        DB::table('activity')->insert($data);
    }
}
