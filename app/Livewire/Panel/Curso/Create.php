<?php

namespace App\Livewire\Panel\Curso;

use App\Models\Curso;
use Livewire\Component;

class Create extends Component
{

    public $name;
    public $description;

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Curso::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->name = '';
        $this->description = '';

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');
    }

    public function render()
    {
        return view('livewire.panel.curso.create')->extends('layouts.panel');
    }
}
