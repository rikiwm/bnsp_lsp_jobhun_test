<?php

namespace App\Livewire\Books;

use Livewire\Component;

class BookCreate extends Component
{
    public $judul, $penulis, $penerbit, $tahun_terbit, $stok;

    public function store(): void
    {
        $validatedData = $this->validate([
            'judul' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'penerbit' => ['required', 'string', 'max:255'],
            'tahun_terbit' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'stok' => ['required', 'integer', 'min:0', 'max:666'],
        ]);

        try {
            \App\Models\Buku::create($validatedData);
            $this->dispatch('notify', ['variant' => 'success', 'title' => 'Success!', 'message' => 'Data Berhasil Disimpan']);
            $this->redirectIntended(route('books.book-create'), navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            $this->redirectIntended(route('books.book-create'), navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.books.book-create');
    }
}
