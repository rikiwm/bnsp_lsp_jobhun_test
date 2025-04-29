<?php

namespace App\Livewire\Pinjam;

use Livewire\Component;
use App\Models\Peminjam;
use App\Models\Buku;

class PinjamShow extends Component
{
    public $pinjam;
    public $tanggal_pengembalian;
    public $denda;

    public function mount($id)
    {
        if (!$id) {
            abort(404, 'ID not provided');
        }

        $this->pinjam = Peminjam::with('detailPeminjam.buku', 'user')->find($id);

        if (!$this->pinjam) {
            abort(404, 'Peminjam not found');
        }
    }

    public function returnBook()
    {
       $data = \App\Models\Pengembalian::updateOrCreate([
           'peminjams_id' => $this->pinjam->id,
           'accept_id' => auth()->user()->id,
           'tanggal_pengembalian' => $this->tanggal_pengembalian,
           'denda' => $this->denda,
       ]);
       foreach ($this->pinjam->detailPeminjam as $key => $detail) {
        $book = Buku::find($detail['buku_id']);
        $book->stok += $detail->jumlah;
        $book->save();
       }

       $this->dispatch('notify', ['variant' => 'success', 'title' => 'Success!', 'message' => 'Data Berhasil Dihapus']);
       $this->redirectIntended(default: route('pinjam.peminjaman-tabel', absolute: true), navigate: true);

    }

    public function render()
    {
        return view('livewire.pinjam.pinjam-show');
    }
}
