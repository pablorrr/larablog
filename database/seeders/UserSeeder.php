<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $usersContentTable = [
            'user1' => ['name' => 'pawel1', 'email' => 'pawel1@op.pl'],//pass: password
            'user2' => ['name' => 'pawel2', 'email' => 'pawel2@op.pl'],//pass: password
            'user3' => ['name' => 'pawel3', 'email' => 'pawel3@op.pl'],//pass: password

            'user4' => ['name' => 'pawel4', 'email' => 'pawel4@op.pl'],//pass: password
            'user5' => ['name' => 'pawel5', 'email' => 'pawel5@op.pl'],//pass: password
            'user6' => ['name' => 'pawel6', 'email' => 'pawel6@op.pl'],//pass: password

            'user7' => ['name' => 'pawel7', 'email' => 'pawel7@op.pl'],//pass: password
            'user8' => ['name' => 'pawel8', 'email' => 'pawel8@op.pl'],//pass: password
            'user9' => ['name' => 'pawel9', 'email' => 'pawel9@op.pl'],//pass: password
        ];


        foreach ($usersContentTable as $user) {
            User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email']
            ]);
        }

    }
}
