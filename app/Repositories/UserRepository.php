<?php

namespace App\Repositories;
use App\Interface\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        return $this->user->all();
    }

    public function store(array $userData)
    {
        return $this->user->create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
        ]);
    }

    public function edit($id)
    {

    }

    public function update(array $data)
    {
        $userId = $data['id'];
        $this->user->findorfail($userId)->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }


    public function destroy($userId)
    {
        return $this->user->findorfail($userId)->delete();
    }

}
