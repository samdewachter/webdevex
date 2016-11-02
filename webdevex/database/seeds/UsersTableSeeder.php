<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Sam De Wachter',
            'email' => 'samdewachter@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => true,
            'contestant' => false,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Tim De Wachter',
            'email' => 'timdewachter@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'joske vermeulen',
            'email' => 'joskevermeulen@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Tom Roels',
            'email' => 'tomroels@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Jeffrey Moorthamer',
            'email' => 'jeffreymoorthamer@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Yorrick',
            'email' => 'yorrickvergauwen@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Dieter Somers',
            'email' => 'dietersomers@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Jeff Monballiu',
            'email' => 'jeffmonballiu@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Bennert Robberect',
            'email' => 'bennertrobberecht@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Cedric Hillegeer',
            'email' => 'cedrichillegeer@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Jules Geens',
            'email' => 'julesgeens@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

        DB::table('users')->insert([
            'name' => 'Bert Van Hove',
            'email' => 'bertvanhove@hotmail.com',
            'password' => bcrypt('123456'),
            'admin' => false,
            'contestant' => true,
            'disqualified' => false,
        ]);

    }
}
