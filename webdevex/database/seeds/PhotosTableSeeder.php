<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            'name' => 'test1',
            'photo' => 'foto1.jpg',
            'user_id' => 2,
            'votes' => 25,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test2',
            'photo' => 'foto2.jpg',
            'user_id' => 3,
            'votes' => 14,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test3',
            'photo' => 'foto3.jpg',
            'user_id' => 4,
            'votes' => 33,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test4',
            'photo' => 'foto4.jpg',
            'user_id' => 5,
            'votes' => 6,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test5',
            'photo' => 'foto5.jpg',
            'user_id' => 6,
            'votes' => 27,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test6',
            'photo' => 'foto6.jpeg',
            'user_id' => 7,
            'votes' => 13,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test6',
            'photo' => 'foto7.jpeg',
            'user_id' => 8,
            'votes' => 6,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test6',
            'photo' => 'foto8.jpeg',
            'user_id' => 9,
            'votes' => 34,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test6',
            'photo' => 'foto9.jpg',
            'user_id' => 10,
            'votes' => 14,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test6',
            'photo' => 'foto10.jpg',
            'user_id' => 11,
            'votes' => 18,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);

        DB::table('photos')->insert([
            'name' => 'test6',
            'photo' => 'foto11.jpg',
            'user_id' => 12,
            'votes' => 22,
            'uploaded' => 1,
            'ip' => 'test',
            'period' => 1
        ]);
    }
}
