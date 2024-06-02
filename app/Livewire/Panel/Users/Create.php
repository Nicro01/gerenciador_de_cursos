<?php

namespace App\Livewire\Panel\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public $email;

    public $password;

    public function register()
    {

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }


    public function render()
    {
        return view('livewire.panel.users.create')->extends('layouts.panel');
    }
}
