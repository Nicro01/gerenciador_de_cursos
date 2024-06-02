<?php

namespace App\Livewire\Panel\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Index extends Component
{

    public $users;

    public $name;

    public $email;

    public $password;

    public function mount()
    {
        $this->users = User::all();
    }

    public function delete($id)
    {
        User::find($id)->delete();

        session()->flash('success', 'Usuário deletado com sucesso!');

        $this->users = User::all();
    }

    public function toggleStatus($id)
    {
        $user = User::find($id);

        $user->status = !$user->status;
        $user->save();

        $this->users = User::all();
    }

    public function getUser($id)
    {
        $user = User::find($id);

        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update($id)
    {
        $user = User::find($id);

        $user->name = $this->name;
        $user->email = $this->email;
        $this->password != '' ?  $user->password = Hash::make($this->password) : $user->password;
        $user->save();

        session()->flash('success', 'Usuário atualizado com sucesso!');

        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.panel.users.index')->extends('layouts.panel');
    }
}
