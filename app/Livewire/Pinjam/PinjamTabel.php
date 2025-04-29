<?php

namespace App\Livewire\Pinjam;

use Livewire\Component;

class PinjamTabel extends Component
{
    // public $pinjam;

    public function mount()
    {
        // $this->pinjam =
    }
    
    // public function show($id)
    // {
    //     $this->pinjam = \App\Models\Peminjam::find($id);
    // }

    public function render()
    {
        return view('livewire.pinjam.pinjam-tabel',[
            'pinjam' => \App\Models\Peminjam::with('detailPeminjam')->orderby('id', 'desc')->paginate(8)
        ]);
    }
}
