<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $song = new \App\Song();
        $song->name = 'Con đường mưa';
        $song->singer = 'Cao Thái Sơn';
        $song->lyric = 'Đứng dưới con đường mưa anh vô tình nhớ một nụ cười...';
        $song->category = 'Nhạc trẻ';
        $song->save();

        $song = new \App\Song();
        $song->name = 'Sapa nơi gặp gỡ đất trời';
        $song->singer = 'Trọng Tấn';
        $song->lyric = 'Bồng bềnh bồng bềnh mây trắng...';
        $song->category = 'Nhạc quê hương';
        $song->save();
    }
}
