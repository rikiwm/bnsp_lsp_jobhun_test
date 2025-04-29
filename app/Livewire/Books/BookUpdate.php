<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Buku;

class BookUpdate extends Component
{
    public $bukuId;
    public $judul;
    public $penulis;
    public $penerbit;
    public $tahun_terbit;
    public $stok;

    public function mount($id)
    {
        $buku = Buku::findOrFail($id);
        $this->bukuId = $buku->id;
        $this->judul = $buku->judul;
        $this->penulis = $buku->penulis;
        $this->penerbit = $buku->penerbit;
        $this->tahun_terbit = $buku->tahun_terbit;
        $this->stok = $buku->stok;
    }

    public function update()
    {
        $this->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'stok' => 'required|integer|min:0',
        ]);

        try {
            $buku = Buku::findOrFail($this->bukuId);
            $buku->update([
                'judul' => $this->judul,
                'penulis' => $this->penulis,
                'penerbit' => $this->penerbit,
                'tahun_terbit' => $this->tahun_terbit,
                'stok' => $this->stok,
            ]);
            $this->dispatch('notify', ['variant' => 'success', 'title' => 'Success!', 'message' => 'Data Berhasil Diupdate']);
            $this->redirectIntended(default: route('books.book-tabel', absolute: false), navigate: true);
        } catch (\Exception $e) {
            $this->dispatch('notify', ['variant' => 'error', 'title' => 'Error!', 'message' => 'Terjadi Kesalahan: ' . $e->getMessage()]);
            $this->redirectIntended(default: route('books.book-edit', ['id' => $this->bukuId], absolute: false), navigate: true);
        }
    }

    public function delete($id)
    {
        if ($buku = Buku::find($id)) {
            $buku->delete();
            $this->redirectIntended(default: route('books.book-tabel', absolute: true), navigate: true);
            // return redirect('/book',redirectUsingNavigate: true)->with('success', 'Data Berhasil Dihapus');
        }
        return redirect('/book')->with('error', 'Data Tidak Ditemukan');
    }

    public function render()
    {
        return view('livewire.books.book-update', [
            'id' => $this->bukuId,
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'tahun_terbit' => $this->tahun_terbit,
            'stok' => $this->stok
        ]);
    }
}
