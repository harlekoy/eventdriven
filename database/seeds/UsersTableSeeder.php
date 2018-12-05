<?php

use App\Models\User;
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
        foreach ($this->data() as $data) {
            User::create($data);
        }
    }

    /**
     * Get user data.
     *
     * @return array
     */
    public function data()
    {
        return [
            [
                'first_name'   => 'Harlequin',
                'last_name'    => 'Doyon',
                'password'     => 'Testing@123',
                'email'        => 'admin@admin.com',
                'phone_number' => '+639324371330',
                'avatar'       => 'https://lh3.googleusercontent.com/-3leip6HHt1c/AAAAAAAAAAI/AAAAAAAAADU/LAY-wyLxkv0/photo.jpg',
            ]
        ];
    }
}
