<?php
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Vijendra Maurya',
            'email' => 'admin@gmail.com',
            'password' => '10203040',
            'role' => 'admin'
        ]);
		
		$user->assignRole('admin');
		
		$user = User::create([
            'name' => 'Vijendra Maurya',
            'email' => 'user@gmail.com',
            'password' => '10203040',
            'role' => 'user'
        ]);
		
		$user->assignRole('user');
    }
}