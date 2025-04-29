<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Buku;

class BookCount extends Component
{

    public function render()
    {
        $data = Buku::all();
        $counts = $data->count();
        return view('livewire.books.book-count',[
            'counts' => $counts
        ]);
    }
}
