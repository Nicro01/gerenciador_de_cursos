<?php

namespace App\Livewire\Panel\UnidadeCurricular;

use App\Models\AreaDeConhecimento;
use App\Models\Curso;
use App\Models\PivotAcUc;
use App\Models\UnidadeCurricular;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{

    public $ucs;

    public $id;

    public $name;

    public $description;

    public $duration;

    public $area_de_conhecimento;

    public $acs;

    public function mount()
    {
        $this->ucs = UnidadeCurricular::all();
    }

    public function delete($id)
    {
        $uc = UnidadeCurricular::find($id)->areaDeConhecimento()->get();

        $uc_id = UnidadeCurricular::find($id)->areaDeConhecimento()->first()->unidade_curricular_id;

        //dd($uc);

        foreach ($uc as $u) {

            $ac = AreaDeConhecimento::find($u->area_de_conhecimento_id)->first();

            //dd(UnidadeCurricular::find($u->unidade_curricular_id), $u->unidade_curricular_id);

            Curso::find($ac->curso_id)->update([
                'duration' => Curso::find($ac->curso_id)->duration - UnidadeCurricular::find($u->unidade_curricular_id)->duration
            ]);

            PivotAcUc::where('unidade_curricular_id', $u->unidade_curricular_id)->delete();
        }

        UnidadeCurricular::find($uc_id)->delete();


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

        $this->id = $uc->id;
        $this->name = $uc->name;
        $this->description = $uc->description;
        $this->duration = $uc->duration;
        $this->area_de_conhecimento = $uc->area_de_conhecimento_id;

        $this->acs = AreaDeConhecimento::all();
    }

    public function update()
    {
        try {
            DB::beginTransaction();

            $uc = UnidadeCurricular::find($this->id);

            if (!$uc) {
                throw new \Exception("Unidade Curricular não encontrada.");
            }

            $ac = AreaDeConhecimento::find($uc->area_de_conhecimento_id);
            if (!$ac) {
                throw new \Exception("Área de Conhecimento não encontrada.");
            }

            $ac->curso()->update(['duration' => $ac->curso()->first()->duration - $uc->duration]);

            if ($uc->area_de_conhecimento_id !== $this->area_de_conhecimento) {
                $old_ac = AreaDeConhecimento::find($this->area_de_conhecimento);
                if (!$old_ac) {
                    throw new \Exception("Nova Área de Conhecimento não encontrada.");
                }

                $old_ac->curso()->update(['duration' => $old_ac->curso()->first()->duration + $this->duration]);
            } else {
                $ac->curso()->update(['duration' => $ac->curso()->first()->duration + $this->duration]);
            }


            $uc->name = $this->name;
            $uc->description = $this->description;
            $uc->duration = $this->duration;
            $uc->area_de_conhecimento_id = $this->area_de_conhecimento;

            $uc->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('ucs.index')->with('error', $e->getMessage());
        }


        session()->flash('success', 'Unidade Curricular atualizada com sucesso!');

        $this->ucs = UnidadeCurricular::all();
    }

    public function render()
    {
        return view('livewire.panel.unidade-curricular.index')->extends('layouts.panel');
    }
}
