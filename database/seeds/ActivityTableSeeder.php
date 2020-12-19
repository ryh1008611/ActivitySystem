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

        $data = [];
        $arr_title = ['最美校园手绘-第二届卓越杯高校手绘大赛 ','野外生存活动','校园拍客大赛','计算机大赛','环湖跑','荧光夜跑'];
        $arr_content= ['全国大学生【最美校园手绘大赛】，以“弘扬校园文化，展现手绘风采”为主','题，提高艺术与设计类同学手绘专业素养，展现个人手绘魅力','同学们需完成短期野外生存考验，并且，定期到达目标地点，搭建帐篷，获取食材等主要任务。注意：活动期间注','意安全，注意森林防火，与此同时，要注意毒虫等危险生物。活动优势：具有一定的挑战性及吸引力','照片或视频就可以，来记录校园内发生的你所见到的各种“事”，当然可以是美事、喜事、大事，以可以多人组队或个人参赛，如宿舍内拍的宿舍幽默小短片，个人生活中搞怪片段，温情感动的校园生活片段等等....'];
        $arr_adress=['行政楼','图书馆','活动中心','教学楼','田径场','校门口','天狮岭公园'];
        $arr_prize=['1000元现金','留学奖金10000元','现金奖金3000元','证书+奖杯','留学奖金6000元','现金奖金2000元','作品出版书籍副主编+作品出版+'];
        $arr_rule=['作品要求原创校园手绘，尺寸大小表达方式不限，临摹作品将在总分上降低20%（如100-20=80），盗用他人作品取消比赛资格/线上投 票按最终票数的百分比计分，最高分为10分/现场投 票30位专家评委，每人3票，1票为1分/线上投 票积分和专家投 票积分总和评出一等奖 1名、二等奖 2名、三等奖3名/人气奖按在线投 票排名第一位','活动期间注意安全/注意森林防火','作品要单独完成/不准抄袭，一经发现，不授予比赛资格'];
        for($i = 0;$i<17;$i++)
        {
          
            array_push($data,[
                'user_id' => '4',
                'title' => $arr_title[array_rand($arr_title,1)],
                'content' => $arr_content[array_rand( $arr_content,1)],
                'adress' => $arr_adress[array_rand($arr_adress,1)],
                'status' => '0',
                'prize' =>$arr_prize[array_rand($arr_prize,1)],
                'rule' => $arr_rule[array_rand($arr_rule,1)],
                'start' => '2020-11-11',
                'end' => '2020-11-23'
            ]);
        }
        DB::table('activity')->insert($data);
    }
}
