# 项目概要
1.本项目为学生活动管理系统

## 学生活动管理系统后台
## 1.从github拉代码
git clone https://github.com/ryh1008611/ActivitySystem.git
## 2.安装
composer install
## 开始这个项目
1.复制.env文件，配置数据库,配置邮箱
2.确保本地redis打开
3.php artisan migrate:refrsh --seed 生成数据库与测试数据(不想生成可直接导入sql文件)
4.php artisan key:generate
5.php artisan jwt:secret
6.php artisan serve  启动项目
