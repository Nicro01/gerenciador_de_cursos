<?php

namespace App\Livewire\Panel\UnidadeCurricular;

use App\Models\Curso;
use App\Models\UnidadeCurricular;
use Livewire\Component;

class Index extends Component
{

    public $ucs;

    public $name;

    public $description;

    public $duration;

    public $curso_id;

    public $cursos;

    public function mount()
    {
        $this->ucs = UnidadeCurricular::all();
    }

    public function delete($id)
    {
        Curso::find($this->ucs->find($id)->curso_id)->update([
            'duration' => Curso::find($this->ucs->find($id)->curso_id)->duration - $this->ucs->find($id)->duration
        ]);

        UnidadeCurricular::find($id)->delete();

        session()->flash('success', 'Unidade Curricular deletada com sucesso!');

        $this->ucs = UnidadeCurricular::all();
    }

    public function toggleStatus($id)
    {
        $uc = UnidadeCurricular::find($id);

        $uc->status = !$uc->status;
        $uc->save();

        $this->ucs = UnidadeCurricular::all();
    }

    public function getUC($id)
    {
        $uc = UnidadeCurricular::find($id);

        $this->name = $uc->name;
        $this->description = $uc->description;
        $this->duration = $uc->duration;
        $this->curso_id = $uc->curso_id;

        $this->cursos = Curso::all();
    }

    public function update($id)
    {
        $uc = UnidadeCurricular::find($id);

        $uc->curso->update([
            'duration' => $uc->curso->duration - $uc->duration + $this->duration
        ]);

        $uc->name = $this->name;
        $uc->description = $this->description;
        $uc->duration = $this->duration;
        $uc->curso_id = $this->curso_id;
        $uc->save();

        session()->flash('success', 'Unidade Curricular atualizada com sucesso!');

        $this->ucs = UnidadeCurricular::all();
    }

    public function render()
    {
        return view('livewire.panel.unidade-curricular.index')->extends('layouts.panel');
    }
}
