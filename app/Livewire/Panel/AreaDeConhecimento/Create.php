<?php

namespace App\Livewire\Panel\AreaDeConhecimento;

use App\Models\Curso;
use Livewire\Component;

class Create extends Component
{
    public $color;
    public $name;

    public $cursos;


    public $curso;

    public function mount()
    {
        $this->cursos = Curso::all();

        $this->curso = $this->cursos->first()->id;
    }

    public function store()
    {

        $this->validate([
            'name' => 'required',
            'color' => 'required'
        ]);

        $selectedCurso = Curso::find($this->curso);

        $selectedCurso->areasDeConhecimento()->create([
            'name' => $this->name,
            'color' => $this->color
        ]);

        return redirect()->route('ac.index')->with('success', 'Área de conhecimento criada com sucesso!');
    }

    public function render()
    {
        return view('livewire.panel.area-de-conhecimento.create')->extends('layouts.panel');
    }
}
