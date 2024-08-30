<?php

namespace App\Livewire\Panel\AreaDeConhecimento;

use App\Models\AreaDeConhecimento;
use App\Models\Curso;
use App\Models\PivotAcUc;
use App\Models\UnidadeCurricular;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $acs;

    public function mount()
    {
        $this->acs = AreaDeConhecimento::all();
    }

    public function toggleStatus($id)
    {
        $ac = AreaDeConhecimento::find($id);

        $ac->status = !$ac->status;
        $ac->save();
    }

    public function delete($id)
    {
        $ac = AreaDeConhecimento::find($id)->first();

        try {
            DB::beginTransaction();

            $pivot = PivotAcUc::where('area_de_conhecimento_id', $ac->id)->get();

            foreach ($pivot as $p) {

                $curso = Curso::find($ac->curso)->first();

                //dd($p->unidade_curricular_id, $curso->duration);

                $curso->duration = $curso->duration - UnidadeCurricular::find($p->unidade_curricular_id)->duration;

                $curso->save();

                $p->delete();
            }

            $ac->delete();

            DB::commit();

            $this->acs = AreaDeConhecimento::all();
        } catch (\Exception $e) {
            DB::rollBack();

            dd($e);
        }
    }

    public function render()
    {
        return view('livewire.panel.area-de-conhecimento.index')->extends('layouts.panel');
    }
}
