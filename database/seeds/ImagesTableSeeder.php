<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];
        $arr_num = [1,2,3,4,5,6,7,8,9,10];
        $arr_url = ['/file/1.jpg','/file/2.jpg','/file/3.jpg','/file/4.jpg','/file/5.jpg','/file/6.jpg','/file/7.jpg','/file/8.jpg','/file/9.jpg','/file/10.jpg'];
        
        for($i = 0;$i<40;$i++)
        {
          
            array_push($data,[
                'activity_id' => $arr_num[array_rand($arr_num,1)],
                'type' => 2,
                'OriginalName' => 'img_'.$i,
                'fileName' => 'img_'.$i,
                'fileType' => 'image/jpeg',
                'url' =>$arr_url[array_rand($arr_url,1)],
                'operter' => 2
            ]);
        }
        DB::table('images')->insert($data);
    }
}
