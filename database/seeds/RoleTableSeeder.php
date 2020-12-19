<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = [
            [
                'name' => '管理员',
                'permissions' => '1',
                'Role_Key'=>'ADMIN',
                'description' => '拥有其他角色的所有权限'
            ],
            [
                'name' => '老师',
                'permissions' => '2',
                'Role_Key'=>'TEACHER',
                'description' => '可以审核活动和群发邮件'
            ],
            [
                'name' => '社团负责人',
                'permissions' => '3',
                'Role_Key'=>'COMMUNITY',
                'description' => '可以申请活动和编辑活动，群发邮件'
            ],
            [
                'name' => '学生',
                'permissions' => '4',
                'Role_Key'=>'STUDENT',
                'description' => '可以浏览活动和参加活动'
            ]
        ];
        $role_user = [
            [
                'user_id' => '1',
                'role_id' => '1'
            ],
            [
                'user_id' => '2',
                'role_id' => '2'
            ],
            [
                'user_id' => '3',
                'role_id' => '3'
            ],
            [
                'user_id' => '4',
                'role_id' => '4'
            ],
            [
                'user_id' => '5',
                'role_id' => '4'
            ],
            [
                'user_id' => '6',
                'role_id' => '4'
            ],
            [
                'user_id' => '7',
                'role_id' => '4'
            ],
            [
                'user_id' => '8',
                'role_id' => '4'
            ],
            [
                'user_id' => '9',
                'role_id' => '4'
            ],
            [
                'user_id' => '10',
                'role_id' => '4'
            ]
        ];
        DB::table('role')->insert($role);
        DB::table('role_user')->insert($role_user);
    }
}
