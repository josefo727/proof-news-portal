<?php

namespace App\Services;

use App\Adapters\RandomUserAdapter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService
{
    protected $adapter;

    public function __construct(RandomUserAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function createUsersFromRandomUserApi($quantity = 1)
    {
        $usersData = $this->adapter->fetchUsers($quantity);

        foreach ($usersData as $userData) {
            $name = "{$userData['name']['title']} {$userData['name']['first']} {$userData['name']['last']}";
            $email = $userData['email'];
            $password = Hash::make($userData['login']['password']);
            $image = $userData['picture']['large'];
            $uid = $userData['login']['uuid'];

            $user = User::firstOrCreate(
                ['uid' => $uid],
                [
                    'name' => $name,
                    'email' => $email,
                    'email_verified_at' => now(),
                    'password' => $password,
                    'image' => $image,
                    'uid' => $uid,
                ]
            );

            $authorRole = Role::query()->where('name', 'author')->first();

            $user->assignRole($authorRole);

        }
    }
}
