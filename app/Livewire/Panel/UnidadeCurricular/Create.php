<?php

namespace App\Livewire\Panel\UnidadeCurricular;

use App\Models\Curso;
use App\Models\UnidadeCurricular;
use Livewire\Component;

class Create extends Component
{
    public $cursos;

    public $name;

    public $curso_id;

    public $carga_horaria;

    public $description;

    public function mount()
    {
        if (Curso::all()->isEmpty()) {
            return redirect()->route('cursos.index')->with('error', 'Você precisa criar um curso antes de criar uma unidade curricular!');
        }

        $this->cursos = Curso::all();

        $this->curso_id = $this->cursos->first()->id;
    }

    public function store()
    {
        UnidadeCurricular::create([
            'name' => $this->name,
            'description' => $this->description,
            'curso_id' => $this->curso_id,
            'duration' => $this->carga_horaria,
        ]);

        Curso::find($this->curso_id)->update([
            'duration' => Curso::find($this->curso_id)->duration + $this->carga_horaria
        ]);

        return redirect()->route('ucs.index')->with('success', 'Unidade Curricular criada com sucesso!');
    }

    public function render()
    {
        return view('livewire.panel.unidade-curricular.create')->extends('layouts.panel');
    }
}
