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

    public $search;

    public $area_de_conhecimento;

    public $selectedAcs = [];

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
        $this->validate([
            'name' => 'required',
            'carga_horaria' => 'required',
            'description' => 'required',
            'selectedAcs' => 'required'
        ]);

        try {

            DB::beginTransaction();


            $uc = UnidadeCurricular::create([
                'name' => $this->name,
                'description' => $this->description,
                'duration' => $this->carga_horaria,
            ]);

            foreach ($this->selectedAcs as $ac) {
                $selectedAc = AreaDeConhecimento::find($ac);

                $selectedAc->unidadesCurriculares()->create([
                    'unidade_curricular_id' => $uc->id,
                ]);

                $selectedAc->curso()->update(['duration' => $selectedAc->curso()->sum('duration') + $this->carga_horaria]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('ucs.index')->with('error', $e->getMessage());
        }

        return redirect()->route('ucs.index')->with('success', 'Unidade Curricular criada com sucesso!');
    }

    public function updatedSearch()
    {
        $this->acs = AreaDeConhecimento::where('name', 'like', '%' . $this->search . '%')->limit(5)->get();
    }

    public function selectAc(AreaDeConhecimento $ac)
    {
        if ($this->selectedAcs && in_array($ac->id, $this->selectedAcs)) {

            $item = array_search($ac->id, $this->selectedAcs);

            unset($this->selectedAcs[$item]);

            return;
        }

        $this->selectedAcs[] = $ac->id;
    }

    public function render()
    {
        return view('livewire.panel.unidade-curricular.create')->extends('layouts.panel');
    }
}
