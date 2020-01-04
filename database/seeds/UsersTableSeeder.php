<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'role' => 'admin',
                'gender' => 'Male',
                'contact_number' => '09175602600',
                'email' => 'admin@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$4E6ExeyvAvGCowx74irAbOkvjAAR8wQxhKu83PW9JULRmtuugy0t.',
                'remember_token' => NULL,
                'created_at' => '2019-12-10 10:49:48',
                'updated_at' => '2019-12-10 10:49:48',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'role' => 'user',
                'gender' => 'Female',
                'contact_number' => '09391486041',
                'email' => 'user@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$lJ7z6mpcjMXQr9aSU171i.ALf0lNK571FEKLU2nNPQ.yn6KeiPSXy',
                'remember_token' => NULL,
                'created_at' => '2019-12-10 10:50:22',
                'updated_at' => '2019-12-10 10:50:22',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'user2',
                'role' => 'user',
                'gender' => 'Female',
                'contact_number' => '09174562345',
                'email' => 'user2@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$5FzhRopQPsJiabpRvWmMWeylqoFp8YA/p7qDP/JtjIumSqQ4Ho3Vi',
                'remember_token' => NULL,
                'created_at' => '2019-12-11 11:11:11',
                'updated_at' => '2019-12-11 11:11:11',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Super Admin',
                'role' => 'super_admin',
                'gender' => 'Male',
                'contact_number' => '09175602600',
                'email' => 'superadmin@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$no8paoJ4W6RzntcUEfkFPesXBpW6ed8rgvkWblKLm42rW15l31j7S',
                'remember_token' => NULL,
                'created_at' => '2020-01-04 06:30:40',
                'updated_at' => '2020-01-04 06:30:40',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}