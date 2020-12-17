<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
                'username' => 'admin',
                'password' => bcrypt('123456'),
                'name' => '管理员'
            ],
            [
                'username' => 'teacher',
                'password' => bcrypt('123456'),
                'name' => '老师' 
            ],
            [
                'username' => 'student',
                'password' => bcrypt('123456'),
                'name' => '学生'  
            ],
            [
                'username' => 'community',
                'password' => bcrypt('123456'),
                'name' => '社团管理员'  
            ]
            ];
        $student = [
            [
                'username' => 'zhangsan',
                'password' => bcrypt('123456'),
                'name' => '张三',
                'academy' => '计算机工程学院',
                'major' => '软件工程',
                'classNum' => '2017',
                'email' => '987896519@qq.com'
            ],
            [
                'username' => 'lisi',
                'password' => bcrypt('123456'),
                'name' => '李四',
                'academy' => '电气工程学院',
                'major' => '电气',
                'classNum' => '2018',
                'email' => '510728980@qq.com'
            ],
            [
                'username' => 'wangwu',
                'password' => bcrypt('123456'),
                'name' => '王五',
                'academy' => '汽车学院',
                'major' => '汽修',
                'classNum' => '2019',
                'email' => '49630061@qq.com'
            ],
            [
                'username' => 'liuliu',
                'password' => bcrypt('123456'),
                'name' => '刘六',
                'academy' => '管理学院',
                'major' => '会计',
                'classNum' => '2020',
                'email' => '974994372@qq.com'
            ],
            [
                'username' => 'wangqi',
                'password' => bcrypt('123456'),
                'name' => '王七',
                'academy' => '计算机工程学院',
                'major' => '软件工程',
                'classNum' => '2021',
                'email' => '377415390@qq.com'
            ],
            [
                'username' => 'ruanba',
                'password' => bcrypt('123456'),
                'name' => '阮八',
                'academy' => '管理学院',
                'major' => '电子商务',
                'classNum' => '2022',
                'email' => '2323702224@qq.com'
            ],
        ];   
            DB::table('users')->insert($data);
            DB::table('users')->insert($student);
    }
}
