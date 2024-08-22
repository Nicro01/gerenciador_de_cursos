<?php

namespace App\Livewire\Panel\UnidadeCurricular;

use App\Models\AreaDeConhecimento;
use App\Models\Curso;
use App\Models\UnidadeCurricular;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $acs;

    public $name;

    public $area_de_conhecimento;

    public $carga_horaria;

    public $description;

    public function mount()
    {
        if (AreaDeConhecimento::all()->isEmpty()) {
            return redirect()->route('cursos.index')->with('error', 'Você precisa criar uma AC antes de criar uma unidade curricular!');
        }

        $this->acs = AreaDeConhecimento::all();

        $this->area_de_conhecimento = $this->acs->first()->id;
    }

    public function store()
    {
        $selectedAc = AreaDeConhecimento::find($this->area_de_conhecimento);

        $this->validate([
            'name' => 'required',
            'carga_horaria' => 'required',
            'description' => 'required'
        ]);

        try {

            DB::beginTransaction();

            $selectedAc->unidadesCurriculares()->create([
                'name' => $this->name,
                'duration' => $this->carga_horaria,
                'description' => $this->description
            ]);

            $selectedAc->curso()->update(['duration' => $selectedAc->curso()->sum('duration') + $this->carga_horaria]);

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->route('ucs.index')->with('error', $e->getMessage());
        }

        return redirect()->route('ucs.index')->with('success', 'Unidade Curricular criada com sucesso!');
    }

    public function render()
    {
        return view('livewire.panel.unidade-curricular.create')->extends('layouts.panel');
    }
}
