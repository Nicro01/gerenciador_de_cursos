<?php

namespace App\Livewire\Panel\Curso;

use App\Models\Curso;
use Livewire\Component;

class Index extends Component
{
    public $cursos;

    public $name;

    public $description;

    public function mount()
    {
        $this->cursos = Curso::with('areasDeConhecimento')->get();
    }

    public function delete($id)
    {
        try {
            Curso::find($id)->delete();

            $this->cursos = Curso::with('areasDeConhecimento')->get();
        } catch (\Exception $e) {
            return redirect()->route('cursos.index')->with('error', 'Delete as ACs associadas antes de deletar o curso ou altere o status para inativo.');
        }
    }

    public function toggleStatus($id)
    {
        $curso = Curso::find($id);

        $curso->status = !$curso->status;
        $curso->save();

        $this->cursos = Curso::with('areasDeConhecimento')->get();
    }

    public function getCurso($id)
    {
        $curso = Curso::find($id);

        $this->name = $curso->name;
        $this->description = $curso->description;
    }

    public function update($id)
    {
        $curso = Curso::find($id);

        $curso->name = $this->name;
        $curso->description = $this->description;
        $curso->save();

        $this->cursos = Curso::with('unidadesCurriculares')->get();

        session()->flash('success', 'Curso atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.panel.curso.index')->extends('layouts.panel');
    }
}
