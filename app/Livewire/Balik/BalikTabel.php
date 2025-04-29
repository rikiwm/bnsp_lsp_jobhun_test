<?php

namespace App\Livewire\Balik;

use Livewire\Component;

class BalikTabel extends Component
{
    public function render()
    {
        return view('livewire.balik.balik-tabel',[
            'balik' => \App\Models\Pengembalian::with('peminjam.detailPeminjam')->orderby('id', 'desc')->paginate(8)
        ]);
    }
}
