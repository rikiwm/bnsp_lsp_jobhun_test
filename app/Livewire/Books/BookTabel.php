<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Buku;

class BookTabel extends Component
{
    public $id;

    public function destroy($id): void
    {
        $buku = Buku::find($id);
        
        try {
            if (!$buku) {
            $this->dispatch('notify', ['variant' => 'danger', 'title' => 'Success!', 'message' => 'Failed Dihapus']);

                // return redirect('/book')->with('error', 'Data Tidak Ditemukan');
            }
            $buku->delete();
            $this->dispatch('notify', ['variant' => 'success', 'title' => 'Success!', 'message' => 'Data Berhasil Dihapus']);
        } catch (\Exception $e) {
            dd($e);
        }
     
    }

    public function render()
    {
        return view('livewire.books.book-tabel', [
            'data' => Buku::paginate(10),
        ]);
    }
}

