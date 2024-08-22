<?php

namespace App\Livewire\Panel\AreaDeConhecimento;

use App\Models\AreaDeConhecimento;
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
        $ac = AreaDeConhecimento::find($id);

        try {
            DB::beginTransaction();

            $ac->curso()->update([
                'duration' => $ac->curso()->first()->duration - $ac->unidadesCurriculares()->sum('duration')
            ]);

            $ac->unidadesCurriculares()->delete();

            $ac->delete();

            DB::commit();

            $this->acs = AreaDeConhecimento::all();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.panel.area-de-conhecimento.index')->extends('layouts.panel');
    }
}
