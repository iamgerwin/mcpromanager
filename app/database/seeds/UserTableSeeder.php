<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('user')->delete();

        $user = array(
        	'email' => 'gerwin.delasalas@fiametta.ph',
        	'username' => 'gerwin.delasalas',
        	'password' => md5('gerwin')
        );

        // Uncomment the below to run the seeder
         DB::table('tbl_user')->insert($user);
    }

}